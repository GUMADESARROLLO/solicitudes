<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportacionController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getImportacion()
    {
        return view('Importacion.Home');
    }
    public function getDetalles()
    {     
        return view('Importacion.Detalles');
    }
    public function getShipto()
    {     
        return view('Importacion.Shipto');
    }
    public function getVendor()
    {     
        return view('Importacion.Vendor');
    }
    public function getProduct()
    {     
        return view('Importacion.Product');
    }
}