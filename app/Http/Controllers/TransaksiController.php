<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\DetailPesanan;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    // 1. Form Checkout
    public function checkoutDirect(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $jumlah = $request->input('jumlah', 1);

        return view('transaksi.checkout', compact('produk', 'jumlah'));
    }

    // 2. Simpan PESANAN sekaligus TRANSAKSI
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Validasi
        $request->validate([
            'id_produk'         => 'required|exists:produk,id_produk',
            'jumlah'            => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|string',
            'alamat_pengiriman' => 'required|string',
            'bukti_pembayaran'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // Upload Foto
            $path_bukti = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

            // Hitung total harga (asumsi harga dari produk)
            $produk = Produk::findOrFail($request->id_produk);
            $total_harga = $produk->harga * $request->jumlah;

            // A. Simpan ke tabel PESANAN
            $pesanan = Pesanan::create([
                'id_user'           => Auth::id(),
                'tanggal_pesanan'   => now(),
                'total_harga'       => $total_harga,
                'status_pesanan'    => 'menunggu_konfirmasi',
                'alamat_pengiriman' => $request->alamat_pengiriman,
            ]);

            // B. Simpan ke tabel DETAIL_PESANAN
            DetailPesanan::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk'  => $produk->id_produk,
                'jumlah'     => $request->jumlah,
                'harga'      => $total_harga,
            ]);

            // C. Simpan ke tabel TRANSAKSI (SINI FIX-NYA)
            // Hapus 'id_user' dari sini karena tabel transaksi tidak punya kolom tersebut
            $transaksi = Transaksi::create([
                'id_pesanan'        => $pesanan->id_pesanan,
                'kode_transaksi'    => 'TRX-' . time() . '-' . Auth::id(),
                'metode_pembayaran' => $request->metode_pembayaran,
                'bukti_pembayaran'  => $path_bukti,
                'total_bayar'       => $total_harga,
                'status_pembayaran' => 'pending',
                'tanggal_bayar'     => now(),
            ]);

            // D. Simpan ke detail_transaksi
            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id_transaksi,
                'id_produk'    => $produk->id_produk,
                'jumlah'       => $request->jumlah,
                'subtotal'     => $total_harga,
            ]);

            // Potong stok produk
            $produk->decrement('stok', $request->jumlah);

            DB::commit();

            return redirect()->route('produk.index')->with('success', 'Transaksi berhasil dikirim!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memproses transaksi: ' . $e->getMessage())->withInput();
        }
    }
}