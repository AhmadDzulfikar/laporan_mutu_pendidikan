@extends('layouts.master')

@section('main')
    <div class="modal fade" id="test" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('store-guru') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Admin *</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Admin"
                                name="name">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email"
                                name="email" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Password *</label>
                            <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Password"
                                name="password" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Foto Profile</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Foto Profil"
                                name="gambar">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Delete --}}
    @foreach ($guru as $d)
        <div class="modal fade" id="delete-keluar{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action={{ url('/guru/delete/' . $d->id) }} method="POST" enctype="multipart/form-data">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Hapus!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Modal Delete --}}

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Guru</h3>
                </div>

            </div>
        </div>
        <section class="section">
            <div class="card shadow mb-5">
                <div class="card-body">
                    <button type="button" class="btn shadow btn-outline-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#test">
                        Add +
                    </button>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                {{-- <th>Surat Tugas</th>
                            <th>Penghargaan</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($guru as $a)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ $a->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/user/' . $a->gambar) }}"
                                            class="card-img" style="width: 100px;height:100px"></td>
                                    <td>{{ $a->name }}</td>
                                    <td>{{ $a->email }}</td>
                                    <td>{{ $a->roles->pluck('name')->implode('') }}</td>
                                    <td>
                                        <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#delete-keluar{{ $a->id }}"><i
                                                class="badge-circle badge-circle-ligh font-medium-1"
                                                data-feather="trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- TUTUP PERIODE --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    @endsection
