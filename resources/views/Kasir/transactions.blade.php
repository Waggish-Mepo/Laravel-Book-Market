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
                                <h3>Data Penjualan</h3>
                            </div>

                            <div class="my-4">
                                <button type="button" class="btn btn-primary">Cetak</button>
                                <button type="button" class="btn btn-success">Export Excel</button>
                            </div>

                            <table id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No Faktur</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Jumlah Beli</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">PPN</th>
                                        <th scope="col">Diskon</th>
                                        <th scope="col">Total harga</th>
                                        <th scope="col">Tanggal Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $tr)
                                    <tr>
                                        <td>{{$tr->id_penjualan}}</td>
                                        <td>{{$tr->book->judul}}</td>
                                        <td>{{$tr->jumlah_beli}}</td>
                                        <td>{{$tr->book->harga_pokok}}</td>
                                        <td>{{$tr->book->ppn}}%</td>
                                        <td>{{$tr->book->diskon}}%</td>
                                        <td>{{intval(($tr->total_harga + ($tr->total_harga * $tr->book->ppn / 100)) - ($tr->total_harga * $tr->book->diskon / 100)) }}</td>
                                        <td>{{$tr->tanggal}}</td>
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
    <script>
        $(document).ready(function() {
            $('#table').dataTable();
        } );
    </script>
</body>

</html>