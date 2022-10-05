@extends('layouts.master')

@section('main')

            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kesiapan Pendidik</h3>
            </div>

        </div>
    </div>
    <section class="section">
        <div class="card shadow mb-5">
            <div class="card-body">
                <button type="button" class="btn shadow btn-outline-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add +
                </button>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kehadiran</th>
                            <th>File</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Pak Ferdy</td>
                            <td>Hadir</td>
                            <td></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Pak Julian</td>
                            <td>Sakit</td>
                            <td></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Pak Krisna</td>
                            <td>Izin</td>
                            <td></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Bu Dewi</td>
                            <td>Hadir</td>
                            <td></td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection


