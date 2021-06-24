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
                                <h3>Cetak Faktur Penjualan</h3>
                            </div>

                            <div class="form-group">
                                <label for="faktur-select">No Faktur</label>
                                <select class="form-control" name="faktur" id="faktur-select">
                                @foreach ($transactions as $tr)
                                    <option>{{$tr->id_penjualan}}</option>
                                @endforeach
                                </select>
                            </div>

                            <button type="button" onclick="print()" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#modal-print-invoice">Cetak</button>
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
</body>

<script>
    function print(route){
        let id = $('select[name=faktur] option').filter(':selected').val();
        let url = `/print/${id}`;

        window.open(url, '_blank').focus();
        console.log(id);
    }
</script>

</html>