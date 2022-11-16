@extends('layouts.master')

@section('main')
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="card shadow">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="ibi bi-person-fill "></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Jumlah Siswa</h6>
                            <h6 class="font-extrabold mb-0">{{ $data }} Siswa</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card shadow">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                            <div class="stats-icon red mb-2">
                                <i class="ibi bi-tools"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Sarana Prasarana Rusak</h6>
                            <h6 class="font-extrabold mb-0">{{ $rusak }} products</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @hasrole('admin')
            <div class="col-6 col-md-4">
                <a data-bs-toggle="modal" data-bs-target="#viewUser{{ Auth::user()->id }}">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/user/' . Auth::user()->gambar) }}"
                                            class="card-img border border-2 border-secondary" alt="..."
                                            style="height:60px;width:60px;" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 mt-2">
                                    <span class="font-bold" style="font-size: 18px">
                                        {{ Auth::user()->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endhasrole

        @hasrole('guru')
            <div class="col-6 col-md-4">
                <a data-bs-toggle="modal" data-bs-target="#viewUser{{ Auth::user()->id }}">
                    <div class="card shadow">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/user/' . Auth::user()->gambar) }}"
                                            class="card-img border border-2 border-secondary" alt="..."
                                            style="height:60px;width:60px;" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-8 mt-2">
                                    <span class="font-bold" style="font-size: 18px">
                                        {{ Auth::user()->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endhasrole

    </div>

    @include('dashboard/modal')

    
@endsection
