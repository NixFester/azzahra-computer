<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', function() { return 'Search page'; })->name('search');
Route::get('/account', function() { return 'Account page'; })->name('account');
Route::get('/cart', function() { return 'Cart page'; })->name('cart');