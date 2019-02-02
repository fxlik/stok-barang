<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class BarangMasukController extends Controller
{
    public function tampilBM(){
        return view('barangMasuk');
    }

    public function detailProyek($proyek_id){
        $transaksi = \App\Transaksi::with('barang_masuk')->where('proyek_id', $proyek_id)->where('tipe', 1)->orderBy('tgl', 'DESC')->get();
        $proyek = \App\Proyek::where('id', $proyek_id)->first();
        // return $transaksi;
        return view('barangMasuk', compact('proyek', 'transaksi'));
    }

    public function kelolaTransaksiMasuk($proyek_id, $id){
        $barang = \App\Barang::all();
        $supplier = \App\Supplier::all();
        $barangMasuk = \App\BarangMasuk::with('transaksi', 'barang', 'supplier')->where('transaksi_id', $id)->get();
        $transaksi = \App\Transaksi::with('barang_masuk')->where('proyek_id', $proyek_id)->where('id', $id)->orderBy('tgl', 'DESC')->first();
        $proyek = \App\Proyek::where('id', $proyek_id)->first();
        // return $barangMasuk;
        return view('transaksiMasuk', compact('barangMasuk', 'transaksi', 'proyek', 'barang', 'supplier'));  
    }

    public function submitTransaksiMasuk(Request $request){
        foreach($request->jumlah as $key => $value){
            $input = array(
                'transaksi_id' => $request->transaksi_id,
                'barang_id' => $request->barang[$key],
                'supplier_id' => $request->supplier[$key],
                'jumlah' =>$value
            );
            $input_array[] = $input;
        }
        \App\BarangMasuk::insert($input_array);
    	return back();
    }

    public function deleteBarangMasuk($barangMasuk_id){
        $barang_masuk = \App\BarangMasuk::where('id', $barangMasuk_id)->first();
        $barang_masuk->delete();
        return back();
    }

    public function cetakLaporanMasuk(Request $request){
        $nama_proyek = $request->nama_proyek;
        $jenis = $request->jenis;
        $kode_transaksi = $request->kode_transaksi;
        $tgl = $request->tgl;
        $barangMasuk = \App\BarangMasuk::with('transaksi', 'barang', 'supplier')->where('transaksi_id', $request->transaksi_id)->get();
        $pdf = PDF::loadView('cetak.laporan-barang-masuk', compact('nama_proyek', 'jenis', 'kode_transaksi', 'tgl', 'barangMasuk'))
            ->setPaper('a4', 'potrait');
            // ->setWarnings(false);
        return $pdf->stream('laporan-barang-masuk-'.$kode_transaksi.'.pdf');
    }
}
