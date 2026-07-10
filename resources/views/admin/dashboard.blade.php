@extends('layouts.app')

@section('title', 'Dashboard Admin - Kelola Produk')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col md:flex-row gap-4 mb-10">
    
    <a href="{{ route('admin.pesanan') }}" class="flex-1 bg-white p-6 rounded-2xl border border-indigo-100 shadow-sm hover:shadow-indigo-200 transition flex items-center justify-between">
        <div>
            <h3 class="font-bold text-indigoCustom">Kelola Pesanan</h3>
        </div>
        <span class="text-indigo-400">➔</span>
    </a>

    <a href="{{ route('admin.laporan') }}" class="flex-1 bg-white p-6 rounded-2xl border border-indigo-100 shadow-sm hover:shadow-indigo-200 transition flex items-center justify-between">
        <div>
            <h3 class="font-bold text-indigoCustom">Laporan Keuangan</h3>
        </div>
        <span class="text-indigo-400">➔</span>
    </a>

    <a href="{{ route('admin.produk.create') }}" class="flex-1 bg-white p-6 rounded-2xl border border-indigo-100 shadow-sm hover:shadow-indigo-200 transition flex items-center justify-between">
        <div>
            <h3 class="font-bold text-indigoCustom">Tambah Produk</h3>
        </div>
        <span class="text-indigo-400">➔</span>
    </a>

</div>
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-lg font-bold text-indigoCustom mb-4">Daftar Produk</h2>
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
                    <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn-delete text-xs font-bold text-rose-600 hover:underline">Hapus</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            // Menemukan form terdekat dari tombol yang diklik
            let form = this.closest('.delete-form');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data produk ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48', // Warna merah (rose-600)
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Kirim form jika user setuju
                }
            });
        });
    });
</script>
@endsection