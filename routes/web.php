<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductFilterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\IklanController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\SocialController;


Route::get('/products', [ProductsController::class, 'index'])->name('products');

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

    // Blog Routes
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('index');
        Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
        Route::post('/', [AdminBlogController::class, 'store'])->name('store');
        Route::get('/{blog}/edit', [AdminBlogController::class, 'edit'])->name('edit');
        Route::put('/{blog}', [AdminBlogController::class, 'update'])->name('update');
        Route::delete('/{blog}', [AdminBlogController::class, 'destroy'])->name('destroy');
    });
    
    // Iklan Routes
    Route::prefix('iklan')->name('iklan.')->group(function () {
        Route::get('/', [IklanController::class, 'index'])->name('index');
        Route::get('/create', [IklanController::class, 'create'])->name('create');
        Route::post('/', [IklanController::class, 'store'])->name('store');
        Route::get('/{iklan}/edit', [IklanController::class, 'edit'])->name('edit');
        Route::put('/{iklan}', [IklanController::class, 'update'])->name('update');
        Route::delete('/{iklan}', [IklanController::class, 'destroy'])->name('destroy');
    });
    
    // Social Media Management Routes
    Route::get('social', [SocialController::class, 'index'])->name('social.index');
    
    // Store contact details
    Route::put('social/store', [SocialController::class, 'updateStore'])->name('social.store.update');
    
    // Batch magang image
    Route::put('social/batch', [SocialController::class, 'updateBatchImage'])->name('social.batch.update');
    
    // Brochures
    Route::post('social/brochure', [SocialController::class, 'addBrochure'])->name('social.brochure.add');
    Route::delete('social/brochure/{id}', [SocialController::class, 'deleteBrochure'])->name('social.brochure.delete');
    
});

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

// Blog routes (Viewer only)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/tentang', 'pages.tentang')->name('tentang');
Route::view('/kontak', 'pages.kontak')->name('kontak');
Route::view('/promo', 'pages.promo')->name('promo');
Route::view('/intern', 'pages.intern')->name('intern');