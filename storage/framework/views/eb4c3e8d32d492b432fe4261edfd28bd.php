

<?php $__env->startSection('title', 'Tambah Kain Batik - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto px-6 py-10">
    
    <div class="mb-8 flex items-center justify-between border-b border-gold/30 pb-4">
        <div>
            <p class="text-xs font-bold uppercase tracking-widest text-soga">Panel Admin</p>
            <h1 class="font-serif text-3xl font-bold text-indigoCustom">Tambah Koleksi Kain Batik</h1>
        </div>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-xs font-bold text-soga hover:underline">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-md border border-gold/30 p-8">
        
        <?php if($errors->any()): ?>
            <div class="bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-xs mb-6">
                <ul class="list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.produk.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-5">
            <?php echo csrf_field(); ?>

            <!-- Kategori -->
            <div>
                <label for="id_kategori" class="block text-xs font-bold uppercase text-soga mb-1">Kategori Batik</label>
                <select name="id_kategori" id="id_kategori" required class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
                    <option value="" disabled selected>-- Pilih Kategori --</option>
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($kat->id_kategori); ?>"><?php echo e($kat->nama_kategori); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Nama Produk -->
            <div>
                <label for="nama_produk" class="block text-xs font-bold uppercase text-soga mb-1">Nama Kain / Motif</label>
                <input type="text" name="nama_produk" id="nama_produk" required placeholder="Contoh: Batik Parang Kusumo"
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
            </div>

            <div>
                <label for="harga_modal" class="block text-xs font-bold uppercase text-soga mb-1">Harga Modal (per pcs)</label>
                <input type="number" name="harga_modal" id="harga_modal" required placeholder="5000"
                    value="<?php echo e(isset($produk) ? $produk->harga_modal : ''); ?>"
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
            </div>

            <!-- Harga & Stok -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="harga" class="block text-xs font-bold uppercase text-soga mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" required placeholder="150000"
                        class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
                </div>
                <div>
                    <label for="stok" class="block text-xs font-bold uppercase text-soga mb-1">Stok Kain</label>
                    <input type="number" name="stok" id="stok" required placeholder="10"
                        class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga">
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-xs font-bold uppercase text-soga mb-1">Deskripsi & Makna Motif</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required placeholder="Jelaskan sejarah atau bahan kain ini..."
                    class="w-full px-4 py-2.5 rounded-lg border border-gold/30 bg-cream-soft/50 text-sm focus:outline-none focus:border-soga resize-none"></textarea>
            </div>

            <!-- Upload Foto -->
            <div>
                <label for="foto_produk" class="block text-xs font-bold uppercase text-soga mb-1">Foto Kain Batik</label>
                <input type="file" name="foto_produk" id="foto_produk" accept="image/*" required
                    class="w-full px-4 py-2 rounded-lg border border-gold/30 bg-cream-soft/50 text-xs text-ink/70">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-soga hover:bg-soga-dark text-cream font-bold py-3 rounded-lg transition border border-gold/50 shadow text-sm mt-4">
                Simpan Produk Baru
            </button>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA\resources\views/produk/create.blade.php ENDPATH**/ ?>