@extends('adminlte::page')
@section('title', 'Form Pengarang')
@section('content_header')
    <h1>Data Pengarang</h1>
@stop
@section('content')
    {{-- Konten Form Input Pengarang --}}
    <form method="POST" action="{{ route('pengarang.store') }}" enctype="multipart/form-data">
        @csrf {{-- Security untuk menghindari serangan pada saat input form --}}
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan nama " required/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email " required/>
        </div>
        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="hp" class="form-control" value="{{ old('hp') }}" placeholder="Masukkan nomor HP " required/>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control" placeholder="Pilih foto pengarang" required/>
        </div>
        <div class="clearfix"> {{-- Clear float jika ada float element --}}
            <button type="submit" class="btn btn-primary float-left" name="proses">Simpan</button>
            <a href="{{ route('pengarang.index') }}" class="btn btn-warning float-right mr-2">Kembali</a> {{-- Tombol untuk kembali ke halaman pengarang --}}
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
