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

    public function getImportacion()
    {
        $Vendors = Vendor::where('activo', 'S')->orderBy('id', 'asc')->get();
        $ShipTo = ShipTo::where('activo', 'S')->orderBy('id', 'asc')->get();
        $ListPO = view_master_ordenes_compras::where('activo', 'S')->orderBy('id', 'asc')->get();

        return view('Importacion.Home', compact('Vendors','ShipTo','ListPO'));
        
    }
    public function getDetalles()
    {     
        return view('Importacion.Detalles');
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

    //GUARDA LA INFORMACION DE LA NUEVA PO
    public function SaveNewPO(Request $request)
    {
        $response = OrdendesCompras::SaveNewPO($request);
        return response()->json($response);
    }




}