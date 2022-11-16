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
        <h1>Yayasan Tarbiatul Wildan</h1>
        <h5>bSdkjsakdaksdksadksadksabdk</h5>
        <h5>dndjwndjwndjwndjdj</h5>
    </center>

    <hr class="divider">

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>Tanggal</th> --}}
                <th>Nama</th>
                <th>NISN</th>
                <th>Tempat</th>
                <th>Tanggal Lahir</th>
                <th>No Telp</th>
                <th>OrangTua</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Lulus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $pd->created_at }}</td> --}}
                    <td>{{ $pd->siswa }}</td>
                    <td>{{ $pd->nisn }}</td>
                    <td>{{ $pd->tempat }}</td>
                    <td>{{ $pd->tgl_lahir }}</td>
                    <td>{{ $pd->no_tlp }}</td>
                    <td>{{ $pd->org_tua }}</td>
                    <td>{{ $pd->tgl_msk }}</td>
                    <td>{{ $pd->tgl_lulus }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
