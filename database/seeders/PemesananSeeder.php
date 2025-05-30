<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pemesanan_222305')->insert([
            [
                'id_pemesanan_222305'      => 'PMS001',
                'id_user_222305'           => 'USR002',
                'tanggal_pemesanan_222305' => '2023-04-15',
                'total_harga_222305'       => 670000,
                'metode_pembayaran_222305' => 'Transfer Bank',
                'status_pembayaran_222305' => 'pending',
            ],
            [
                'id_pemesanan_222305'      => 'PMS002',
                'id_user_222305'           => 'USR003',
                'tanggal_pemesanan_222305' => '2023-04-18',
                'total_harga_222305'       => 320000,
                'metode_pembayaran_222305' => 'E-Wallet',
                'status_pembayaran_222305' => 'dibayar',
            ],
        ]);
    }
}
