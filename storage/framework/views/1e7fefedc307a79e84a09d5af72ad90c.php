

<?php $__env->startSection('title', $produk->nama_produk . ' - Detail Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-6 py-10">

    <nav class="text-xs text-ink/60 mb-6 flex items-center gap-2">
        <a href="<?php echo e(route('produk.index')); ?>" class="hover:text-soga">Katalog</a>
        <span>/</span>
        <span class="text-soga font-bold"><?php echo e($produk->kategori->nama_kategori ?? 'Kategori'); ?></span>
        <span>/</span>
        <span class="text-ink font-semibold"><?php echo e($produk->nama_produk); ?></span>
    </nav>

    <div class="bg-white rounded-2xl border border-gold/20 shadow-md p-6 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        
        <div class="bg-cream-soft rounded-xl overflow-hidden border border-gold/30 flex items-center justify-center aspect-video">
            <?php if($produk->foto_produk): ?>
                <img src="<?php echo e(asset('storage/' . $produk->foto_produk)); ?>" class="w-full h-full object-contain" alt="<?php echo e($produk->nama_produk); ?>">
            <?php endif; ?>
        </div>

        <div class="flex flex-col justify-between">
            <div>
                <span class="inline-block bg-soga/10 text-soga text-xs font-bold px-3 py-1 rounded-full mb-3 border border-soga/20">
                    <?php echo e($produk->kategori->nama_kategori ?? 'Kategori Batik'); ?>

                </span>
                <h1 class="font-serif text-2xl md:text-3xl font-bold text-indigoCustom mb-3"><?php echo e($produk->nama_produk); ?></h1>

                <div class="bg-cream-soft/50 p-4 rounded-xl border border-gold/20 mb-6 flex items-center gap-4">
                    <span class="text-xs text-ink/60 uppercase font-bold">Harga</span>
                    <span class="font-serif text-3xl font-bold text-soga">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></span>
                </div>

                <div class="mb-6 text-xs text-ink/70 flex items-center gap-4">
                    <span class="font-bold uppercase text-soga">Stok Tersedia:</span>
                    <span class="font-semibold bg-gray-100 px-3 py-1 rounded-md border"><?php echo e($produk->stok); ?> Pcs</span>
                </div>

                <div class="mb-6">
                    <h3 class="text-xs font-bold uppercase text-soga mb-2 border-b border-gold/20 pb-1">Deskripsi & Detail Motif</h3>
                    <p class="text-sm text-ink/80 leading-relaxed whitespace-pre-line"><?php echo e($produk->deskripsi); ?></p>
                </div>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(route('checkout.direct', $produk->id_produk)); ?>" method="POST" class="pt-4 border-t border-gold/20">
                    <?php echo csrf_field(); ?>
                    <div class="flex items-center gap-4 mb-4">
                        <label class="text-xs font-bold uppercase text-soga">Jumlah Beli:</label>
                        <input type="number" name="jumlah" value="1" min="1" max="<?php echo e($produk->stok); ?>" class="w-20 px-3 py-1.5 border border-gold/30 rounded-lg text-sm text-center font-bold">
                    </div>

                    <button type="submit" class="w-full bg-soga hover:bg-soga-dark text-cream py-3 rounded-xl font-bold text-sm shadow-md transition border border-gold">
                        🛒 Beli Sekarang
                    </button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="block text-center w-full bg-indigoCustom text-cream py-3 rounded-xl font-bold text-sm shadow-md hover:bg-soga transition">
                    Login untuk Membeli
                </a>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/produk/show.blade.php ENDPATH**/ ?>