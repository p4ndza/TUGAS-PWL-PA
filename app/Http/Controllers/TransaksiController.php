<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\DetailPesanan;
use App\Models\DetailTransaksi;
use App\Models\Keranjang; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    // ==========================================
    // 1. CHECKOUT LANGSUNG (BELI 1 PRODUK)
    // ==========================================
    public function checkoutDirect(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $jumlah = $request->input('jumlah', 1);
        return view('transaksi.checkout', compact('produk', 'jumlah'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'id_produk'         => 'required|exists:produk,id_produk',
            'jumlah'            => 'required|numeric|min:1',
            'metode_pembayaran' => 'required|string',
            'alamat_pengiriman' => 'required|string',
            'bukti_pembayaran'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $path_bukti = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $produk = Produk::findOrFail($request->id_produk);
            $total_harga = $produk->harga * $request->jumlah;

            $pesanan = Pesanan::create([
                'id_user'           => Auth::id(),
                'tanggal_pesanan'   => now(),
                'total_harga'       => $total_harga,
                'status_pesanan'    => 'menunggu_konfirmasi',
                'alamat_pengiriman' => $request->alamat_pengiriman,
            ]);

            DetailPesanan::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'id_produk'  => $produk->id_produk,
                'jumlah'     => $request->jumlah,
                'harga'      => $total_harga,
            ]);

            $transaksi = Transaksi::create([
                'id_pesanan'        => $pesanan->id_pesanan,
                'kode_transaksi'    => 'TRX-' . time() . '-' . Auth::id(),
                'metode_pembayaran' => $request->metode_pembayaran,
                'bukti_pembayaran'  => $path_bukti,
                'total_bayar'       => $total_harga,
                'status_pembayaran' => 'pending',
                'tanggal_bayar'     => now(),
            ]);

            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id_transaksi,
                'id_produk'    => $produk->id_produk,
                'jumlah'       => $request->jumlah,
                'subtotal'     => $total_harga,
            ]);

            $produk->decrement('stok', $request->jumlah);
            DB::commit();

            return redirect()->route('produk.index')->with('success', 'Transaksi berhasil dikirim!');
         } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ==========================================
    // 2. CHECKOUT DARI KERANJANG (BANYAK PRODUK)
    // ==========================================
    public function checkoutKeranjang()
    {
        $keranjang = Keranjang::with('produk')->where('id_user', Auth::id())->get();
        
        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        $totalHarga = 0;
        foreach ($keranjang as $item) {
            $totalHarga += $item->produk->harga * $item->jumlah;
        }

        return view('transaksi.checkout_keranjang', compact('keranjang', 'totalHarga'));
    }

    public function storeKeranjang(Request $request)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string',
            'alamat_pengiriman' => 'required|string',
            'bukti_pembayaran'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $keranjang = Keranjang::with('produk')->where('id_user', Auth::id())->get();
        if ($keranjang->isEmpty()) return redirect()->route('keranjang.index');

        DB::beginTransaction();
        try {
            $path_bukti = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $total_harga = 0;

            foreach ($keranjang as $item) {
                $total_harga += $item->produk->harga * $item->jumlah;
            }

            $pesanan = Pesanan::create([
                'id_user' => Auth::id(),
                'tanggal_pesanan' => now(),
                'total_harga' => $total_harga,
                'status_pesanan' => 'menunggu_konfirmasi',
                'alamat_pengiriman' => $request->alamat_pengiriman,
            ]);

            $transaksi = Transaksi::create([
                'id_pesanan' => $pesanan->id_pesanan,
                'kode_transaksi' => 'TRX-' . time() . '-' . Auth::id(),
                'metode_pembayaran' => $request->metode_pembayaran,
                'bukti_pembayaran' => $path_bukti,
                'total_bayar' => $total_harga,
                'status_pembayaran' => 'pending', 
                'tanggal_bayar' => now(),
            ]);

            foreach ($keranjang as $item) {
                $subtotal = $item->produk->harga * $item->jumlah;
                
                DetailPesanan::create([
                    'id_pesanan' => $pesanan->id_pesanan,
                    'id_produk' => $item->id_produk,
                    'jumlah' => $item->jumlah,
                    'harga' => $subtotal,
                    'harga_satuan' => $item->produk->harga
                ]);

                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_produk' => $item->id_produk,
                    'jumlah' => $item->jumlah,
                    'harga_satuan' => $item->produk->harga,
                    'subtotal' => $subtotal
                ]);

                // Kurangi Stok Produk
                $produk = Produk::find($item->id_produk);
                $produk->decrement('stok', $item->jumlah);
            }
            
            Keranjang::where('id_user', Auth::id())->delete();

            DB::commit();
            return redirect()->route('produk.index')->with('success', 'Berhasil! Pesanan keranjang Anda sedang diproses.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ==========================================
    // 3. FITUR ADMIN (MANAJEMEN TRANSAKSI)
    // ==========================================
    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses!');
        }

        $transaksi = Transaksi::with(['pesanan.user', 'details.produk'])
                    ->orderBy('id_transaksi', 'desc')
                    ->get();
        
        return view('transaksi.transaksi', compact('transaksi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status_pembayaran' => 'required|in:pending,lunas']);
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status_pembayaran' => $request->status_pembayaran]);
        return redirect()->back()->with('success', 'Status berhasil diubah!');
    }

    public function adminPesanan()
    {
        if (!auth()->user()->isAdmin()) {
            return redirect('/')->with('error', 'Anda tidak memiliki akses!');
        }

        $transaksi = Transaksi::with(['pesanan.user', 'details.produk'])
                    ->orderBy('id_transaksi', 'desc')
                    ->get();
        
        return view('transaksi.transaksi', compact('transaksi'));
    }

    public function pesananUser()
    {
        $transaksi = Transaksi::with(['pesanan.details.produk'])
                    ->whereHas('pesanan', function($query) {
                        $query->where('id_user', Auth::id());
                    })
                    ->orderBy('id_transaksi', 'desc')
                    ->get();
                    
        return view('transaksi.pesanan_user', compact('transaksi'));
    }
}