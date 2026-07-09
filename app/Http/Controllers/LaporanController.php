<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // 1. Hitung Total Pendapatan (Hanya yang statusnya Lunas)
        $totalPendapatan = Transaksi::where('status_pembayaran', 'lunas')->sum('total_bayar');

        // 2. Ambil Produk Terlaris (Group by id_produk)
        $produkTerlaris = DetailTransaksi::select('id_produk', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('id_produk')
            ->orderBy('total_terjual', 'desc')
            ->with('produk')
            ->limit(10) // Tampilkan 10 teratas
            ->get();

        // 3. Data Transaksi Lengkap untuk detail
        $transaksi = Transaksi::with(['pesanan.user', 'details.produk'])->orderBy('id_transaksi', 'desc')->get();

        return view('admin.laporan', compact('totalPendapatan', 'produkTerlaris', 'transaksi'));
    }
}