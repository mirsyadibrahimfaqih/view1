@extends('adminlte::page')

@section('title', 'Data Buku')

@section('content_header')
    <h1>Data Buku</h1>
@stop

@section('content')
@php
    $ar_judul = ['No', 'ISBN', 'Judul', 'Tahun Cetak', 'Stok', 'Pengarang', 'Penerbit', 'Cover', 'Kategori'];
    $no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Buku</h3>
        <br/>
        <a class="btn btn-primary" href="{{ route('buku.create') }}" role="button">Tambah</a>
        <a href="{{ url('bukupdf') }}" class="btn btn-info">
<i class="fas fa-file-pdf"></i></a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    @foreach($ar_judul as $jdl)
                        <th>{{ $jdl }}</th>
                    @endforeach
                    <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach($ar_buku as $b)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $b->isbn }}</td> 
                        <td>{{ $b->judul }}</td>
                        <td>{{ $b->tahun_cetak }}</td> 
                        <td>{{ $b->stok }}</td> 
                        <td>{{ $b->nama }}</td> 
                        <td>{{ $b->pen }}</td> 
                        <td>{{ $b->cover }}</td>
                        <td>{{ $b->kat }}</td> 
                        <td>
                            <form method="POST" action="{{ route('buku.destroy', $b->id) }}">
                                @csrf  
                                @method("delete") 
                                <a class="btn btn-info" href="{{ route('buku.show', $b->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-success" href="{{ route('buku.edit', $b->id) }}"><i class="fas fa-pen"></i></a>
                                <button class="btn btn-danger" onclick="return confirm('Anda Yakin Data diHapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
