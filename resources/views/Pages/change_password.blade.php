
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
                <h3>Ganti Password</h3>
            </div>
          
            <form action="#" method="post">
                @method('PATCH')
                {{csrf_field()}}
                <div class="form-group">
                    <h6>Email</h6>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <h6>Password lama</h6>
                    <input type="text" id="passwordOld" name="passwordOld" class="form-control">
                </div>
                <div class="form-group">
                    <h6>Password Baru</h6>
                    <input type="text" id="passwordNew" name="passwordNew" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
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
