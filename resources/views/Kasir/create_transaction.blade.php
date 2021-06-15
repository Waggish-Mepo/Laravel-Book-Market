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
                            @if(!(isset($receipt)))
                            <div class="card-header mb-3">
                                <h3>Transaksi Penjualan</h3>
                            </div>
                            <div class="modal-body">
                                @if(!(isset($tmp_trans)))
                                <form action="{{route('create-temp-transaction', $book->id_buku)}}" method="post">
                                    @method('POST')
                                    {{csrf_field()}}
                                    <input type="text" name="id_buku" value="{{$book->id_buku}}" hidden>
                                    <div class="form-group">
                                        <h6>Judul Buku</h6>
                                        <input type="text" name="judul" class="form-control" value="{{$book->judul}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <h6>Harga Buku</h6>
                                        <input type="text" name="harga" class="form-control" value="{{$book->harga_pokok}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <h6>Total Harga</h6>
                                        <input name="total_harga" class="form-control" readonly></input>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <h6>Jumlah Beli</h6>
                                        <input type="text" name="jumlah_beli" class="form-control">
                                    </div>
                                    <hr>

                                    <button type="submit" class="btn btn-success">Tambah Buku</button>
                                </form>
                                @else
                                <form action="{{route('create-transaction', $book->id_buku)}}" class="my-4" method="post">
                                    {{csrf_field()}}
                                    <input type="text" name="id_buku" value="{{$book->id_buku}}" hidden>
                                    <input type="text" name="jumlah_beli" value="{{$tmp_trans->total_harga}}" hidden>
                                    <input type="text" name="total_beli" value="{{$tmp_trans->jumlah_beli}}" hidden>
                                    <input type="text" name="total_harga_transaksi" value="{{($tmp_trans->total_harga + ($tmp_trans->total_harga * 10/100)) - ($tmp_trans->total_harga * $book->diskon / 100)}}" hidden>
                                    <div class="table-responsive mx-auto">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Judul</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Jumlah Beli</th>
                                                    <th>PPN</th>
                                                    <th>Diskon</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>{{$book->judul}}</td>
                                                <td>{{$book->harga_pokok}}</td>
                                                <td>{{$tmp_trans->jumlah_beli}}</td>
                                                <td>10%</td>
                                                <td>{{$book->diskon}}</td>
                                                <td align="right">{{$tmp_trans->total_harga}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="text-right table-danger">Grand Total</td>
                                                <td class="text-right table-success"><strong>{{($tmp_trans->total_harga + ($tmp_trans->total_harga * 10/100)) - ($tmp_trans->total_harga * $book->diskon / 100)}}</strong></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="form-group">
                                        <h6>Bayar</h6>
                                        <input type="text" name="bayar" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <h6>Kembalian</h6>
                                        <input type="text" name="kembalian" class="form-control" readonly>
                                    </div>

                                    <button id="create-trans" type="submit" class="btn btn-success" disabled>Selesaikan Transaksi</button>
                                </form>
                                @endif
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>Jumlah Beli</th>
                                                <th>Harga Satuan</th>
                                                <th>PPN</th>
                                                <th>Diskon</th>
                                                <th>Total</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>{{$book->judul}}</td>
                                                <td>{{$receipt->jumlah_beli}}</td>
                                                <td>{{$book->harga_pokok}}</td>
                                                <td>10%</td>
                                                <td>{{$book->diskon}}</td>

                                                <td align="right">{{$receipt->total_harga}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-right">Jumlah</td>
                                                <td colspan="3"><strong>{{$receipt->jumlah_beli}} buku</strong></td>
                                                <td class="text-right">Grand Total</td>
                                                <td class="text-right"><strong>{{$receipt->total_harga_transaksi}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right">Bayar</td>
                                                <td class="text-right"><strong>{{$receipt->bayar}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="text-right">Kembalian</td>
                                                <td class="text-right"><strong>{{$receipt->kembalian}}</strong></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <a target="_blank" href="{{route('print-transaction', $receipt->id_penjualan)}}" class="btn btn-lg btn-block btn-success">Cetak Struk</a>
                                    <a href="{{route('transaksi-buku')}}" class="btn btn-lg btn-block btn-secondary">Kembali</a>
                                @endif
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
            $("input[name=jumlah_beli]").keyup(function() {
                $('input[name=total_harga]').val(
                    $("input[name=jumlah_beli]").val() * $("input[name=harga]").val()
                );
            });

            $("input[name=bayar]").keyup(function() {
                $('input[name=kembalian]').val(
                    parseInt($("input[name=bayar]").val() - $("input[name=total_harga_transaksi]").val())
                );

                if ($("input[name=kembalian]").val() > 0) {
                    $('#create-trans').removeAttr("disabled");
                } 
                if ($("input[name=kembalian]").val() < 0) {
                    $('#create-trans').attr("disabled", false);
                }
            });
        </script>

</body>

</html>