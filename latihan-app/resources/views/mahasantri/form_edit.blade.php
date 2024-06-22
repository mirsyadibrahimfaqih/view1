@extends('adminlte::page')
@section('title', 'Edit Mahasantri')
@section('content_header')
    <h1>Edit Mahasantri</h1>
@stop
@section('content')
    {{-- Panggil master data pengarang, penerbit, dan kategori untuk ditampilkan di elemen form --}}
    <form method="POST" action="{{ route('mahasantri.update', $mahasantri->id) }}">
        @csrf {{-- security untuk menghindari serangan pada saat input form --}}
        @method('put') {{-- Form method spoofing untuk mengirim PUT request --}}
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $mahasantri->nama }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $mahasantri->no_hp }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="{{ $mahasantri->email }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Provinsi</label>
            <input type="text" name="provinsi" value="{{ $mahasantri->provinsi }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Kota</label>
            <input type="text" name="kota" value="{{ $mahasantri->kota }}" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select class="form-control" name="jurusan_id">
                <option value="">-- Pilih Jurusan --</option>
                @foreach($ar_jurusan as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ $jurusan->id == $mahasantri->jurusan_id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Matakuliah</label>
            <select class="form-control" name="matakuliah_id">
                <option value="">-- Pilih Matakuliah --</option>
                @foreach($ar_matakuliah as $matakuliah)
                    <option value="{{ $matakuliah->id }}" {{ $matakuliah->id == $mahasantri->matakuliah_id ? 'selected' : '' }}>
                        {{ $matakuliah->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-footer">
            <button type="submit" name="proses" class="btn btn-primary">Ubah</button>
            <a href="{{ route('mahasantri.index')}}" class="btn btn-default float-right">
                <i class="fas fa-arrow-left mr-2"></i>Batal
            </a>
        </div>
    </form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset ('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset ('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset ('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop

@section('js')
<!-- <script> console.log('Hi!'); </script> -->
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset ('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset ('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset ('dist/js/demo.js')}}"></script>
@stop
