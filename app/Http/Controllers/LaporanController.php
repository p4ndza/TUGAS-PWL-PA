<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $dariBulan   = $request->input('dari_bulan');   // format: YYYY-MM
        $sampaiBulan = $request->input('sampai_bulan'); // format: YYYY-MM

        $dari   = $dariBulan   ? Carbon::parse($dariBulan . '-01')->startOfMonth() : null;
        $sampai = $sampaiBulan ? Carbon::parse($sampaiBulan . '-01')->endOfMonth()  : null;

        $query = Transaksi::where('status_pembayaran', 'lunas');

        if ($dari && $sampai) {
            $query->whereHas('pesanan', function ($q) use ($dari, $sampai) {
                $q->whereBetween('tanggal_pesanan', [$dari, $sampai]);
            });
        }

        $idTransaksiLunas = (clone $query)->pluck('id_transaksi');

        $totalPendapatan    = (clone $query)->sum('total_bayar');
        $totalTransaksi     = (clone $query)->count();
        $totalProdukTerjual = DetailTransaksi::whereIn('id_transaksi', $idTransaksiLunas)->sum('jumlah');

        $produkTerlaris = DetailTransaksi::select('id_produk', DB::raw('SUM(jumlah) as total_terjual'))
            ->whereIn('id_transaksi', $idTransaksiLunas)
            ->groupBy('id_produk')
            ->orderBy('total_terjual', 'desc')
            ->with('produk')
            ->limit(10)
            ->get();

        $transaksi = (clone $query)->with(['pesanan.user', 'details.produk'])
            ->orderBy('id_transaksi', 'desc')
            ->get();

        return view('admin.laporan', compact(
            'totalPendapatan', 'totalTransaksi', 'totalProdukTerjual',
            'produkTerlaris', 'transaksi', 'dariBulan', 'sampaiBulan'
        ));
    }
}