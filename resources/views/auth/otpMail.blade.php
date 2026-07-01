<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .card { background: #ffffff; padding: 30px; border-radius: 10px; max-width: 400px; margin: auto; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .otp-code { font-size: 32px; font-weight: bold; color: #059669; letter-spacing: 5px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Verifikasi Akun</h2>
        <p>Halo, gunakan kode di bawah ini untuk menyelesaikan pendaftaran akun UMKM Lokal Anda:</p>
        <div class="otp-code">{{ $otp }}</div>
        <p style="color: #666; font-size: 12px;">Kode ini hanya berlaku selama 5 menit.</p>
    </div>
</body>
</html>