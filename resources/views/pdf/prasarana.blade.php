<!DOCTYPE html>
<html>

<head>
    <title>Laporan Sarana Prasarana Guru</title>
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
        <h4>MI Modern Al-Misbah</h4>
        <h5>Serpong, Kec. Serpong, Kota Tangerang Selatan, Banten 15310</h5>
        <h5>Jl. Raya Puspiptek No.135</h5>
        <h5>(021) 75872434 </h5>
    </center>

    <hr class="divider">

    <table class='table table-bordered'>

        <h5>Data Sarana Prasarana</h5>

        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Jumlah</th>
                <th>Tanggal Pembelian</th>
                <th>Kondisi</th>
                {{-- <th>Surat Tugas</th>
            <th>Penghargaan</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pd->created_at }}</td>
                    <td>{{ $pd->uraian }}</td>
                    <td>{{ $pd->jumlah }}</td>
                    <td>{{ date('d-m-Y h:i', strtotime($pd->tanggal)) }}</td>
                    {{-- <td>{{ date('d H:i',strtotime($pd->tanggal)) }}</td> --}}
                    <td>{{ $pd->kondisi }}</td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
