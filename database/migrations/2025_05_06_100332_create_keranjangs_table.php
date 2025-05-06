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
        Schema::create('keranjang_222305', function (Blueprint $table) {
            $table->string('id_keranjang_222305')->primary();
            $table->string('id_user_222305');

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
        Schema::dropIfExists('keranjang_222305');
    }
};
