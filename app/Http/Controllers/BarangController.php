<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use App\Barang;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tampilBarang(){
        $barang = Barang::get();
        // return $barang;
        return view('barang', compact('barang'));
    }

    public function postBarang(Request $request){
        $barangg =new Barang();
        $barangg->kode_barang = $request->kode_barang;
        $barangg->nama_barang = $request->nama_barang;
        $barangg->satuan = $request->satuan;
        $barangg->jumlah_kebutuhan = $request->jumlah_kebutuhan;
        $barangg->harga_satuan = $request->harga_satuan;
        $barangg->save();
        return redirect()->back();
    }

    public function deleteBarang($id_barang){
        $barang = Barang::where('id', $id_barang)->first();
        $barang->delete();
        return redirect()->back();
    }

    public function updateBarang(Request $request){
        $editBarang = Barang::find($request->barang_id);
        $kode_barange = $request->kode_barange;
        $nama_barange = $request->nama_barange;
        $satuane = $request->satuane;
        $jumlah_kebutuhane = $request->jumlah_kebutuhane;
        $harga_satuane = $request->harga_satuane;
        $editBarang->update([
            'kode_barang' => $kode_barange,
            'nama_barang' => $nama_barange,
            'satuan' => $satuane,
            'jumlah_kebutuhan' => $jumlah_kebutuhane,
            'harga_satuan' => $harga_satuane
        ]);

        return back();
    }

}
