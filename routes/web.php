<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KeranjangController;

// 1. HALAMAN PUBLIK
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

// 2. HALAMAN TAMU (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// 3. HALAMAN USER LOGIN (Pelanggan & Admin)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    // Checkout
    Route::get('/checkout/{id}', [TransaksiController::class, 'checkoutDirect'])->name('checkout.direct');
    Route::post('/checkout', [TransaksiController::class, 'store'])->name('checkout.store');

    // Checkout Keranjang
    Route::get('/checkout-keranjang', [TransaksiController::class, 'checkoutKeranjang'])->name('checkout.keranjang');
    Route::post('/checkout-keranjang', [TransaksiController::class, 'storeKeranjang'])->name('checkout.keranjang.store');

    // --- RUTE INFORMASI PESANAN PELANGGAN (Riwayat Pesanan Saya) ---
    Route::get('/pesanan-saya', [TransaksiController::class, 'pesananUser'])->name('pesanan.user');

    // 4. GRUP KHUSUS ADMIN (Prefix /admin)
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [ProdukController::class, 'adminIndex'])->name('dashboard');
        
        // CRUD Produk
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

        // Pesanan, Transaksi, & Laporan (Versi Admin)
        Route::get('/pesanan', [TransaksiController::class, 'adminPesanan'])->name('pesanan');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        
        // Rute Transaksi Admin
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
        Route::patch('/transaksi/{id}/update-status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
    });
});