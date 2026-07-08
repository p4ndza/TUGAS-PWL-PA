@extends('layouts.app')

@section('title', 'Dashboard Admin - Kelola Produk')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 pb-4 border-b border-gold/30">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-soga">Panel Pengelola</p>
            <h1 class="font-serif text-3xl font-bold text-indigoCustom">Dashboard Admin</h1>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('admin.produk.create') }}" class="inline-flex items-center px-5 py-2.5 bg-soga hover:bg-soga-dark text-cream font-bold text-xs uppercase tracking-wider rounded-lg shadow transition">
                + Tambah Produk
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($data_produk as $produk)
            <div class="bg-white rounded-2xl shadow-sm border border-gold/20 overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="h-48 w-full bg-cream-soft relative overflow-hidden">
                        @if($produk->foto_produk)
                            <img src="{{ asset('storage/' . $produk->foto_produk) }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-xs text-ink/40">Tanpa Foto</div>
                        @endif
                        <span class="absolute top-3 right-3 bg-indigoCustom text-cream text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">
                            {{ $produk->kategori->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-serif font-bold text-lg text-indigoCustom mb-1">{{ $produk->nama_produk }}</h3>
                        <p class="text-xs text-ink/70 line-clamp-2 mb-3">{{ $produk->deskripsi }}</p>
                        <p class="text-sm font-bold text-soga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="px-5 pb-5 pt-2 flex items-center justify-between border-t border-gray-100 mt-2">
                    <a href="{{ route('admin.produk.edit', $produk->id_produk) }}" class="text-xs font-bold text-indigoCustom hover:underline">Edit</a>
                    <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs font-bold text-rose-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-gold/20">
                <p class="text-sm text-ink/60">Belum ada produk yang ditambahkan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection