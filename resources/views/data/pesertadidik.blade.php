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

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>TTL</th>
                                <th>No Telp</th>
                                <th>OrangTua</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Lulus</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2022-09-09 00:00:00</td>
                                <td>Rizki Ferdiansyah</td>
                                <td>12063</td>
                                <td>Jakarta 19 July 2004</td>
                                <td>092109201</td>
                                <td>Musid Senopati</td>
                                <td>2020-07-02 00:00:00</td>
                                <td>2023-08-12 00:00:00</td>
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
                                <td>Julian Firdaus</td>
                                <td>12064</td>
                                <td>Bandung 21 Agustus 2004</td>
                                <td>09201902</td>
                                <td>Fakhri Seva</td>
                                <td>2020-07-02 00:00:00</td>
                                <td>2023-08-12 00:00:00</td>
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
                                <td>Fikri Zulian</td>
                                <td>12065</td>
                                <td>Jakarta 12 Mei 2004</td>
                                <td>090210</td>
                                <td>Heru Kurniawan</td>
                                <td>2020-07-02 00:00:00</td>
                                <td>2023-08-12 00:00:00</td>
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
