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
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Prasarana</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form  method="POST" action={{url('/store-prasarana')}}  enctype="multipart/form-data">
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
                                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="tanggal"
                                                    name="tanggal">
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
                                <th>Status</th>
                                {{-- <th>Surat Tugas</th>
                            <th>Penghargaan</th> --}}
                            </tr>
                        </thead>
                        @foreach ($data as $dp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dp->created_at }}</td>
                            <td>{{ $dp->uraian }}</td>
                            <td>{{ $dp->jumlah }}</td>
                            <td>{{ $dp->tanggal }}</td>
                            <td>{{ $dp->kondisi }}</td>
                            <td>
                                <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">Edit</i></a>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="">delete</i></a>
                            </td>
                        @endforeach
                    </table>
                </div>
            </div>

        </section>
    @endsection
