@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Detail Produk')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <nav class="text-xs text-ink/60 mb-6 flex items-center gap-2">
        <a href="{{ route('produk.index') }}" class="hover:text-soga">Katalog</a>
        <span>/</span>
        <span class="text-soga font-bold">{{ $produk->kategori->nama_kategori ?? 'Kategori' }}</span>
        <span>/</span>
        <span class="text-ink font-semibold">{{ $produk->nama_produk }}</span>
    </nav>

    <div class="bg-white rounded-2xl border border-gold/20 shadow-md p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        
        <div class="bg-cream-soft rounded-xl overflow-hidden border border-gold/30 flex items-center justify-center aspect-video">
            @if($produk->foto_produk)
                <img src="{{ asset('storage/' . $produk->foto_produk) }}" class="w-full h-full object-contain" alt="{{ $produk->nama_produk }}">
            @endif
        </div>

        <div class="flex flex-col justify-between">
            <div>
                <span class="inline-block bg-soga/10 text-soga text-xs font-bold px-3 py-1 rounded-full mb-3 border border-soga/20">
                    {{ $produk->kategori->nama_kategori ?? 'Kategori Batik' }}
                </span>
                <h1 class="font-serif text-2xl md:text-3xl font-bold text-indigoCustom mb-3">{{ $produk->nama_produk }}</h1>

                <div class="bg-cream-soft/50 p-4 rounded-xl border border-gold/20 mb-6 flex items-center gap-4">
                    <span class="text-xs text-ink/60 uppercase font-bold">Harga</span>
                    <span class="font-serif text-3xl font-bold text-soga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                </div>

                <div class="mb-6 text-xs text-ink/70 flex items-center gap-4">
                    <span class="font-bold uppercase text-soga">Stok Tersedia:</span>
                    <span class="font-semibold bg-gray-100 px-3 py-1 rounded-md border">{{ $produk->stok }} Pcs</span>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs font-bold uppercase text-soga mb-2 border-b border-gold/20 pb-1">Deskripsi & Detail Motif</h3>
                    <p class="text-sm text-ink/80 leading-relaxed whitespace-pre-line">{{ $produk->deskripsi }}</p>
                </div>
            </div>

            @auth
                <form action="{{ route('checkout.direct', $produk->id_produk) }}" method="GET" class="pt-4 border-t border-gold/20">
                    @csrf
                    <div class="flex items-center gap-4 mb-4">
                        <label class="text-xs font-bold uppercase text-soga">Jumlah Beli:</label>
                        <input type="number" name="jumlah" value="1" min="1" max="{{ $produk->stok }}" class="w-20 px-3 py-1.5 border border-gold/30 rounded-lg text-sm text-center font-bold">
                    </div>

                    <button type="submit" class="w-full bg-soga hover:bg-soga-dark text-cream py-3 rounded-xl font-bold text-sm shadow-md transition border border-gold">
                        🛒 Beli Sekarang
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-center w-full bg-indigoCustom text-cream py-3 rounded-xl font-bold text-sm shadow-md hover:bg-soga transition">
                    Login untuk Membeli
                </a>
            @endauth
        </div>
    </div>

</div>
@endsection