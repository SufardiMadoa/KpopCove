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
        Schema::create('users_222305', function (Blueprint $table) {
            $table->string('id_user_222305')->primary();
            $table->string('nama_222305');
            $table->string('email_222305')->unique();
            $table->string('password_222305');
            $table->string('role_222305')->default('user');  // 'admin' or 'user'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_222305');
    }
};
