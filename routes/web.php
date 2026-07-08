<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;


// 1. Halaman Publik (Bisa diakses tanpa login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Katalog Produk untuk Pembeli/User
Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');


// 2. Akses khusus Guest (Pengunjung yang BELUM Login)
Route::middleware('guest')->group(function () {
    // Halaman Autentikasi Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Halaman Autentikasi Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});


// 3. Akses khusus User yang SUDAH Login
Route::middleware('auth')->group(function () {
    // Tombol / Fitur Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // -------------------------------------------------------------
    // KHUSUS ADMIN UMKM (Di-protect middleware 'admin')
    // -------------------------------------------------------------
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [ProdukController::class, 'adminIndex'])->name('dashboard');
        
        // CRUD Produk (Tambah, Edit, Hapus)
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

        // Laporan Penjualan (Jika dibutuhkan)
        // Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });
});