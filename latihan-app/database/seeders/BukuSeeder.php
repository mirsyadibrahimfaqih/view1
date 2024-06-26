<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buku')->insert([
            [
                'isbn' => '111',
                'judul' => 'Sejarah Kemerdekaan RI',
                'tahun_cetak' => 2021,
                'stok' => 10,
                'idpengarang' => 1,
                'idpenerbit' => 2,
                'cover' => 's.jpg',
                'kategori_id' => 1
            ],
            [
                'isbn' => '112',
                'judul' => 'Menanam Jagung Unggul',
                'tahun_cetak' => 2021,
                'stok' => 15,
                'idpengarang' => 2,
                'idpenerbit' => 1,
                'cover' => 'm.jpg',
                'kategori_id' => 3
            ]
        ]);
    }
}
