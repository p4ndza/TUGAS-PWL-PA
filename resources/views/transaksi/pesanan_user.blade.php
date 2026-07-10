@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-10">
    <h1 class="font-serif text-3xl font-bold text-indigoCustom mb-8">Riwayat Pesanan</h1>

    <div class="bg-white rounded-2xl border border-gold/20 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-cream-soft/50 border-b border-gold/10">
                <tr>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase">Kode</th>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase">Produk</th>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase text-right">Total</th>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($transaksi as $t)
                <tr>
                    <td class="p-4 text-sm font-bold text-soga">{{ $t->kode_transaksi }}</td>
                    <td class="p-4 text-sm">
                        @foreach($t->pesanan->details as $d)
                            <div>{{ $d->produk->nama_produk }} (x{{ $d->jumlah }})</div>
                        @endforeach
                    </td>
                    <td class="p-4 text-sm text-right font-bold">Rp {{ number_format($t->total_bayar, 0, ',', '.') }}</td>
                    <td class="p-4 text-center">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase 
                            {{ $t->status_pembayaran == 'lunas' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                            {{ $t->status_pembayaran }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="p-8 text-center text-ink/60">Belum ada pesanan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection