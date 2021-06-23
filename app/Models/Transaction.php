<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\distributor;

class Transaction extends Model
{
    protected $table = "tbl_penjualan";
    protected $primarykey = "id_penjualan";
    public $incrementing = false;
    protected $fillable = [
        'id_penjualan', 'id_buku', 'id_kasir', 'jumlah_beli', 'bayar', 'kembalian', 'total_harga', 'tanggal', 'created_at', 'updated_at'
    ];

    public function Book ()
    {
        return $this->hasOne(Book::class, 'id_buku', 'id_buku');
    }

    public function User ()
    {
        return $this->hasOne(distributor::class, 'id_user', 'id_kasir');
    }
}
