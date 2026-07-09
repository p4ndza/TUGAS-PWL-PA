<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_pesanan')->constrained('pesanan', 'id_pesanan')->onDelete('cascade');
            $table->string('kode_transaksi', 50)->unique();
            $table->string('metode_pembayaran', 50);
            $table->string('bukti_pembayaran')->nullable();
            $table->decimal('total_bayar', 12, 2);
            $table->enum('status_pembayaran', ['pending', 'lunas', 'ditolak'])->nullable()->default('pending');
            $table->dateTime('tanggal_bayar')->nullable();
        });
    }
    public function down(): void { Schema::dropIfExists('transaksi'); }
};