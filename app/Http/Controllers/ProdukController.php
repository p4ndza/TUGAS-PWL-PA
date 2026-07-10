<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori');

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_produk', 'like', '%' . $request->search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        $data_produk = $query->latest('id_produk')->get();
        $kategori = Kategori::all(); 
        
        return view('produk.katalog', compact('data_produk', 'kategori'));
    }

    public function adminIndex(Request $request)
    {
        $query = Produk::with('kategori');

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $data_produk = $query->latest('id_produk')->get();
        $kategori = Kategori::all();
        
        return view('admin.dashboard', compact('data_produk', 'kategori')); 
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'deskripsi'   => 'required',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
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

        return redirect()->route('admin.dashboard')->with('success', 'Produk batik berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required|string|max:255',
            'deskripsi'   => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stok'        => $request->stok,
        ];

        if ($request->hasFile('foto_produk')) {
            if ($produk->foto_produk && Storage::disk('public')->exists($produk->foto_produk)) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            $data['foto_produk'] = $request->file('foto_produk')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Data produk berhasil diperbarui!');
    }

   public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        \App\Models\Keranjang::where('id_produk', $id)->delete();

        $produk->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus!');
    }

    public function show($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        
        $produk_terkait = Produk::where('id_kategori', $produk->id_kategori)
                                ->where('id_produk', '!=', $id)
                                ->take(4)
                                ->get();

        return view('produk.show', compact('produk', 'produk_terkait'));
    }
}