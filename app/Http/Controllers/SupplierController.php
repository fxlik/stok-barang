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
}
