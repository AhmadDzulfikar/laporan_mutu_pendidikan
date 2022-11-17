@extends('layouts.master')

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Siswa</h3>
                </div>

            </div>
        </div>
        <section class="section">
            <div class="card shadow mb-5">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <div class="row">

                            @if (!isset($data[0]->siswa))
                            @else
                                <div class="col-6 mb-3 col-md-2">
                                    <a href="/pesertadidik/cetak_pdf" class="btn btn-danger ">EXPORT PDF</a>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta Didik</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action={{ url('/store-siswa') }} enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Nama Peserta
                                                    Didik</label>
                                                <input type="text" name="siswa" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Masukkan Nama Peserta Didik">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">NISN</label>
                                                <input type="number" name="nisn" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Masukkan No NISN">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Tempat Lahir</label>
                                                <input type="text" name="tempat" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Masukkan Tempat Lahir">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="tanggal" name="tgl_lahir">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">No Telp</label>
                                                <input type="number" name="no_tlp" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Masukkan Nomor Telpon">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Nama Orang Tua</label>
                                                <input type="text" name="org_tua" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Masukkan Nama Orang Tua">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Tanggal Masuk</label>
                                                <input type="date" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="Masukkan Tanggal Masuk Peserta Didik" name="tgl_msk">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Tanggal Lulus</label>
                                                <input type="date" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="Masukkan Tanggal Lulus Peserta Didik" name="tgl_lulus">
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
                            <div class="modal fade" id="edit-prasarana{{ $d->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Prasarana</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action={{ url('/siswa/edit/' . $d->id) }} method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Nama Peserta
                                                        Didik</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Example input placeholder" name="siswa"
                                                        value="{{ $d->siswa }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">NISN</label>
                                                    <input type="number" min="1" name="nisn"
                                                        class="form-control" id="formGroupExampleInput"
                                                        placeholder="Masukkan Jumlah" autocomplete="off"
                                                        value="{{ $d->nisn }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Tempat
                                                        Lahir</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Example input placeholder" name="tempat"
                                                        value="{{ $d->tempat }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput2" class="form-label">Tanggal
                                                        Lahir</label>
                                                    <input type="date" class="form-control"
                                                        id="formGroupExampleInput2" placeholder="tanggal"
                                                        name="tgl_lahir" value="{{ $d->tgl_lahir }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">No Telp</label>
                                                    <input type="number" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Example input placeholder" name="no_tlp"
                                                        value="{{ $d->no_tlp }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Nama Orang
                                                        Tua</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Example input placeholder" name="org_tua"
                                                        value="{{ $d->org_tua }}" value="">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Tanggal
                                                        Masuk</label>
                                                    <input type="date" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Example input placeholder" name="tgl_msk"
                                                        value="{{ $d->tgl_msk }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Tanggal
                                                        Lulus</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Example input placeholder" name="tgl_lulus"
                                                        value="{{ $d->tgl_lulus }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="formGroupExampleInput" class="form-label">Kondisi</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="kondisi" value="{{ $d->kondisi }}">
                                                        <option value="baik">Baik</option>
                                                        <option value="rusak">Rusak</option>
                                                    </select>
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
                            <div class="modal fade" id="delete-prasarana{{ $d->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action={{ url('/siswa/delete/' . $d->id) }} method="POST"
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

                                @hasrole('admin')
                                    <th>Status</th>
                                @endhasrole
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
                                    @hasrole('admin')
                                        <td>
                                            <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-prasarana{{ $pd->id }}">Edit</i></a>

                                            <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-prasarana{{ $pd->id }}">delete</i></a>
                                        </td>
                                    @endhasrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    @endsection
