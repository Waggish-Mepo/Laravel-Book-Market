<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ManagerController;
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

// Admin Manager
Route::group(['middleware' => ['auth','ceklevel:admin,manager']], function(){
    Route::prefix('buku')->group(function () {
        Route::get('/', [BookController::class, 'lapBukuSemua'])->name('lapBukuSemua');
        Route::get('/cetak', [BookController::class, 'cetakBuku'])->name('cetakBuku');
        Route::get('/export', [BookController::class, 'bukuExport'])->name('bukuExport');
        Route::get('/books-by-writer', [BookController::class, 'booksByWriterForm'])->name('booksByWriterForm');
        Route::post('/books-by-writer', [BookController::class, 'booksByWriter'])->name('booksByWriter');

        Route::get('/terlaris', [BookController::class, 'bukuTerlaris'])->name('bukuTerlaris');
        Route::get('/terlaris/export', [BookController::class, 'bukuTerlarisExport'])->name('bukuTerlarisExport');

        Route::get('/pasok-buku', [BookController::class, 'indexPasokBuku'])->name('indexPasokBuku');
        Route::get('/get-pasok', [BookController::class, 'getPasok'])->name('getPasok');
        Route::get('/input-pasok-buku', [BookController::class, 'indexInputPasokBuku'])->name('indexInputPasokBuku');
        Route::post('/input-pasok-buku', [BookController::class, 'inputPasokBuku'])->name('inputPasokBuku');
        Route::get('/cetakPasok', [BookController::class, 'cetakPasok'])->name('cetakPasok');
        
        Route::get('/filter-pasok-buku', [BookController::class, 'indexFilterPasokBuku'])->name('indexFilterPasokBuku');
        Route::post('/filter-pasok-buku', [BookController::class, 'filterByDistributor'])->name('filterByDistributor');

    });
});

// Kasir Manager
Route::group(['middleware' => ['auth','ceklevel:kasir,manager']], function(){
    Route::prefix('penjualan')->group(function () {
        Route::get('/', [KasirController::class, 'transactions'])->name('penjualan');
        Route::get('/faktur', [KasirController::class, 'invoice'])->name('faktur');
    });
    Route::get('/print/{receipt}', [KasirController::class, 'printTransaction'])->name('print-transaction');
});

//Admin
Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    //Book
    Route::prefix('buku')->group(function () {
        Route::get('/input', [BookController::class, 'pageInputBuku'])->name('pageInputBuku');
        Route::post('/input/create', [BookController::class, 'simpanBuku'])->name('simpanBuku');
        Route::get('/{id_buku}/edit', [BookController::class, 'editBuku'])->name('editBuku');
        Route::patch('/{id_buku}/update', [BookController::class, 'updateBuku'])->name('updateBuku');
        Route::get('/{id_buku}/delete', [BookController::class, 'deleteBuku'])->name('deleteBuku');
    });

    //Distributor
    Route::prefix('distributor')->group(function () {
        Route::get('/input', [DistributorController::class, 'pageInputDistributor'])->name('pageInputDistributor');
        Route::post('/create', [DistributorController::class, 'simpanDistributor'])->name('simpanDistributor');
        Route::get('/{id_distributor}/edit', [DistributorController::class, 'editDistributor'])->name('editDistributor');
        Route::patch('/{id_distributor}/update', [DistributorController::class, 'updateDistributor'])->name('updateDistributor');
        Route::get('/{id_distributor}/delete', [DistributorController::class, 'deleteDistributor'])->name('deleteDistributor');
    });
});

//Kasir
Route::group(['middleware' => ['auth','ceklevel:kasir']], function(){
    Route::prefix('penjualan')->group(function () {
        Route::get('/transaksi-buku', [KasirController::class, 'transaction'])->name('transaksi-buku');
        Route::get('/transaksi-buku/{bookId}', [KasirController::class, 'viewTransaction'])->name('view-transaction');
        Route::post('/transaksi-buku/{bookId}/', [KasirController::class, 'createTempTransaction'])->name('create-temp-transaction');   
        Route::post('/transaksi-buku/{bookId}/create', [KasirController::class, 'createTransaction'])->name('create-transaction'); 
    });
});

Route::group(['middleware' => ['auth','ceklevel:manager']], function(){
    Route::get('/ubah-profile', [ManagerController::class, 'setting'])->name('profile');
    Route::patch('/ubah-profile', [ManagerController::class, 'updateProfile'])->name('update-profile');

    Route::get('add-user', function () {
        return view('Admin.user');
    })->name('add-user');

    Route::post('add-user/create', [ManagerController::class, 'createUser'])->name('create-user');
});