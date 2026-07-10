@extends('layouts.app')

@section('title', 'Form Checkout')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="font-serif text-3xl font-bold text-indigoCustom mb-8 border-b border-gold/30 pb-4">Form Checkout & Pembayaran</h1>

    {{-- Pesan Error Global / Exception --}}
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-xs font-bold">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- Pesan Error Validasi Form --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-xs">
            <p class="font-bold mb-1">Harap perbaiki kesalahan berikut:</p>
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('checkout.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @csrf
        <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
        <input type="hidden" name="jumlah" value="{{ $jumlah }}">

        {{-- Kolom Kiri: Detail Produk & Alamat --}}
        <div class="bg-white p-6 rounded-2xl border border-gold/30 shadow-sm space-y-4">
            <h3 class="font-serif font-bold text-lg text-indigoCustom mb-4 border-b border-gray-100 pb-2">Detail Pesanan Barang</h3>
            
            <div class="flex gap-4 border-b border-gray-100 pb-4">
                @if($produk->foto_produk)
                    <img src="{{ asset('storage/' . $produk->foto_produk) }}" class="w-20 h-20 object-cover rounded-lg border border-gold/30">
                @else
                    <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center text-xs text-gray-500">No Image</div>
                @endif
                <div>
                    <h4 class="font-bold text-sm text-indigoCustom">{{ $produk->nama_produk }}</h4>
                    <p class="text-xs text-soga font-bold mt-1">Rp {{ number_format($produk->harga, 0, ',', '.') }} x {{ $jumlah }} pcs</p>
                    <p class="text-xs text-ink/70 mt-1">Total Harga: <span class="font-bold text-indigoCustom">Rp {{ number_format($produk->harga * $jumlah, 0, ',', '.') }}</span></p>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-soga mb-1">Alamat Pengiriman</label>
                <textarea name="alamat_pengiriman" rows="3" required class="w-full p-2.5 border border-gold/30 rounded-lg text-xs focus:outline-none focus:border-soga bg-cream-soft/30">{{ old('alamat_pengiriman', auth()->user()->alamat ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-soga mb-1">Catatan Pesanan (Opsional)</label>
                <input type="text" name="catatan" value="{{ old('catatan') }}" placeholder="Contoh: Ukuran XL" class="w-full p-2.5 border border-gold/30 rounded-lg text-xs focus:outline-none focus:border-soga bg-cream-soft/30">
            </div>
        </div>

        {{-- Kolom Kanan: Pembayaran & Upload --}}
        <div class="bg-white p-6 rounded-2xl border border-gold/30 shadow-sm space-y-4 flex flex-col justify-between">
            <div>
                <h3 class="font-serif font-bold text-lg text-indigoCustom mb-4 border-b border-gray-100 pb-2">Pembayaran</h3>

                <div class="mb-4 bg-cream-soft/40 p-3 rounded-lg border border-gold/20">
                    <p class="text-xs text-ink/70">Silakan transfer sesuai total bayar ke rekening berikut:</p>
                    <p class="text-xs font-bold text-soga mt-1">Bank BCA:</p>
                    <p class="text-sm font-mono font-bold text-indigoCustom">8830-1234-5678</p>
                    <p class="text-[11px] text-ink/60">a.n Sentra Batik Nusantara 9</p>
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-bold uppercase text-soga mb-1">Metode Pembayaran</label>
                    <select name="metode_pembayaran" required class="w-full p-2.5 border border-gold/30 rounded-lg text-xs focus:outline-none focus:border-soga bg-cream-soft/30">
                        <option value="Transfer BCA" {{ old('metode_pembayaran') == 'Transfer BCA' ? 'selected' : '' }}>Transfer BCA</option>
                        <option value="Transfer Mandiri" {{ old('metode_pembayaran') == 'Transfer Mandiri' ? 'selected' : '' }}>Transfer Mandiri</option>
                        <option value="QRIS / E-Wallet" {{ old('metode_pembayaran') == 'QRIS / E-Wallet' ? 'selected' : '' }}>QRIS / E-Wallet</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-bold uppercase text-soga mb-1">Upload Bukti Transfer <span class="text-red-500">*</span></label>
                    <input type="file" name="bukti_pembayaran" accept="image/jpeg,image/png,image/jpg" required class="w-full p-2 border border-gold/30 rounded-lg text-xs bg-cream-soft/30" onchange="previewImage(event)">
                    <p class="text-[10px] text-gray-500 mt-1">* Format: JPG, JPEG, PNG. Maksimal ukuran: 2MB</p>
                    
                    {{-- Container Preview Gambar --}}
                    <div id="image-preview-container" class="mt-3 hidden">
                        <p class="text-[11px] font-bold text-soga mb-1">Preview Bukti Upload:</p>
                        <img id="image-preview" src="#" alt="Preview" class="w-32 h-32 object-cover rounded-lg border border-gold/40">
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-soga hover:bg-soga-dark text-cream py-3 rounded-lg font-bold text-sm transition shadow-md">
                Konfirmasi Pembayaran
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('image-preview');
            output.src = reader.result;
            document.getElementById('image-preview-container').classList.remove('hidden');
        };
        if(event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>
@endsection