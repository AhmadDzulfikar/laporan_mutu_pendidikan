@extends('layouts.master')

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pengeluaran</h3>
                </div>

            </div>
        </div>
        <section class="section">
            <div class="card shadow mb-5">
                <div class="card-body">

                    <div class="row">
                        @if (!isset($data[0]->uraian))
                        @else
                            <div class="col-6 mb-3 col-md-2">
                                <a href="/keluar/cetak_pdf" class="btn btn-danger ">EXPORT PDF</a>
                            </div>

                            <div class="col-6 col-md-2">
                                <a href="/excel/barang" class="btn btn-success" target="_blank">EXPORT EXCEL</a>
                            </div>
                        @endif
                    </div>

                    <button type="button" class="btn shadow btn-outline-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Add +
                    </button>



                    <!-- Modal ADD DATA -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Masukkan Pengeluaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action={{ url('/store-keluar') }} enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Uraian</label>
                                            <input type="text" name="uraian" class="form-control"
                                                id="formGroupExampleInput" placeholder="Masukkan Uraian">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Tanggal Pembelian</label>
                                            <input type="date" class="form-control" id="formGroupExampleInput2"
                                                placeholder="tanggal" name="tanggal">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Pengeluaran</label>
                                            <input type="text" name="keluar" class="form-control"
                                                id="formGroupExampleInput" placeholder="Masukkan Jumlah"
                                                onkeyup="formatbaru(event)">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal ADD DATA -->

                    {{-- Modal Edit Data --}}
                    @foreach ($data as $d)
                        <div class="modal fade" id="edit-keluar{{ $d->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pengeluaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action={{ url('/keluar/edit/' . $d->id) }} method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Uraian</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Example input placeholder" name="uraian"
                                                    value="{{ $d->uraian }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Tanggal
                                                    Pembelian</label>
                                                <input type="date" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="tanggal" name="tanggal" value="{{ $d->tanggal }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Pengeluaran</label>
                                                <input type="text" min="1" name="keluar" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Masukkan Jumlah"
                                                    onkeyup="formatbaru(event)" autocomplete="off"
                                                    value="{{ $d->keluar }}">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- Modal Edit Data --}}

                    {{-- Modal Delete --}}
                    @foreach ($data as $d)
                        <div class="modal fade" id="delete-keluar{{ $d->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action={{ url('/keluar/delete/' . $d->id) }} method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            <center class="mt-3">
                                                <h5>
                                                    apakah anda yakin ingin menghapus data ini?
                                                </h5>
                                            </center>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-danger">Hapus!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- Modal Delete --}}

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>Tanggal Pengeluaran</th>
                                <th>Pengeluaran</th>
                                @hasrole('admin')
                                    <th>Status</th>
                                @endhasrole
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
                                    @hasrole('admin')
                                        <td>
                                            <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-keluar{{ $p->id }}">Edit</i></a>

                                            <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-keluar{{ $p->id }}">delete</i></a>
                                        </td>
                                    @endhasrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>

        <script type="text/javascript">
            function formatbaru(e) {
                let hasil = formatedit(e.target.value);

                e.target.value = hasil;
            }

            /* Fungsi formateditom */
            function formatedit(angka) {
                var prefix = "Rp";
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    edit = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    edit += separator + ribuan.join('.');
                }

                edit = split[1] != undefined ? edit + ',' + split[1] : edit;
                return prefix == undefined ? edit : (edit ? 'Rp ' + edit : '');
            }
        </script>
    @endsection
