@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
    <div class="container mx-auto px-4 py-8">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Katalog Produk UMKM</h1>
            <p class="text-gray-500">Dukung produk lokal unggulan daerah kita.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($data_produk as $produk)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden border border-gray-100">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 font-medium">Gambar: {{ $produk->nama_produk }}</span>
                    </div>
                    
                    <div class="p-5">
                        <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider">{{ $produk->kategori->nama_kategori }}</span>
                        <h3 class="text-lg font-bold text-gray-800 mt-1 mb-2">{{ $produk->nama_produk }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $produk->deskripsi }}</p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-black text-gray-900">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                            <button class="bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-sm font-bold transition">
                                + Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada produk yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection