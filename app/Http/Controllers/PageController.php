<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::where('slug', 'home')->where('is_published', true)->first();
        
        return view('page', compact('page'));
    }

    public function switchLanguage($locale)
    {
        if (!in_array($locale, ['tr', 'en'])) {
            $locale = 'tr';
        }

        session(['visited' => true, 'locale' => $locale]);

        $previousUrl = url()->previous();
        $path = parse_url($previousUrl, PHP_URL_PATH) ?? '/';

        return redirect(localized_url($path, $locale));
    }

    public function sitemap()
    {
        $pages = Page::where('is_published', true)->get();
        $services = Service::all();

        return response()->view('sitemap', compact('pages', 'services'))
            ->header('Content-Type', 'text/xml');
    }

    public function show($slug)
    {
        $slugMap = get_slug_map();
        $targetSlug = $slug;

        if (isset($slugMap[$slug])) {
            $targetSlug = $slugMap[$slug];
            \Illuminate\Support\Facades\App::setLocale('en');
            session(['locale' => 'en']);
        }

        $page = Page::where('slug', $targetSlug)->where('is_published', true)->first();

        if ($page) {
            return view('page', compact('page'));
        }

        $service = Service::where('slug', $targetSlug)->firstOrFail();
        return view('service_detail', compact('service'));
    }

    public function offerForm()
    {
        return view('offer_form');
    }

    public function submitOffer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string',
        ]);

        $offer = Offer::create($validated);

        try {
            $recipients = env('MAIL_GROUP_ADDRESSES') 
                ? array_map('trim', explode(',', env('MAIL_GROUP_ADDRESSES'))) 
                : ['info@euromould.com.tr'];

            Mail::to($recipients)->send(new \App\Mail\QuoteFormMail([
                'title' => 'Teklif Talebi',
                'name' => $offer->name,
                'email' => $offer->email,
                'phone' => $offer->phone ?? '-',
                'company' => $offer->company ?? '-',
                'service' => 'Genel Teklif Talebi',
                'details' => $offer->message ?? '-',
            ]));
        } catch (\Exception $e) {
            Log::error('Offer Mail Dispatch Error: ' . $e->getMessage());
        }

        return back()->with('success', 'Teklif talebiniz başarıyla alındı. En kısa sürede size dönüş yapacağız.');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = \App\Models\Contact::create($validated);

        try {
            $recipients = env('MAIL_GROUP_ADDRESSES') 
                ? array_map('trim', explode(',', env('MAIL_GROUP_ADDRESSES'))) 
                : ['info@euromould.com.tr'];

            Mail::to($recipients)->send(new \App\Mail\ContactFormMail([
                'title' => 'İletişim Formu Mesajı',
                'name' => $contact->name,
                'email' => $contact->email,
                'phone' => $contact->phone ?? '-',
                'subject' => $contact->subject ?? 'İletişim Formu',
                'message' => $contact->message ?? '-',
            ]));
        } catch (\Exception $e) {
            Log::error('Contact Mail Dispatch Error: ' . $e->getMessage());
        }

        return back()->with('success', 'Mesajınız başarıyla iletildi. Teşekkür ederiz.');
    }

    public function streamVideo($filename)
    {
        $path = public_path('images/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }

        $size = filesize($path);
        $file = fopen($path, 'rb');

        $start = 0;
        $end = $size - 1;
        $length = $size;

        $headers = [
            'Content-Type' => 'video/mp4',
            'Accept-Ranges' => 'bytes',
        ];

        if (request()->hasHeader('Range')) {
            $range = request()->header('Range');
            if (preg_match('/bytes=(\d+)-(\d+)?/', $range, $matches)) {
                $start = intval($matches[1]);
                if (isset($matches[2]) && $matches[2] !== '') {
                    $end = intval($matches[2]);
                }
                $length = $end - $start + 1;
                
                $headers['Content-Range'] = "bytes {$start}-{$end}/{$size}";
                $headers['Content-Length'] = $length;

                fseek($file, $start);
                return response()->stream(function () use ($file, $length) {
                    $bufferSize = 1024 * 64;
                    $bytesSent = 0;
                    while (!feof($file) && $bytesSent < $length) {
                        $readSize = min($bufferSize, $length - $bytesSent);
                        $buffer = fread($file, $readSize);
                        echo $buffer;
                        flush();
                        $bytesSent += strlen($buffer);
                    }
                    fclose($file);
                }, 206, $headers);
            }
        }

        $headers['Content-Length'] = $size;
        return response()->stream(function () use ($file) {
            fpassthru($file);
            fclose($file);
        }, 200, $headers);
    }
}
