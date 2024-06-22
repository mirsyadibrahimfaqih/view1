@extends('adminlte::page')
@section('title', 'Tambah Mahasantri')
@section('content_header')
    <h1>Tambah Mahasantri</h1>
@stop
@section('content')
    <form method="POST" action="{{ route('mahasantri.store') }}">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No. HP">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Masukkan Email">
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" class="form-control" placeholder="Masukkan Provinsi">
        </div>
        <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" name="kota" class="form-control" placeholder="Masukkan Kota">
        </div>
        <div class="form-group">
            <label for="jurusan_id">Jurusan</label>
            <select class="form-control" name="jurusan_id">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($ar_jurusan as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="matakuliah_id">Matakuliah</label>
            <select class="form-control" name="matakuliah_id">
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($ar_matakuliah as $matakuliah)
                    <option value="{{ $matakuliah->id }}">{{ $matakuliah->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('mahasantri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
