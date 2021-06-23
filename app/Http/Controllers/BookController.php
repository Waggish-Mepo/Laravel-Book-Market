<?php

namespace App\Http\Controllers;

use App\Exports\BukuExport;
use App\Models\Book;
use App\Models\Suply;
use App\Models\distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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

    public function lapBukuSemua(){
        $books = Book::all();

        return view('Laporan.lap_semuaBuku', compact('books'));
    }

    public function cetakBuku(){
        $books = Book::all();

        return view('Laporan.cetak_buku', compact('books'));
    }

    public function bukuExport(){
        return Excel::download(new BukuExport, 'buku.xlsx');
    }


    // Pasok
    public function indexPasokBuku ()
    {
        $user = Auth::user();
        $suplys = Suply::orderBy('tanggal', 'desc')->get();
        $dataDates = $suplys->pluck('tanggal');
        $dates = [];
        foreach ($dataDates as $key => $arrDates) {
            if(in_array($arrDates, $dates)){
                continue;
            }
            $dates[$key] = $arrDates;
        }
        array_unique((array)$dates);

        return view('Laporan.lap_pasok_buku', compact('user', 'dates'));
    }

    public function getPasok ()
    {
        $suplys = Suply::orderBy('tanggal', 'desc')->get();
        $dataSuply = [];
        foreach($suplys as $suply){
            $suply['distributor'] = $suply->distributor;
            $suply['book'] = $suply->book;
            array_push($dataSuply , $suply);
        }

        return $dataSuply;
    }

    public function pasokByYear (Request $req)
    {
        $suplys = Suply::all();
        $suplysByDate = $suplys->where('tanggal', $req->tanggal);
        $dataSuply = [];

        foreach($suplysByDate as $suply){
            $suply['distributor'] = $suply->distributor;
            $suply['book'] = $suply->book;
            array_push($dataSuply , $suply);
        }

        return $dataSuply;
    }

    public function indexInputPasokBuku()
    {
        $user = Auth::user();
        $books = Book::all();
        $suplys = Suply::orderBy('tanggal', 'desc')->get();
        $distributors = Distributor::all();
        $dataSuply = [];
        foreach($suplys as $key => $suply){
            $dataSuply[$key] = $suply;
            $dataSuply[$key]['distributor'] = $suply->distributor;
            $dataSuply[$key]['book'] = $suply->book;
        }
        
        return view('Pages.input_pasok_buku', compact('dataSuply', 'user', 'distributors', 'books'));
    }

    public function inputPasokBuku(Request $request)
    {
        $book = Book::findOrFail($request->book_id);

        $supply = new Suply;

        $supply->id_distributor = $request->distributor_id;
        $supply->id_buku = $request->book_id;
        $supply->jumlah = $request->jumlah;
        $supply->tanggal = $request->tanggal;

        $supply->save();

        $plusStok = $book->stok + $request->jumlah;

        $book->update([
            'stok' => $plusStok,
        ]);

        $book->save();

        return back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function cetakPasok(){
        $data = Suply::all();

        return view('Laporan.cetak_pasok', compact('data'));
    }

}
