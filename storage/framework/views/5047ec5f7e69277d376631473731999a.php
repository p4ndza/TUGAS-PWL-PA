

<?php $__env->startSection('title', 'Katalog Kain Batik - UMKM Lokal'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex flex-col md:flex-row md:items-center justify-between pb-6 mb-8 border-b border-gold/30">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-soga mb-1">Koleksi Sentra Batik</p>
            <h1 class="font-serif text-3xl md:text-4xl font-bold text-indigoCustom">Katalog Kain Batik Nusantara</h1>
        </div>

        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->isAdmin()): ?>
                <div class="mt-4 md:mt-0">
                    <a href="<?php echo e(route('admin.produk.create')); ?>" class="inline-flex items-center gap-2 bg-soga hover:bg-soga-dark text-cream font-bold px-5 py-2.5 rounded-lg border border-gold shadow transition">
                        <span>+</span> Tambah Produk Baru
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded-lg mb-8">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('produk.index')); ?>" method="GET" class="mb-8 bg-white p-4 rounded-2xl border border-gold/30 shadow-sm flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="relative w-full md:w-1/2">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama batik atau motif..."
                class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gold/30 bg-cream-soft/30 text-xs focus:outline-none focus:border-soga text-ink">
            <span class="absolute left-3 top-2.5 text-soga">🔍</span>
        </div>

        <div class="flex w-full md:w-auto gap-2 items-center">
            <select name="kategori" class="w-full md:w-52 px-4 py-2.5 rounded-xl border border-gold/30 bg-cream-soft/30 text-xs focus:outline-none focus:border-soga text-ink">
                <option value="">Semua Kategori</option>
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kat->id_kategori); ?>" <?php echo e(request('kategori') == $kat->id_kategori ? 'selected' : ''); ?>>
                        <?php echo e($kat->nama_kategori); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button type="submit" class="bg-indigoCustom hover:bg-soga text-cream font-bold px-5 py-2.5 rounded-xl text-xs transition border border-gold/30">
                Filter
            </button>

            <?php if(request('search') || request('kategori')): ?>
                <a href="<?php echo e(route('produk.index')); ?>" class="bg-gray-200 hover:bg-gray-300 text-ink font-bold px-4 py-2.5 rounded-xl text-xs transition">
                    Reset
                </a>
            <?php endif; ?>
        </div>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $data_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl border border-gold/20 shadow-md overflow-hidden flex flex-col justify-between hover:shadow-lg transition">
                <div>
                    <div class="relative h-48 bg-cream-soft overflow-hidden">
                        <?php if($produk->foto_produk): ?>
                            <div class="aspect-square overflow-hidden bg-cream-soft">
                                <img src="<?php echo e(asset('storage/' . $produk->foto_produk)); ?>" 
                                    class="w-full h-full object-cover" 
                                    alt="<?php echo e($produk->nama_produk); ?>">
                            </div>
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-ink/40 text-xs">No Image</div>
                        <?php endif; ?>
                        <span class="absolute top-3 right-3 bg-soga text-cream text-[10px] font-bold px-2.5 py-1 rounded-full border border-gold/40">
                            <?php echo e($produk->kategori->nama_kategori ?? 'Umum'); ?>

                        </span>
                    </div>
                    <div class="p-4">
                        <a href="<?php echo e(route('produk.show', $produk->id_produk)); ?>">
                            <h3 class="font-serif font-bold text-lg text-indigoCustom mb-1 hover:text-soga transition"><?php echo e($produk->nama_produk); ?></h3>
                        </a>    
                        <p class="text-xs text-ink/70 line-clamp-2 mb-3"><?php echo e($produk->deskripsi); ?></p>
                        <p class="text-sm font-bold text-soga">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
                    </div>
                </div>

                <div class="p-4 pt-0">
                    <div class="flex items-center justify-between border-t border-gold/10 pt-3">
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <a href="<?php echo e(route('admin.produk.edit', $produk->id_produk)); ?>" class="text-xs font-bold text-soga hover:underline">Edit</a>
                                <form action="<?php echo e(route('admin.produk.destroy', $produk->id_produk)); ?>" method="POST" onsubmit="return confirm('Hapus kain ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs">Hapus</button>
                                </form>
                            <?php else: ?>
                                <button class="w-full bg-indigoCustom hover:bg-soga text-cream py-2 rounded-lg text-xs font-bold transition border border-gold/30">
                                    + Keranjang
                                </button>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="w-full block text-center bg-indigoCustom hover:bg-soga text-cream py-2 rounded-lg text-xs font-bold transition border border-gold/30">
                                + Keranjang
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-16 bg-white rounded-xl border border-gold/20">
                <p class="font-serif text-lg text-ink/60">Belum ada koleksi batik yang sesuai dengan filter Anda.</p>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/produk/katalog.blade.php ENDPATH**/ ?>