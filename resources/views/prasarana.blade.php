@extends('layouts.master')

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Sarana Prasarana</h3>
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
                                <a href="/prasarana/cetak_pdf" class="btn btn-danger "><i class="bi bi-filetype-pdf"></i>
                                    Export</a>
                            </div>

                            <div class="col-6 col-md-2">
                                <a href="/excel/barang" class="btn btn-success" target="_blank"><i
                                        class="bi bi-file-excel"></i>
                                    Export</a>
                            </div>

                            <hr class="divider">
                        @endif
                    </div>

                    <button type="button" class="btn shadow btn-outline-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Add+
                    </button>

                    <!-- Modal ADD DATA -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Prasarana</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action={{ url('/store-prasarana') }} enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Uraian</label>
                                            <input type="text" name="uraian" class="form-control"
                                                id="formGroupExampleInput" placeholder="Masukkan Uraian">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Jumlah</label>
                                            <input type="number" name="jumlah" class="form-control"
                                                id="formGroupExampleInput" placeholder="Masukkan Jumlah">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Tanggal Pembelian</label>
                                            <input type="date" class="form-control" id="formGroupExampleInput2"
                                                placeholder="tanggal" name="tanggal">
                                        </div>

                                        {{-- <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Kondisi</label>
                                                <input type="text" name="kondisi" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Kondisi Barang">
                                            </div> --}}

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Kondisi</label>
                                            <select class="form-select" aria-label="Default select example" name="kondisi">
                                                <option value="baik">Baik</option>
                                                <option value="rusak">Rusak</option>
                                            </select>

                                            {{-- <input type="text" name="kondisi" class="form-control"
                                                    id="formGroupExampleInput2"> --}}
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
                                    <form action={{ url('/prasarana/edit/' . $d->id) }} method="POST"
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
                                                <label for="formGroupExampleInput" class="form-label">Jumlah</label>
                                                <input type="number" min="1" name="jumlah" class="form-control"
                                                    id="formGroupExampleInput" placeholder="Masukkan Jumlah"
                                                    autocomplete="off" value="{{ $d->jumlah }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Tanggal
                                                    Pembelian</label>
                                                <input type="date" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="tanggal" name="tanggal" value="{{ $d->tanggal }}">
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
                                    <form action={{ url('/prasarana/delete/' . $d->id) }} method="POST"
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

                    {{-- <button type="button" class="btn shadow btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add +
                </button> --}}
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pembelian</th>
                                <th>Kondisi</th>
                                @hasrole('admin')
                                    <th>Status</th>
                                @endhasrole
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
                                    @hasrole('admin')
                                        <td>
                                            <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit-prasarana{{ $pd->id }}">Edit</i></a>

                                            <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-prasarana{{ $pd->id }}">delete</i></a>
                                        </td>
                                    @endhasrole
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    @endsection
