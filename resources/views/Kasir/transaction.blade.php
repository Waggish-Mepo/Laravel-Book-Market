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
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create-transaction">Transaksi Buku</button>
                                        </td>
                                    </tr>
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

    @include('Kasir._create_transaction')

    @include('Template.script')
    <script>
        $(document).ready(function() {
            $('table').dataTable();
        } );
    </script>
</body>

</html>