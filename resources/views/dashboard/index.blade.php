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
                            <h6 class="font-extrabold mb-0">@money((float)$data) Siswa</h6>
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

        <hr class="divider">

        <div class="col-6 col-md-6">
            <div class="card shadow">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                            <div class="stats-icon blue mb-2">
                                <i class="ibi bi-person-fill "></i>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                            <h6 class="font-semibold text-muted">Jumlah Pemasukkan</h6>
                            <h6 class="font-extrabold mb-0 text-success">Rp. @money((float)$total_in)</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-6">
            <div class="card shadow">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                            <div class="stats-icon red mb-2">
                                <i class="ibi bi-tools"></i>    
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                            <h6 class="font-semibold">Jumlah Pengeluaran</h6>
                            <h6 class="font-extrabold mb-0 text-danger">Rp. @money((float)$total_out)</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-12 col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h6>Statistik Pemasukkan dan Pengeluaran</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="text-center">
                            <canvas id="products_b"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('dashboard/modal')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"
        integrity="sha512-dw+7hmxlGiOvY3mCnzrPT5yoUwN/MRjVgYV7HGXqsiXnZeqsw1H9n9lsnnPu4kL2nx2bnrjFcuWK+P3lshekwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- script chart --}}
    <script>
        const b_products = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];

        const b_productsd = {
            labels: b_products,
            datasets: [{
                label: 'Pemasukkan',
                backgroundColor: '#43beaf',
                borderRadius: 4,
                barThickness: 10,

                data: [
                    @foreach ($data_month_p as $ikm)
                        {{ $ikm }},
                    @endforeach
                ]
            }, {
                label: 'Pengeluaran',
                backgroundColor: '#dc3545',
                borderRadius: 4,
                barThickness: 10,
                data: [
                    @foreach ($data_month_k as $okm)
                        {{ $okm }},
                    @endforeach
                ],
            }]
        };

        const bar_products = {
            type: 'bar',
            data: b_productsd,
            options: {
                responsive: true,
                indexAxis: 'x',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                        },
                    },
                },
            }
        };
    </script>
    <script>
        const bulanan_products = new Chart(
            document.getElementById('products_b'),
            bar_products
        );
    </script>
@endsection
