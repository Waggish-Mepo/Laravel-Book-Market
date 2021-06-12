<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distributor extends Model
{
    protected $table = "distributors";
    protected $primarykey = "id_distributor";
    protected $fillable = [
        'id_distributor', 'nama_distributor', 'alamat', 'telepon'
    ];
}
