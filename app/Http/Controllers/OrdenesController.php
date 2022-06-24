<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articulos;
use App\Models\Solicitud;


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
    public function getSolicitudes(Request $request)
    {
        $Solci[] = array(
            'Counteo' => solicitud::getSolicitudesCount($request),
            'data' => solicitud::getSolicitudes($request)
        );

        return response()->json($Solci);

    }
    public function getOrdenesDetalles($id_Solicitud)
    {
        $Solicitud_Detalles = solicitud::getSolicitudes_Detalles($id_Solicitud);
        
        return view('Ordenes.OrdenesDetalles',compact('Solicitud_Detalles'));
    }
    public function Delete_Ingreso($id_ingreso,$id_solicitud)
    {
        Solicitud::Delete_Ingreso($id_ingreso);
        $Solicitud_Detalles = solicitud::getSolicitudes_Detalles($id_solicitud);        
        return view('Ordenes.OrdenesDetalles',compact('Solicitud_Detalles'));
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

    public function getArticulos()
    {
        $response = Articulos::getArticulos();
        return response()->json($response);
    }
    public function getGuardarSolicitud(Request $request)
    {
        $response = Solicitud::GuardarSolicitud($request);
        return response()->json($response);
    }
    public function postGuardarExcel(Request $request)
    {
        $response = Solicitud::GuardarExcel($request);
        return response()->json($response);
    }
    public function postGuardarComment(Request $request)
    {
        $response = Solicitud::postGuardarComment($request);
        return response()->json($response);
    }
    public function getComment(Request $request)
    {
        $response = Solicitud::getComment($request);
        return response()->json($response);
    }
    public function Update(Request $request)
    {
        $response = Solicitud::getUpdate($request);
        return response()->json($response);
    }
    public function DeleteComment(Request $request)
    {
        $response = Solicitud::DeleteComment($request);
        return response()->json($response);
    }

    
}
