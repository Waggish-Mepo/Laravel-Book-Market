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
                                <select class="form-control" id="faktur-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <button type="button" class="btn btn-lg btn-block btn-primary" data-toggle="modal" data-target="#modal-print-invoice">Cetak</button>
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

    @include('Kasir._print_invoice')

    @include('Template.script')
</body>

</html>