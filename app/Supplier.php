<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = ['kode_supplier', 'nama_supplier', 'nomor_kontrak', 'alamat', 'telp'];

    public $timestamps = false;

    public function barang_masuk()
    {
    	return $this->hasMany('App\BarangMasuk');
    }
}
