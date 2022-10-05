{{-- @extends('layouts.master');

@section('content')
    <section>
        <div class="container mt-5">
            <h1>Tambah Prasarana</h1>
            <div class="row">
                <div class="col-lg-8">
                        <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" name="uraian" class="form-controller" placeholder="Uraian">
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" class="form-controller" placeholder="Jumlah">
                            </div>

                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <input type="text" name="kondisi" class="form-controller" placeholder="Kodisi">
                            </div>
e
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>

                        </form>
                </div>
            </div>
        </div>
    </section>

@endsection --}}