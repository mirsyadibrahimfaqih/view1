@extends('adminlte::page')
@section('title',
'Edit Buku')
@section('content_header')
<h1>Edit Buku</ h1>
    @stop
    @section('content')
    {{-- Panggil master data pengarang, penerbit dan kategori untuk
    ditampilkan di element form --}}
    @php
    $rs1 = App\Models\Pengarang::all();
    $rs2 = App\Models\Penerbit::all();
    $rs3 = App\Models\Kategori::all();
    @endphp
    @foreach($data as $rs)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form method="POST" action="{{ route('buku.update',$rs->id) }}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="nip">ISBN</label>
                    <input type="text" name="isbn" value="{{ $rs->isbn }}" class="form-control" id="isbn">
                </div>
                <div class="form-group">
                    <label for="nip">Judul Buku</label>
                    <input type="text" name="judul" value="{{ $rs->judul }}" class="form-control" id="judul"
                        placeholder="Isi dengan Judul yang sesuai">
                </div>
                <div class="form-group">
                    <label for="nip">Tahun Cetak</label>
                    <input type="date" name="tahun_cetak" value="{{ $rs->tahun_cetak }}" class="form-control"
                        id="tahun_cetak" placeholder="Isi dengan tahun cetak yang sesuai">
                </div>
                <div class="form-group">
                    <label for="nip">Stok Buku</label>
                    <input type="text" name="stok" value="{{ $rs->stok }}" class="form-control" id="stok"
                        placeholder="Isi dengan stok yang sesuai">
                </div>
                <div class="form-group">
                    <label for="nip">Cover</label>
                    <input type="text" name="cover" value="{{ $rs->cover }}" class="form-control" id="cover"
                        placeholder="Isi dengan cover yang sesuai">
                </div>
                <div class="form-group">
                    <label for="nama">Pengarang</label>
                    <select class="form-control" name="idpengarang">
                        <option value="">-- Pilih Pengarang --</option>
                        @foreach($rs1 as $p)
                        @php
                        $sel1 = ($p->id == $rs->idpengarang) ? 'selected' : '';
                        @endphp
                        <option value="{{ $p->id }}" {{ $sel1 }}>{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <select class="form-control" name="idpenerbit">
                        <option value="">-- Pilih Penerbit --</option>
                        @foreach($rs2 as $pen)
                        @php
                        $sel2 = ($pen->id == $rs->idpenerbit) ? 'selected' : '';
                        @endphp
                        <option value="{{ $pen->id }}" {{ $sel2 }}>{{ $pen->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kategori</label><br />
                    @foreach($rs3 as $k)
                    @php
                    $cek = ($k->id == $rs->kategori_id) ? 'checked' : '';
                    @endphp
                    <input type="radio" name="kategori_id" value="{{ $k->id }}" {{ $cek }} />{{ $k->nama }} &nbsp;
                    @endforeach
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

            </div>

            <div class="card-footer">
                <button type="submit" name="proses" class="btn btn-primary">Ubah</button>
                <a href="{{ route('buku.index')}}" class="btn btn-default float-right">
                    <i class="fas fa-arrow-left mr-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
    @endforeach
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