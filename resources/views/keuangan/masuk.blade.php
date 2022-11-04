@extends('layouts.master')

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Pemasukkan</h3>
                </div>

            </div>
        </div>
        <section class="section">
            <div class="card shadow mb-5">
                <div class="card-body">

                    <div class="row">

                        <div class="col-6 mb-3 col-md-2">
                            <a href="/report/all" class="btn btn-danger ">EXPORT PDF</a>
                        </div>

                        <div class="col-6 col-md-2">
                            <a href="/excel/barang" class="btn btn-success" target="_blank">EXPORT EXCEL</a>
                        </div>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta Didik</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action={{ url('/store-masuk') }} enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <select class="form-select" id="basicSelect" name="pesertadidik_id">
                                                @foreach ($siswa as $s)
                                                    
                                                <option value="{{ $s->id }}">{{ $s->siswa }}</option>
                                                @endforeach
                                                {{-- <option>Blade Runner</option>
                                                <option>Thor Ragnarok</option> --}}
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="formGroupExampleInput"
                                                placeholder="Nama Siswa" name="tanggal">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Uang Pangkal</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="contoh: Rp 17.333" name="uangpangkal" onkeyup="formatbaru(event)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">SPP</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="contoh: Rp 17.333" name="spp" onkeyup="formatbaru(event)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Uang Kegiatan</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="contoh: Rp 17.333" name="uangkegiatan" onkeyup="formatbaru(event)">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Uang Perlengkapan</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="contoh: Rp 17.333" name="uangperlengkapan" onkeyup="formatbaru(event)">
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

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal</th>
                                <th>Uang Pangkal</th>
                                <th>SPP</th>
                                <th>Uang Kegiatan</th>
                                <th>Uang Perlengkapan</th>
                                <th>Status</th>
                                {{-- <th>Surat Tugas</th>
                            <th>Penghargaan</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masuk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->siswa->siswa }}</td>
                                    <td>{{ date('d-m-Y h:i', strtotime($item->tanggal)) }}</td>
                                    <td>Rp. @money((float)$item->uangpangkal)</td>
                                    <td>Rp. @money((float)$item->spp)</td>
                                    <td>Rp. @money((float)$item->uangkegiatan)</td>
                                    <td>Rp. @money((float)$item->uangperlengkapan)</td>
                                    <td>
                                        <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="">Edit</i></a>
                                        <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="">delete</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- TUTUP PERIODE --}}
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
