<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('album_222305')->insert([
            [
                'id_album_222305'  => 'ALB001',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'Map of the Soul: 7',
                'deskripsi_222305' => 'BTS fourth Korean-language studio album released in 2020. This album features hit singles like "ON", "Black Swan", and "Interlude: Shadow".',
                'harga_222305'     => 350000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/bts_mots7.jpg',
            ],
            [
                'id_album_222305'  => 'ALB002',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'The Album',
                'deskripsi_222305' => 'BLACKPINK\'s first full-length Korean-language studio album released in 2020. It includes hit singles "How You Like That", "Ice Cream", and "Lovesick Girls".',
                'harga_222305'     => 320000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/blackpink_the_album.jpg',
            ],
            [
                'id_album_222305'  => 'ALB003',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'Savage',
                'deskripsi_222305' => 'aespa\'s first mini album, released in 2021. It features the hit title track "Savage" along with other tracks showcasing their unique AI concept.',
                'harga_222305'     => 280000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/aespa_savage.jpg',
            ],
            [
                'id_album_222305'  => 'ALB004',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'Perfect World',
                'deskripsi_222305' => 'TWICE\'s third Japanese studio album released in 2021. It features the title track "Perfect World" and showcases their mature sound.',
                'harga_222305'     => 325000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/twice_perfect_world.jpg',
            ],
            [
                'id_album_222305'  => 'ALB005',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'NCT 2020 Resonance Pt. 1',
                'deskripsi_222305' => 'NCT\'s second studio album as a full group with 23 members. Released in 2020, it features the hit song "Make A Wish (Birthday Song)".',
                'harga_222305'     => 375000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/nct_resonance.jpg',
            ],
            [
                'id_album_222305'  => 'ALB006',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'SOLO',
                'deskripsi_222305' => 'JENNIE\'s debut single album released in 2018. This solo debut features her hit single "SOLO".',
                'harga_222305'     => 250000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/jennie_solo.jpg',
            ],
            [
                'id_album_222305'  => 'ALB007',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'Crazy',
                'deskripsi_222305' => '4MINUTE\'s fifth mini album released in 2015, featuring the hit song "Crazy" that showcases their powerful performance.',
                'harga_222305'     => 265000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/4minute_crazy.jpg',
            ],
            [
                'id_album_222305'  => 'ALB008',
                'email_222305'     => 'USR001',
                'judul_222305'     => 'MADE',
                'deskripsi_222305' => 'BIGBANG\'s third Korean studio album released in 2016. This album compiles songs from their MADE series and features hits like "Bang Bang Bang" and "Loser".',
                'harga_222305'     => 330000,
                'status_222305'    => 'tersedia',
                'path_img_222305'  => 'albums/bigbang_made.jpg',
            ],
        ]);
    }
}
