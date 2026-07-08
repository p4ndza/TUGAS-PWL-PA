<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sentra UMKM Batik Lokal')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#F4E9D8',
                        'cream-soft': '#FBF5EA',
                        indigoCustom: '#1C2B4A',
                        soga: '#8B5A2B',
                        'soga-dark': '#5B3B1C',
                        gold: '#C7972A',
                        ink: '#241A12',
                    },
                    fontFamily: {
                        serif: ['Fraunces', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-cream-soft text-ink font-sans flex flex-col min-h-screen">

    <header class="bg-indigoCustom text-cream sticky top-0 z-50 border-b border-gold/30 shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="w-9 h-9 rounded-full bg-soga text-cream font-serif font-bold text-lg flex items-center justify-center border border-gold">B</span>
                <span class="font-serif font-bold text-xl text-cream tracking-wide">Batik <span class="text-gold">Kelompok 9</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-gold transition">Beranda</a>
                <a href="{{ route('produk.index') }}" class="hover:text-gold transition">Katalog Kain</a>
            </nav>

            <div class="flex items-center gap-4 text-sm">
                @auth
                    <span class="text-cream/80 hidden sm:inline">Halo, <strong class="text-gold">{{ auth()->user()->nama }}</strong></span>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="bg-soga hover:bg-soga-dark text-cream font-bold px-4 py-2 rounded-lg border border-gold/40 transition text-xs">
                            Dashboard Admin
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-cream/70 hover:text-red-400 font-semibold transition text-xs">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-gold font-semibold transition">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-soga hover:bg-soga-dark text-cream font-semibold px-4 py-2 rounded-lg border border-gold/40 transition">Daftar</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-indigoCustom text-cream/70 text-center py-6 border-t border-gold/20 text-sm mt-12">
        <p><strong class="text-gold">Batik Kelompok 9</strong> &mdash; Sistem Informasi UMKM Batik Lokal &copy; {{ date('Y') }}</p>
    </footer>

</body>
</html>