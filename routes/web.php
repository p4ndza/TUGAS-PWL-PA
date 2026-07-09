<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

// 1. Halaman Publik (Bisa diakses tanpa login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Katalog Produk
Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');

// Halaman Detail Produk
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');

// 2. Akses khusus Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});


// 3. Akses khusus User Login (Pelanggan & Admin)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Ubah Route::post menjadi Route::match(['get', 'post']) untuk direct checkout
    Route::match(['get', 'post'], '/checkout/direct/{id}', [TransaksiController::class, 'checkoutDirect'])->name('checkout.direct');
    
    // Simpan Transaksi / Pembayaran
    Route::post('/checkout/store', [TransaksiController::class, 'store'])->name('checkout.store');

    // -------------------------------------------------------------
    // KHUSUS ADMIN UMKM
    // -------------------------------------------------------------
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [ProdukController::class, 'adminIndex'])->name('dashboard');
        
        // CRUD Produk
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

        // Pesanan & Laporan Keuangan
        Route::get('/pesanan', [TransaksiController::class, 'adminPesanan'])->name('pesanan');
        Route::get('/laporan', [TransaksiController::class, 'laporanKeuangan'])->name('laporan');
    });
});