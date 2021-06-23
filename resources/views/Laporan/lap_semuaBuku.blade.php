
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
                <h3>Semua Data Buku</h3>
            </div>
        </div>

        <div class="card-body">
          <a href="{{route('cetakBuku')}}" target="_blank" class="btn btn-success mb-3">Cetak</a>
          <a href="{{route('bukuExport')}}" class="btn btn-danger mb-3">Export Excel</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul</th>
                    <th scope="col">No ISBN</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Harga Pokok</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Diskon</th>
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
                  </tr>
                @endforeach
                </tbody>
              </table>
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

  <script>
        $(document).ready(function() {
            $('table').dataTable();
        } );
    </script>
</body>
</html>
