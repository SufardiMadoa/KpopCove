<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            AlbumSeeder::class,
            AlbumKategoriSeeder::class,
            FotoSeeder::class,
            KeranjangSeeder::class,
            ItemKeranjangSeeder::class,
            PemesananSeeder::class,
            ItemPesananSeeder::class,
        ]);
    }
}
