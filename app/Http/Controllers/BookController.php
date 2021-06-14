<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class BookController extends Controller
{
    
    public function pageInputBuku(){
        $books = Book::all();

        return view('Pages.input_buku', compact('books'));
    }

    public function simpanBuku(Request $request){
        $faker = Faker::create('id_ID');

        Book::create([
            'id_buku' => $faker->unique()->numerify('BK#######'),
            'judul' => $request->judul,
            'noisbn' => $request->noisbn,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'stok' => 0,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'ppn' => 10,
            'diskon' => $request->diskon,
        ]);

        return back()->with('toast_success', 'Data Berhasil Disimpan');
     
    }


    public function pageBookSelfs(){
        $books = Book::all();

        return view('kasir.books', compact('books'));
    }


}
