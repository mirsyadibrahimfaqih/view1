@extends('adminlte::page')
@section('title', 'Form Buku')
@section('content_header')
    <h1>Data Buku</h1>
@stop
@section('content')
    {{-- Konten Form Input Buku --}}
    {{-- Panggil master data pengarang, penerbit, dan kategori untuk ditampilkan di elemen form --}}
    <form method="POST" action="{{ route('buku.store') }}">
        @csrf {{-- security untuk menghindari dari serangan pada saat input form --}}
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Tahun Cetak</label>
            <input type="text" name="tahun_cetak" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Pengarang</label>
            <select class="form-control" name="idpengarang">
                <option value="">-- Pilih Pengarang --</option>
                @foreach($ar_pengarang as $pengarang)
                    <option value="{{ $pengarang->id }}">{{ $pengarang->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Penerbit</label>
            <select class="form-control" name="idpenerbit">
                <option value="">-- Pilih Penerbit --</option>
                @foreach($ar_penerbit as $penerbit)
                    <option value="{{ $penerbit->id }}">{{ $penerbit->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Kategori</label><br/>
            @foreach($ar_kategori as $kategori)
                <input type="radio" name="idkategori" value="{{ $kategori->id }}"/> {{ $kategori->nama }} &nbsp; &nbsp;
            @endforeach
        </div>
        <div class="form-group">
            <label>Cover</label>
            <input type="text" name="cover" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
        <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
