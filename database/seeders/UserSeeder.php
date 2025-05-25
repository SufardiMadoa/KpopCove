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
                'nama_222305'     => 'Admin',
                'email_222305'    => 'admin@kpopalbum.com',
                'password_222305' => Hash::make('admin123'),
                'role_222305'     => 'admin',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);
    }
}
