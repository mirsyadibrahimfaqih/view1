@php
    $nama = "Fawwaz";
    $nilai = 90;
@endphp

{{-- Struktur Kendali If --}}
@if($nilai >= 60)
    @php
        $ket = "Lulus";
    @endphp
@else
    @php
        $ket = "Gagal";
    @endphp
@endif

{{-- Mencetak --}}
Nama Siswa : {{ $nama }}
<br/>Nilai : {{ $nilai }}
<br/>Keterangan : {{ $ket }}
