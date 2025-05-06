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
        Schema::create('foto_222305', function (Blueprint $table) {
            $table->string('id_foto_222305')->primary();
            $table->string('id_album_222305');
            $table->string('gambar_222305');

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
        Schema::dropIfExists('foto_222305');
    }
};
