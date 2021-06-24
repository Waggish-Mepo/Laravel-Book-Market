
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

      <div class="card text-center mt-5">
            <div class="card-header">
                LAPORAN PASOK BERDASARKAN DISTRIBUTOR
            </div>
            <div class="card-body">
                <h5 class="card-title">Distributor : {{ $distributor['nama_distributor'] }}</h5>
                <p class="card-text">Tanggal Cetak : {{ $mytime }}</p>
                <div class="table-responsive">
                    <table class=" table table-hover table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>NO ISBN</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Jumlah Pasok</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            @foreach ($dataSuply as $book)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book['book']['judul'] }}</td>
                                <td>{{ $book['book']['noisbn'] }}</td>
                                <td>{{ $book['book']['penulis'] }}</td>
                                <td>{{ $book['book']['penerbit'] }}</td>
                                <td>{{ $book['book']['harga_jual'] }}</td>
                                <td>{{ $book['book']['stok'] }}</td>
                                <td>{{ $book['jumlah'] }}</td>
                                <td>{{ $book['tanggal'] }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><span class="text-bold font-weight-bold">Jumlah</span></td>
                                <td colspan="8"><span class="text-bold font-weight-bold text-center">{{ $countBook }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                2 days ago
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

  <script>
        $(document).ready(function() {
            $('table').dataTable();
        } );
    </script>
</body>
</html>
