<?php $__env->startSection('title', 'Katalog Produk'); ?>

<?php $__env->startSection('content'); ?>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-2 sm:px-4">
            
            <div class="mb-4 bg-white p-4 rounded shadow-sm border-b-4 border-orange-500">
                <h1 class="text-xl font-bold text-gray-800 uppercase tracking-wide">Rekomendasi Produk UMKM</h1>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:gap-3">
                <?php $__empty_1 = true; $__currentLoopData = $data_produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="bg-white rounded hover:border-orange-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 border border-gray-200 overflow-hidden relative group flex flex-col h-full shadow-sm">
                        
                        <div class="absolute top-0 left-0 bg-orange-500 text-white text-[10px] font-bold px-2 py-1 rounded-br-lg z-10 shadow-sm">
                            Star+
                        </div>

                        <div class="absolute top-0 right-0 bg-yellow-400 text-orange-600 text-[10px] font-extrabold px-1.5 py-1 flex flex-col items-center z-10 rounded-bl-lg shadow-sm leading-none">
                            <span>50%</span>
                            <span class="text-[8px] uppercase text-white bg-orange-500 px-1 mt-0.5 rounded-sm">Off</span>
                        </div>

                        <div class="w-full aspect-square bg-gray-100 relative overflow-hidden group">
                            <img src="<?php echo e(asset('storage/' . $produk->gambar)); ?>" alt="<?php echo e($produk->nama_produk); ?>" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300" onerror="this.src='https://via.placeholder.com/300?text=No+Image'">
                            
                            <div class="absolute bottom-0 left-0 right-0 bg-teal-500 bg-opacity-90 text-white text-[9px] font-bold px-2 py-1 text-center z-10 tracking-wider">
                                GRATIS ONGKIR XTRA
                            </div>
                        </div>
                        
                        <div class="p-2.5 flex flex-col flex-grow">
                            <h3 class="text-xs sm:text-sm text-gray-800 line-clamp-2 leading-snug min-h-[2.5rem]">
                                <?php echo e($produk->nama_produk); ?>

                            </h3>
                            
                            <div class="mt-1.5 flex flex-wrap gap-1">
                                <span class="text-[9px] sm:text-[10px] border border-orange-500 text-orange-500 px-1 py-0.5 rounded-sm bg-orange-50 font-medium">
                                    <?php echo e($produk->kategori->nama_kategori); ?>

                                </span>
                                <span class="text-[9px] sm:text-[10px] border border-orange-200 text-orange-600 px-1 py-0.5 rounded-sm bg-orange-100 font-medium">
                                    Cashback XTRA
                                </span>
                            </div>
                            
                            <div class="flex-grow"></div>
                            
                            <div class="mt-2 flex flex-col">
                                <div class="text-[10px] text-gray-400 line-through mb-0.5">
                                    Rp<?php echo e(number_format($produk->harga * 2, 0, ',', '.')); ?>

                                </div>
                                <div class="text-base font-bold text-orange-500 truncate">
                                    Rp<?php echo e(number_format($produk->harga, 0, ',', '.')); ?>

                                </div>
                            </div>
                            
                            <div class="mt-1.5 pt-1.5 border-t border-gray-100 flex flex-col gap-1 text-[10px] sm:text-[11px] text-gray-500">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-0.5 text-yellow-400">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <span class="text-gray-600">4.9</span>
                                    </div>
                                    <span>10RB+ Terjual</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <span class="truncate">Jakarta Selatan</span> 
                                </div>
                            </div>

                            <div class="mt-2.5 flex gap-1.5">
                                <button title="Masukkan Keranjang" class="flex items-center justify-center bg-white border border-orange-500 text-orange-500 p-1.5 rounded-sm hover:bg-orange-50 transition-colors w-1/4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                                
                                <button class="flex-grow bg-orange-500 text-white text-[11px] font-semibold py-1.5 rounded-sm hover:bg-orange-600 transition-colors text-center">
                                    Beli Sekarang
                                </button>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded shadow-sm border border-gray-200">
                        <svg class="w-20 h-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <p class="text-gray-500 text-base font-medium">Belum ada produk yang tersedia.</p>
                    </div>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TUGAS-PWL-PA-irpan\resources\views/produk/index.blade.php ENDPATH**/ ?>