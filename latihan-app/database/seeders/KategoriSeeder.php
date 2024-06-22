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
        DB::table('kategori')->insert([
            ['nama' => 'Sejarah'],
            ['nama' => 'Sosial & Politik'],
            ['nama' => 'Pertanian']
        ]);
    }
}
