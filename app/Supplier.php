<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = ['nama_supplier', 'nomor_kontrak', 'alamat', 'telp'];

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
