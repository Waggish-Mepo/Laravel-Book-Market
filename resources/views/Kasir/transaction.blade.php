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
                                <h3>Transaksi Penjualan</h3>
                            </div>

                            <table id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                    <tr id="book-{{$book->id_buku}}">
                                        <td>
                                            {{$book->judul}}
                                        </td>
                                        <td>
                                            {{$book->penulis}}
                                            </td>
                                        <td>
                                            {{$book->penerbit}}
                                        </td>
                                        <td>
                                            {{$book->harga_pokok}}
                                        </td>
                                        <td>
                                            {{$book->stok}}
                                        </td>
                                        <td>
                                            <a href="{{route('view-transaction', $book->id_buku)}}" class="btn btn-success">Transaksi Buku</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-center">
                                <i>Tekan tombol "Transaksi Buku" agar diarahkan ke formulir transaksi</i>
                            </div>
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
            $('#table').dataTable();
        });
    </script>
</body>

</html>