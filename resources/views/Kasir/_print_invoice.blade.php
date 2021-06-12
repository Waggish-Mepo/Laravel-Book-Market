<div class="modal fade" id="modal-print-invoice" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cetak Faktur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <td>Harry Potter</td>
                            <td>3</td>
                            <td>30.000</td>
                            <td>10%</td>
                            <td>12%</td>

                            <td align="right">88.200</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right">Jumlah</td>
                            <td colspan="3"><strong>3 buku</strong></td>
                            <td class="text-right">Grand Total</td>
                            <td class="text-right"><strong>88.200</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-right">Bayar</td>
                            <td class="text-right"><strong>100.000</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-right">Kembalian</td>
                            <td class="text-right"><strong>11.800</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-block btn-success">Cetak Struk</button>
                <button type="button" class="btn btn-lg btn-block btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>