<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class TempTransaction extends Model
{
    protected $table = "tbl_tmp_penjualan";
    protected $primarykey = "id_tmp_penjualan";
    protected $fillable = [
        'id_buku', 'jumlah_beli', 'total_harga', 
    ];
}
