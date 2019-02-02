<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyek;

class ProyekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function tampilProyek(){
        $proyek = Proyek::get();
        // return $barang;
        return view('proyek', compact('proyek'));
    }

    public function postProyek(Request $request){
        $proyek =new Proyek();
        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->save();
        return redirect()->back();
    }

    public function deleteProyek($id_proyek){
        $proyek = Proyek::where('id', $id_proyek)->first();
        $proyek->delete();
        return redirect()->back();
    }

    public function updateProyek(Request $request){
        $editProyek = Proyek::find($request->proyek_id);
        $nama_proyek = $request->nama_proyeke;
        $editProyek->update([
            'nama_proyek' => $nama_proyek
        ]);

        return back();
    }
}
