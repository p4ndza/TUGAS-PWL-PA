<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;

// 1. Halaman Intro / Welcome Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2. Halaman Katalog Produk (Pindah ke /katalog)
Route::get('/katalog', [ProdukController::class, 'index'])->name('produk.index');

// 3. Halaman Autentikasi Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Halaman Autentikasi Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');