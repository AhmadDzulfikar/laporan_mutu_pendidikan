{{-- View User --}}
    <div class="modal fade" id="viewUser{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="text-center mt-3">
                </div>

                <div class="modal-body">
                    <div class="text-center">

                        <div class="avatar avatar-xl">

                            <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/user/' . Auth::user()->gambar) }}"
                                class="card-img" alt="..." style="height:80px;width:80px;" />
                        </div>

                    </div>
                    <div class="text-center mb-3 mt-3">

                        <h5>{{ Auth::user()->name }}</h5>
                        <hr>
                        <p>{{ Auth::user()->email }}</p>
                        {{-- <p>{{Auth::user()->telepon}}</p> --}}

                    </div>
                    <div class="text-center mb-3 mt-3">
                        <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editUser{{ Auth::user()->id }}">Edit</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit User(gambar) --}}
    <div class="modal fade" id="editUser{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('/dashboard/edit/user/' . Auth::user()->id) }} method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                id="formGroupExampleInput" placeholder="Change name Profile" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Email</label>
                            <input type="email" class="form-control" id="formGroupExampleInput" placeholder="email"
                                value="{{ Auth::user()->email }}" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Photo Profile</label>
                            <div class="col-md-8 mb-3">
                                <img src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/user/' .Auth::user()->gambar) }}"
                                    class="card-img" alt="..." style="height:180px;border-radius:15px" />
                            </div>
                            <input type="file" class="form-control" name="gambar" autocomplete="off">
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