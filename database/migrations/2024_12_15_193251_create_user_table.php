<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('password');
            $table->enum('gender', ['male', 'female'])->nullable();  // Tambah kolom gender
            $table->string('role');
            $table->string('address')->nullable();  // Kolom alamat, bisa kosong
            $table->string('phone')->nullable();  // Kolom nomor telepon, bisa kosong
            $table->date('birth_date')->nullable();  // Kolom tanggal lahir, bisa kosong
            $table->string('profile_photo')->nullable();
            $table->timestamps(0);  // Menonaktifkan timestamps otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
