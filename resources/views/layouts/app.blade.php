<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'UMKM Lokal') - Kelompok 9</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Nunito Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-black text-emerald-600 tracking-wider">
                        UMKM<span class="text-gray-800">LOKAL.</span>
                    </a>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-emerald-600 font-semibold transition">Home</a>
                    <a href="{{ route('produk.index') }}" class="text-gray-700 hover:text-emerald-600 font-semibold transition">Katalog</a>
                    <a href="#" class="text-gray-700 hover:text-emerald-600 font-semibold transition">Kategori</a>
                </nav>

                <div class="flex items-center space-x-6">
                    <a href="#" class="text-gray-700 hover:text-emerald-600 relative group">
                        <i class="fa-solid fa-cart-shopping text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold w-4 h-4 rounded-full flex items-center justify-center">0</span>
                    </a>

                    <div class="border-l pl-6">
                        @if (Auth::check())
                            <div class="relative group cursor-pointer">
                                <span class="text-gray-800 font-semibold flex items-center gap-2">
                                    Halo, {{ explode(' ', Auth::user()->nama)[0] }} 
                                    <i class="fa-solid fa-chevron-down text-sm"></i>
                                </span>
                                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-md shadow-lg hidden group-hover:block">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Pesanan Saya</a>
                                    <form method="POST" action="#">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">Logout</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-emerald-600 font-semibold">Sign In</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white mt-12 py-12">
        <div class="container mx-auto px-4 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-black text-emerald-500 mb-4">UMKM LOKAL.</h3>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Platform digital Kelompok 9 untuk membantu pelaku UMKM daerah memperluas jangkauan pasar dan mengelola pesanan terintegrasi.
                </p>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-4">Akses Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-emerald-400 transition">Katalog Produk</a></li>
                    <li><a href="#" class="hover:text-emerald-400 transition">Keranjang Belanja</a></li>
                    <li><a href="#" class="hover:text-emerald-400 transition">Daftar Akun</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4">Hubungi Kami</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fa-regular fa-envelope mr-2"></i> kelompok9@kampus.ac.id</li>
                    <li><i class="fa-solid fa-phone mr-2"></i> +62 812-3456-7890</li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500 text-sm">
            <p>&copy; 2026 UMKM Lokal Kelompok 9. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>