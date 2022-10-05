@extends('layouts.master')

@section('main')

            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin</h3>
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
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td>Admin</td>
                            <td>Admin@wildan</td>
                            <td>admin</td>
                            <td> 
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


