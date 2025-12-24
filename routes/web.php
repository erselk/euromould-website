<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/teklif-al', [PageController::class, 'offerForm'])->name('offer.form');
Route::post('/teklif-al', [PageController::class, 'submitOffer'])->name('offer.submit');
Route::get('/hizmet/{slug}', [PageController::class, 'serviceDetail'])->name('service.show');
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');
