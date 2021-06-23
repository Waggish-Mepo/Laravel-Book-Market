<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\BookController;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

//Login
Route::get('/login', function () {
    return view('Admin.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Grup
//Signed In User
Route::group(['middleware' => ['auth','ceklevel:admin,kasir,manager']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('index');

    //Ganti Password
    Route::get('/changePw', [PasswordController::class, 'changePw'])->name('changePw');
    Route::patch('/updatePw', [PasswordController::class, 'updatePw'])->name('updatePw');
});

//Admin
Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    //Book
    Route::get('/pageInputBuku', [BookController::class, 'pageInputBuku'])->name('pageInputBuku');
    Route::post('/simpanBuku', [BookController::class, 'simpanBuku'])->name('simpanBuku');
    Route::get('/editBuku/{id_buku}', [BookController::class, 'editBuku'])->name('editBuku');
    Route::patch('/updateBuku/{id_buku}', [BookController::class, 'updateBuku'])->name('updateBuku');
    Route::get('/deleteBuku/{id_buku}', [BookController::class, 'deleteBuku'])->name('deleteBuku');
    Route::get('/lapBukuSemua', [BookController::class, 'lapBukuSemua'])->name('lapBukuSemua');
    Route::get('/cetakBuku', [BookController::class, 'cetakBuku'])->name('cetakBuku');
    Route::get('/bukuExport', [BookController::class, 'bukuExport'])->name('bukuExport');


    //Distributor
    Route::get('/pageInputDistributor', [DistributorController::class, 'pageInputDistributor'])->name('pageInputDistributor');
    Route::get('/createDistributor', [DistributorController::class, 'createDistributor'])->name('createDistributor');
    Route::post('/simpanDistributor', [DistributorController::class, 'simpanDistributor'])->name('simpanDistributor');
    Route::get('/editDistributor/{id_distributor}', [DistributorController::class, 'editDistributor'])->name('editDistributor');
    Route::patch('/updateDistributor/{id_distributor}', [DistributorController::class, 'updateDistributor'])->name('updateDistributor');
    Route::get('/deleteDistributor/{id_distributor}', [DistributorController::class, 'deleteDistributor'])->name('deleteDistributor');

    // Pasok
    Route::get('/pasok-buku', [BookController::class, 'indexPasokBuku'])->name('indexPasokBuku');
    Route::get('/get-pasok', [BookController::class, 'getPasok'])->name('getPasok');
    Route::get('/input-pasok-buku', [BookController::class, 'indexInputPasokBuku'])->name('indexInputPasokBuku');
    Route::post('/input-pasok-buku', [BookController::class, 'inputPasokBuku'])->name('inputPasokBuku');
    Route::get('/cetakPasok', [BookController::class, 'cetakPasok'])->name('cetakPasok');

});

//Kasir
Route::group(['middleware' => ['auth','ceklevel:kasir']], function(){
    Route::prefix('penjualan')->group(function () {
        Route::get('/', [KasirController::class, 'transactions'])->name('penjualan');

        Route::get('/transaksi-buku', [KasirController::class, 'transaction'])->name('transaksi-buku');
        Route::get('/transaksi-buku/{bookId}', [KasirController::class, 'viewTransaction'])->name('view-transaction');
        Route::post('/transaksi-buku/{bookId}/', [KasirController::class, 'createTempTransaction'])->name('create-temp-transaction');   
        Route::post('/transaksi-buku/{bookId}/create', [KasirController::class, 'createTransaction'])->name('create-transaction'); 
        Route::get('/transaksi-buku/print/{receipt}', [KasirController::class, 'printTransaction'])->name('print-transaction'); 
    });

    Route::prefix('faktur')->group(function () {
        Route::get('/', [KasirController::class, 'invoice'])->name('faktur');

        //Cetak Struk ?
    });

    Route::prefix('data-buku')->group(function (){
        Route::get('/', [BookController::class, 'pageBookSelfs'])->name('data-buku');
    });
});

