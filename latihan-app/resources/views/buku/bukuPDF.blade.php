@php
    $ar_judul = ['No', 'ISBN', 'Judul', 'Tahun Cetak', 'Stok', 'Pengarang', 'Penerbit', 'Cover', 'Kategori'];
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
