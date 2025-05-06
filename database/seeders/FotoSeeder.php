<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('foto_222305')->insert([
            [
                'id_foto_222305'  => 'FTO001',
                'id_album_222305' => 'ALB001',
                'gambar_222305'   => 'albums/bts_mots7_1.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO002',
                'id_album_222305' => 'ALB001',
                'gambar_222305'   => 'albums/bts_mots7_2.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO003',
                'id_album_222305' => 'ALB001',
                'gambar_222305'   => 'albums/bts_mots7_3.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO004',
                'id_album_222305' => 'ALB002',
                'gambar_222305'   => 'albums/blackpink_the_album_1.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO005',
                'id_album_222305' => 'ALB002',
                'gambar_222305'   => 'albums/blackpink_the_album_2.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO006',
                'id_album_222305' => 'ALB003',
                'gambar_222305'   => 'albums/aespa_savage_1.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO007',
                'id_album_222305' => 'ALB003',
                'gambar_222305'   => 'albums/aespa_savage_2.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO008',
                'id_album_222305' => 'ALB004',
                'gambar_222305'   => 'albums/twice_perfect_world_1.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO009',
                'id_album_222305' => 'ALB005',
                'gambar_222305'   => 'albums/nct_resonance_1.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO010',
                'id_album_222305' => 'ALB006',
                'gambar_222305'   => 'albums/jennie_solo_1.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO011',
                'id_album_222305' => 'ALB007',
                'gambar_222305'   => 'albums/4minute_crazy_1.jpg',
            ],
            [
                'id_foto_222305'  => 'FTO012',
                'id_album_222305' => 'ALB008',
                'gambar_222305'   => 'albums/bigbang_made_1.jpg',
            ],
        ]);
    }
}
