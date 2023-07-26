<?php

use Illuminate\Support\Facades\Route;

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

//route untuk tampilan dashboard awal admin
Route::get('/home', '\App\Http\Controllers\HomeController@index');

//route CRUD unit
Route::get('/unit', '\App\Http\Controllers\UnitController@index');
Route::get('/unit/tambah_unit', '\App\Http\Controllers\UnitController@tambah_unit');
Route::post('/unit/store_unit', '\App\Http\Controllers\UnitController@store_unit');
Route::get('/unit/edit/{id}','App\Http\Controllers\UnitController@edit');
Route::post('/unit/update','App\Http\Controllers\UnitController@update');
Route::get('/unit/hapus/{id}','App\Http\Controllers\UnitController@hapus');

//crud jabatan
Route::get('/jabatan','\App\Http\Controllers\JabatanController@index');
Route::get('/jabatan/tambah','\App\Http\Controllers\JabatanController@tambah');
Route::post('/jabatan/store','\App\Http\Controllers\JabatanController@store');
Route::get('/jabatan/edit/{id}','\App\Http\Controllers\JabatanController@edit');
Route::post('/jabatan/update','\App\Http\Controllers\JabatanController@update');
Route::get('/jabatan/hapus/{id}','\App\Http\Controllers\JabatanController@hapus');

//crud bidang
Route::get('/bidang', 'App\Http\Controllers\BidangController@index');
Route::get('/bidang/tambah', 'App\Http\Controllers\BidangController@tambah');
Route::post('/bidang/store', 'App\Http\Controllers\BidangController@store');
Route::get('/bidang/edit/{id}', 'App\Http\Controllers\BidangController@edit');
Route::post('/bidang/update', 'App\Http\Controllers\BidangController@update');
Route::get('/bidang/hapus/{id}', 'App\Http\Controllers\BidangController@hapus');

//crud fungsi
Route::get('/fungsi', '\App\Http\Controllers\FungsiController@index');
Route::get('/fungsi/tambah_fungsi', '\App\Http\Controllers\FungsiController@tambah_fungsi');
Route::post('/fungsi/store', '\App\Http\Controllers\FungsiController@store');
Route::get('/fungsi/edit/{id}', '\App\Http\Controllers\FungsiController@edit');
Route::post('/fungsi/update', '\App\Http\Controllers\FungsiController@update');
Route::get('/fungsi/hapus/{id}', '\App\Http\Controllers\FungsiController@hapus');

//crud user
Route::get('/user', '\App\Http\Controllers\UserController@index');
Route::get('/user/tambah_user', '\App\Http\Controllers\UserController@tambah_user');
Route::post('/user/store', '\App\Http\Controllers\UserController@store');
Route::get('/user/edit/{id}', '\App\Http\Controllers\UserController@edit');
Route::post('/user/update', '\App\Http\Controllers\UserController@update');
Route::get('/user/hapus/{id}', '\App\Http\Controllers\UserController@hapus');

//crud ip
Route::get('/ip', '\App\Http\Controllers\IpController@index');
Route::get('/ip/tambah_ip', '\App\Http\Controllers\IpController@tambah_ip');
Route::post('/ip/store', '\App\Http\Controllers\IpController@store');
Route::get('/ip/edit/{id}', '\App\Http\Controllers\IpController@edit');
Route::post('/ip/update', '\App\Http\Controllers\IpController@update');
Route::get('/ip/hapus/{id}', '\App\Http\Controllers\IpController@hapus');

//crud switch
Route::get('/switch', '\App\Http\Controllers\SwitchController@index');
Route::get('/switch/tambah_switch', '\App\Http\Controllers\SwitchController@tambah_switch');
Route::post('/switch/store', '\App\Http\Controllers\SwitchController@store');
Route::get('/switch/edit/{id}', '\App\Http\Controllers\SwitchController@edit');
Route::post('/switch/update', '\App\Http\Controllers\SwitchController@update');
Route::get('/switch/hapus/{id}', '\App\Http\Controllers\SwitchController@hapus');

//crud os
Route::get('/os', '\App\Http\Controllers\OsController@index');
Route::get('/os/tambah_os', '\App\Http\Controllers\OsController@tambah_os');
Route::post('/os/store', '\App\Http\Controllers\OsController@store');
Route::get('/os/edit/{id}', '\App\Http\Controllers\OsController@edit');
Route::post('/os/update', '\App\Http\Controllers\OsController@update');
Route::get('/os/hapus/{id}', '\App\Http\Controllers\OsController@hapus');

//crud komputer
Route::get('/komputer', '\App\Http\Controllers\KomputerController@index');
Route::get('/komputer/tambah_komputer', '\App\Http\Controllers\KomputerController@tambah_komputer');
Route::post('/komputer/store', '\App\Http\Controllers\KomputerController@store');
Route::get('/komputer/edit/{id}', '\App\Http\Controllers\KomputerController@edit');
Route::post('/komputer/update', '\App\Http\Controllers\KomputerController@update');
Route::get('/komputer/hapus/{id}', '\App\Http\Controllers\KomputerController@hapus');