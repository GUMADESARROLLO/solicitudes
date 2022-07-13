<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\ShipTo;
use App\Models\OrdendesCompras;
use App\Models\view_master_ordenes_compras;



class ImportacionController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function getProduct()
    {     
        return view('Importacion.Product');
    }

    /**
     * Toda Las Rutas para Vendedor     
     */

    //OPTIENE TODA LA LISTA DE PROVEEDORES
    public function getVendor()
    {     
        $Vendors = Vendor::where('activo', 'S')->orderBy('id', 'asc')->get();
        return view('Importacion.Vendor', compact('Vendors'));
    }
    //OBTIENE EL VALOR DE UN PROVEEDOR
    public function getOneVendor($ID)
    {     
        $Vendors = Vendor::where('ID', $ID)->orderBy('id', 'asc')->get();
        return response()->json($Vendors);
    }
    //GUARDA LA INFORMACION DEL VENDEDOR
    public function SaveVendor(Request $request)
    {
        $response = Vendor::SaveVendor($request);
        return response()->json($response);
    }
    // CAMBIA EL ESTADO DEL VENDODOR EN LA A INACTIVO
    public function DeleteVendor(Request $request)
    {
        $response = Vendor::DeleteVendor($request);
        return response()->json($response);
    }

    /**
     * Toda Las Rutas para Ship tO     
     */

    //OPTIENE TODA LA LISTA DE PROVEEDORES
    public function getShipTo()
    {     
        $ShipTo = ShipTo::where('activo', 'S')->orderBy('id', 'asc')->get();
        return view('Importacion.Shipto', compact('ShipTo'));
    }
    //OBTIENE EL VALOR DE UN PROVEEDOR
    public function getOneShipTo($ID)
    {     
        $Vendors = ShipTo::where('ID', $ID)->orderBy('id', 'asc')->get();
        return response()->json($Vendors);
    }
    //GUARDA LA INFORMACION DEL VENDEDOR
    public function SaveShipTo(Request $request)
    {
        $response = ShipTo::SaveShipTo($request);
        return response()->json($response);
    }
    // CAMBIA EL ESTADO DEL VENDODOR EN LA A INACTIVO
    public function DeleteShipTo(Request $request)
    {
        $response = ShipTo::DeleteShipTo($request);
        return response()->json($response);
    }


    /**
     * Toda Las Rutas las ordenes de compras
     */
    // MUESTRA TODA LA INFORMACION DE LA PANTALLA DE INICIO
    public function getImportacion()
    {
        $Vendors = Vendor::where('activo', 'S')->orderBy('id', 'asc')->get();
        $ShipTo = ShipTo::where('activo', 'S')->orderBy('id', 'asc')->get();
        $Ordenes = OrdendesCompras::where('activo', 'S')->get();

        return view('Importacion.Home', compact('Vendors','ShipTo','Ordenes'));
        
    }

    //MUESTRA LA INFORMACION SOBRE LOS DETALLS DE LA ORDEN
    public function getDetalles($IdOrden)
    {   
        

        $Orden_Detalles = OrdendesCompras::where('activo', 'S')->where('id',$IdOrden)->get();
        return view('Importacion.Detalles', compact('Orden_Detalles'));
    }
    //GUARDA LA INFORMACION DE LA NUEVA PO
    public function SaveNewPO(Request $request)
    {
        $response = OrdendesCompras::SaveNewPO($request);
        return response()->json($response);
    }
    // CAMBIA EL ESTADO DEL VENDODOR EN LA A INACTIVO
    public function DeletePO(Request $request)
    {
        $response = OrdendesCompras::DeletePO($request);
        return response()->json($response);
    }
    // RECIBE LAS PETICIONES DEL HOME POR RANGOS DE FECHAS
    public function getOrdenesRangeDates(Request $request)
    {
        $response = OrdendesCompras::getOrdenesRangeDates($request);
        return response()->json($response);
    }




}