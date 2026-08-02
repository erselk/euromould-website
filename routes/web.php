<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/lang/{locale}', [PageController::class, 'switchLanguage'])->name('lang.switch');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/teklif-al', [PageController::class, 'offerForm'])->name('offer.form');
Route::post('/teklif-al', [PageController::class, 'submitOffer'])->name('offer.submit');
Route::post('/iletisim-gonder', [PageController::class, 'submitContact'])->name('contact.submit');
Route::get('/video-stream/{filename}', [PageController::class, 'streamVideo'])->name('video.stream');

// English Homepage
Route::get('/en', [PageController::class, 'home'])->name('home.en');

// English Quote Form
Route::get('/get-quote', [PageController::class, 'offerForm'])->name('offer.form.en');

// Handle premature POST submissions to admin login before Livewire initializes
Route::post('/admin/login', function () {
    return redirect('/admin/login')->withErrors(['email' => 'Lütfen sayfa tam yüklendikten sonra tekrar giriş yapmayı deneyin.']);
});

Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');

