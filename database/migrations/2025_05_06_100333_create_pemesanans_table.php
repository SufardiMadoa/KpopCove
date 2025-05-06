<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanan_222305', function (Blueprint $table) {
            $table->string('id_pemesanan_222305')->primary();
            $table->string('id_user_222305');
            $table->date('tanggal_pemesanan_222305');
            $table->decimal('total_harga_222305', 10, 2);
            $table->string('metode_pembayaran_222305');
            $table->enum('status_pembayaran_222305', ['belum dibayar', 'sudah dibayar'])->default('belum dibayar');

            $table
                ->foreign('id_user_222305')
                ->references('id_user_222305')
                ->on('users_222305')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_222305');
    }
};
