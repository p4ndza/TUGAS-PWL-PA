@extends('layouts.app')

@section('title', 'Daftar Akun - Batik Kelompok 9')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg border border-gold/30 p-8">
        
        <div class="text-center mb-8">
            <span class="w-12 h-12 rounded-full bg-soga text-cream font-serif font-bold text-2xl flex items-center justify-center mx-auto mb-3 border border-gold">B</span>
            <h2 class="font-serif text-2xl font-bold text-indigoCustom">Pendaftaran Akun</h2>
            <p class="text-xs text-ink/60 mt-1">Bergabunglah untuk memesan kain batik khas lokal</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-xs mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block text-xs font-bold uppercase tracking-wider text-soga mb-1">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required placeholder="Nama Anda"
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 focus:outline-none focus:border-soga text-sm">
            </div>

            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-soga mb-1">Alamat Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="nama@email.com"
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 focus:outline-none focus:border-soga text-sm">
            </div>

            <div>
                <label for="no_telp" class="block text-xs font-bold uppercase tracking-wider text-soga mb-1">Nomor Telepon / WA</label>
                <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}" required placeholder="081234567890"
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 focus:outline-none focus:border-soga text-sm">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-soga mb-1">Password</label>
                <input type="password" name="password" id="password" required placeholder="••••••••"
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 focus:outline-none focus:border-soga text-sm">
            </div>

            <div>
                <label for="alamat" class="block text-xs font-bold uppercase tracking-wider text-soga mb-1">Alamat Pengiriman</label>
                <textarea name="alamat" id="alamat" rows="2" required placeholder="Alamat lengkap rumah Anda"
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 focus:outline-none focus:border-soga text-sm resize-none">{{ old('alamat') }}</textarea>
            </div>

            <button type="submit" class="w-full bg-soga hover:bg-soga-dark text-cream font-bold py-3 rounded-lg transition border border-gold/50 shadow text-sm mt-2">
                Daftar Sekarang
            </button>
        </form>

        <p class="mt-8 text-center text-xs text-ink/60">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-bold text-indigoCustom hover:text-soga underline">Masuk di sini</a>
        </p>
    </div>
</div>
@endsection