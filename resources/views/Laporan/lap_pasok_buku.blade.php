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
                                <h3>Semua Data Pasok Buku</h3>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group form-inline text-right">
                                <div class="clearfix"></div>
                                <div class="controls">
                                    <form method="post" class=" myform form-group form-inline">
                                        <label>Periode :</label>
                                        <select id="tanggal" class="form-select">
                                            @foreach ($dates as $date)
                                            <option value="{{ $date }}">{{ $date }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <button type="button" name="btnTampil" class="form-group btn btn-danger mt-3 mr-1" onclick="getFilterYear()">Tampilkan</button>
                                        <button type="button" name="refresh" class="form-group btn btn-primary mt-3 mr-1" onclick="getPasok()">Refresh</button>
                                        <a target="_blank" class="btn btn-success mt-3" href="{{route('cetakPasok')}}" role="button">Cetak</a>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class=" table table-hover table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Distributor</th>
                                        <th>Judul Buku</th>
                                        <th>NO ISBN</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th>Jumlah Pasok</th>
                                        <th>Tanggal</th>
                                    </thead>
                                    <tbody id="data_suply">
                                    </tbody>
                                </table>
                            </div>
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

    <script>
        getPasok();

        function getPasok() {
            let url = "{{route('getPasok')}}"
            $.ajax({
                type: "get",
                url: url,
                beforeSend: function() {
                    html = `
                    <tr>
                        <td colspan="10" class="text-center">Sedang mencari data</td>
                    </tr>
                `
                    $('#data_suply').html(html);
                },
                success: function(response) {
                    $('#data_suply').html('');
                    if (response == '') {
                        html = `
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data.</td>
                        </tr>
                    `
                        $('#data_suply').html(html);
                    }
                    no = 1
                    $.each(response, function(i, val) {
                        if (val.distributor == null) {
                            return;
                        }
                        html = `
                    <tr>
                        <td>${no}</td>
                        <td>${val.distributor.nama_distributor}</td>
                        <td>${val.book.judul}</td>
                        <td>${val.book.noisbn}</td>
                        <td>${val.book.penulis}</td>
                        <td>${val.book.penerbit}</td>
                        <td>${val.book.harga_jual}</td>
                        <td>${val.book.stok}</td>
                        <td>${val.jumlah}</td>
                        <td>${val.tanggal}</td>
                    </tr>
                    `
                        $("#data_suply").append(html)
                        no++
                    })
                }
            });
        }

        function getFilterYear() {
            let tanggal = $('#tanggal').val();
            let url = "{{url('admin/filter-pasok-by-year')}}"
            $.ajax({
                type: "get",
                url: url,
                data: {
                    tanggal
                },
                beforeSend: function() {
                    html = `
                    <tr>
                        <td colspan="10" class="text-center">Sedang mencari data</td>
                    </tr>
                `
                    $('#data_suply').html(html);
                },
                success: function(response) {
                    $('#data_suply').html('');
                    if (response == '') {
                        html = `
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data.</td>
                        </tr>
                    `
                        $('#data_suply').html(html);
                    }
                    no = 1
                    $.each(response, function(i, val) {
                        html = `
                    <tr>
                        <td>${no}</td>
                        <td>${val.distributor.nama_distributor}</td>
                        <td>${val.book.judul}</td>
                        <td>${val.book.noisbn}</td>
                        <td>${val.book.penulis}</td>
                        <td>${val.book.penerbit}</td>
                        <td>${val.book.harga_jual}</td>
                        <td>${val.book.stok}</td>
                        <td>${val.jumlah}</td>
                        <td>${val.tanggal}</td>
                    </tr>
                    `
                        $("#data_suply").append(html)
                        no++
                    })
                }
            });
        }
    </script>

    @include('sweetalert::alert')
</body>

</html>