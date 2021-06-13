<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "tbl_penjualan";
    protected $primarykey = "id_penjualan";
    protected $fillable = [
        'id_buku', 'id_kasir', 'jumlah_beli', 'bayar', 'kembalian', 'total_harga', 'tanggal', 'created_at', 'updated_at'
    ];
}
