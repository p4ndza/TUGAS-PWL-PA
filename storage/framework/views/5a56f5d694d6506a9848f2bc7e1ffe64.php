

<?php $__env->startSection('title', 'Data Transaksi'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8">
        <p class="text-xs font-bold uppercase tracking-widest text-soga">Manajemen</p>
        <h1 class="font-serif text-3xl font-bold text-indigoCustom">Data Transaksi</h1>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-lg text-sm">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl shadow-sm border border-gold/20 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-ink/80">
                <thead class="bg-indigo-50 border-b border-indigo-100">
                    <tr>
                        <th class="px-6 py-4 font-bold text-indigoCustom">No</th>
                        <th class="px-6 py-4 font-bold text-indigoCustom">Kode</th>
                        <th class="px-6 py-4 font-bold text-indigoCustom">Pelanggan</th>
                        <th class="px-6 py-4 font-bold text-indigoCustom">Produk</th>
                        <th class="px-6 py-4 font-bold text-indigoCustom">Total</th>
                        <th class="px-6 py-4 font-bold text-indigoCustom">Status</th>
                        <th class="px-6 py-4 font-bold text-indigoCustom text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="px-6 py-4"><?php echo e($loop->iteration); ?></td>
                        <td class="px-6 py-4 font-semibold text-indigoCustom"><?php echo e($item->kode_transaksi); ?></td>
                        <td class="px-6 py-4"><?php echo e($item->pesanan->user->name ?? 'User Tidak Ditemukan'); ?></td>
                        <td class="px-6 py-4">
                            <ul class="list-disc list-inside">
                                <?php $__currentLoopData = $item->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="text-xs"><?php echo e($detail->produk->nama_produk ?? 'Produk dihapus'); ?> (x<?php echo e($detail->jumlah); ?>)</li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td class="px-6 py-4 font-bold text-soga">Rp <?php echo e(number_format($item->total_bayar, 0, ',', '.')); ?></td>
                        <td class="px-6 py-4">
                            <?php if($item->status_pembayaran == 'lunas'): ?>
                                <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full uppercase">Lunas</span>
                            <?php else: ?>
                                <span class="px-3 py-1 bg-amber-100 text-amber-800 text-[10px] font-bold rounded-full uppercase">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php if($item->status_pembayaran !== 'lunas'): ?>
                                <form action="<?php echo e(route('admin.transaksi.updateStatus', $item->id_transaksi)); ?>" method="POST" onsubmit="return confirm('Ubah status ke Lunas?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="status_pembayaran" value="lunas">
                                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1 rounded text-[10px] font-bold uppercase transition">
                                        Konfirmasi Lunas
                                    </button>
                                </form>
                            <?php else: ?>
                                <span class="text-[10px] text-gray-400 font-bold uppercase">Selesai</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-ink/50">Belum ada data transaksi.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/transaksi/transaksi.blade.php ENDPATH**/ ?>