<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/lang/{locale}', [PageController::class, 'switchLanguage'])->name('lang.switch');
Route::get('/teklif-al', [PageController::class, 'offerForm'])->name('offer.form');
Route::post('/teklif-al', [PageController::class, 'submitOffer'])->name('offer.submit');
Route::post('/iletisim-gonder', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/video-stream/{filename}', [PageController::class, 'streamVideo'])->name('video.stream');

// Test Rotaları (İletişim ve Teklif Maili Testi)
Route::get('/test-contact-mail', function () {
    $recipients = array_map('trim', explode(',', env('MAIL_GROUP_ADDRESSES')));
    Mail::to($recipients)->send(new \App\Mail\ContactFormMail([
        'title' => 'TEST: İletişim Formu Mesajı',
        'name' => 'Ahmet Yılmaz',
        'email' => 'ahmet@example.com',
        'phone' => '+90 532 000 0000',
        'subject' => 'Kalıp İmalatı Hakkında',
        'message' => 'Merhaba, plastik enjeksiyon kalıbı imalatı hakkında bilgi almak istiyorum.'
    ]));
    return 'İletişim formu test maili gönderildi! Alıcılar: ' . implode(', ', $recipients);
});

Route::get('/test-quote-mail', function () {
    $recipients = array_map('trim', explode(',', env('MAIL_GROUP_ADDRESSES')));
    Mail::to($recipients)->send(new \App\Mail\QuoteFormMail([
        'title' => 'TEST: Teklif Talebi',
        'name' => 'Mehmet Demir - ABC Plastik A.Ş.',
        'email' => 'teklif@abcplastik.com',
        'phone' => '+90 533 111 2233',
        'service' => 'Otomotiv Plastik Kalıbı',
        'details' => 'Özel çizimlerimiz mevcuttur, 250 tonluk makine için 2 gözlü kalıp teklifi rica ediyoruz.'
    ]));
    return 'Teklif formu test maili gönderildi! Alıcılar: ' . implode(', ', $recipients);
});

Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');

