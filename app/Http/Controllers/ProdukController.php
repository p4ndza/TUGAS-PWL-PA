<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        // Mengambil semua produk beserta data kategorinya
        $data_produk = Produk::with('kategori')->get();
        
        // Mengambil semua kategori untuk menu filter nantinya
        $data_kategori = Kategori::all();

        // Lempar data ke file view resources/views/produk/index.blade.php
        return view('produk.index', compact('data_produk', 'data_kategori'));
    }
}