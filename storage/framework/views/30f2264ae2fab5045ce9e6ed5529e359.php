

<?php $__env->startSection('title', 'Katalog Produk'); ?>

<?php $__env->startSection('content'); ?>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-2 sm:px-4">
            
            
            <div class="mb-4 bg-white p-4 rounded shadow-sm border-b-4 border-orange-500 flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-800 uppercase tracking-wide flex items-center gap-2">
                    <span class="w-2 h-6 bg-orange-500 rounded-sm inline-block"></span>
                    Rekomendasi Produk UMKM
                </h1>
                <a href="<?php echo e(route('produk.create')); ?>" class="bg-orange-500 text-white text-xs font-semibold px-4 py-2 rounded shadow-sm hover:bg-orange-600 transition-colors">
                    + Tambah Produk
                </a>
            </div>

            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:gap-3">
                <?php $__empty_1 = true; $__currentLoopData = $data_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white rounded hover:border-orange-500 hover:-translate-y-1 transition-all border border-gray-200 overflow-hidden shadow-sm">
                        <div class="p-3">
                            <h3 class="text-sm font-medium text-gray-800 truncate"><?php echo e($produk->nama_produk); ?></h3>
                            <p class="text-orange-600 font-bold text-sm mt-1">Rp<?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
                        </div>

                        <div class="p-3 pt-0 flex gap-2">
                            <form action="<?php echo e(route('checkout.proses')); ?>" method="POST" class="w-full">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($produk->id_produk); ?>">
                                <input type="hidden" name="action" value="buy_now">
                                <button type="submit" 
                                        class="w-full bg-orange-500 text-white text-[11px] font-semibold py-1.5 rounded-sm hover:bg-orange-600 transition-colors text-center cursor-pointer">
                                    Beli Sekarang
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full py-20 text-center text-gray-500">
                        Tidak ada produk ditemukan.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA-irpan\resources\views/produk/index.blade.php ENDPATH**/ ?>