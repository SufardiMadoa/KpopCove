<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('album_kategori_222305')->insert([
            [
                'id_album_kategori_222305' => 'AK001',
                'id_album_222305'          => 'ALB001',
                'id_kategori_222305'       => 'KTG001',  // Boy Group
            ],
            [
                'id_album_kategori_222305' => 'AK002',
                'id_album_222305'          => 'ALB001',
                'id_kategori_222305'       => 'KTG006',  // Full Album
            ],
            [
                'id_album_kategori_222305' => 'AK003',
                'id_album_222305'          => 'ALB002',
                'id_kategori_222305'       => 'KTG002',  // Girl Group
            ],
            [
                'id_album_kategori_222305' => 'AK004',
                'id_album_222305'          => 'ALB002',
                'id_kategori_222305'       => 'KTG006',  // Full Album
            ],
            [
                'id_album_kategori_222305' => 'AK005',
                'id_album_222305'          => 'ALB003',
                'id_kategori_222305'       => 'KTG002',  // Girl Group
            ],
            [
                'id_album_kategori_222305' => 'AK006',
                'id_album_222305'          => 'ALB003',
                'id_kategori_222305'       => 'KTG005',  // Mini Album
            ],
            [
                'id_album_kategori_222305' => 'AK007',
                'id_album_222305'          => 'ALB004',
                'id_kategori_222305'       => 'KTG002',  // Girl Group
            ],
            [
                'id_album_kategori_222305' => 'AK008',
                'id_album_222305'          => 'ALB004',
                'id_kategori_222305'       => 'KTG006',  // Full Album
            ],
            [
                'id_album_kategori_222305' => 'AK009',
                'id_album_222305'          => 'ALB005',
                'id_kategori_222305'       => 'KTG001',  // Boy Group
            ],
            [
                'id_album_kategori_222305' => 'AK010',
                'id_album_222305'          => 'ALB005',
                'id_kategori_222305'       => 'KTG006',  // Full Album
            ],
            [
                'id_album_kategori_222305' => 'AK011',
                'id_album_222305'          => 'ALB006',
                'id_kategori_222305'       => 'KTG003',  // Solo Artist
            ],
            [
                'id_album_kategori_222305' => 'AK012',
                'id_album_222305'          => 'ALB006',
                'id_kategori_222305'       => 'KTG005',  // Mini Album
            ],
            [
                'id_album_kategori_222305' => 'AK013',
                'id_album_222305'          => 'ALB007',
                'id_kategori_222305'       => 'KTG002',  // Girl Group
            ],
            [
                'id_album_kategori_222305' => 'AK014',
                'id_album_222305'          => 'ALB007',
                'id_kategori_222305'       => 'KTG005',  // Mini Album
            ],
            [
                'id_album_kategori_222305' => 'AK015',
                'id_album_222305'          => 'ALB008',
                'id_kategori_222305'       => 'KTG001',  // Boy Group
            ],
            [
                'id_album_kategori_222305' => 'AK016',
                'id_album_222305'          => 'ALB008',
                'id_kategori_222305'       => 'KTG006',  // Full Album
            ],
        ]);
    }
}
