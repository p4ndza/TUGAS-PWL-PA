<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // 1. Fungsi Menampilkan Katalog Produk
    public function index()
    {
        $data_produk = Produk::with('kategori')->get();
        return view('produk.index', compact('data_produk'));
    }

    // 2. FUNGSI YANG BARU DIMASUKKAN: Memproses Simpan Data Produk Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required',
            'deskripsi'   => 'nullable|string',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pathFoto = $request->file('foto_produk')->store('produk', 'public');

        Produk::create([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'foto_produk' => $pathFoto,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 3. TAMBAHKAN FUNGSI INI DI SINI
    public function create()
    {
        // Pastikan kamu punya file blade di folder: resources/views/produk/create.blade.php
        return view('produk.create');
    }
}