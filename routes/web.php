<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/tentang', 'pages.tentang')->name('tentang');
Route::view('/kontak', 'pages.kontak')->name('kontak');
Route::view('/promo', 'pages.promo')->name('promo');
Route::view('/intern', 'pages.intern')->name('intern');