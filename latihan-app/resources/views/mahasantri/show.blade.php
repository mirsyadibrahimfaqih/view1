@extends('adminlte::page')
@section('title', 'Detail Mahasantri')
@section('content_header')
    <h1>Detail Mahasantri</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Nama:</th>
                    <td>{{ $mahasantri->nama }}</td>
                </tr>
                <tr>
                    <th>No. HP:</th>
                    <td>{{ $mahasantri->no_hp }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $mahasantri->email }}</td>
                </tr>
                <tr>
                    <th>Provinsi:</th>
                    <td>{{ $mahasantri->provinsi }}</td>
                </tr>
                <tr>
                    <th>Kota:</th>
                    <td>{{ $mahasantri->kota }}</td>
                </tr>
                <tr>
                    <th>Jurusan:</th>
                    <td>{{ $mahasantri->jrsn }}</td>
                </tr>
                <tr>
                    <th>Matakuliah:</th>
                    <td>{{ $mahasantri->pen }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="{{ route('mahasantri.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
