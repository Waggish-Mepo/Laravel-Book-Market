
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
          
            <form action="{{route('updatePw')}}" id="change_password_form" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" class="form-control" id="old_password" >
                
                    @if($errors->any('old_password'))
                    <span class="text-danger">{{$errors->first('old_password')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="new_password" >
                    @if($errors->any('new_password'))
                    <span class="text-danger">{{$errors->first('new_password')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" >
                    @if($errors->any('confirm_password'))
                    <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Password</button>
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
