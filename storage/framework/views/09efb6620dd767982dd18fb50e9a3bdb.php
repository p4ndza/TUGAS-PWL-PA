

<?php $__env->startSection('title', 'Pesanan Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto px-6 py-10">
    <h1 class="font-serif text-3xl font-bold text-indigoCustom mb-8">Riwayat Pesanan</h1>

    <div class="bg-white rounded-2xl border border-gold/20 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-cream-soft/50 border-b border-gold/10">
                <tr>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase">Kode</th>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase">Produk</th>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase text-right">Total</th>
                    <th class="p-4 text-xs font-bold text-indigoCustom uppercase text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="p-4 text-sm font-bold text-soga"><?php echo e($t->kode_transaksi); ?></td>
                    <td class="p-4 text-sm">
                        <?php $__currentLoopData = $t->pesanan->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div><?php echo e($d->produk->nama_produk); ?> (x<?php echo e($d->jumlah); ?>)</div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="p-4 text-sm text-right font-bold">Rp <?php echo e(number_format($t->total_bayar, 0, ',', '.')); ?></td>
                    <td class="p-4 text-center">
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase 
                            <?php echo e($t->status_pembayaran == 'lunas' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'); ?>">
                            <?php echo e($t->status_pembayaran); ?>

                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" class="p-8 text-center text-ink/60">Belum ada pesanan.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/transaksi/pesanan_user.blade.php ENDPATH**/ ?>