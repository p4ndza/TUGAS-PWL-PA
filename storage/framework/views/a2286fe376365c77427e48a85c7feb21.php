

<?php $__env->startSection('title', 'Keranjang Belanja'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="font-serif text-3xl font-bold text-indigoCustom mb-8">Keranjang Belanja Anda</h1>

    <?php if(session('success')): ?>
        <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded-lg mb-6">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($keranjang->isEmpty()): ?>
        <div class="text-center py-16 bg-white rounded-2xl border border-gold/20 shadow-sm">
            <p class="text-ink/60 mb-4">Keranjang Anda masih kosong.</p>
            <a href="<?php echo e(route('produk.index')); ?>" class="text-soga font-bold hover:underline">Lihat Katalog</a>
        </div>
    <?php else: ?>
        <div class="bg-white rounded-2xl border border-gold/20 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-cream-soft/50 border-b border-gold/10">
                    <tr>
                        <th class="p-4 text-xs font-bold text-indigoCustom uppercase tracking-wider">Produk</th>
                        <th class="p-4 text-xs font-bold text-indigoCustom uppercase tracking-wider text-center">Harga</th>
                        <th class="p-4 text-xs font-bold text-indigoCustom uppercase tracking-wider text-center">Jumlah</th>
                        <th class="p-4 text-xs font-bold text-indigoCustom uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $total = 0; ?>
                    <?php $__currentLoopData = $keranjang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $subtotal = $item->produk->harga * $item->jumlah; $total += $subtotal; ?>
                        <tr>
                            <td class="p-4 flex items-center gap-3">
                                <img src="<?php echo e(asset('storage/' . $item->produk->foto_produk)); ?>" class="w-16 h-16 object-cover rounded-lg">
                                <span class="font-bold text-indigoCustom"><?php echo e($item->produk->nama_produk); ?></span>
                            </td>
                            <td class="p-4 text-sm text-center">Rp <?php echo e(number_format($item->produk->harga, 0, ',', '.')); ?></td>
                            <td class="p-4 text-sm text-center"><?php echo e($item->jumlah); ?></td>
                            <td class="p-4 text-right">
                                <form action="<?php echo e(route('keranjang.destroy', $item->id_keranjang)); ?>" method="POST" onsubmit="return confirm('Hapus item ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="p-6 border-t border-gold/10 flex justify-between items-center">
                <p class="text-lg font-bold text-indigoCustom">Total: Rp <?php echo e(number_format($total, 0, ',', '.')); ?></p>
                <a href="#" class="bg-soga hover:bg-soga-dark text-cream px-6 py-3 rounded-lg font-bold text-sm transition">
                    Lanjut ke Pembayaran
                </a>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/keranjang/index.blade.php ENDPATH**/ ?>