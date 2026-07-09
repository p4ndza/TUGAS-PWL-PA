<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

// 1. Halaman Publik
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// 2. Akses Guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// 3. Akses User Login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::match(['get', 'post'], '/checkout/direct/{id}', [TransaksiController::class, 'checkoutDirect'])->name('checkout.direct');
    Route::post('/checkout/store', [TransaksiController::class, 'store'])->name('checkout.store');
    Route::get('/keranjang', [App\Http\Controllers\KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah', [App\Http\Controllers\KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/keranjang/hapus/{id}', [App\Http\Controllers\KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    
    // -------------------------------------------------------------
    // KHUSUS ADMIN (Group Admin)
    // -------------------------------------------------------------
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [ProdukController::class, 'adminIndex'])->name('dashboard');
        
        // Produk
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

        // Pesanan & Laporan
        Route::get('/pesanan', [TransaksiController::class, 'adminPesanan'])->name('pesanan');
        Route::get('/laporan', [TransaksiController::class, 'laporanKeuangan'])->name('laporan');
        
        // Transaksi (List & Update Status)
        // Sekarang URL-nya menjadi /admin/transaksi
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.transaksi');
        Route::patch('/transaksi/{id}/update-status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
    });
});