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
            <h3>Laporan Semua Data Buku</h3>
        </div>

        <div class="row">

            <table class="table table-bordered mt-4">
                <thead>
                  <tr>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">judul</th>
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


    <script type="text/javascript">
        window.print();
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>