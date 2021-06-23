<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  @include('Template.head')
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    @include('Template.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('Template.sidebar')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">

          <div class="card mt-3">
            <div class="card-body">
              <div class="card-body mb-3">
                <div class="card-header mb-3">
                  <h3>Input Buku</h3>
                </div>


                <form action="{{url('simpanBuku')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <h6>Judul Buku</h6>
                    <input type="text" id="judul" name="judul" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>No ISBN</h6>
                    <input type="text" id="noisbn" name="noisbn" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>Penulis</h6>
                    <input type="text" id="penulis" name="penulis" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>Penerbit</h6>
                    <input type="text" id="penerbit" name="penerbit" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>Tahun Terbit</h6>
                    <input type="text" id="tahun" name="tahun" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>Harga Pokok</h6>
                    <input type="text" id="harga_pokok" name="harga_pokok" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>Harga Jual</h6>
                    <input type="text" id="harga_jual" name="harga_jual" class="form-control">
                  </div>
                  <div class="form-group">
                    <h6>Diskon</h6>
                    <input type="text" id="diskon" name="diskon" class="form-control">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                  </div>
                </form>
              </div>


              <div class="card-body mt-3">

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Kode Buku</th>
                      <th scope="col">judul</th>
                      <th scope="col">No ISBN</th>
                      <th scope="col">Penulis</th>
                      <th scope="col">Penerbit</th>
                      <th scope="col">Tahun</th>
                      <th scope="col">Harga Pokok</th>
                      <th scope="col">Harga Jual</th>
                      <th scope="col">Diskon</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $book)
                    <tr>
                      <td>{{$book->id_buku}}</td>
                      <td>{{$book->judul}}</td>
                      <td>{{$book->noisbn}}</td>
                      <td>{{$book->penulis}}</td>
                      <td>{{$book->penerbit}}</td>
                      <td>{{$book->tahun}}</td>
                      <td>{{$book->harga_pokok}}</td>
                      <td>{{$book->harga_jual}}</td>
                      <td>{{$book->diskon}}</td>
                      <td><a href="{{url('editBuku',$book->id_buku)}}"><i class="far fa-edit"></i></a> | <a href="{{url('deleteBuku',$book->id_buku)}}"><i class="fas fa-trash-alt" style="color: red;"></i></a></td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>


    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->


  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  @include('Template.script')

  @include('sweetalert::alert')
  <script>
    $(document).ready(function() {
      $('table').dataTable();
    });
  </script>
</body>

</html>