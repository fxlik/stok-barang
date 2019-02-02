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

// manajemen barang
Route::get('/barang', 'BarangController@tampilBarang')->name('barang.tampil');
Route::post('postBarang', 'BarangController@postBarang')->name('barang.post');
Route::post('updateBarang', 'BarangController@updateBarang')->name('barang.update');
Route::get('deleteBarang/{id_barang}', 'BarangController@deleteBarang')->name('barang.delete');

// manajemen proyek
Route::get('/proyek', 'ProyekController@tampilProyek')->name('proyek.tampil');
Route::post('postProyek', 'ProyekController@postProyek')->name('proyek.post');
Route::post('updateProyek', 'ProyekController@updateProyek')->name('proyek.update');
Route::get('deleteProyek/{id_proyek}', 'ProyekController@deleteProyek')->name('proyek.delete');

// manajemen supplier
Route::get('/supplier', 'SupplierController@tampilSupplier')->name('supplier.tampil');
Route::post('postSupplier', 'SupplierController@postSupplier')->name('supplier.post');
Route::post('updateSupplier', 'SupplierController@updateSupplier')->name('supplier.update');
Route::get('deleteSupplier/{id_supplier}', 'SupplierController@deleteSupplier')->name('supplier.delete');

// Manajemen barang Masuk
Route::get('/proyek/barang-masuk/{proyek_id}', 'BarangMasukController@detailProyek')->name('barangMasuk.tampil');
Route::get('/proyek/barang-keluar/{proyek_id}', 'BarangKeluarController@barangKeluar')->name('barangKeluar.tampil');

//Manajemen Transaksi
Route::post('postTransaksiMasuk', 'TransaksiController@transaksiMasukBaru')->name('transaksi.post');
Route::post('postTransaksiKeluar', 'TransaksiController@transaksiKeluarBaru')->name('transaksiKeluar.post');
Route::get('/proyek/barang-masuk/{proyek_id}/{id}/kelola-transaksi', 'BarangMasukController@kelolaTransaksiMasuk')->name('kelolaTransaksi.masuk');
Route::get('/proyek/barang-keluar/{proyek_id}/{id}/kelola-transaksi', 'BarangKeluarController@kelolaTransaksiKeluar')->name('kelolaTransaksi.keluar');


// delete transaksi masuk @TransaksiController
// hapus transaksi masuk
Route::get('deleteTransaksiMasuk/{transaksi_id}', 'TransaksiController@HapusTransaksiMasuk')->name('transaksiMasuk.delete');
// hapus transaksi keluar
Route::get('deleteTransaksiKeluar/{transaksi_id}', 'TransaksiController@HapusTransaksiKeluar')->name('transaksiKeluar.delete');


// transaksi barang masuk
Route::post('postTransaksiBarangMasuk', 'BarangMasukController@submitTransaksiMasuk')->name('submitTransaksiMasuk.post');
Route::get('deleteBarangMasuk/{barangMasuk_id}', 'BarangMasukController@deleteBarangMasuk')->name('barangMasuk.delete');
// cetak laporan barang masuk
Route::post('cetakBarangMasuk', 'BarangMasukController@cetakLaporanMasuk')->name('barangMasuk.cetak');

// transaksi barang keluar
Route::post('postTransaksiBarangKeluar', 'BarangKeluarController@submitTransaksiKeluar')->name('submitTransaksiKeluar.post');
Route::get('deleteBarangKeluar/{barangKeluar_id}', 'BarangKeluarController@deleteBarangKeluar')->name('barangKeluar.delete');
// cetak laporan barang keluar
Route::post('cetakBarangKeluar', 'BarangKeluarController@cetakLaporanKeluar')->name('barangKeluar.cetak');