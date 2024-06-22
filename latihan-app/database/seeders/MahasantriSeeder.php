<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasantri')->insert([
            [
                'nama' => 'Fulan',
                'no_hp' => '085-'.rand(),
                'email' => uniqid().'@gmail.com',
                'provinsi' => 'Jawa Timur',
                'kota' => 'Jombang',
                'jurusan_id' => 1,
                'matakuliah_id' => 1
            ],
            [
                'nama' => 'Bedu',
                'no_hp' => '085-'.rand(),
                'email' => uniqid().'@gmail.com',
                'provinsi' => 'Jawa Tengah',
                'kota' => 'Demak',
                'jurusan_id' => 2,
                'matakuliah_id' => 2
            ],
            [
                'nama' => 'Usro',
                'no_hp' => '085-'.rand(),
                'email' => uniqid().'@gmail.com',
                'provinsi' => 'Jawa Barat',
                'kota' => 'Depok',
                'jurusan_id' => 3,
                'matakuliah_id' => 3
            ]
        ]);
    }
}
