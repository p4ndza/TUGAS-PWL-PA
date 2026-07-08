<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Batik Kelompok 9</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#F4E9D8',
                        'cream-soft': '#FBF5EA',
                        indigoCustom: '#1C2B4A',
                        'indigo-2': '#26375C',
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
    <style>
        /* Background Batik Pattern Overlay */
        .bg-batik-hero {
            background: 
                linear-gradient(135deg, rgba(28, 43, 74, 0.92) 0%, rgba(38, 55, 92, 0.88) 100%),
                url('https://images.unsplash.com/photo-1601924994987-69e26d50dc26?auto=format&fit=crop&q=80&w=1600') center/cover no-repeat;
        }
    </style>
</head>
<body class="bg-batik-hero min-h-screen text-cream flex flex-col justify-between p-6 md:p-12 font-sans relative">

    <div class="max-w-7xl w-full mx-auto my-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        
        <!-- SISI KIRI: Branding & Information (7 Columns) -->
        <div class="lg:col-span-7 space-y-8 pr-0 lg:pr-6">
            
            <!-- Capsule Brand Badge -->
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 bg-indigoCustom/60 backdrop-blur-md px-5 py-2.5 rounded-full border border-gold/40 shadow-lg hover:border-gold transition">
                <span class="w-7 h-7 rounded-full bg-gold text-indigoCustom font-serif font-bold text-sm flex items-center justify-center">B9</span>
                <span class="font-serif font-bold text-sm text-cream tracking-wide">Batik Kelompok 9 <span class="text-gold/80 font-normal text-xs ml-1">| Sentra UMKM Batik Lokal</span></span>
            </a>

            <!-- Main Heading & Subtitle -->
            <div class="space-y-4">
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-gold">SISTEM INFORMASI PEMASARAN</p>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-cream leading-tight">
                    e-Batik <span class="text-gold italic font-normal">Lokal</span>
                </h1>
                <p class="inline-block bg-indigoCustom/80 text-cream px-4 py-1.5 rounded-full text-xs font-bold tracking-wider uppercase border border-gold/30">
                    Sistem Informasi Pemasaran Batik Nusantara
                </p>
                <p class="text-cream/80 text-sm sm:text-base leading-relaxed max-w-xl pt-2">
                    Platform digital terpadu dari Kelompok 9 untuk menghubungkan pengrajin batik daerah dengan pembeli. Transparan, terintegrasi, dan mudah digunakan.
                </p>
            </div>

            <!-- 3 Bottom Feature Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
                <!-- Card 1 -->
                <div class="bg-indigoCustom/70 backdrop-blur-md border border-gold/30 rounded-2xl p-4 text-center hover:border-gold/60 transition">
                    <svg class="w-6 h-6 text-gold mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <h4 class="font-bold text-sm text-cream">Realtime</h4>
                    <p class="text-[11px] text-cream/70 mt-0.5">Stok kain selalu terupdate</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-indigoCustom/70 backdrop-blur-md border border-gold/30 rounded-2xl p-4 text-center hover:border-gold/60 transition">
                    <svg class="w-6 h-6 text-gold mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <h4 class="font-bold text-sm text-cream">Terintegrasi</h4>
                    <p class="text-[11px] text-cream/70 mt-0.5">Pemesanan & pembukuan rapi</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-indigoCustom/70 backdrop-blur-md border border-gold/30 rounded-2xl p-4 text-center hover:border-gold/60 transition">
                    <svg class="w-6 h-6 text-gold mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <h4 class="font-bold text-sm text-cream">Keamanan Data</h4>
                    <p class="text-[11px] text-cream/70 mt-0.5">Transaksi tersimpan aman</p>
                </div>
            </div>

        </div>

        <!-- SISI KANAN: Login Card (5 Columns) -->
        <div class="lg:col-span-5 w-full max-w-md mx-auto">
            <div class="bg-cream-soft text-ink rounded-[2.5rem] shadow-2xl p-8 sm:p-10 border-2 border-gold/40 relative overflow-hidden">
                
                <!-- Logo Top Center -->
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 rounded-full bg-soga text-cream shadow-md flex items-center justify-center border-2 border-gold">
                        <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5"/>
                            <path d="M12 6v12M6 12h12" stroke="currentColor" stroke-width="1" opacity="0.6"/>
                            <circle cx="12" cy="12" r="4" fill="currentColor"/>
                        </svg>
                    </div>
                </div>

                <!-- Card Title -->
                <div class="text-center mb-6">
                    <h2 class="font-serif text-3xl font-bold text-indigoCustom">Selamat Datang</h2>
                    <p class="text-xs text-ink/60 mt-1">Masukkan akun untuk mengakses sistem e-Batik</p>
                </div>

                <!-- Alert Error -->
                @if(session('error'))
                    <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-2xl text-xs mb-4 text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Form Login -->
                <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Input Email / Username -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-indigoCustom mb-1 ml-2">Email / Akun</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-soga">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </span>
                            <input type="email" name="email" id="email" required placeholder="Masukkan email atau akun Anda"
                                class="w-full pl-11 pr-4 py-3.5 rounded-full border border-gold/30 bg-white text-ink text-xs focus:outline-none focus:border-soga focus:ring-1 focus:ring-soga shadow-sm">
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-indigoCustom mb-1 ml-2">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-soga">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </span>
                            <input type="password" name="password" id="password" required placeholder="Masukkan password"
                                class="w-full pl-11 pr-11 py-3.5 rounded-full border border-gold/30 bg-white text-ink text-xs focus:outline-none focus:border-soga focus:ring-1 focus:ring-soga shadow-sm">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-indigoCustom hover:bg-soga text-cream font-bold py-3.5 rounded-full transition duration-300 shadow-lg text-xs flex items-center justify-center gap-2 border border-gold/40 mt-2">
                        <span>➜]</span> Masuk ke Sistem
                    </button>
                </form>

                <!-- Register Link & Footer Note -->
                <div class="mt-6 text-center text-[11px] text-ink/60 space-y-2">
                    <p>
                        Belum punya akun? 
                        <a href="{{ route('register') }}" class="font-bold text-soga hover:underline">Daftar Akun Baru</a>
                    </p>
                    <p class="pt-2 border-t border-gold/20 text-[10px]">
                        Butuh bantuan? <a href="#" class="text-soga font-bold">Hubungi Admin</a> &copy; {{ date('Y') }} Batik Kelompok 9
                    </p>
                </div>

            </div>
        </div>

    </div>

</body>
</html>