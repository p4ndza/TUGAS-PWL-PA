<?php

namespace App\Http\Controllers;

use App\Models\Order; // Pastikan Model Order sudah dibuat
use App\Models\Produk;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // 1. Menampilkan halaman form checkout
    public function index(Request $request) 
    {
        // Logika untuk menampilkan checkout berdasarkan ID produk
        return view('checkout');
    }

    // 2. Memproses data dari form checkout
    public function store(Request $request) 
    {
        // 1. Validasi input user
        $request->validate([
            'id' => 'required', // ID Produk
            'nama_penerima' => 'required',
            'no_telepon' => 'required',
            'alamat_lengkap' => 'required',
        ]);

        // 2. Simpan ke database
        // Sesuaikan nama kolom dengan tabel 'orders' Anda
        Order::create([
            'id_produk' => $request->id,
            'nama_penerima' => $request->nama_penerima,
            'no_telepon' => $request->no_telepon,
            'alamat_lengkap' => $request->alamat_lengkap,
            'status' => 'pending',
        ]);

        // 3. Berikan feedback sukses
        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    }
}