<!DOCTYPE html>
<html>

<head>
    <title>Laporan Evaluasi Guru</title>
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

        <h5>Data Evaluasi Guru</h5>

        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>S1</th>
                <th>S2</th>
                <th>S3</th>
                <th>Penghargaan</th>
                {{-- <th>Surat Tugas</th>
            <th>Penghargaan</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $eg)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $eg->tanggal }}</td>
                    <td>{{ $eg->nama }}</td>
                    <td>{{ $eg->s1 }}</td>
                    <td>{{ $eg->s2 }}</td>
                    <td>{{ $eg->s3 }}</td>
                    <td>{{ $eg->penghargaan }}
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
