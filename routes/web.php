<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    Route::get('/pageInputBuku', [HomeController::class, 'pageInputBuku'])->name('pageInputBuku');
    Route::get('/pageInputDistributor', [HomeController::class, 'pageInputDistributor'])->name('pageInputDistributor');
});

Route::group(['middleware' => ['auth','ceklevel:admin,kasir']], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('index');
});
