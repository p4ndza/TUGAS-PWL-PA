@extends('layouts.app')

@section('title', 'Checkout Pembayaran')

@section('content')
@php
    $id_produk = request('id');
    $produk = \App\Models\Produk::where('id_produk', $id_produk)->first();
    $harga_produk = $produk ? $produk->harga : 0;
    $ongkir = 15000; 
    $total_pembayaran = ($harga_produk * 1) + $ongkir;
@endphp

<div class="min-h-screen bg-gray-50 py-6">
    <div class="container mx-auto px-4 max-w-5xl">
        
        @if(!$produk)
            <div class="bg-white p-12 text-center rounded shadow-sm border border-gray-200">
                <p class="text-gray-800 font-bold text-lg">Produk Tidak Ditemukan</p>
                <a href="{{ route('produk.index') }}" class="mt-6 inline-block bg-orange-500 text-white px-6 py-2 rounded text-sm hover:bg-orange-600">Kembali ke Katalog</a>
            </div>
        @else
            {{-- Form utama --}}
            <form action="{{ route('checkout.proses') }}" method="POST" id="form-checkout">
                @csrf 
                <input type="hidden" name="id" value="{{ $produk->id_produk }}">
                <input type="hidden" name="total_bayar" value="{{ $total_pembayaran }}">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <div class="lg:col-span-2 flex flex-col gap-4">
                        {{-- Form Alamat --}}
                        <div class="bg-white p-4 rounded shadow-sm border-t-4 border-orange-500">
                            <h2 class="text-sm font-semibold text-orange-500 mb-4">Isi Alamat Pengiriman</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                                <div><label class="block text-[11px] font-semibold text-gray-500">NAMA LENGKAP</label>
                                <input type="text" name="nama_penerima" required class="w-full border border-gray-300 rounded p-2 text-sm outline-none focus:border-orange-500"></div>
                                <div><label class="block text-[11px] font-semibold text-gray-500">NO TELEPON</label>
                                <input type="tel" name="no_telepon" required class="w-full border border-gray-300 rounded p-2 text-sm outline-none focus:border-orange-500"></div>
                            </div>
                            <label class="block text-[11px] font-semibold text-gray-500">ALAMAT LENGKAP</label>
                            <textarea name="alamat_lengkap" required class="w-full border border-gray-300 rounded p-2 text-sm outline-none focus:border-orange-500"></textarea>
                        </div>
                    </div>

                    {{-- Ringkasan --}}
                    <div class="flex flex-col gap-4">
                        <div class="bg-white p-4 rounded shadow-sm">
                            <div class="font-bold text-sm mb-4">Ringkasan</div>
                            <div class="text-xl font-bold text-orange-500 mb-4">Rp{{ number_format($total_pembayaran, 0, ',', '.') }}</div>
                            <button type="submit" class="w-full bg-orange-500 text-white font-bold py-3 rounded text-sm hover:bg-orange-600">Buat Pesanan</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>

<script>
    // Ambil form dengan aman
    const form = document.getElementById('form-checkout');
    if (form) {
        form.addEventListener('submit', function(e) {
            // Validasi sederhana bisa ditambahkan di sini
        });
    }
</script>
@endsection