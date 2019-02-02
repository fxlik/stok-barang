<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';
    protected $fillable = ['transaksi_id', 'barang_id', 'jumlah'];

    public $timestamps = false;
    
    public function barang()
    {
    	return $this->belongsTo('App\Barang');
    }

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }

    public function proyek()
    {
    	return $this->belongsTo('App\Proyek');
    }

    public function transaksi()
    {
    	return $this->belongsTo('App\Transaksi');
    }

}
