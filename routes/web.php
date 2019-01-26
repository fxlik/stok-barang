<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/barang', 'BarangController@tampilBarang')->name('barang.tampil');
Route::post('postBarang', 'BarangController@postBarang')->name('barang.post');
Route::get('/supplier', 'SupplierController@tampilSupplier')->name('supplier.tampil');
Route::get('/proyek', 'ProyekController@tampilProyek')->name('proyek.tampil');
