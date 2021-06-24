<body onLoad="window.print()">
    <table border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td height="87" colspan="7" align="center">
                <span><span>STRUK PENJUALAN</span><br />
                    <strong>Toko Buku Mochi Mepo</strong></span><br />
                <span><strong>Alamat : </strong>{{$profile->alamat}}</span>
            </td>
        </tr>
        <tr>
            <td colspan="4"><strong>No Faktur :</strong> {{$receipt->id_penjualan}}</td>
            <td colspan="3" align="right"> 07-03-2017</td>
        </tr>
        <tr>
            <td colspan="7"><strong>Kasir :</strong> {{$cashier->name}}</td>
        </tr>
        <tr>
            <th style="border: 1px solid black;" bgcolor="#F5F5F5">No</th>
            <th style="border: 1px solid black;" bgcolor="#F5F5F5">Judul Buku</th>
            <th style="border: 1px solid black;" bgcolor="#F5F5F5">Jumlah Beli</th>
            <th style="border: 1px solid black;" bgcolor="#F5F5F5">Harga Satuan</th>
            <th style="border: 1px solid black;" bgcolor="#F5F5F5">PPN</th>
            <th style="border: 1px solid black;" bgcolor="#F5F5F5">Diskon</th>
            <th style="border: 1px solid black;" bgcolor="#F5F5F5" align="right">Total</th>
        </tr>
        <tr>
            <td style="border: 1px solid black;"><strong>1</strong></td>
            <td id="judul-buku" style="border: 1px solid black;"><strong>{{$book->judul}}</strong></td>
            <td id="jumlah-beli" style="border: 1px solid black;"><strong>{{$receipt->jumlah_beli}}</strong></td>
            <td id="harga-satuan" style="border: 1px solid black;"><strong>{{$book->harga_pokok}}</strong></td>
            <td id="ppn" style="border: 1px solid black;">10%</td>
            <td id="diskon" style="border: 1px solid black;">{{$book->diskon}}</td>
            <td id="total" style="border: 1px solid black;" align="right"><strong>{{$receipt->total_harga}}</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;" colspan="2" align="right"><strong>Jumlah</strong></td>
            <td style="border: 1px solid black;"><strong>{{$receipt->jumlah_beli}} buku</strong></td>
            <td style="border: 1px solid black;" colspan="3" align="right"><strong>Grand Total</strong></td>
            <td style="border: 1px solid black;" align="right"><strong>{{$receipt->total_harga}}</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;" colspan="6" align="right"><strong>Bayar</strong></td>
            <td style="border: 1px solid black;" align="right"><strong>{{$receipt->bayar}}</strong></td>
        </tr>
        <tr>
            <td style="border: 1px solid black;" colspan="6" align="right"><strong>Kembalian</strong></td>
            <td style="border: 1px solid black;" align="right"><strong>{{$receipt->kembalian}}</strong></td>
        </tr>
    </table>
</body>