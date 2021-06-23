<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\distributor;

class Supply extends Model
{
    // use HasFactory;
    protected $table = "tbl_pasok";
    protected $primaryKey = "id_pasok";
    public $incrementing = false;
    protected $fillable = [
        'id_distributor', 'id_buku', 'jumlah', 'tanggal'
    ];

    public function book ()
    {
        return $this->hasOne(Book::class, 'id_buku', 'id_buku');
    }

    public function distributor ()
    {
        return $this->hasOne(Distributor::class, 'id_distributor', 'id_distributor');
    }

}