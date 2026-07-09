<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Akun Admin UMKM
        User::create([
            'nama' => 'Admin Batik',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'no_telp' => '08153964587',
            'alamat' => 'Jl. Merdeka No. 9, Kota Lokal',
            'role' => 'admin_umkm', 
        ]);

        // Kita juga bisa sekalian buat 1 contoh akun pelanggan buat testing nanti
        User::create([
            'nama' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi123'),
            'no_telp' => '081244446666',
            'alamat' => 'Jl. Mawar No. 4, Desa Sejahtera',
            'role' => 'pelanggan', // Set role sebagai pelanggan
        ]);
    }
}