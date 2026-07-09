@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-indigoCustom mb-2">Laporan Performa & Keuntungan</h1>
    <p class="text-soga mb-8">Data penjualan produk dan estimasi profit.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-indigoCustom p-6 rounded-xl text-white shadow-lg">
            <p class="opacity-80 uppercase text-xs font-bold">Total Pendapatan</p>
            <h2 class="text-3xl font-bold mt-1">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h2>
        </div>
        <div class="bg-emerald-600 p-6 rounded-xl text-white shadow-lg">
            <p class="opacity-80 uppercase text-xs font-bold">Total Keuntungan Bersih</p>
            <h2 class="text-3xl font-bold mt-1">Rp {{ number_format($totalKeuntungan, 0, ',', '.') }}</h2>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gold/30 shadow-md overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-cream-soft border-b border-gold/30">
                <tr>
                    <th class="px-6 py-4">Nama Produk</th>
                    <th class="px-6 py-4 text-center">Terjual</th>
                    <th class="px-6 py-4 text-right">Pendapatan</th>
                    <th class="px-6 py-4 text-right">Keuntungan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gold/10">
                @foreach($dataProduk as $p)
                <tr>
                    <td class="px-6 py-4 font-bold">{{ $p->nama_produk }}</td>
                    <td class="px-6 py-4 text-center">{{ $p->total_terjual }}</td>
                    <td class="px-6 py-4 text-right">Rp {{ number_format($p->total_pendapatan, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-right font-bold text-emerald-600">Rp {{ number_format($p->total_keuntungan, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection