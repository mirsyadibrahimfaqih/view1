@php
    $no = 1;

    // Array scalar
    $s1 = ['nama' => 'Fawwaz', 'alamat' => 'Jakarta'];
    $s2 = ['nama' => 'Inaya', 'alamat' => 'Depok'];
    $s3 = ['nama' => 'Zidan', 'alamat' => 'Binjai'];
    $s4 = ['nama' => 'Bambang', 'alamat' => 'Mojokerto'];
    $s5 = ['nama' => 'Unyil', 'alamat' => 'Bandung'];

    $judul = ['No', 'Nama', 'Alamat'];

    // Array associative
    $siswa = [$s1, $s2, $s3, $s4, $s5];
@endphp

<h3 align="center">Data Mahasantri</h3>
<table border="1" align="center" cellpadding="10">
    <thead>
        <tr >
            @foreach($judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $sis)
            <tr align="center">
                <td>{{ $no++ }}</td>
                <td>{{ $sis['nama'] }}</td>
                <td>{{ $sis['alamat'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
