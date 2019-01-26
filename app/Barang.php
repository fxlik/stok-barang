<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['nama_barang', 'satuan'];

    public $timestamps = false;

    public function barang_masuk()
    {
    	return $this->belongTo('App\BarangMasuk');
    }

    public function barang_keluar()
    {
    	return $this->belongTo('App\BarangKeluar');
    }
}
