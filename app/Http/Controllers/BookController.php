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
            'stok' => Book::DEFAULT_STOCK,
            'harga_pokok' => $request->harga_pokok,
            'harga_jual' => $request->harga_jual,
            'ppn' => Book::TAX,
            'diskon' => $request->diskon,
        ]);

        return back()->with('toast_success', 'Data Berhasil Disimpan');
    }


    public function pageBookSelfs(){
        $books = Book::all();

        return view('kasir.books', compact('books'));
    }

    public function editBuku($id_buku){

        $book = Book::where('id_buku', $id_buku)->first();
        // dd($book);
        return view('Pages.edit_buku', compact('book'));
    }

    public function updateBuku(Request $request, $id_buku){
        $faker = Faker::create('id_ID');

        $book = Book::where('id_buku', $id_buku);
        $book->update([
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

        return redirect('pageInputBuku')->with('toast_success', 'Data Berhasil Disimpan');
    }

    public function deleteBuku($id_buku){
        $book = Book::where('id_buku', $id_buku);
        $book->delete();

        return back()->with('info', 'Data Berhasil Dihapus');
    }


}
