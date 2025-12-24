<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Service;
use App\Models\Offer;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $page = Page::where('slug', 'home')->where('is_published', true)->first();
        
        return view('page', compact('page'));
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('page', compact('page'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        
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

        Offer::create($validated);

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

        \App\Models\Contact::create($validated);

        return back()->with('success', 'Mesajınız başarıyla iletildi. Teşekkür ederiz.');
    }
}
