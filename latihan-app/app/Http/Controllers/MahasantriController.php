<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_mahasantri = DB::table('mahasantri') //join tabel dengan Query Builder Laravel
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
          ->join('matakuliah', 'matakuliah.id', '=', 'mahasantri.matakuliah_id')
       ->select('mahasantri.*', 'jurusan.nama AS jrsn', 'matakuliah.nama AS pen')->get();
     return view('mahasantri.index',compact('ar_mahasantri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_jurusan = Jurusan::all();
        $ar_matakuliah = Matakuliah::all();

        return view('mahasantri.form', compact('ar_jurusan', 'ar_matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Proses input data, tangkap request dari form mahasantri
        DB::table('mahasantri')->insert([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'jurusan_id' => $request->jurusan_id,
            'matakuliah_id' => $request->matakuliah_id,
      ]
  );

      // Redirect ke halaman utama
      return redirect('/mahasantri');
  }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          // Menampilkan detail mahasantri
    $mahasantri = DB::table('mahasantri')
    ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
    ->join('matakuliah', 'matakuliah.id', '=', 'mahasantri.matakuliah_id')
    ->select('mahasantri.*', 'jurusan.nama AS jrsn', 'matakuliah.nama AS pen')
    ->where('mahasantri.id', '=', $id)
    ->first();

return view('mahasantri.show', compact('mahasantri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data mahasantri berdasarkan ID
        $mahasantri = DB::table('mahasantri')->where('id', '=', $id)->first();
        $ar_jurusan = Jurusan::all();
        $ar_matakuliah = Matakuliah::all();
        return view('mahasantri.form_edit', compact('mahasantri', 'ar_jurusan', 'ar_matakuliah'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->has('matakuliah_id')) {
            DB::table('mahasantri')->where('id', $id)->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'jurusan_id' => $request->jurusan_id,
                'matakuliah_id' => $request->matakuliah_id,
            ]);
        }
    
        return redirect('/mahasantri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
DB::table('mahasantri')->where('id',$id)->delete();
return redirect('/mahasantri');

    }
    public function mahasantriPDF()
{
    $ar_mahasantri = DB::table('mahasantri')
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
        ->join('matakuliah', 'matakuliah.id', '=', 'mahasantri.matakuliah_id')
        ->select('mahasantri.*', 'jurusan.nama AS jrsn', 'matakuliah.nama AS pen')
        ->get();

    $pdf = PDF::loadView('mahasantri.mahasantriPDF', ['ar_mahasantri' => $ar_mahasantri]);
    
    return $pdf->download('datamahasantri.pdf');
}
}
