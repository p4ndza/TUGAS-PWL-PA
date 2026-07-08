<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Form Login & Register
    public function showLogin() { return view('auth.login'); }
    public function showRegister() { return view('auth.register'); }

    // Proses Register
    public function register(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'no_telp'  => 'required|string|max:20',
            'email'    => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'alamat'   => 'required|string',
        ]);

        User::create([
            'nama'     => $request->nama,
            'no_telp'  => $request->no_telp,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'alamat'   => $request->alamat,
            'role'     => 'pelanggan', // Default pendaftar sebagai pelanggan
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Direct route berdasarkan role
            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('produk.index'));
        }

        return back()->with('error', 'Email atau password salah.')->withInput();
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah keluar.');
    }
}