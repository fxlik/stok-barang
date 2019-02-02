<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['proyek_id', 'kode_transaksi', 'tgl'];

    public $timestamps = false;

    public function barang_masuk()
    {
    	return $this->hasMany('App\BarangMasuk');
    }

    public function barang_keluar()
    {
    	return $this->hasMany('App\BarangKeluar');
    }

    public function proyek(){
        return $this->belongsTo('App\Proyek');
    }
}
