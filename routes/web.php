<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('login');
});

Route::middleware(['isTamu'])->group(function () {
    Route::get('/loginPage', '\App\Http\Controllers\AuthController@loginPage')->name('login_page');
    Route::post('/login', '\App\Http\Controllers\AuthController@authenticate')->name('login');
});

Route::middleware(['isLogin'])->group(function () {
    Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/logout', '\App\Http\Controllers\AuthController@logout')->name('logout');

    //route CRUD unit
    Route::get('/unit', '\App\Http\Controllers\UnitController@index');
    Route::get('/unit/tambah_unit', '\App\Http\Controllers\UnitController@tambah_unit')->name('tambah_unit');
    Route::post('/unit/store_unit', '\App\Http\Controllers\UnitController@store_unit');
    Route::get('/unit/edit/{id}', 'App\Http\Controllers\UnitController@edit');
    Route::post('/unit/update', 'App\Http\Controllers\UnitController@update');
    Route::get('/unit/hapus/{id}', 'App\Http\Controllers\UnitController@hapus');
    Route::get('/unit/hapus/confirm/{id}', '\App\Http\Controllers\UnitController@hapusConfirm')->name('unit.hapus.confirm');
    Route::get('/unit/search', '\App\Http\Controllers\UnitController@search')->name('search_unit');

    //crud jabatan
    Route::get('/jabatan', '\App\Http\Controllers\JabatanController@index');
    Route::get('/jabatan/tambah', '\App\Http\Controllers\JabatanController@tambah')->name('tambah_jabatan');
    Route::post('/jabatan/store', '\App\Http\Controllers\JabatanController@store');
    Route::get('/jabatan/edit/{id}', '\App\Http\Controllers\JabatanController@edit');
    Route::post('/jabatan/update', '\App\Http\Controllers\JabatanController@update');
    Route::get('/jabatan/hapus/{id}', '\App\Http\Controllers\JabatanController@hapus');
    Route::get('/jabatan/hapus/confirm/{id}', '\App\Http\Controllers\JabatanController@hapusConfirm')->name('jabatan.hapus.confirm');
    Route::get('/jabatan/search', '\App\Http\Controllers\JabatanController@search')->name('search_jabatan');

    //crud bidang
    Route::get('/bidang', 'App\Http\Controllers\BidangController@index');
    Route::get('/bidang/tambah', 'App\Http\Controllers\BidangController@tambah')->name('tambah_bidang');
    Route::post('/bidang/store', 'App\Http\Controllers\BidangController@store');
    Route::get('/bidang/edit/{id}', 'App\Http\Controllers\BidangController@edit');
    Route::post('/bidang/update', 'App\Http\Controllers\BidangController@update');
    Route::get('/bidang/hapus/{id}', 'App\Http\Controllers\BidangController@hapus');
    Route::get('/bidang/hapus/confirm/{id}', '\App\Http\Controllers\BidangController@hapusConfirm')->name('bidang.hapus.confirm');
    Route::get('/bidang/search', '\App\Http\Controllers\BidangController@search')->name('search_bidang');

    //crud fungsi
    Route::get('/fungsi', '\App\Http\Controllers\FungsiController@index');
    Route::get('/fungsi/tambah_fungsi', '\App\Http\Controllers\FungsiController@tambah_fungsi')->name('tambah_fungsi');
    Route::post('/fungsi/store', '\App\Http\Controllers\FungsiController@store');
    Route::get('/fungsi/edit/{id}', '\App\Http\Controllers\FungsiController@edit');
    Route::post('/fungsi/update', '\App\Http\Controllers\FungsiController@update');
    Route::get('/fungsi/hapus/{id}', '\App\Http\Controllers\FungsiController@hapus');
    Route::get('/fungsi/hapus/confirm/{id}', '\App\Http\Controllers\FungsiController@hapusConfirm')->name('fungsi.hapus.confirm');
    Route::get('/fungsi/search', '\App\Http\Controllers\FungsiController@search')->name('search_fungsi');

    //crud user
    Route::get('/user', '\App\Http\Controllers\UserController@index');
    Route::get('/user/tambah_user', '\App\Http\Controllers\UserController@tambah_user')->name('tambah_user');
    Route::post('/user/store', '\App\Http\Controllers\UserController@store');
    Route::get('/user/edit/{id}', '\App\Http\Controllers\UserController@edit');
    Route::post('/user/update', '\App\Http\Controllers\UserController@update');
    Route::get('/user/hapus/{id}', '\App\Http\Controllers\UserController@hapus');
    Route::get('/user/hapus/confirm/{id}', '\App\Http\Controllers\UserController@hapusConfirm')->name('user.hapus.confirm');
    Route::get('/user/search', '\App\Http\Controllers\UserController@search')->name('search_user');
    Route::get('/fungsi/tambah_fungsi', '\App\Http\Controllers\FungsiController@tambah_fungsi')->name('tambah_fungsi');
    Route::get('/user/detail/{id}', '\App\Http\Controllers\UserController@detail');

    //crud ip
    Route::get('/ip', '\App\Http\Controllers\IpController@index');
    Route::get('/ip/tambah_ip', '\App\Http\Controllers\IpController@tambah_ip')->name('tambah_ip');
    Route::post('/ip/store', '\App\Http\Controllers\IpController@store');
    Route::get('/ip/edit/{id}', '\App\Http\Controllers\IpController@edit');
    Route::post('/ip/update', '\App\Http\Controllers\IpController@update');
    Route::get('/ip/hapus/{id}', '\App\Http\Controllers\IpController@hapus');
    Route::get('/ip/hapus/confirm/{id}', '\App\Http\Controllers\IpController@hapusConfirm')->name('ip.hapus.confirm');
    Route::get('/ip/search', '\App\Http\Controllers\IpController@search')->name('search_ip');

    //crud os
    Route::get('/os', '\App\Http\Controllers\OsController@index');
    Route::get('/os/tambah_os', '\App\Http\Controllers\OsController@tambah_os')->name('tambah_os');
    Route::post('/os/store', '\App\Http\Controllers\OsController@store');
    Route::get('/os/edit/{id}', '\App\Http\Controllers\OsController@edit');
    Route::post('/os/update', '\App\Http\Controllers\OsController@update');
    Route::get('/os/hapus/{id}', '\App\Http\Controllers\OsController@hapus');
    Route::get('/os/hapus/confirm/{id}', '\App\Http\Controllers\OsController@hapusConfirm')->name('os.hapus.confirm');
    Route::get('/os/search', '\App\Http\Controllers\OsController@search')->name('search_os');

    //crud switch
    Route::get('/switch', '\App\Http\Controllers\SwitchController@index');
    Route::get('/switch/tambah_switch', '\App\Http\Controllers\SwitchController@tambah_switch')->name('tambah_switch');
    Route::post('/switch/store', '\App\Http\Controllers\SwitchController@store');
    Route::get('/switch/detail/{id}', '\App\Http\Controllers\SwitchController@detail')->name('detail_switch');
    Route::get('/switch/edit/{id}', '\App\Http\Controllers\SwitchController@edit');
    Route::post('/switch/update', '\App\Http\Controllers\SwitchController@update');
    Route::get('/switch/hapus/{id}', '\App\Http\Controllers\SwitchController@hapus');
    Route::get('/switch/hapus/confirm/{id}', '\App\Http\Controllers\SwitchController@hapusConfirm')->name('switch.hapus.confirm');
    Route::get('/switch/search', '\App\Http\Controllers\SwitchController@search')->name('search_switch');
    Route::get('/ip/tambah_ip', '\App\Http\Controllers\IpController@tambah_ip')->name('tambah_ip');


    //crud komputer
    Route::get('/komputer', '\App\Http\Controllers\KomputerController@index');
    Route::get('/komputer/tambah_komputer', '\App\Http\Controllers\KomputerController@tambah_komputer')->name('tambah_komputer');
    Route::post('/komputer/store', '\App\Http\Controllers\KomputerController@store');
    Route::get('/komputer/detail/{id}', '\App\Http\Controllers\KomputerController@detail');
    Route::get('/komputer/edit/{id}', '\App\Http\Controllers\KomputerController@edit');
    Route::post('/komputer/update', '\App\Http\Controllers\KomputerController@update');
    Route::get('/komputer/hapus/{id}', '\App\Http\Controllers\KomputerController@hapus');
    Route::get('/inventaris/log', 'App\Http\Controllers\InventarisController@log')->name('komputer_log');
    Route::get('/komputer/hapus/confirm/{id}', '\App\Http\Controllers\KomputerController@hapusConfirm')->name('komputer.hapus.confirm');
    Route::get('/komputer/search', '\App\Http\Controllers\KomputerController@search')->name('search_komputer');
    Route::get('/user/tambah_user', '\App\Http\Controllers\UserController@tambah_user')->name('tambah_user');
    Route::get('/ip/tambah_ip', '\App\Http\Controllers\IpController@tambah_ip')->name('tambah_ip');

    //crud pinjam
    Route::get('/pinjam', '\App\Http\Controllers\PinjamController@index');
    Route::get('/pinjam/tambah_pinjam', '\App\Http\Controllers\PinjamController@tambah_pinjam')->name('tambah_pinjam');
    Route::post('/pinjam/store', '\App\Http\Controllers\PinjamController@store');
    Route::get('/pinjam/detail/{id}', '\App\Http\Controllers\PinjamController@detail');
    Route::get('/pinjam/edit/{id}', '\App\Http\Controllers\PinjamController@edit');
    Route::post('/pinjam/update', '\App\Http\Controllers\PinjamController@update');
    Route::get('/pinjam/hapus/{id}', '\App\Http\Controllers\PinjamController@hapus');
    Route::get('/pinjam/hapus/confirm/{id}', '\App\Http\Controllers\PinjamController@hapusConfirm')->name('pinjam.hapus.confirm');
    Route::get('/pinjam/search', '\App\Http\Controllers\PinjamController@search')->name('search_pinjam');
    Route::get('/user/tambah_user', '\App\Http\Controllers\UserController@tambah_user')->name('tambah_user');
    Route::get('/komputer/tambah_komputer', '\App\Http\Controllers\KomputerController@tambah_komputer')->name('tambah_komputer');

    // CRUD inventaris
    Route::get('/inventaris', 'App\Http\Controllers\InventarisController@index');
    Route::get('/inventaris/tambah_inventaris', 'App\Http\Controllers\InventarisController@tambah_inventaris')->name('tambah_inventaris');
    Route::post('/inventaris/store', 'App\Http\Controllers\InventarisController@store');
    Route::get('/inventaris/detail/{id}', 'App\Http\Controllers\InventarisController@detail');
    Route::get('/inventaris/edit/{id}', 'App\Http\Controllers\InventarisController@edit');
    Route::post('/inventaris/update', 'App\Http\Controllers\InventarisController@update');
    Route::get('/inventaris/hapus/{id}', 'App\Http\Controllers\InventarisController@hapus');
    Route::get('/inventaris/log/{id}', 'App\Http\Controllers\InventarisController@log')->name('inventaris.log');
    Route::post('/inventaris/{id}/storeLog', 'App\Http\Controllers\InventarisController@storeLog')->name('store-log');
    Route::get('/inventaris/search', '\App\Http\Controllers\InventarisController@search')->name('search_inventaris');
    Route::get('/log/searchLog', '\App\Http\Controllers\InventarisController@searchLog')->name('search_log');
    Route::get('/user/tambah_user', '\App\Http\Controllers\UserController@tambah_user')->name('tambah_user');
    Route::get('/komputer/tambah_komputer', '\App\Http\Controllers\KomputerController@tambah_komputer')->name('tambah_komputer');
});
