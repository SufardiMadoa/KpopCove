<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_222305')->insert([
            [
                'id_kategori_222305'   => 'KTG001',
                'nama_kategori_222305' => 'Boy Group',
            ],
            [
                'id_kategori_222305'   => 'KTG002',
                'nama_kategori_222305' => 'Girl Group',
            ],
            [
                'id_kategori_222305'   => 'KTG003',
                'nama_kategori_222305' => 'Solo Artist',
            ],
            [
                'id_kategori_222305'   => 'KTG004',
                'nama_kategori_222305' => 'Limited Edition',
            ],
            [
                'id_kategori_222305'   => 'KTG005',
                'nama_kategori_222305' => 'Mini Album',
            ],
            [
                'id_kategori_222305'   => 'KTG006',
                'nama_kategori_222305' => 'Full Album',
            ],
        ]);
    }
}
