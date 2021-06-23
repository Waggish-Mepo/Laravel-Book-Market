<!DOCTYPE html>
<html lang="en">

<head>
    @include('Template.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('Template.navbar')

        @include('Template.sidebar')

        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="card-header mb-3">
                                <h3>Ubah Profile</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ url('/manager/update-profile') }}" method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="id-setting" value="{{$profile->id_setting}}">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama Perusahaan</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$profile->nama_perusahaan}}" required>
                                    </div>
                                </div>
                                <div class="col-8 mt-3">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea name="address" id="address" cols="30" rows="3" class="form-control" required>{!!$profile->alamat!!}</textarea>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">No Telepon</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{$profile->no_tlpn}}" required>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="handphone" class="form-label">No Handphone</label>
                                        <input type="text" name="handphone" id="handphone" class="form-control" value="{{$profile->no_hp}}" required>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="web" class="form-label">Web</label>
                                        <input type="text" name="web" id="web" class="form-control" value="{{$profile->web}}" required>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{$profile->email}}" required>
                                    </div>
                                </div>
                                <div class="col-5 mt-1">
                                    <div class="form-group">
                                        <label for="form-file" class="form-label mt-4">Logo Laporan</label>
                                        <div class="row">
                                            <div class="col">
                                                <input class="form-control" type="file" id="form-file" name="file">
                                            </div>
                                            <div class="col-1">
                                                <img src="{{ url('/images/'.$profile->logo) }}" alt="logo" class="" width="50px" height="50px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success">
                                        Perbarui
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


    </div>
    @include('Template.script')

    @include('sweetalert::alert')
</body>

</html>