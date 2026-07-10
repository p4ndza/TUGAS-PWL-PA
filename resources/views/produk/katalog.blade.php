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

    <form action="{{ route('produk.index') }}" method="GET" class="mb-8 bg-white p-4 rounded-2xl border border-gold/30 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="relative w-full md:w-1/2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama batik atau motif..."
                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gold/30 bg-cream-soft/30 text-xs focus:outline-none focus:border-soga text-ink">
            <span class="absolute left-3 top-2.5 text-soga">🔍</span>
        </div>

        <div class="flex w-full md:w-auto gap-2 items-center">
            <select name="kategori" class="w-full md:w-52 px-4 py-2.5 rounded-xl border border-gold/30 bg-cream-soft/30 text-xs focus:outline-none focus:border-soga text-ink">
                <option value="">Semua Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}" {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-indigoCustom hover:bg-soga text-cream font-bold px-5 py-2.5 rounded-xl text-xs transition border border-gold/30">
                Filter
            </button>

            @if(request('search') || request('kategori'))
                <a href="{{ route('produk.index') }}" class="bg-gray-200 hover:bg-gray-300 text-ink font-bold px-4 py-2.5 rounded-xl text-xs transition">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($data_produk as $produk)
            <div class="bg-white rounded-2xl border border-gold/20 shadow-md overflow-hidden flex flex-col justify-between hover:shadow-lg transition">
                <div>
                    <a href="{{ route('produk.show', $produk->id_produk) }}">
                    <div class="relative h-48 bg-cream-soft overflow-hidden">
                        @if($produk->foto_produk)
                            <div class="aspect-square overflow-hidden bg-cream-soft">
                                <img src="{{ asset('storage/' . $produk->foto_produk) }}" 
                                    class="w-full h-full object-cover" 
                                    alt="{{ $produk->nama_produk }}">
                            </div>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-ink/40 text-xs">No Image</div>
                        @endif
                        <span class="absolute top-3 right-3 bg-soga text-cream text-[10px] font-bold px-2.5 py-1 rounded-full border border-gold/40">
                            {{ $produk->kategori->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="p-4">
                        
                            <h3 class="font-serif font-bold text-lg text-indigoCustom mb-1 hover:text-soga transition">{{ $produk->nama_produk }}</h3>
                           
                        <p class="text-xs text-ink/70 line-clamp-2 mb-3">{{ $produk->deskripsi }}</p>
                        <p class="text-sm font-bold text-soga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        
                    </div>
                    </a> 
                </div>

                <div class="p-4 pt-0">
                    <div class="flex items-center justify-between border-t border-gold/10 pt-3">
                        @auth
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.produk.edit', $produk->id_produk) }}" class="text-xs font-bold text-soga hover:underline">Edit</a>
                                <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Hapus kain ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs">Hapus</button>
                                </form>
                            @else
                                <form action="{{ route('keranjang.store') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                                    <button type="submit" class="w-full bg-indigoCustom hover:bg-soga text-cream py-2 rounded-lg text-xs font-bold transition border border-gold/30">
                                        + Keranjang
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="w-full block text-center bg-indigoCustom hover:bg-soga text-cream py-2 rounded-lg text-xs font-bold transition border border-gold/30">
                                + Keranjang
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty   
            <div class="col-span-full text-center py-16 bg-white rounded-xl border border-gold/20">
                <p class="font-serif text-lg text-ink/60">Belum ada koleksi batik yang sesuai dengan filter Anda.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection