<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Admin Batik',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'no_telp' => '08153964587',
            'alamat' => 'Jl. Merdeka No. 9, Kota Lokal',
            'role' => 'admin_umkm', 
        ]);

        User::create([
            'nama' => 'Josu',
            'email' => 'josu@gmail.com',
            'password' => Hash::make('user123'),
            'no_telp' => '081244446666',
            'alamat' => 'Jl. Mawar No. 4, Desa Sejahtera',
            'role' => 'pelanggan', 
        ]);
    }
}