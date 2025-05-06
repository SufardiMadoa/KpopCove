<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemKeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_keranjang_222305')->insert([
            [
                'id_item_keranjang_222305' => 'ITK001',
                'id_keranjang_222305'      => 'KRJ001',
                'id_album_222305'          => 'ALB001',
                'jumlah_222305'            => 1,
                'harga_222305'             => 350000,
                'total_harga_222305'       => 350000,
            ],
            [
                'id_item_keranjang_222305' => 'ITK002',
                'id_keranjang_222305'      => 'KRJ001',
                'id_album_222305'          => 'ALB003',
                'jumlah_222305'            => 2,
                'harga_222305'             => 280000,
                'total_harga_222305'       => 560000,
            ],
            [
                'id_item_keranjang_222305' => 'ITK003',
                'id_keranjang_222305'      => 'KRJ002',
                'id_album_222305'          => 'ALB002',
                'jumlah_222305'            => 1,
                'harga_222305'             => 320000,
                'total_harga_222305'       => 320000,
            ],
        ]);
    }
}
