<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['kode_barang', 'nama_barang', 'satuan', 'jumlah_kebutuhan', 'harga_satuan'];

    public $timestamps = false;

    public function barang_masuk()
    {
    	return $this->hasMany('App\BarangMasuk');
    }

    public function barang_keluar()
    {
    	return $this->hasMany('App\BarangKeluar');
    }
}
