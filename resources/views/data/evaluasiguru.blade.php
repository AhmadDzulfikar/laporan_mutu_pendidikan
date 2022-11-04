@extends('layouts.master')

@section('main')

            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Evaluasi Pendidik</h3>
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

                <button type="button" class="btn shadow btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add +
                </button>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>S1</th>
                            <th>S2</th>
                            <th>S3</th>
                            <th>Penghargaan</th>
                            <th>Status</th>
                            {{-- <th>Surat Tugas</th>
                            <th>Penghargaan</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Pak Sudira</td>
                            <td>Universitas Pertanian Bandung</td>
                            <td>Universitas Indnesia</td>            
                            <td>-</td>
                            <td></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Pak Sudira</td>
                            <td>Universitas Pertanian Bandung</td>
                            <td>Universitas Indnesia</td>            
                            <td>-</td>
                            <td></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Pak Sudira</td>
                            <td>Universitas Pertanian Bandung</td>
                            <td>-</td>            
                            <td>-</td>
                            <td></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Pak Sudira</td>
                            <td>Universitas Pertanian Bandung</td>
                            <td>Universitas Indnesia</td>            
                            <td>Universitas Diponegoro</td>
                            <td><a class="btn shadow btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="">Detail</i></a></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>
                {{-- TUTUP PERIODE --}}

                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection




 