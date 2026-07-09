@extends('layouts.app')

@section('title', 'Edit Produk Batik')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    
    <div class="mb-8 flex items-center justify-between border-b border-gold/30 pb-4">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-soga">Panel Admin</p>
            <h1 class="font-serif text-3xl font-bold text-indigoCustom">Edit Produk Batik</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-soga hover:underline">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-md border border-gold/30 p-8">
        <form action="{{ route('admin.produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="id_kategori" class="block text-xs font-bold uppercase text-soga mb-1">Kategori Batik</label>
                <select name="id_kategori" id="id_kategori" required class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id_kategori }}" {{ $produk->id_kategori == $kat->id_kategori ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="nama_produk" class="block text-xs font-bold uppercase text-soga mb-1">Nama Kain / Motif</label>
                <input type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="harga" class="block text-xs font-bold uppercase text-soga mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" value="{{ old('harga', $produk->harga) }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
                </div>

                <div>
                    <label for="harga_modal" class="block text-xs font-bold uppercase text-soga mb-1">Harga Modal (per pcs)</label>
                    <input type="number" name="harga_modal" id="harga_modal" required placeholder="5000"
                        value="{{ isset($produk) ? $produk->harga_modal : '' }}"
                        class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
                </div>

                <div>
                    <label for="stok" class="block text-xs font-bold uppercase text-soga mb-1">Stok Kain</label>
                    <input type="number" name="stok" id="stok" value="{{ old('stok', $produk->stok) }}" required
                        class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
                </div>
            </div>

            <div>
                <label for="deskripsi" class="block text-xs font-bold uppercase text-soga mb-1">Deskripsi Produk</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga resize-none">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-soga mb-1">Foto Saat Ini</label>
                @if($produk->foto_produk)
                    <div class="w-32 h-32 rounded-lg overflow-hidden border border-gold/40 mb-3">
                        <img src="{{ asset('storage/' . $produk->foto_produk) }}" class="w-full h-full object-cover" alt="Foto Produk">
                    </div>
                @endif
                <label for="foto_produk" class="block text-xs font-bold uppercase text-soga mb-1">Ganti Foto (Biarkan kosong jika tidak diganti)</label>
                <input type="file" name="foto_produk" id="foto_produk" accept="image/*"
                    class="w-full px-4 py-2 rounded-lg border border-gold/30 bg-cream-soft/50 text-xs text-ink/70">
            </div>

            <button type="submit" class="w-full bg-soga hover:bg-soga-dark text-cream font-bold py-3 rounded-lg transition border border-gold/50 shadow text-sm mt-4">
                Update Data Produk
            </button>
        </form>
    </div>

</div>
@endsection