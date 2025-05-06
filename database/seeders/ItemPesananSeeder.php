<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_pesanan_222305')->insert([
            [
                'id_item_pesanan_222305' => 'ITP001',
                'id_pemesanan_222305'    => 'PMS001',
                'id_album_222305'        => 'ALB001',
                'harga_satuan_222305'    => 350000,
                'jumlah_222305'          => 1,
                'total_harga_222305'     => 350000,
            ],
            [
                'id_item_pesanan_222305' => 'ITP002',
                'id_pemesanan_222305'    => 'PMS001',
                'id_album_222305'        => 'ALB006',
                'harga_satuan_222305'    => 250000,
                'jumlah_222305'          => 1,
                'total_harga_222305'     => 250000,
            ],
            [
                'id_item_pesanan_222305' => 'ITP003',
                'id_pemesanan_222305'    => 'PMS001',
                'id_album_222305'        => 'ALB007',
                'harga_satuan_222305'    => 265000,
                'jumlah_222305'          => 1,
                'total_harga_222305'     => 265000,
            ],
            [
                'id_item_pesanan_222305' => 'ITP004',
                'id_pemesanan_222305'    => 'PMS002',
                'id_album_222305'        => 'ALB002',
                'harga_satuan_222305'    => 320000,
                'jumlah_222305'          => 1,
                'total_harga_222305'     => 320000,
            ],
        ]);
    }
}
