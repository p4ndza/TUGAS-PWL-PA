<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan sangat penting!
        $this->call([
            KategoriSeeder::class, // Kategori harus ada duluan
            ProdukSeeder::class,   // Produk baru bisa masuk setelah kategori ada
            UserSeeder::class,     // User juga bisa ditambahkan
        ]);
    }
}