<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keranjang_222305')->insert([
            [
                'id_keranjang_222305' => 'KRJ001',
                'email_222305'        => 'USR002',
            ],
            [
                'id_keranjang_222305' => 'KRJ002',
                'email_222305'        => 'USR003',
            ],
        ]);
    }
}
