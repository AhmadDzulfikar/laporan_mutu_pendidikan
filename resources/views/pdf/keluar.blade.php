<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengeluaran Yayasan</title>
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

        <h5>Data Evaluasi Guru</h5>

        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Tanggal Pengeluaran</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->created_at }}</td>
                    <td>{{ $p->uraian }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>Rp. @money((float) $p->keluar) </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
