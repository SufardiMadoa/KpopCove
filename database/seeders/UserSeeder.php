<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_222305')->insert([
            [
                'id_user_222305'  => 'USR001',
                'nama_222305'     => 'Admin',
                'email_222305'    => 'admin@kpopalbum.com',
                'password_222305' => Hash::make('admin123'),
                'no_telp_222305'  => '081234567890',
                'role_222305'     => 'admin',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id_user_222305'  => 'USR002',
                'nama_222305'     => 'John Doe',
                'email_222305'    => 'john@example.com',
                'password_222305' => Hash::make('password123'),
                'no_telp_222305'  => '082345678901',
                'role_222305'     => 'user',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'id_user_222305'  => 'USR003',
                'nama_222305'     => 'Jane Smith',
                'email_222305'    => 'jane@example.com',
                'password_222305' => Hash::make('password123'),
                'no_telp_222305'  => '083456789012',
                'role_222305'     => 'user',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);
    }
}
