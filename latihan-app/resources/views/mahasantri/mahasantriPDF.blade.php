@php
$ar_judul = ['No','Nama', 'Provinsi', 'Kota', 'Jurusan','Matakuliah','action'];
    $no = 1;
@endphp

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Buku</h3>
        <br/>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table border="1" width="100%" cellspacing="0" align="center">
            <thead>
                <tr>
                    @foreach($ar_judul as $jdl)
                        <th>{{ $jdl }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($ar_mahasantri as $b)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{ $b->nama }}</td> 
                        <td>{{ $b->provinsi }}</td> 
                        <td>{{ $b->kota }}</td> 
                        <td>{{ $b->jrsn }}</td> 
                        <td>{{ $b->pen }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
