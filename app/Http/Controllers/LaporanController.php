<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // Analisis Performa Produk (Produk Terlaris & Keuntungan)
        $dataProduk = DB::table('detail_transaksi')
            ->join('produk', 'detail_transaksi.id_produk', '=', 'produk.id_produk')
            ->select(
                'produk.nama_produk',
                DB::raw('SUM(detail_transaksi.jumlah) as total_terjual'),
                DB::raw('SUM(detail_transaksi.subtotal) as total_pendapatan'),
                // Keuntungan = (Harga Jual - Harga Modal) * Jumlah
                DB::raw('SUM((detail_transaksi.harga_satuan - produk.harga_modal) * detail_transaksi.jumlah) as total_keuntungan')
            )
            ->groupBy('produk.nama_produk')
            ->orderBy('total_terjual', 'desc')
            ->get();

        // Ringkasan Keuangan Total
        $totalPendapatan = $dataProduk->sum('total_pendapatan');
        $totalKeuntungan = $dataProduk->sum('total_keuntungan');

        return view('admin.laporan_produk', compact('dataProduk', 'totalPendapatan', 'totalKeuntungan'));
    }
}