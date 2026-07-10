<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Sentra UMKM Batik Lokal'); ?></title>
    
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
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3">
                <span class="w-9 h-9 rounded-full bg-soga text-cream font-serif font-bold text-lg flex items-center justify-center border border-gold">B</span>
                <span class="font-serif font-bold text-xl text-cream tracking-wide">Batik <span class="text-gold">Kelompok 9</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-6 text-sm font-medium">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-gold transition">Beranda</a>
                <a href="<?php echo e(route('produk.index')); ?>" class="hover:text-gold transition">Katalog</a>
                
                <?php if(auth()->guard()->check()): ?>
                    <?php if(!auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('pesanan.user')); ?>" class="hover:text-gold transition">Informasi Pesanan</a>
                    <?php endif; ?>
                <?php endif; ?>
            </nav>
            
            <div class="flex items-center gap-4 text-sm">
                <?php if(auth()->guard()->check()): ?>
                    <span class="text-cream/80 hidden sm:inline">Halo, <strong class="text-gold"><?php echo e(auth()->user()->nama); ?></strong></span>
                    
                    <?php if(auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="bg-soga hover:bg-soga-dark text-cream font-bold px-4 py-2 rounded-lg border border-gold/40 transition text-xs">
                            Dashboard Admin
                        </a>
                    <?php else: ?>
                        <?php
                            $cartCount = \App\Models\Keranjang::where('id_user', auth()->id())->count();
                        ?>
                        <a href="<?php echo e(route('keranjang.index')); ?>" class="relative flex items-center text-soga font-bold px-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <?php if($cartCount > 0): ?>
                                <span class="absolute -top-1 -right-1 bg-indigoCustom text-cream text-[10px] font-bold rounded-full h-5 w-5 flex items-center justify-center shadow-sm">
                                    <?php echo e($cartCount); ?>

                                </span>
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>
                    
                    <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="text-cream/70 hover:text-red-400 font-semibold transition text-xs">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="hover:text-gold font-semibold transition">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="bg-soga hover:bg-soga-dark text-cream font-semibold px-4 py-2 rounded-lg border border-gold/40 transition">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="bg-indigoCustom text-cream/70 text-center py-6 border-t border-gold/20 text-sm mt-12">
        <p><strong class="text-gold">Batik Kelompok 9</strong> &mdash; Sistem Informasi UMKM Batik Lokal &copy; <?php echo e(date('Y')); ?></p>
    </footer>

</body>
</html><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/layouts/app.blade.php ENDPATH**/ ?>