<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImportacionesController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getImportaciones()
    {
        return view('Importaciones.home');
    }
    public function getDetalles()
    {
        return view('Importaciones.importacinesDetalles');
    }
}