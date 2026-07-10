

<?php $__env->startSection('title', 'Laporan Keuangan'); ?>

<?php $__env->startSection('content'); ?>
<div id="laporan-print" class="max-w-5xl mx-auto px-4 py-10">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6 no-print">
        <h1 class="font-serif text-3xl font-bold text-indigoCustom">Laporan Penjualan</h1>
        <button onclick="window.print()" class="bg-soga hover:bg-soga-dark text-white px-6 py-2 rounded-lg font-bold flex items-center gap-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
            </svg>
            Cetak Laporan
        </button>
    </div>

    <!-- Filter Periode -->
    <div class="no-print mb-8 bg-white p-5 rounded-2xl border border-gold/20 shadow-sm">
        <p class="text-xs font-bold text-indigoCustom uppercase tracking-wide mb-3">Pilih Periode</p>

        <!-- Preset cepat -->
        <div class="flex flex-wrap gap-2 mb-4">
            <button type="button" onclick="setPreset('bulan_ini', this)" class="preset-btn px-4 py-1.5 rounded-full text-xs font-semibold border border-gold/30 text-indigoCustom hover:bg-indigo-50 transition">Bulan Ini</button>
            <button type="button" onclick="setPreset('bulan_lalu', this)" class="preset-btn px-4 py-1.5 rounded-full text-xs font-semibold border border-gold/30 text-indigoCustom hover:bg-indigo-50 transition">Bulan Lalu</button>
            <button type="button" onclick="setPreset('3_bulan', this)" class="preset-btn px-4 py-1.5 rounded-full text-xs font-semibold border border-gold/30 text-indigoCustom hover:bg-indigo-50 transition">3 Bulan Terakhir</button>
            <button type="button" onclick="setPreset('tahun_ini', this)" class="preset-btn px-4 py-1.5 rounded-full text-xs font-semibold border border-gold/30 text-indigoCustom hover:bg-indigo-50 transition">Tahun Ini</button>
            <button type="button" onclick="setPreset('semua', this)" class="preset-btn px-4 py-1.5 rounded-full text-xs font-semibold border border-gold/30 text-indigoCustom hover:bg-indigo-50 transition">Semua Waktu</button>
        </div>

        <!-- Custom range bulan -->
        <form id="filter-form" method="GET" class="flex flex-wrap items-end gap-3">
            <div>
                <label class="block text-xs font-bold text-indigoCustom mb-1">Dari Bulan</label>
                <input type="month" name="dari_bulan" value="<?php echo e($dariBulan); ?>" class="border rounded-lg px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-indigoCustom mb-1">Sampai Bulan</label>
                <input type="month" name="sampai_bulan" value="<?php echo e($sampaiBulan); ?>" class="border rounded-lg px-3 py-2 text-sm">
            </div>
            <button type="submit" class="bg-indigoCustom text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-indigoCustom/90 transition">Terapkan</button>
            <?php if($dariBulan || $sampaiBulan): ?>
                <a href="<?php echo e(route('admin.laporan')); ?>" class="text-xs text-soga underline">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Kop Laporan -->
    <div class="mb-8 text-center border-b border-gold/30 pb-4">
        <h2 class="font-serif text-2xl font-bold text-indigoCustom">Batik Kelompok 9</h2>
        <p class="text-sm text-ink/70">Laporan Penjualan Produk UMKM</p>
        <p class="text-xs text-ink/50 mt-1">
            Periode:
            <?php echo e($dariBulan ? \Carbon\Carbon::parse($dariBulan.'-01')->translatedFormat('F Y') : 'Awal'); ?>

            s/d
            <?php echo e($sampaiBulan ? \Carbon\Carbon::parse($sampaiBulan.'-01')->translatedFormat('F Y') : 'Sekarang'); ?>

            &middot; Dicetak: <?php echo e(now()->translatedFormat('d F Y, H:i')); ?> WIB
        </p>
    </div>

    <!-- Ringkasan -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100">
            <p class="text-indigoCustom font-bold text-sm">Total Pendapatan</p>
            <h2 class="text-2xl font-bold text-soga mt-2">Rp <?php echo e(number_format($totalPendapatan, 0, ',', '.')); ?></h2>
        </div>
        <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100">
            <p class="text-indigoCustom font-bold text-sm">Total Transaksi</p>
            <h2 class="text-2xl font-bold text-soga mt-2"><?php echo e($totalTransaksi); ?></h2>
        </div>
        <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100">
            <p class="text-indigoCustom font-bold text-sm">Produk Terjual</p>
            <h2 class="text-2xl font-bold text-soga mt-2"><?php echo e($totalProdukTerjual); ?> pcs</h2>
        </div>
    </div>

    <!-- Produk Terlaris -->
    <div class="bg-white p-6 rounded-2xl border border-gold/20 shadow-sm mb-8">
        <h3 class="font-bold text-indigoCustom mb-4">Produk Paling Laku</h3>
        <table class="w-full text-left text-sm">
            <thead class="border-b">
                <tr>
                    <th class="py-2">Produk</th>
                    <th class="py-2 text-center">Terjual</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b last:border-0">
                    <td class="py-3"><?php echo e($item->produk->nama_produk ?? 'Produk dihapus'); ?></td>
                    <td class="py-3 text-center font-bold text-soga"><?php echo e($item->total_terjual); ?> pcs</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="2" class="py-4 text-center text-ink/50">Belum ada data.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Detail Transaksi -->
    <div class="bg-white p-6 rounded-2xl border border-gold/20 shadow-sm mb-10">
        <h3 class="font-bold text-indigoCustom mb-4">Detail Transaksi Lunas</h3>
        <table class="w-full text-left text-xs">
            <thead class="border-b">
                <tr>
                    <th class="py-2">Kode</th>
                    <th class="py-2">Pelanggan</th>
                    <th class="py-2">Produk</th>
                    <th class="py-2 text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-b last:border-0 align-top">
                    <td class="py-3 font-semibold"><?php echo e($item->kode_transaksi); ?></td>
                    <td class="py-3"><?php echo e($item->pesanan->user->nama ?? 'User Tidak Ditemukan'); ?></td>
                    <td class="py-3">
                        <?php $__currentLoopData = $item->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($detail->produk->nama_produk ?? 'Produk dihapus'); ?> (x<?php echo e($detail->jumlah); ?>)<br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="py-3 text-right font-bold text-soga">Rp <?php echo e(number_format($item->total_bayar, 0, ',', '.')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4" class="py-4 text-center text-ink/50">Belum ada transaksi lunas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Tanda Tangan (khusus cetak) -->
    <div class="hidden print:flex justify-end mt-16">
        <div class="text-center text-sm">
            <p>Mengetahui,</p>
            <div class="h-20"></div>
            <p class="font-bold border-t border-ink pt-1">Admin UMKM</p>
        </div>
    </div>

</div>

<style>
    @media print {
        @page { size: A4; margin: 1.5cm; }
        body * { visibility: hidden; }
        #laporan-print, #laporan-print * { visibility: visible; }
        #laporan-print {
            position: absolute;
            left: 0; top: 0;
            width: 100%;
        }
        .no-print { display: none !important; }
        table { page-break-inside: auto; }
        tr { page-break-inside: avoid; }
    }
</style>

<script>
function setPreset(preset, btn) {
    document.querySelectorAll('.preset-btn').forEach(b => b.classList.remove('bg-indigoCustom', 'text-white'));
    btn.classList.add('bg-indigoCustom', 'text-white');

    const form = document.getElementById('filter-form');
    const dariInput = form.querySelector('[name="dari_bulan"]');
    const sampaiInput = form.querySelector('[name="sampai_bulan"]');
    const now = new Date();
    const pad = n => String(n).padStart(2, '0');
    const fmt = (y, m) => `${y}-${pad(m + 1)}`;

    switch (preset) {
        case 'bulan_ini':
            dariInput.value = fmt(now.getFullYear(), now.getMonth());
            sampaiInput.value = fmt(now.getFullYear(), now.getMonth());
            break;
        case 'bulan_lalu': {
            const d = new Date(now.getFullYear(), now.getMonth() - 1, 1);
            dariInput.value = fmt(d.getFullYear(), d.getMonth());
            sampaiInput.value = fmt(d.getFullYear(), d.getMonth());
            break;
        }
        case '3_bulan': {
            const d = new Date(now.getFullYear(), now.getMonth() - 2, 1);
            dariInput.value = fmt(d.getFullYear(), d.getMonth());
            sampaiInput.value = fmt(now.getFullYear(), now.getMonth());
            break;
        }
        case 'tahun_ini':
            dariInput.value = fmt(now.getFullYear(), 0);
            sampaiInput.value = fmt(now.getFullYear(), now.getMonth());
            break;
        case 'semua':
            dariInput.value = '';
            sampaiInput.value = '';
            break;
    }
    form.submit();
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/admin/laporan.blade.php ENDPATH**/ ?>