@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-2 sm:px-4">
            
            {{-- Header Katalog & Tombol Tambah --}}
            <div class="mb-4 bg-white p-4 rounded shadow-sm border-b-4 border-orange-500 flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-800 uppercase tracking-wide flex items-center gap-2">
                    <span class="w-2 h-6 bg-orange-500 rounded-sm inline-block"></span>
                    Rekomendasi Produk UMKM
                </h1>
                <a href="{{ route('produk.create') }}" class="bg-orange-500 text-white text-xs font-semibold px-4 py-2 rounded shadow-sm hover:bg-orange-600 transition-colors">
                    + Tambah Produk
                </a>
            </div>

            {{-- Grid Produk ala Shopee --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:gap-3">
                @forelse($data_produk as $produk)
                    <div class="bg-white rounded hover:border-orange-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 border border-gray-200 overflow-hidden relative group flex flex-col h-full shadow-sm">
                        
                        {{-- Link Area Gambar dan Teks Detail --}}
                        <a href="#" class="flex flex-col no-underline text-inherit flex-grow">
                            
                            {{-- Badge Star+ --}}
                            <div class="absolute top-0 left-0 bg-orange-500 text-white text-[10px] font-bold px-2 py-1 rounded-br-lg z-10 shadow-sm">
                                Star+
                            </div>

                            {{-- Gambar Produk --}}
                            <div class="w-full aspect-square bg-gray-100 relative overflow-hidden">
                                <img src="{{ asset('storage/' . $produk->foto_produk) }}" 
                                     alt="{{ $produk->nama_produk }}" 
                                     class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300" 
                                     onerror="this.src='https://via.placeholder.com/300?text=No+Image'">
                                
                                <div class="absolute bottom-0 left-0 right-0 bg-teal-500 bg-opacity-90 text-white text-[9px] font-bold px-2 py-1 text-center z-10 tracking-wider">
                                    GRATIS ONGKIR XTRA
                                </div>
                            </div>
                            
                            {{-- Konten Teks --}}
                            <div class="p-2.5 flex flex-col flex-grow">
                                <h3 class="text-xs sm:text-sm text-gray-800 line-clamp-2 leading-snug min-h-[2.5rem]">
                                    {{ $produk->nama_produk }}
                                </h3>
                                
                                <div class="mt-1.5 flex flex-wrap gap-1">
                                    <span class="text-[9px] sm:text-[10px] border border-orange-500 text-orange-500 px-1 py-0.5 rounded-sm bg-orange-50 font-medium truncate max-w-[100px]">
                                        {{ $produk->kategori->nama_kategori ?? 'Umum' }}
                                    </span>
                                    <span class="text-[9px] sm:text-[10px] border border-orange-200 text-orange-600 px-1 py-0.5 rounded-sm bg-orange-100 font-medium">
                                        Cashback XTRA
                                    </span>
                                </div>
                                
                                <div class="mt-2 flex flex-col">
                                    <div class="text-[10px] text-gray-400 h-[15px] mb-0.5">Stok: {{ $produk->stok }}</div>
                                    <div class="text-base font-bold text-orange-500 truncate">
                                        Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                    </div>
                                </div>
                                
                                <div class="mt-1.5 pt-1.5 border-t border-gray-100 flex items-center justify-between text-[10px] sm:text-[11px] text-gray-500">
                                    <div class="flex items-center gap-0.5 text-yellow-400">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <span class="text-gray-600">5.0</span>
                                    </div>
                                    <span>0 Terjual</span>
                                </div>
                            </div>
                        </a>

                        {{-- FIX: Menggunakan METHOD="GET" agar parameter masuk ke URL tanpa memicu Crash Token --}}
                        <div class="px-2.5 pb-2.5 flex gap-1.5 bg-white relative z-30">
                            
                           {{-- Tombol Aksi (Diperbaiki: Menggunakan link agar alur pindah halaman berjalan lancar) --}}
<div class="px-2.5 pb-2.5 flex gap-1.5 bg-white relative z-30">
    
    {{-- Tombol Keranjang Belanja --}}
    <a href="{{ route('checkout') }}?id={{ $produk->id_produk }}&action=cart" 
       title="Masukkan Keranjang" 
       class="w-1/4 flex items-center justify-center bg-white border border-orange-500 text-orange-500 p-1.5 rounded-sm hover:bg-orange-50 transition-colors cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
    </a>
    
    {{-- Tombol Beli Sekarang --}}
    <a href="{{ route('checkout') }}?id={{ $produk->id_produk }}&action=buy_now" 
       class="flex-grow bg-orange-500 text-white text-[11px] font-semibold py-1.5 rounded-sm hover:bg-orange-600 transition-colors text-center cursor-pointer flex items-center justify-center">
        Beli Sekarang
    </a>

</div>

                        </div>

                    </div>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded shadow-sm border border-gray-200">
                        <svg class="w-20 h-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <p class="text-gray-500 text-base font-medium">Belum ada produk yang tersedia.</p>
                    </div>
                @endforelse
            </div>
            
        </div>
    </div>
@endsection