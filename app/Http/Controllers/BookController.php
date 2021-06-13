<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function pageInputBuku(){
        $books = Book::all();

        return view('Pages.input_buku', compact('books'));
    }

    public function pageBookSelfs(){
        $books = Book::all();

        return view('kasir.books', compact('books'));
    }


}
