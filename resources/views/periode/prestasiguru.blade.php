<!DOCTYPE html>
<html>

<head>
    <title>Laporan Prestasi Guru</title>
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
        <h1>Yayasan Tarbiatul Wildan Serpong</h1>
        <h1>MI Modern Al-Misbah</h1>
        <h5>Serpong, Kec. Serpong, Kota Tangerang Selatan, Banten 15310</h5>
        <h5>Jl. Raya Puspiptek No.135</h5>
        <h5>(021) 75872434 </h5>
    </center>

    <hr class="divider">

    <table class='table table-bordered'>

        <h5>Data Prestasi Guru</h5>

        <thead>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
        </thead>
        <tbody>
            @foreach ($data as $eg)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $eg->tanggal }}</td>
                    {{-- <td>{{ $eg->nama }}</td> --}}
                    <td>{{ $eg->nama->nama }}</td>
                    <td>{{ $eg->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
