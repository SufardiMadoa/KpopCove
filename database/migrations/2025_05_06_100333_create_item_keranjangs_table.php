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
        Schema::create('item_keranjang_222305', function (Blueprint $table) {
            $table->string('id_item_keranjang_222305')->primary();
            $table->string('id_keranjang_222305');
            $table->string('id_album_222305');
            $table->integer('jumlah_222305');
            $table->decimal('harga_222305', 10, 2);
            $table->decimal('total_harga_222305', 10, 2);

            $table
                ->foreign('id_keranjang_222305')
                ->references('id_keranjang_222305')
                ->on('keranjang_222305')
                ->onDelete('cascade');

            $table
                ->foreign('id_album_222305')
                ->references('id_album_222305')
                ->on('album_222305')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_keranjang_222305');
    }
};
