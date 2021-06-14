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
                                <h3>Data Semua Penjualan Buku</h3>
                            </div>

                            <div class="card-body mt-3">

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">No Faktur</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Jumlah Beli</th>
                                        <th scope="col">Hagra Satuan</th>
                                        <th scope="col">PPN</th>
                                        <th scope="col">Diskon</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Tanggal Transaksi</th>
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
                                        <td><a href="{{url('editDistributor',$item->id_distributor)}}"><i class="far fa-edit"></i></a> | <a href="{{url('deleteDistributor',$item->id_distributor)}}"><i class="fas fa-trash-alt" style="color: red;"></i></a></td>
                                    </tr>
                                    @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
</body>
</html>