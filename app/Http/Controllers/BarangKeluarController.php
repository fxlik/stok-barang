<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class BarangKeluarController extends Controller
{
    public function barangKeluar($proyek_id){
        $transaksi = \App\Transaksi::with('barang_masuk')->where('proyek_id', $proyek_id)->where('tipe', 0)->orderBy('tgl', 'DESC')->get();
        $proyek = \App\Proyek::where('id', $proyek_id)->first();
        return view('barangKeluar', compact('proyek', 'transaksi'));
    }

    public function kelolaTransaksiKeluar($proyek_id, $id){
        $barang = \App\Barang::all();
        $barangKeluar = \App\BarangKeluar::with('transaksi', 'barang')->where('transaksi_id', $id)->get();
        $transaksi = \App\Transaksi::with('barang_keluar')->where('proyek_id', $proyek_id)->where('id', $id)->orderBy('tgl', 'DESC')->first();
        $proyek = \App\Proyek::where('id', $proyek_id)->first();
        // return $barangMasuk;
        return view('transaksiKeluar', compact('barangKeluar', 'transaksi', 'proyek', 'barang'));  
    }

    public function submitTransaksiKeluar(Request $request){
        foreach($request->jumlah as $key => $value){
            $input = array(
                'transaksi_id' => $request->transaksi_id,
                'barang_id' => $request->barang[$key],
                'jumlah' =>$value
            );
            $input_array[] = $input;
        }
        \App\BarangKeluar::insert($input_array);
    	return back();
    }

    public function deleteBarangKeluar($barangKeluar_id){
        $barang_keluar = \App\BarangKeluar::where('id', $barangKeluar_id)->first();
        $barang_keluar->delete();
        return back();
    }

    public function cetakLaporanKeluar(Request $request){
        $nama_proyek = $request->nama_proyek;
        $jenis = $request->jenis;
        $kode_transaksi = $request->kode_transaksi;
        $tgl = $request->tgl;
        $barangKeluar = \App\BarangKeluar::with('transaksi', 'barang')->where('transaksi_id', $request->transaksi_id)->get();
        $pdf = PDF::loadView('cetak.laporan-barang-keluar', compact('nama_proyek', 'jenis', 'kode_transaksi', 'tgl', 'barangKeluar'))
            ->setPaper('a4', 'potrait');
            // ->setWarnings(false);
        return $pdf->stream('laporan-barang-keluar-'.$kode_transaksi.'.pdf');
    }
}
