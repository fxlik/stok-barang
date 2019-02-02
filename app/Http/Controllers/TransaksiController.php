<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function transaksiMasukBaru(Request $request){
        $transaksi = new \App\Transaksi();
        $generate_kode = "TBMAS".$request->proyek_id."IN".rand(1000, 9999);
        $transaksi->proyek_id = $request->proyek_id;
        $transaksi->kode_transaksi = $generate_kode;
        $transaksi->tgl = date("Y-m-d", strtotime($request->tgl));
        $transaksi->tipe = 1; //kalau masuk kode transaksi 1
        $transaksi->save();
        return back();
    }

    public function HapusTransaksiMasuk($transaksi_id){
        $transaksiMasuk = \App\Transaksi::where('id', $transaksi_id)->first();
        $transaksiMasuk->destroy();
        return redirect()->back();
    }

    public function transaksiKeluarBaru(Request $request){
        $transaksi = new \App\Transaksi();
        $generate_kode = "TBKEL".$request->proyek_id."OT".rand(1000, 9999);
        $transaksi->proyek_id = $request->proyek_id;
        $transaksi->kode_transaksi = $generate_kode;
        $transaksi->tgl = date("Y-m-d", strtotime($request->tgl));
        $transaksi->tipe = 0; //kalau keluar kode transaksi 0
        $transaksi->save();
        return back();
    }

    public function HapusTransaksiKeluar($transaksi_id){
        $transaksiKeluar = \App\Transaksi::where('id', $transaksi_id)->first();
        $transaksiKeluar->destroy();
        return redirect()->back();
    }
}
