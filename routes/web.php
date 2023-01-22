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
    return view('autentikasi.login');
});

Route::post('login', 'Autentikasi\LoginController@login')->name('login');
Route::middleware('CekLoginMiddleware')->group(function () {
    // dashboard
    Route::get('home', 'Admin\HomeController@index')->name('home');
    Route::get('/search', 'Admin\HomeController@search');
    Route::get('admin/pasang/ban/{id_ban}', 'Admin\HomeController@add')->name('pasangban');
    Route::post('admin/pasangban/{id_ban}', 'Admin\HomeController@pasang')->name('pasang');

    //Sopir
    Route::get('admin/data/sopir', 'Admin\SopirController@index')->name('sopir');
    Route::get('admin/tambah/sopir', 'Admin\SopirController@add')->name('tambahsopir');
    Route::post('admin/simpan/sopir', 'Admin\SopirController@store')->name('simpansopir');
    Route::delete('admin/hapus/sopir/{id_supir}', 'Admin\SopirController@delete')->name('hapussopir');
    Route::get('admin/edit/sopir/{id_supir}', 'Admin\SopirController@edit')->name('editsopir');
    Route::patch('admin/update/sopir/{id_supir}', 'Admin\SopirController@update')->name('updatesopir');

    //Mobil
    Route::get('admin/data/mobil', 'Admin\MobilController@index')->name('mobil');
    Route::get('admin/tambah/mobil', 'Admin\MobilController@add')->name('tambahmobil');
    Route::post('admin/simpan/mobil', 'Admin\MobilController@store')->name('simpanmobil');
    Route::get('admin/edit/mobil/{id_mobil}', 'Admin\MobilController@edit')->name('editmobil');
    Route::patch('admin/update/mobil/{id_mobil}', 'Admin\MobilController@update')->name('updatemobil');
    Route::delete('admin/hapus/mobil/{id_mobil}', 'Admin\MobilController@delete')->name('hapusmobil');

    //Type Ban
    Route::get('admin/data/typeban', 'Admin\TypeController@index')->name('type');
    Route::get('admin/tambah/typeban', 'Admin\TypeController@add')->name('tambahtype');
    Route::post('admin/simpan/typeban', 'Admin\TypeController@store')->name('simpantype');
    Route::delete('admin/hapus/typeban/{id_type}', 'Admin\TypeController@delete')->name('deletetype');
    Route::get('admin/edit/typeban/{id_type}', 'Admin\TypeController@edit')->name('edittype');
    Route::patch('admin/update/typeban/{id_type}', 'Admin\TypeController@update')->name('updatetype');

    //Merk Ban
    Route::resource('admin/merk-ban', 'Admin\MerkBanController');

    //Ban
    Route::get('admin/data/ban', 'Admin\BanController@index')->name('ban');
    Route::get('admin/tambah/ban', 'Admin\BanController@add')->name('tambahban');
    Route::post('admin/simpan/ban', 'Admin\BanController@store')->name('simpanban');
    Route::delete('admin/hapus/ban/{id_ban}', 'Admin\BanController@delete')->name('deleteban');
    Route::get('admin/edit/ban/{id_ban}', 'Admin\BanController@edit')->name('editban');
    Route::patch('admin/update/ban/{id_ban}', 'Admin\BanController@update')->name('updateban');

    //Manajemen Mobil
    Route::get('admin/data/kendaraan', 'Admin\ManajemenKendaraanController@index')->name('kendaraan');
    Route::get('admin/manajemen/kendaraan', 'Admin\ManajemenKendaraanController@add')->name('tambahkendaraan');
    Route::post('admin/simpan/kendaraan', 'Admin\ManajemenKendaraanController@store')->name('simpankendaraan');
    Route::delete('admin/delete/kendaraan/{id}', 'Admin\ManajemenKendaraanController@delete')->name('hapuskendaraan');

    //Manajemen Ban
    Route::get('admin/manajemen/ban', 'Admin\ManajemenBanController@index')->name('viewban');
    Route::get('admin/add/ban/{id_kendaraan}', 'Admin\ManajemenBanController@add')->name('addban');
    Route::post('admin/addban/{id_kendaraan}', 'Admin\ManajemenBanController@store')->name('storeban');
    Route::get('admin/accban/{id_ban}', 'Admin\ManajemenBanController@accban')->name('accban');
    Route::get('admin/copotban/{id_ban}', 'Admin\ManajemenBanController@copotban')->name('copotban');
    Route::get('/ban/detail/{id}', 'Admin\ManajemenBanController@detail');

    Route::post('/pasang-ban', 'Admin\ManajemenBanController@pasang');
    Route::post('/copot-ban', 'Admin\ManajemenBanController@copot');

    // pemakaian
    Route::get('/pemakaian-ban/pengambilan-ban', 'Admin\PemakaianBanController@pengambilan');
    // pengembalian
    Route::get('/pemakaian-ban/pengembalian-ban', 'Admin\PemakaianBanController@pengembalian');

    Route::get('logout', 'Autentikasi\LoginController@logout')->name('logout');
});
