@extends('layouts.app')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        
        <div class="border-b pb-3 mb-6">
            <h2 class="text-xl font-bold text-gray-800">Tambah Produk Baru</h2>
            <p class="text-xs text-gray-500">Masukkan informasi produk sesuai dengan kolom database Kamu.</p>
        </div>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf 

            {{-- Nama Produk --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-orange-500 @error('nama_produk') border-red-500 @enderror" placeholder="Contoh: Kemeja Batik Premium">
                @error('nama_produk') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Kategori --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="id_kategori" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-orange-500 @error('id_kategori') border-red-500 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id_kategori }}" {{ old('id_kategori') == $cat->id_kategori ? 'selected' : '' }}>{{ $cat->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('id_kategori') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Produk</label>
                <textarea name="deskripsi" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-orange-500 @error('deskripsi') border-red-500 @enderror" placeholder="Jelaskan detail produk di sini...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Harga --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-orange-500 @error('harga') border-red-500 @enderror" placeholder="50000">
                    @error('harga') <span class="text-xs text-red-500 mt-1 block">{{ $message }} @enderror
                </div>

                {{-- Stok --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Stok</label>
                    <input type="number" name="stok" value="{{ old('stok') }}" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-orange-500 @error('stok') border-red-500 @enderror" placeholder="10">
                    @error('stok') <span class="text-xs text-red-500 mt-1 block">{{ $message }} @enderror
                </div>
            </div>

            {{-- Upload Foto --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
                <input type="file" name="foto_produk" required class="w-full border border-gray-300 rounded px-2 py-1.5 text-sm file:mr-4 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 @error('foto_produk') border-red-500 @enderror">
                @error('foto_produk') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            {{-- Tombol --}}
            <div class="pt-4 flex justify-end gap-2">
                <a href="{{ route('produk.index') }}" class="px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200">Batal</a>
                <button type="submit" class="px-5 py-2 text-sm bg-orange-500 text-white font-semibold rounded hover:bg-orange-600">Simpan Produk</button>
            </div>

        </form>
    </div>
</div>
@endsection