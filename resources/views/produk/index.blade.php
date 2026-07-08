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

            {{-- Grid Produk --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:gap-3">
                @forelse($data_produk as $produk)
                    <div class="bg-white rounded hover:border-orange-500 hover:-translate-y-1 transition-all border border-gray-200 overflow-hidden shadow-sm">
                        <div class="p-3">
                            <h3 class="text-sm font-medium text-gray-800 truncate">{{ $produk->nama_produk }}</h3>
                            <p class="text-orange-600 font-bold text-sm mt-1">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>

                        <div class="p-3 pt-0 flex gap-2">
                            <form action="{{ route('checkout.proses') }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="id" value="{{ $produk->id_produk }}">
                                <input type="hidden" name="action" value="buy_now">
                                <button type="submit" 
                                        class="w-full bg-orange-500 text-white text-[11px] font-semibold py-1.5 rounded-sm hover:bg-orange-600 transition-colors text-center cursor-pointer">
                                    Beli Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center text-gray-500">
                        Tidak ada produk ditemukan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection