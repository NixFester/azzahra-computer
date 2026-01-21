<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\IklanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\ProductFilterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;


Route::get('/products', function () {
    return view('products');
})->name('products');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Protected Routes
Route::prefix('admin')->name('admin.')->middleware(['check.auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Produk Routes
    Route::prefix('produk')->name('produk.')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('index');
        Route::get('/create', [ProdukController::class, 'create'])->name('create');
        Route::post('/', [ProdukController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProdukController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ProdukController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('destroy');
    });
    
    // Iklan Routes
    Route::prefix('iklan')->name('iklan.')->group(function () {
        Route::get('/', [IklanController::class, 'index'])->name('index');
        Route::get('/create', [IklanController::class, 'create'])->name('create');
        Route::post('/', [IklanController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [IklanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [IklanController::class, 'update'])->name('update');
        Route::delete('/{id}', [IklanController::class, 'destroy'])->name('destroy');
    });
    
    // User Routes
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
    
    // Social Routes
    Route::prefix('social')->name('social.')->group(function () {
        Route::get('/', [SocialController::class, 'index'])->name('index');
        Route::get('/create', [SocialController::class, 'create'])->name('create');
        Route::post('/', [SocialController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SocialController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SocialController::class, 'update'])->name('update');
        Route::delete('/{id}', [SocialController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

// Blog routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/tentang', 'pages.tentang')->name('tentang');
Route::view('/kontak', 'pages.kontak')->name('kontak');
Route::view('/promo', 'pages.promo')->name('promo');
Route::view('/intern', 'pages.intern')->name('intern');