

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
                        <th class="px-6 py-4 font-bold text-indigoCustom">Bukti</th>
                        <th class="px-6 py-4 font-bold text-indigoCustom text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="px-6 py-4"><?php echo e($loop->iteration); ?></td>
                        <td class="px-6 py-4 font-semibold text-indigoCustom"><?php echo e($item->kode_transaksi); ?></td>
                        <td class="px-6 py-4"><?php echo e($item->pesanan->user->nama ?? 'User Tidak Ditemukan'); ?></td>
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
                        <td class="px-6 py-4">
                            <?php if($item->bukti_pembayaran): ?>
                                <a href="<?php echo e(asset('storage/' . $item->bukti_pembayaran)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('storage/' . $item->bukti_pembayaran)); ?>" alt="Bukti" class="w-16 h-16 object-cover rounded border border-gray-200 shadow-sm hover:opacity-75 transition">
                                </a>
                            <?php else: ?>
                                <span class="text-xs text-gray-400 italic">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php if($item->status_pembayaran !== 'lunas'): ?>
                                <form action="<?php echo e(route('admin.transaksi.updateStatus', $item->id_transaksi)); ?>" method="POST" class="form-lunas">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="status_pembayaran" value="lunas">
                                    <button type="button" class="btn-lunas bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1 rounded text-[10px] font-bold uppercase transition">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.btn-lunas').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah form kirim otomatis
            let form = this.closest('form'); // Mengambil form terdekat

            Swal.fire({
                title: 'Konfirmasi Lunas?',
                text: "Status transaksi akan diubah menjadi Lunas.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#059669', // Warna emerald-600
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Konfirmasi!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Kirim form jika user klik Ya
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/transaksi/transaksi.blade.php ENDPATH**/ ?>