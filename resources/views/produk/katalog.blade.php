@extends('layouts.app')

@section('title', 'Katalog Kain Batik - UMKM Lokal')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex flex-col md:flex-row md:items-center justify-between pb-6 mb-8 border-b border-gold/30">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-soga mb-1">Koleksi Sentra Batik</p>
            <h1 class="font-serif text-3xl md:text-4xl font-bold text-indigoCustom">Katalog Kain Batik Nusantara</h1>
        </div>

        @auth
            @if(auth()->user()->isAdmin())
                <div class="mt-4 md:mt-0">
                    <a href="{{ route('admin.produk.create') }}" class="inline-flex items-center gap-2 bg-soga hover:bg-soga-dark text-cream font-bold px-5 py-2.5 rounded-lg border border-gold shadow transition">
                        <span>+</span> Tambah Produk Baru
                    </a>
                </div>
            @endif
        @endauth
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded-lg mb-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($data_produk as $produk)
            <div class="bg-white rounded-xl border border-gold/20 overflow-hidden shadow-sm hover:shadow-md transition flex flex-col">
                <div class="h-56 bg-cream flex items-center justify-center overflow-hidden relative">
                    @if($produk->foto_produk)
                        <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover">
                    @else
                        <div class="text-center p-4">
                            <span class="font-serif font-bold text-soga text-lg">{{ $produk->nama_produk }}</span>
                        </div>
                    @endif
                    <span class="absolute top-3 right-3 bg-indigoCustom text-gold text-xs font-bold px-3 py-1 rounded-full border border-gold/40">
                        {{ $produk->kategori->nama_kategori ?? 'Batik' }}
                    </span>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-serif font-bold text-xl text-indigoCustom mb-2">{{ $produk->nama_produk }}</h3>
                    <p class="text-ink/70 text-sm mb-6 line-clamp-2 flex-grow">{{ $produk->deskripsi }}</p>

                    <div class="flex items-center justify-between pt-4 border-t border-cream-soft">
                        <div>
                            <span class="text-xs text-ink/50 block">Harga / Kain</span>
                            <span class="font-serif font-bold text-xl text-soga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                        </div>

                        @auth
                            @if(auth()->user()->isAdmin())
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.produk.edit', $produk->id_produk) }}" class="text-indigoCustom hover:text-soga font-bold text-xs">Edit</a>
                                    <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Hapus kain ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs">Hapus</button>
                                    </form>
                                </div>
                            @else
                                <button class="bg-indigoCustom hover:bg-soga text-cream px-4 py-2 rounded-lg text-xs font-bold transition border border-gold/30">
                                    + Keranjang
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="bg-indigoCustom hover:bg-soga text-cream px-4 py-2 rounded-lg text-xs font-bold transition border border-gold/30">
                                + Keranjang
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 bg-white rounded-xl border border-gold/20">
                <p class="font-serif text-lg text-ink/60">Belum ada koleksi batik yang ditampilkan.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection