<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - UMKM Lokal Kelompok 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('home')); ?>">UMKM Lokal Kelompok 9</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('produk.index')); ?>">Katalog</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-outline-light px-4" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5 py-5 text-center bg-white rounded shadow-sm">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold text-success mb-3">Sistem Informasi Pemasaran UMKM Lokal</h1>
                <p class="lead text-muted mb-4">
                    Platform digital inovatif dari **Kelompok 9** untuk membantu pelaku UMKM daerah memperluas jangkauan pasar, mengelola pesanan, dan menyusun laporan penjualan secara terintegrasi.
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-success btn-lg px-4 gap-3">Jelajahi Katalog</a>
                    <a href="#fitur" class="btn btn-outline-secondary btn-lg px-4">Pelajari Fitur</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5" id="fitur">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h4 class="fw-bold text-success">Katalog Responsif</h4>
                    <p class="text-muted">Kemudahan akses produk lokal unggulan dengan informasi stok yang selalu *real-time*.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h4 class="fw-bold text-success">Manajemen Pesanan</h4>
                    <p class="text-muted">Proses belanja transparan dari masuk keranjang, unggah bukti bayar, hingga pelacakan status.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h4 class="fw-bold text-success">Bahan Laporan Akurat</h4>
                    <p class="text-muted">Riwayat transaksi tersimpan aman dengan sistem proteksi harga pas beli untuk akurasi pembukuan.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\laragon\www\TUGAS-PWL-PA-irpan\resources\views/welcome.blade.php ENDPATH**/ ?>