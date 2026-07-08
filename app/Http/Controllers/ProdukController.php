<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    // 1. Katalog Produk untuk Pelanggan / Publik
    public function index()
    {
        $data_produk = Produk::with('kategori')->get();
        
        // Mengarahkan ke resources/views/produk/katalog.blade.php
        return view('produk.katalog', compact('data_produk'));
    }

    // 2. Dashboard Admin (Kelola Produk)
    public function adminIndex()
    {
        $data_produk = Produk::with('kategori')->orderBy('id_produk', 'desc')->get();
        
        // Mengarahkan ke resources/views/admin/index.blade.php
        return view('admin.dashboard', compact('data_produk')); 
    }

    // 3. Form Tambah Produk (Admin)
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    // 4. Simpan Produk Baru (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $request->file('foto_produk')->store('produk', 'public');

        Produk::create([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'foto_produk' => $fotoPath,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan!');
    }

    // 5. Form Edit Produk (Admin)
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        
        // Mengarahkan ke resources/views/admin/edit.blade.php
        return view('produk.edit', compact('produk', 'kategori'));
    }

    // 6. Simpan Perubahan Edit Produk (Admin)
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
        ];

        // Jika user mengunggah foto baru saat edit
        if ($request->hasFile('foto_produk')) {
            if ($produk->foto_produk && Storage::disk('public')->exists($produk->foto_produk)) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            $data['foto_produk'] = $request->file('foto_produk')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Data produk berhasil diperbarui!');
    }

    // 7. Hapus Produk (Admin)
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto_produk && Storage::disk('public')->exists($produk->foto_produk)) {
            Storage::disk('public')->delete($produk->foto_produk);
        }

        $produk->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus!');
    }
}