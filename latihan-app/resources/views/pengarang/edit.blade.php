@extends('adminlte::page')
@section('title', 'Edit Pengarang')
@section('content_header')
    <h1>Edit Pengarang</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('pengarang.update', $pengarang->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pengarang->nama }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $pengarang->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hp" name="hp" value="{{ $pengarang->hp }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="foto" name="foto">
                        @if($pengarang->foto)
                            <img src="{{ asset('storage/images/' . $pengarang->foto) }}" alt="Foto Pengarang" style="max-width: 200px; margin-top: 10px;">
                        @else
                            <p>Tidak ada foto</p>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
