<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            ['nama_kategori' => 'Batik Cap'],
            ['nama_kategori' => 'Batik Tulis'],
            ['nama_kategori' => 'Batik Pria'],
            ['nama_kategori' => 'Batik Wanita'],
        ];

        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}