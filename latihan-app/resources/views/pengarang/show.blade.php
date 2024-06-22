@extends('adminlte::page')

@section('title', 'Detail Pengarang')

@section('content_header')
    <h1>Detail Pengarang</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if($pengarang)
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama:</strong> {{ $pengarang->nama }}</p>
                        <p><strong>Email:</strong> {{ $pengarang->email }}</p>
                        <p><strong>No HP:</strong> {{ $pengarang->hp }}</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('images/' . $pengarang->foto) }}" alt="Foto Pengarang" style="max-width: 200px;">
                    </div>
                </div>
            @else
                <p>Data pengarang tidak ditemukan.</p>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('pengarang.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@stop
