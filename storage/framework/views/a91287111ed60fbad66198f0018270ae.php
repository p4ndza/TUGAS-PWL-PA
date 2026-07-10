

<?php $__env->startSection('title', 'Checkout Keranjang'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="font-serif text-3xl font-bold text-indigoCustom mb-8 border-b border-gold/30 pb-4">Form Pembayaran Keranjang</h1>

    <?php if(session('error')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-xs font-bold">
            ⚠️ <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-cream-soft/50 p-6 rounded-xl border border-gold/20 mb-8">
        <h3 class="font-bold text-indigoCustom mb-3">Ringkasan Pesanan</h3>
        <ul class="text-sm divide-y divide-gold/10">
            <?php $__currentLoopData = $keranjang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="py-2 flex justify-between">
                    <span><?php echo e($item->produk->nama_produk); ?> <strong class="text-soga">(x<?php echo e($item->jumlah); ?>)</strong></span>
                    <span class="font-bold">Rp <?php echo e(number_format($item->produk->harga * $item->jumlah, 0, ',', '.')); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="mt-4 pt-4 border-t border-gold/30 flex justify-between font-bold text-lg text-indigoCustom">
            <span>Total Pembayaran:</span>
            <span>Rp <?php echo e(number_format($totalHarga, 0, ',', '.')); ?></span>
        </div>
    </div>

    <form action="<?php echo e(route('checkout.keranjang.store')); ?>" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php echo csrf_field(); ?>
        
        <div class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-indigoCustom uppercase mb-1">Alamat Pengiriman</label>
                <textarea name="alamat_pengiriman" rows="3" required class="w-full p-3 border border-gold/30 rounded-lg text-sm bg-white" placeholder="Masukkan alamat lengkap..."></textarea>
            </div>
            <div>
                <label class="block text-xs font-bold text-indigoCustom uppercase mb-1">Metode Pembayaran</label>
                <select name="metode_pembayaran" required class="w-full p-3 border border-gold/30 rounded-lg text-sm bg-white">
                    <option value="">Pilih Bank</option>
                    <option value="Transfer BCA">Transfer BCA (123456789)</option>
                    <option value="Transfer Mandiri">Transfer Mandiri (987654321)</option>
                    <option value="QRIS">QRIS / E-Wallet</option>
                </select>
            </div>
        </div>

        <div class="space-y-4 bg-white p-5 rounded-xl border border-gold/20 shadow-sm flex flex-col justify-between">
            <div>
                <label class="block text-xs font-bold text-indigoCustom uppercase mb-2">Upload Bukti Transfer</label>
                <input type="file" name="bukti_pembayaran" accept="image/jpeg,image/png,image/jpg" required class="w-full p-2 border border-gold/30 rounded-lg text-xs bg-cream-soft/30">
                <p class="text-[10px] text-gray-500 mt-1">* Format: JPG, JPEG, PNG. Max: 2MB</p>
            </div>
            
            <button type="submit" class="w-full bg-soga hover:bg-soga-dark text-cream py-3 rounded-lg font-bold text-sm transition shadow-md mt-4">
                Konfirmasi Pembayaran
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/transaksi/checkout_keranjang.blade.php ENDPATH**/ ?>