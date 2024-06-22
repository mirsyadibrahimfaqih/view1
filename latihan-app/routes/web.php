<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

//pertemuan4
//menambahkan view hello
Route::get('/hello', function () {
    return view('p4/hello',['name' => 'Inaya']);
});
//menambahkan view nilai
Route::get('/nilai', function () {
    return view('p4/nilai');
});
//menambahkan dartar nilaip
Route::get('/daftarnilai', function () { return view('p4/daftar_nilai'); });
//menambahkan
Route::get('/phpframework', function () { return view('p4/layouts.index'); });

//menambahkan data_siswa
use App\Http\Controllers\data_siswa;

Route::get('/siswa', 
      [data_siswa::class, 'index']
  );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;
Route::get(
'/home',
[HomeController::class, 'index']
);


Route::get(
'/aboutus', [HomeController::class, 'aboutus']);

use App\Http\Controllers\PegawaiController;

Route::get(
    '/pegawai',
    [PegawaiController::class, 'index']
    );
    
    use App\Http\Controllers\AnggotaController;

Route::get(
    '/anggota',
    [AnggotaController::class, 'index']
    );

    Route::get('/form_pegawai', [PegawaiController::class, 'create']);

    Route::post('/form_pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

// route pengarang
Route::resource('/pengarang', PengarangController::class);
//route penerbit
Route::resource('penerbit', PenerbitController::class);
//route kategori
Route::resource('/kategori', KategoriController::class);
// route buku
Route::resource('/buku', BukuController::class);


use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasantriController;
use App\Http\Controllers\MatakuliahController;

//route jurusan
Route::resource('/jurusan', JurusanController::class);
//route mahasantri
Route::resource('/mahasantri', MahasantriController::class);
// route matakuliah
Route::resource('/matakuliah', MatakuliahController::class);

//Route get PDF
Route::get('bukupdf',[BukuController::class, 'bukuPDF']);

//Route get PDF
Route::get('mahasantripdf',[MahasantriController::class, 'mahasantriPDF']);