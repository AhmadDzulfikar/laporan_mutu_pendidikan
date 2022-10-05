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
                            <th>Uraian</th>
                            <th>Pengeluaran</th>
                            <th>Status</th>
                            {{-- <th>Surat Tugas</th>
                            <th>Penghargaan</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Renovasi Kamar Mandi</td>
                            <td>Rp. 700.000</td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>

                        <td>2</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Beli 2 AC</td>
                            <td>Rp. 2.000.000</td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        </tr>

                        <td>3</td>
                            <td>2022-09-09 00:00:00</td>
                            <td>Acara Maulid</td>
                            <td>Rp. 1.700.000</td>
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


