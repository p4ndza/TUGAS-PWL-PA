<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Batik Kelompok 9</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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
        
        <div class="lg:col-span-7 space-y-8 pr-0 lg:pr-6">
            
            <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-3 bg-indigoCustom/60 backdrop-blur-md px-5 py-2.5 rounded-full border border-gold/40 shadow-lg hover:border-gold transition">
                <span class="w-7 h-7 rounded-full bg-gold text-indigoCustom font-serif font-bold text-sm flex items-center justify-center">B9</span>
                <span class="font-serif font-bold text-sm text-cream tracking-wide">Batik Kelompok 9 <span class="text-gold/80 font-normal text-xs ml-1">| Sentra UMKM Batik Lokal</span></span>
            </a>

            <div class="space-y-4">
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-gold">SISTEM INFORMASI PEMASARAN</p>
                <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-cream leading-tight">
                    Bergabung <span class="text-gold italic font-normal">Bersama Kami</span>
                </h1>
                <p class="inline-block bg-indigoCustom/80 text-cream px-4 py-1.5 rounded-full text-xs font-bold tracking-wider uppercase border border-gold/30">
                    Sistem Informasi Pemasaran Batik Nusantara
                </p>
                <p class="text-cream/80 text-sm sm:text-base leading-relaxed max-w-xl pt-2">
                    Daftarkan akun Anda sekarang untuk menjelajahi berbagai koleksi batik lokal berkualitas, memesan secara langsung, dan mendukung pengrajin batik daerah.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4">
                <div class="bg-indigoCustom/70 backdrop-blur-md border border-gold/30 rounded-2xl p-4 text-center hover:border-gold/60 transition">
                    <svg class="w-6 h-6 text-gold mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <h4 class="font-bold text-sm text-cream">Kemudahan Akses</h4>
                    <p class="text-[11px] text-cream/70 mt-0.5">Pendaftaran cepat & praktis</p>
                </div>

                <div class="bg-indigoCustom/70 backdrop-blur-md border border-gold/30 rounded-2xl p-4 text-center hover:border-gold/60 transition">
                    <svg class="w-6 h-6 text-gold mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <h4 class="font-bold text-sm text-cream">Produk Autentik</h4>
                    <p class="text-[11px] text-cream/70 mt-0.5">Kain batik khas daerah</p>
                </div>

                <div class="bg-indigoCustom/70 backdrop-blur-md border border-gold/30 rounded-2xl p-4 text-center hover:border-gold/60 transition">
                    <svg class="w-6 h-6 text-gold mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <h4 class="font-bold text-sm text-cream">Keamanan Terjamin</h4>
                    <p class="text-[11px] text-cream/70 mt-0.5">Data diri tersimpan aman</p>
                </div>
            </div>

        </div>

        <div class="lg:col-span-5 w-full max-w-md mx-auto">
            <div class="bg-cream-soft text-ink rounded-[2.5rem] shadow-2xl p-6 sm:p-8 border-2 border-gold/40 relative overflow-hidden">
                
                <div class="flex justify-center mb-3">
                    <div class="w-14 h-14 rounded-full bg-soga text-cream shadow-md flex items-center justify-center border-2 border-gold">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                </div>

                <div class="text-center mb-5">
                    <h2 class="font-serif text-2xl font-bold text-indigoCustom">Buat Akun Baru</h2>
                    <p class="text-xs text-ink/60 mt-0.5">Lengkapi data di bawah untuk mendaftar</p>
                </div>

                <?php if($errors->any()): ?>
                    <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-2.5 rounded-2xl text-xs mb-4">
                        <ul class="list-disc list-inside space-y-1">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('register.submit')); ?>" method="POST" class="space-y-3">
                    <?php echo csrf_field(); ?>
                    
                    <div>
                        <label for="nama" class="block text-xs font-bold text-indigoCustom mb-1 ml-2">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-soga">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </span>
                            <input type="text" name="nama" id="nama" value="<?php echo e(old('nama')); ?>" required placeholder="Nama lengkap Anda"
                                class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gold/30 bg-white text-ink text-xs focus:outline-none focus:border-soga focus:ring-1 focus:ring-soga shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold text-indigoCustom mb-1 ml-2">Alamat Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-soga">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </span>
                            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required placeholder="nama@email.com"
                                class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gold/30 bg-white text-ink text-xs focus:outline-none focus:border-soga focus:ring-1 focus:ring-soga shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label for="no_telp" class="block text-xs font-bold text-indigoCustom mb-1 ml-2">Nomor Telepon / WA</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-soga">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <input type="text" name="no_telp" id="no_telp" value="<?php echo e(old('no_telp')); ?>" required placeholder="081234567890"
                                class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gold/30 bg-white text-ink text-xs focus:outline-none focus:border-soga focus:ring-1 focus:ring-soga shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-bold text-indigoCustom mb-1 ml-2">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-soga">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </span>
                            <input type="password" name="password" id="password" required placeholder="Masukkan password"
                                class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gold/30 bg-white text-ink text-xs focus:outline-none focus:border-soga focus:ring-1 focus:ring-soga shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label for="alamat" class="block text-xs font-bold text-indigoCustom mb-1 ml-2">Alamat Pengiriman</label>
                        <div class="relative">
                            <span class="absolute top-3 left-0 pl-4 flex items-start pointer-events-none text-soga">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </span>
                            <textarea name="alamat" id="alamat" rows="2" required placeholder="Alamat lengkap rumah Anda"
                                class="w-full pl-10 pr-4 py-2.5 rounded-2xl border border-gold/30 bg-white text-ink text-xs focus:outline-none focus:border-soga focus:ring-1 focus:ring-soga shadow-sm resize-none"><?php echo e(old('alamat')); ?></textarea>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-indigoCustom hover:bg-soga text-cream font-bold py-3 rounded-full transition duration-300 shadow-lg text-xs flex items-center justify-center gap-2 border border-gold/40 mt-3">
                        <span>➜]</span> Daftar Sekarang
                    </button>
                </form>

                <div class="mt-5 text-center text-[11px] text-ink/60 space-y-2">
                    <p>
                        Sudah punya akun? 
                        <a href="<?php echo e(route('login')); ?>" class="font-bold text-soga hover:underline">Masuk di sini</a>
                    </p>
                    <p class="pt-2 border-t border-gold/20 text-[10px]">
                        Butuh bantuan? <a href="#" class="text-soga font-bold">Hubungi Admin</a> &copy; <?php echo e(date('Y')); ?> Batik Kelompok 9
                    </p>
                </div>

            </div>
        </div>

    </div>

</body>
</html><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/auth/register.blade.php ENDPATH**/ ?>