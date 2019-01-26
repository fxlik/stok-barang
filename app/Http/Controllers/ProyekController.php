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
}
