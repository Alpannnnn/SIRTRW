<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            WargaSeeder::class,
            BarangSeeder::class,
            KasSeeder::class,
            EventSeeder::class,
            PengumumanSeeder::class,
        ]);
    }
}
