

<?php $__env->startSection('title', 'Keranjang Belanja'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-6 py-10">
    <h1 class="font-serif text-3xl font-bold text-indigoCustom mb-8">Keranjang Belanja Anda</h1>

    <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-lg text-sm font-bold">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white rounded-2xl border border-gold/20 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
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
                    <?php $totalKeseluruhan = 0; ?>
                    
                    <?php $__empty_1 = true; $__currentLoopData = $keranjang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $totalKeseluruhan += ($item->produk->harga * $item->jumlah); ?>
                        <tr>
                            <td class="p-4 flex items-center gap-3">
                                <?php if($item->produk->foto_produk): ?>
                                    <img src="<?php echo e(asset('storage/' . $item->produk->foto_produk)); ?>" class="w-16 h-16 object-cover rounded-lg" alt="<?php echo e($item->produk->nama_produk); ?>">
                                <?php else: ?>
                                    <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center text-xs text-gray-500">No Image</div>
                                <?php endif; ?>
                                <span class="font-bold text-indigoCustom"><?php echo e($item->produk->nama_produk); ?></span>
                            </td>
                            <td class="p-4 text-sm text-center font-semibold text-ink/80">
                                Rp <?php echo e(number_format($item->produk->harga, 0, ',', '.')); ?>

                            </td>
                            <td class="p-4 text-sm text-center font-bold">
                                <?php echo e($item->jumlah); ?>

                            </td>
                            <td class="p-4 text-right">
                                <form action="<?php echo e(route('keranjang.destroy', $item->id_keranjang)); ?>" method="POST" class="delete-form inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn-delete text-red-600 hover:text-red-800 font-bold text-xs px-3 py-1 bg-red-50 hover:bg-red-100 rounded-md transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="p-8 text-center text-ink/60 font-medium">
                                Keranjang belanja Anda masih kosong. <br>
                                <a href="<?php echo e(route('produk.index')); ?>" class="text-soga hover:underline mt-2 inline-block font-bold">Mulai Belanja</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($keranjang->count() > 0): ?>
            <div class="p-6 border-t border-gold/10 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-lg font-bold text-indigoCustom">Total: Rp <?php echo e(number_format($totalKeseluruhan, 0, ',', '.')); ?></p>
                <a href="<?php echo e(route('checkout.keranjang')); ?>" class="w-full sm:w-auto bg-soga hover:bg-soga-dark text-cream px-8 py-3 rounded-xl font-bold text-sm shadow-md transition text-center">
                    Lanjut ke Pembayaran
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                // Ambil form terdekat dari tombol yang diklik
                let form = this.closest('.delete-form');

                Swal.fire({
                    title: 'Hapus Produk?',
                    text: "Apakah Anda yakin ingin menghapus produk ini dari keranjang?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e11d48', // rose-600
                    cancelButtonColor: '#64748b', // slate-500
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'rounded-2xl border border-gold/20'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Eksekusi penghapusan jika dikonfirmasi
                    }
                });
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/keranjang/index.blade.php ENDPATH**/ ?>