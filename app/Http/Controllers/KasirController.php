<?php

namespace App\Http\Controllers;

use App\Models\Book as Book;
use App\Models\Transaction as Transaction;
use App\Models\Profile;
use App\Models\TempTransaction as TempTransaction;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KasirController extends Controller
{
    public function transaction()
    {
        $books = Book::all();

        return view('Kasir.transaction', compact('books'));
    }

    public function viewTransaction(Request $request, $bookId)
    {
        $book = Book::where('id_buku', $bookId)->first();

        return view('Kasir.create_transaction', compact('book'));
    }

    public function createTempTransaction(Request $request, $bookId)
    {
        $book = Book::where('id_buku', $bookId)->first();

        if ($request->jumlah_beli > $book->stok) {
            return redirect()->route('view-transaction', $bookId)->with('toast_error', 'Jumlah buku yang dibeli melebihi stok buku!');
        }

        TempTransaction::create([
            'id_buku' => $request->id_buku,
            'jumlah_beli' => $request->jumlah_beli,
            'total_harga' => $request->total_harga,
        ]);

        $tmp_trans = TempTransaction::where('id_buku', $bookId)->first();

        return view('Kasir.create_transaction', compact('book', 'tmp_trans'));
    }

    public function createTransaction(Request $request, $bookId)
    {
        $faker = Faker::create('id_ID');

        $user = Auth::id();
        $book = Book::where('id_buku', $bookId)->first();
        $dateNow = Carbon::now('Asia/Jakarta');

        $invoice = Transaction::create([
            'id_penjualan' => $faker->unique()->numerify('FK#######'),
            'id_buku' => $request->id_buku,
            'id_kasir' => $user,
            'jumlah_beli' => $request->total_beli,
            'bayar' => $request->bayar,
            'kembalian' => $request->kembalian,
            'total_harga' => $request->total_harga_transaksi,
            'tanggal' => $dateNow,
        ]);

        TempTransaction::truncate();

        $minusStok = $book->stok - $request->total_beli;

        Book::where('id_buku', $bookId)->update([
            'stok' => $minusStok,
        ]);

        return view('Kasir.create_transaction', compact('book'))
            ->with('toast_success', 'Berhasil menambahkan data!')
            ->with('receipt', $invoice->first());
    }

    public function printTransaction(Request $request, $receipt){
        $receipt = Transaction::where('id_penjualan', $receipt)->first();
        $book = Book::where('id_buku', $receipt->id_buku)->first();
        $cashier = User::where('id_user', $receipt->id_kasir)->first();
        $profile = Profile::first();

        return view('Kasir.printed_invoice', compact('receipt', 'book', 'profile', 'cashier'));
    }
    
    public function transactions()
    {
        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $transaction['book'] = $transaction->Book;
        }

        return view('Kasir.transactions', compact('transactions'));
    }

    public function invoice()
    {
        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            $transaction['book'] = $transaction->Book;
        }

        return view('Kasir.invoice', compact('transactions'));
    }
}
