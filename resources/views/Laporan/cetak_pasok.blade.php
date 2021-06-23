<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Toko Buku</title>
</head>
<body>

    <div class="container mt-5">
        <div class="text-center">
            <h3>Laporan Pasok Buku</h3>
        </div>

        <div class="row">

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


@include('Template.script')
    <script>
    getPasok();
    function getPasok(){
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
            success: function (response) {
                $('#data_suply').html('');
                if(response == ''){
                        html = `
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data.</td>
                        </tr>
                    `
                    $('#data_suply').html(html);
                }
                no = 1
                $.each(response, function (i, val) {
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
    function getFilterYear(){
        let tanggal = $('#tanggal').val();
        let url = "{{url('admin/filter-pasok-by-year')}}"
        $.ajax({
            type: "get",
            url: url,
            data: {tanggal},
            beforeSend: function() {
                html = `
                    <tr>
                        <td colspan="10" class="text-center">Sedang mencari data</td>
                    </tr>
                `
                $('#data_suply').html(html);
            },
            success: function (response) {
                $('#data_suply').html('');
                if(response == ''){
                        html = `
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data.</td>
                        </tr>
                    `
                    $('#data_suply').html(html);
                }
                no = 1
                $.each(response, function (i, val) {
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
    window.print();
</script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 