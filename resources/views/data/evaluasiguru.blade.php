@extends('layouts.master')

@section('main')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Informasi Diri Pendidik</h3>
                </div>

            </div>
        </div>
        <section class="section">
            <div class="card shadow mb-5">
                <div class="card-body">

                    <div class="row">
                        @if (!isset($data[0]->nama))
                        @else
                            <div class="card card-info ">
                                <div class="card-body">
                                    <h6>Tanggal</h6>
                                    <div class="col-6 col-md-12">
                                        <form action="/report/periode/informasi" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <input class="form-control" type="date" name="tgl1">
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <input class="form-control" type="date" name="tgl2">
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <button type="submit" class="btn btn-danger ">CETAK Periode</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3 col-md-2">
                                <a href="/evaluasi/cetak_pdf" class="btn btn-danger ">
                                    <i class="bi bi-filetype-pdf"></i>
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
                        {{-- <i class="bi bi-plus"></i> --}}
                        <span>Add +</span>
                    </button>

                    <!-- Modal ADD DATA -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action={{ url('/store-evaluasi') }} enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Nama Guru</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="Masukkan Nama Guru" name="nama">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="formGroupExampleInput"
                                                placeholder="Tanggal" name="tanggal">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">S1</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="Pendidikan S1" name="s1">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">S2</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="Pendidikan S2" name="s2">
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">S3</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="Pendidikan S3" name="s3">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Penghargaan</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="penghargaan"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
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
                                    <form action={{ url('/evaluasi/edit/' . $d->id) }} method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Nama Guru</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Masukkan Nama Guru" name="nama"
                                                    value="{{ $d->nama }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Tanggal
                                                </label>
                                                <input type="date" class="form-control" id="formGroupExampleInput2"
                                                    placeholder="tanggal" name="tanggal" value="{{ $d->tanggal }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">S1</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Masukkan S1" name="s1" value="{{ $d->s1 }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">S2</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Masukkan S2" name="s2" value="{{ $d->s2 }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">S3</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Masukkan S3" name="s3" value="{{ $d->s3 }}">
                                            </div>

                                            {{-- <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Penghargaan</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Masukkan Penghargaan" name="penghargaan"
                                                    value="{{ $d->penghargaan }}">
                                            </div> --}}

                                            <div class="form-group mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">Penghargaan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="penghargaan">{{ $d->penghargaan }}</textarea>
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
                                    <form action={{ url('/evaluasi/delete/' . $d->id) }} method="POST"
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

                    {{-- ----------------------------------- INI VIEW ---------------------------------------- --}}
                    @foreach ($data as $p)
                        <div class="modal fade" id="viewdata{{ $p->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Penghargaan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body ms-1 me-1">
                                        <div class="d-flex justify-content-center">
                                            <h5>Penghargaan</h5>
                                        </div>
                                        <hr>

                                        <div class="text-center">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="penghargaan" disabled>{{ $p->penghargaan }}</textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- ----------------------------------- INI VIEW ---------------------------------------- --}}


                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>S1</th>
                                <th>S2</th>
                                <th>S3</th>
                                <th>Kompetensi</th>
                                <th>Status</th>
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

                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a class="btn shadow btn-outline-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#viewdata{{ $eg->id }}"><i
                                                    class="badge-circle badge-circle-ligh font-medium-1"
                                                    data-feather="eye"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#edit-keluar{{ $eg->id }}"><i
                                                class="badge-circle badge-circle-ligh font-medium-1"
                                                data-feather="edit"></i></a>

                                        <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete-keluar{{ $eg->id }}"><i
                                                class="badge-circle badge-circle-ligh font-medium-1"
                                                data-feather="trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    @endsection
