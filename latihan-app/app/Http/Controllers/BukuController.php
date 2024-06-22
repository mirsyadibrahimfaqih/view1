<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Kategori;
use PDF;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_buku = DB::table('buku') //join tabel dengan Query Builder Laravel
          ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.kategori_id')
         ->select('buku.*', 'pengarang.nama AS nama', 'penerbit.nama AS pen',
         'kategori.nama AS kat')->get();
       return view('buku.index',compact('ar_buku'));
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_pengarang = Pengarang::all();
        $ar_penerbit = Penerbit::all();
        $ar_kategori = Kategori::all();

        return view('buku.form', compact('ar_pengarang', 'ar_penerbit', 'ar_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Proses input data, tangkap request dari form buku
        DB::table('buku')->insert(
            [
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'tahun_cetak' => $request->tahun_cetak,
            'stok' => $request->stok,
            'idpengarang' => $request->idpengarang,
            'idpenerbit' => $request->idpenerbit,
            'kategori_id' => $request->idkategori,
            'cover' => $request->cover,
        ]
    );

        // Redirect ke halaman utama
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //menampilka detail buku
        $ar_buku = DB::table('buku')
->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
->join('kategori', 'kategori.id', '=', 'buku.kategori_id')
->select('buku.*', 'pengarang.nama', 'penerbit.nama AS pen',
'kategori.nama AS kat')
->where('buku.id','=', $id)->get();
return view('buku.show',compact('ar_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku
$data = DB::table('buku')
->where('id','=',$id)->get();
return view('buku.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Proses edit data lama, tangkap request dari form edit buku 
DB::table('buku')->where('id', $id)->update([
    'isbn' => $request->isbn,
    'judul' => $request->judul,
    'tahun_cetak' => $request->tahun_cetak,
    'stok' => $request->stok,
    'idpengarang' => $request->idpengarang,
    'idpenerbit' => $request->idpenerbit,
    'kategori_id' => $request->kategori_id,
]);

// Redirect ke halaman buku yang telah diupdate
return redirect('/buku');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
DB::table('buku')->where('id',$id)->delete();
return redirect('/buku');

    }

    public function bukuPDF()
    {
        $ar_buku = DB::table('buku') //join tabel dengan Query Builder Laravel
          ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
            ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
            ->join('kategori', 'kategori.id', '=', 'buku.kategori_id')
         ->select('buku.*', 'pengarang.nama AS nama', 'penerbit.nama AS pen',
         'kategori.nama AS kat')->get();
         $pdf = PDF::loadView('buku.bukuPDF',['ar_buku'=>$ar_buku]);
       return $pdf->download('dataBuku.pdf');
 
    }
}
