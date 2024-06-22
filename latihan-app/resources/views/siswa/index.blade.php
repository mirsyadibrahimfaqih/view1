

<h3 align="center">Data Mahasantri</h3>
<table border="1" align="center" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $key => $data)
            <tr align="center">
                <td>{{ $key + 1 }}</td>
                <td>{{ $data['nama'] }}</td>
                <td>{{ $data['alamat'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
