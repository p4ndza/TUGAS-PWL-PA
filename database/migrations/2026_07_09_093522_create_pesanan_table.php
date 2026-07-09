<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->foreignId('id_user')->constrained('user', 'id_user')->onDelete('cascade');
            $table->dateTime('tanggal_pesanan');
            $table->decimal('total_harga', 12, 2);
            $table->string('status_pesanan', 50)->default('menunggu_pembayaran');
            $table->text('alamat_pengiriman')->nullable();
            $table->text('catatan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
        });
    }
    public function down(): void { Schema::dropIfExists('pesanan'); }
};