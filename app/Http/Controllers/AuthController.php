<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Logika validasi login (akan kita beresin setelah ini)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        return back()->with('error', 'Fitur validasi login sedang disiapkan!');
    }

    // TAMPILKAN HALAMAN REGISTER
    public function showRegister()
    {
        return view('auth.register');
    }

    // PROSES DAFTAR AKUN PELANGGAN
    public function register(Request $request)
    {
        // Validasi input data dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user,email', // Pastikan email belum terdaftar di tabel user
            'password' => 'required|string|min:6',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        // Simpan data ke tabel user
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'role' => 'pelanggan', // KUNCI OTOMATIS SEBAGAI PELANGGAN DEMI KEAMANAN
        ]);

        // Lempar ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil! Silakan login.');
    }
}