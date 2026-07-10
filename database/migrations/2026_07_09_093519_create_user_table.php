<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telp', 20);
            $table->text('alamat');
            $table->enum('role', ['admin_umkm', 'pelanggan']);
        });
    }
    public function down(): void { Schema::dropIfExists('user'); }
};