

<?php $__env->startSection('title', 'Dashboard Admin - Kelola Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 pb-4 border-b border-gold/30">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-soga">Panel Pengelola</p>
            <h1 class="font-serif text-3xl font-bold text-indigoCustom">Dashboard Admin</h1>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="<?php echo e(route('admin.produk.create')); ?>" class="inline-flex items-center px-5 py-2.5 bg-soga hover:bg-soga-dark text-cream font-bold text-xs uppercase tracking-wider rounded-lg shadow transition">
                + Tambah Produk
            </a>
        </div>
    </div>

    <div class="mb-10">
        <h2 class="text-lg font-bold text-indigoCustom mb-4">Akses Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-indigo-50 border border-indigo-200 p-6 rounded-2xl shadow-sm">
                <h3 class="font-bold text-indigoCustom mb-2">Kelola Transaksi</h3>
                <p class="text-sm text-indigo-800/70 mb-4">Lihat daftar pesanan masuk dan kelola status pembayaran.</p>
                <a href="<?php echo e(url('/admin/transaksi')); ?>" class="inline-block bg-indigoCustom text-white text-xs font-bold px-4 py-2 rounded-lg hover:bg-indigo-900 transition">
                    Buka Data Transaksi
                </a>
            </div>
        </div>
    </div>
    <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-lg text-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <h2 class="text-lg font-bold text-indigoCustom mb-4">Daftar Produk</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $data_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gold/20 overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="h-48 w-full bg-cream-soft relative overflow-hidden">
                        <?php if($produk->foto_produk): ?>
                            <img src="<?php echo e(asset('storage/' . $produk->foto_produk)); ?>" alt="<?php echo e($produk->nama_produk); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="flex items-center justify-center h-full text-xs text-ink/40">Tanpa Foto</div>
                        <?php endif; ?>
                        <span class="absolute top-3 right-3 bg-indigoCustom text-cream text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">
                            <?php echo e($produk->kategori->nama_kategori ?? 'Umum'); ?>

                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-serif font-bold text-lg text-indigoCustom mb-1"><?php echo e($produk->nama_produk); ?></h3>
                        <p class="text-xs text-ink/70 line-clamp-2 mb-3"><?php echo e($produk->deskripsi); ?></p>
                        <p class="text-sm font-bold text-soga">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></p>
                    </div>
                </div>
                <div class="px-5 pb-5 pt-2 flex items-center justify-between border-t border-gray-100 mt-2">
                    <a href="<?php echo e(route('admin.produk.edit', $produk->id_produk)); ?>" class="text-xs font-bold text-indigoCustom hover:underline">Edit</a>
                    <form action="<?php echo e(route('admin.produk.destroy', $produk->id_produk)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-xs font-bold text-rose-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-gold/20">
                <p class="text-sm text-ink/60">Belum ada produk yang ditambahkan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>