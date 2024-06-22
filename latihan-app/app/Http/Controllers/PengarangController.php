<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengarang;
use Illuminate\Support\Facades\Storage;

use PDF;

class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pengarang = DB::table('pengarang') //join tabel dengan Query Builder Laravel
        ->select('pengarang.*', 'pengarang.nama AS nama')->get();
      return view('pengarang.index',compact('ar_pengarang'));
 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pengarang.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'hp' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:20048', // Foto harus berupa gambar dengan format yang diperbolehkan
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $nama_foto);
        } else {
            $nama_foto = null;
        }

        DB::table('pengarang')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'foto' => $nama_foto,
        ]);

        // Redirect ke halaman utama
        return redirect('/pengarang');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.show', compact('pengarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('pengarang.edit', compact('pengarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'hp' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048', 
        ]);
    
        $pengarang = Pengarang::findOrFail($id);
    
        $pengarang->nama = $request->nama;
        $pengarang->email = $request->email;
        $pengarang->hp = $request->hp;
    
        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fotoName);
            $pengarang->foto = $fotoName;
        }
    
        $pengarang->save();
    
        return redirect('/pengarang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $pengarang = Pengarang::findOrFail($id);

    if ($pengarang->foto) {
        $pathFoto = public_path('images/' . $pengarang->foto);

        if (file_exists($pathFoto)) {
            unlink($pathFoto);
        }
    }

    $pengarang->delete();

    return redirect('/pengarang')->with('success', 'Data pengarang berhasil dihapus');
}


    // public function PengarangPDF()
    // {
    //     $ar_Pengarang = DB::table('Pengarang') //join tabel dengan Query Builder Laravel
    //       ->join('pengarang', 'pengarang.id', '=', 'Pengarang.idpengarang')
    //         ->join('penerbit', 'penerbit.id', '=', 'Pengarang.idpenerbit')
    //         ->join('kategori', 'kategori.id', '=', 'Pengarang.kategori_id')
    //      ->select('Pengarang.*', 'pengarang.nama AS nama', 'penerbit.nama AS pen',
    //      'kategori.nama AS kat')->get();
    //      $pdf = PDF::loadView('Pengarang.PengarangPDF',['ar_Pengarang'=>$ar_Pengarang]);
    //    return $pdf->download('dataPengarang.pdf');
 
    // }
}
