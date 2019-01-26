<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    protected $fillable = ['barang_id', 'supplier_id', 'tgl_keluar', 'jumlah', 'proyek_id'];

    public $timestamps = false;
    
    public function barang()
    {
    	return $this->hasMany('App\Barang');
    }

    public function supplier()
    {
    	return $this->hasMany('App\Supplier');
    }

    public function proyek()
    {
    	return $this->hasMany('App\Proyek');
    }

}
