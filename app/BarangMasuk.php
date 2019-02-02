<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $fillable = ['transaksi_id', 'barang_id', 'supplier_id', 'jumlah'];

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
