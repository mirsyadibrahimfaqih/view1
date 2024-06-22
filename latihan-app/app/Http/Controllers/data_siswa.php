<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class data_siswa extends Controller
{
    public function index()
    {
        $siswa = [
            ['nama' => 'Fawwaz', 'alamat' => 'Jakarta'],
            ['nama' => 'Inaya', 'alamat' => 'Depok'],
            ['nama' => 'Zidan', 'alamat' => 'Binjai'],
            ['nama' => 'Bambang', 'alamat' => 'Mojokerto'],
            ['nama' => 'Unyil', 'alamat' => 'Bandung']
        ];

        return view('siswa.index', ['siswa' => $siswa]);
    }
}
