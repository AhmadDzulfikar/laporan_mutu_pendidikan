<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h3>YAYASAN TARBIATUL WILDAN SERPONG</h3>
        <h3>MI Modern Al-Misbah</h3>
        <h5>Serpong, Kec. Serpong, Kota Tangerang Selatan, Banten 15310</h5>
        <h5>Jl. Raya Puspiptek No.135</h5>
        <h5>(021) 75872434 </h5>
    </center>

    <hr class="divider">

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Tanggal</th>
                <th>Uang Pangkal</th>
                <th>SPP</th>
                <th>Uang Kegiatan</th>
                <th>Uang Perlengkapan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($masuk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->siswa->siswa }}</td>
                    <td>{{ date('d-m-Y h:i', strtotime($item->tanggal)) }}</td>
                    <td>Rp. @money((float) $item->uangpangkal)</td>
                    <td>Rp. @money((float) $item->spp)</td>
                    <td>Rp. @money((float) $item->uangkegiatan)</td>
                    <td>Rp. @money((float) $item->uangperlengkapan)</td>
                </tr>
            @endforeach
            {{-- TUTUP PERIODE --}}
        </tbody>
    </table>

</body>

</html>
