

<?php $__env->startSection('title', 'Katalog Produk'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 py-8">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Katalog Produk UMKM</h1>
            <p class="text-gray-500">Dukung produk lokal unggulan daerah kita.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $data_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden border border-gray-100">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-400 font-medium">Gambar: <?php echo e($produk->nama_produk); ?></span>
                    </div>
                    
                    <div class="p-5">
                        <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider"><?php echo e($produk->kategori->nama_kategori); ?></span>
                        <h3 class="text-lg font-bold text-gray-800 mt-1 mb-2"><?php echo e($produk->nama_produk); ?></h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2"><?php echo e($produk->deskripsi); ?></p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-black text-gray-900">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></span>
                            <button class="bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white px-4 py-2 rounded-lg text-sm font-bold transition">
                                + Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada produk yang tersedia saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\umkm-lokal\resources\views/produk/index.blade.php ENDPATH**/ ?>