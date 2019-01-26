<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $fillable = ['barang_id', 'supplier_id', 'tgl_keluar', 'jumlah'];

    public $timestamps = false;

    public function barang()
    {
    	return $this->hasMany('App\Barang');
    }

    public function supplier()
    {
    	return $this->hasMany('App\Supplier');
    }
    
}
