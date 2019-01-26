<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $fillable = ['nama_proyek'];

    public $timestamps = false;

    public function barang_keluar()
    {
    	return $this->belongTo('App\BarangKeluar');
    }
}
