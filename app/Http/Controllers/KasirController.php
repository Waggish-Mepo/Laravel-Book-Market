<?php

namespace App\Http\Controllers;

use App\Models\Transaction as Transaction;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function transaction(){
        return view('Kasir.transaction');
    }

    public function transactions(){
        return view('Kasir.transactions');
    }

    public function invoice(){
        return view('Kasir.invoice');
    }
}
