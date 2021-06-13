<div class="modal fade" id="modal-create-transaction" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaksi Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('create-transaction')}}" method="post">
                <div class="modal-body">
                    @method('POST')
                    {{csrf_field()}}
                    <div class="form-group">
                        <h6>No Faktur</h6>
                        <input type="text" name="id_faktur" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <h6>Judul Buku</h6>
                        <input type="text" name="judul" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <h6>Total Harga</h6>
                        <input type="text" name="total" class="form-control" disabled>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h6>Jumlah Beli</h6>
                        <input type="text" name="total_beli" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah Buku</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>