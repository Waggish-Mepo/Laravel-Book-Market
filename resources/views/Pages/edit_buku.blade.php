
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

      <div class="card card-primary card-outline mt-3">
        <div class="card-body">
            <div class="card-body mb-3">
                <h3>Edit Data Buku</h3>
            </div>
          
            <form action="{{url('updateBuku', $book->id_buku)}}" method="post">
                @method('PATCH')
                {{csrf_field()}}
                <div class="form-group">
                    <h6>Judul Buku</h6>
                    <input type="text" id="judul" name="judul" class="form-control" value="{{ $book->judul }}">
                </div>
                <div class="form-group">
                    <h6>No ISBN</h6>
                    <input type="text" id="noisbn" name="noisbn" class="form-control" value="{{ $book->noisbn }}">
                </div>
                <div class="form-group">
                    <h6>Penulis</h6>
                    <input type="text" id="penulis" name="penulis" class="form-control" value="{{ $book->penulis }}">
                </div>
                <div class="form-group">
                    <h6>Penerbit</h6>
                    <input type="text" id="penerbit" name="penerbit" class="form-control" value="{{ $book->penerbit }}">
                </div>
                <div class="form-group">
                    <h6>Tahun Terbit</h6>
                    <input type="text" id="tahun" name="tahun" class="form-control" value="{{ $book->tahun }}">
                </div>
                <div class="form-group">
                    <h6>Harga Pokok</h6>
                    <input type="text" id="harga_pokok" name="harga_pokok" class="form-control" value="{{ $book->harga_pokok }}">
                </div>
                <div class="form-group">
                    <h6>Harga Jual</h6>
                    <input type="text" id="harga_jual" name="harga_jual" class="form-control" value="{{ $book->harga_jual }}">
                </div>
                <div class="form-group">
                    <h6>Diskon</h6>
                    <input type="text" id="diskon" name="diskon" class="form-control" value="{{ $book->diskon }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </form>
          
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
</body>
</html>
