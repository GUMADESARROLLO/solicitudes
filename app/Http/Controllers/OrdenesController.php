<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdenesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCatalogo()
    {
        return view('Ordenes.Catalogo');
    }
    public function getOrdenes()
    {
        return view('Ordenes.Ordenes');
    }
    public function getOrdenesDetalles()
    {
        return view('Ordenes.OrdenesDetalles');
    }
    public function getClientes()
    {
        return view('Ordenes.Clientes');
    }
    public function getCarrito()
    {
        return view('Ordenes.Carrito');
    }
    public function getResumen()
    {
        return view('Ordenes.Resumen');
    }

    
}
