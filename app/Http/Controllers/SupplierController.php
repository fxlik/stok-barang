<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tampilSupplier(){
        $sup = Supplier::get();
        // return $barang;
        return view('supplier', compact('sup'));
    }

    public function postSupplier(Request $request){
        $supplier =new Supplier();
        $supplier->kode_supplier = $request->kode_supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->nomor_kontrak = $request->nomor_kontrak;
        $supplier->alamat = $request->alamat;
        $supplier->telp = $request->telp;
        $supplier->save();
        return redirect()->back();
    }

    public function deleteSupplier($id_supplier){
        $supplier = Supplier::where('id', $id_supplier)->first();
        $supplier->delete();
        return redirect()->back();
    }

    public function updateSupplier(Request $request){
        $editSupplier = Supplier::find($request->supplier_id);
        // ambil data dari form
        $kode_supplier = $request->kode_suppliere;
        $nama_supplier = $request->nama_suppliere;
        $nomor_kontrak = $request->nomor_kontrake;
        $alamat = $request->alamate;
        $telp = $request->telpe;
        $editSupplier->update([
            'kode_supplier' => $kode_supplier,
            'nama_supplier' => $nama_supplier,
            'nomor_kontrak' => $nomor_kontrak,
            'alamat'        => $alamat,
            'telp'          => $telp
        ]);

        return back();
    }
}
