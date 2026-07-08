<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Models\Kategori;

// --- 1. Halaman Utama ---
Route::get('/', function () {
    return view('welcome');
})->name('home');

// --- 2. Rute Katalog ---
Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');

// --- 3. Rute Produk (Admin/Manajemen) ---
Route::get('/produk/tambah', function() {
    $categories = Kategori::all();
    return view('produk.create', compact('categories'));
})->name('produk.create');

Route::post('/produk/simpan', [ProdukController::class, 'store'])->name('produk.store');

Route::resource('produk', ProdukController::class)->except(['create', 'store']);

// --- 4. Rute Checkout ---
// Menampilkan form
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
// Memproses form (Hanya satu rute POST)
Route::post('/checkout/proses', [CheckoutController::class, 'store'])->name('checkout.proses');

// --- 5. Rute Autentikasi ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');