<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Rute Halaman Publik (Frontend)
 * |--------------------------------------------------------------------------
 */
Route::get('/', [PageController::class, 'home'])->name('home');

// PINDAHKAN RUTE KOLEKSI KE SINI
Route::get('/koleksi', [PageController::class, 'products'])->name('products.index');
Route::get('/koleksi/{product:slug}', [PageController::class, 'productDetail'])->name('products.show');

/*
 * |--------------------------------------------------------------------------
 * | Rute Halaman Admin (Backend/CMS)
 * |--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Rute Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute untuk Manajemen Resource
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    // HAPUS RUTE KOLEKSI DARI DALAM GRUP INI
});

// Rute Otentikasi dari Breeze
require __DIR__ . '/auth.php';
