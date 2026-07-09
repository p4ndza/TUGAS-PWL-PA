

<?php $__env->startSection('title', 'Laporan Keuangan'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-8 no-print">
        <h1 class="font-serif text-3xl font-bold text-indigoCustom">Laporan Penjualan</h1>
        <button onclick="window.print()" class="bg-soga hover:bg-soga-dark text-white px-6 py-2 rounded-lg font-bold flex items-center gap-2">
            🖨️ Cetak Laporan
        </button>
    </div>

    <!-- Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100">
            <p class="text-indigoCustom font-bold text-sm">Total Pendapatan</p>
            <h2 class="text-3xl font-bold text-soga mt-2">Rp <?php echo e(number_format($totalPendapatan, 0, ',', '.')); ?></h2>
        </div>
    </div>

    <!-- Produk Terlaris -->
    <div class="bg-white p-6 rounded-2xl border border-gold/20 shadow-sm mb-8">
        <h3 class="font-bold text-indigoCustom mb-4">Produk Paling Laku</h3>
        <table class="w-full text-left">
            <thead class="border-b">
                <tr>
                    <th class="py-2">Produk</th>
                    <th class="py-2 text-center">Terjual</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b last:border-0">
                    <td class="py-3"><?php echo e($item->produk->nama_produk ?? 'Produk dihapus'); ?></td>
                    <td class="py-3 text-center font-bold text-soga"><?php echo e($item->total_terjual); ?> pcs</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    @media print {
        .no-print { display: none !important; }
        body { background: white; }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/admin/laporan.blade.php ENDPATH**/ ?>