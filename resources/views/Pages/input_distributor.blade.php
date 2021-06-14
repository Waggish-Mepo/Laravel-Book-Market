
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
                <h3>Form Distributor</h3>
            </div>

          <a href="{{route('createDistributor')}}" class="btn btn-success float-right mb-3">Tambah Data</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Nama Distributor</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dtDistributor as $item)

              <tr>
                <th>{{$item->nama_distributor}}</th>
                <td>{{$item->alamat}}</td>
                <td>{{$item->telepon}}</td>
                <td>
                  <a href="{{url('editDistributor',$item->id_distributor)}}"><i class="far fa-edit"></i></a> | <a href="{{url('deleteDistributor',$item->id_distributor)}}"><i class="fas fa-trash-alt" style="color: red;"></i></a>
                </td>
              </tr>

              @endforeach
              
            </tbody>
          </table>
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
        } );
  </script>
</body>
</html>
