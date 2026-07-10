<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriBatik = Kategori::where('nama_kategori', 'Batik Cap')->first();

        Produk::create([
            'id_kategori' => $kategoriBatik->id_kategori, 
            'nama_produk' => 'Batik Cap Solo',
            'deskripsi'   => 'Batik kualitas premium.',
            'harga'       => 150000,
            'harga_modal' => 80000,
            'stok'        => 20,
            'foto_produk' => 'storage/app/public/produk/cIGSwGbdPly15Q6xC3QwIq9u1j0d7CEJqCbfzo6g.webp'
        ]);

        $kategoriBatik = Kategori::where('nama_kategori', 'Batik Tulis')->first();
        Produk::create([
            'id_kategori' => $kategoriBatik->id_kategori, 
            'nama_produk' => 'Batik Tulis',
            'deskripsi'   => 'Batik kualitas Pekalongan.',
            'harga'       => 120000,
            'harga_modal' => 60000,
            'stok'        => 10,
            'foto_produk' => 'batik.jpg'
        ]);
    }
}