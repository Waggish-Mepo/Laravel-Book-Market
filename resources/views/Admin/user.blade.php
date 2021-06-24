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
                                <h3>Tambah User</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('create-user') }}" method="POST">
                                @csrf
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-8 mt-3">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Alamat</label>
                                        <textarea name="address" id="address" cols="30" rows="3" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Telepon</label>
                                        <input type="text" name="phone" id="phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5 mt-3">
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5 mt-3">
                                    <div class="form-group">
                                        <label for="level" class="form-label">Level User</label>
                                        <select name="level" id="level" class="form-select" required>
                                            <option value="kasir">Kasir</option>
                                            <option value="manager">Manager</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success">
                                        Tambah User
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