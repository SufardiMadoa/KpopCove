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
        Schema::create('album_222305', function (Blueprint $table) {
            $table->string('id_album_222305')->primary();
            $table->string('id_user_222305');
            $table->string('judul_222305');
            $table->text('deskripsi_222305');
            $table->decimal('harga_222305', 10, 2);
            $table->enum('status_222305', ['tersedia', 'tidak tersedia'])->default('tersedia');
            $table->string('path_img_222305');

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
        Schema::dropIfExists('album_222305');
    }
};
