<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('id_user', Auth::id())->with('produk')->get();
        return view('keranjang.index', compact('keranjang'));
    }

    public function store(Request $request)
    {
        $request->validate(['id_produk' => 'required|exists:produk,id_produk']);

        $item = Keranjang::where('id_user', Auth::id())
                        ->where('id_produk', $request->id_produk)
                        ->first();

        if ($item) {
            $item->increment('jumlah');
        } else {
            Keranjang::create([
                'id_user' => Auth::id(),
                'id_produk' => $request->id_produk,
                'jumlah' => 1
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        Keranjang::where('id_keranjang', $id)->where('id_user', Auth::id())->delete();
        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}