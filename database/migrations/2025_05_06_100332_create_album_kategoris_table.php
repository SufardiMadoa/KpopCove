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
        Schema::create('album_kategori_222305', function (Blueprint $table) {
            $table->string('id_album_kategori_222305')->primary();
            $table->string('id_album_222305');
            $table->string('id_kategori_222305');

            $table
                ->foreign('id_album_222305')
                ->references('id_album_222305')
                ->on('album_222305')
                ->onDelete('cascade');

            $table
                ->foreign('id_kategori_222305')
                ->references('id_kategori_222305')
                ->on('kategori_222305')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_kategori_222305');
    }
};
