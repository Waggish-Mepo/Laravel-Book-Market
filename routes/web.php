<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\DistributorController;
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
    return view('welcome');
});

//Login
Route::get('/login', function () {
    return view('Admin.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Grup
//Signed In User
Route::group(['middleware' => ['auth','ceklevel:admin,kasir']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('index');
});

//Admin
Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    Route::get('/pageInputBuku', [HomeController::class, 'pageInputBuku'])->name('pageInputBuku');

    //Distributor
    Route::get('/pageInputDistributor', [DistributorController::class, 'pageInputDistributor'])->name('pageInputDistributor');
    Route::get('/createDistributor', [DistributorController::class, 'createDistributor'])->name('createDistributor');
    Route::post('/simpanDistributor', [DistributorController::class, 'simpanDistributor'])->name('simpanDistributor');
    Route::get('/editDistributor/{id_distributor}', [DistributorController::class, 'editDistributor'])->name('editDistributor');
    Route::patch('/updateDistributor/{id_distributor}', [DistributorController::class, 'updateDistributor'])->name('updateDistributor');
    Route::get('/deleteDistributor/{id_distributor}', [DistributorController::class, 'deleteDistributor'])->name('deleteDistributor');
});

Route::group(['middleware' => ['auth','ceklevel:admin,kasir,manager']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('index');

    //Ganti Password
    Route::get('/changePw', [LoginController::class, 'changePw'])->name('changePw');
    Route::patch('/updatePw/{id_Login}', [LoginController::class, 'updatePw'])->name('updatePw');

});

//Kasir
Route::group(['middleware' => ['auth','ceklevel:kasir']], function(){
    Route::prefix('penjualan')->group(function () {
        Route::get('/', [KasirController::class, 'transactions'])->name('penjualan');
        Route::get('/transaksi-buku', [KasirController::class, 'transaction'])->name('transaksi-buku');

        Route::post('/create-transaction', [KasirController::class, 'createTransaction'])->name('create-transaction');      
    });

    Route::prefix('faktur')->group(function () {
        Route::get('/', [KasirController::class, 'invoice'])->name('faktur');

        //Cetak Struk ?
    });
});

