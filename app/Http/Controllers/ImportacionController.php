<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\ShipTo;
use App\Models\OrdendesCompras;
use App\Models\ArticulosUMK;
use App\Models\ProductoType;
use App\Models\Productos;
use App\Models\OrdenCompraDetalle;
use App\Models\Vias;
use App\Models\EstadosPagos;
use App\Models\TipoCarga;
use App\Models\EstadoOrden;


class ImportacionController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
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
      
        
        return view('Importacion.Home', compact('Vendors','ShipTo'));
        
    }

    //MUESTRA LA INFORMACION SOBRE LOS DETALLS DE LA ORDEN
    public function getDetalles($IdOrden)
    {   
        $Productos          = Productos::where('activo', 'S')->get();
        $Orden              = OrdendesCompras::find($IdOrden);
        $EstadosProducto    = EstadoOrden::where('activo', 'S')->where('belongs', 'PD')->get();
        return view('Importacion.Detalles', compact('Orden','Productos','EstadosProducto'));
    }
    //GUARDA LA INFORMACION DE LA NUEVA PO
    public function SaveNewPO(Request $request)
    {
        $response = OrdendesCompras::SaveNewPO($request);
        return response()->json($response);
    }

     // TODO : CAMBIAR NOMBRE MARYAN DEL FUTURO
    public function DeletePO(Request $request)
    {
        $response = OrdendesCompras::DeletePO($request);
        return response()->json($response);
    }
     // TODO : CAMBIAR NOMBRE MARYAN DEL FUTURO
    public function dtaSelect(Request $request)
    {
        $DataSelects[] = array(
            'Vias'          => Vias::where('activo','S')->get(),
            'EstadosPagos'  => EstadosPagos::where('activo','S')->get(),
            'TipoCarga'     => TipoCarga::where('activo','S')->get(),
        );
        return response()->json($DataSelects);
    }

    // CAMBIA EL ESTADO DEL VENDODOR EN LA A INACTIVO
    public function UpdateImportacion(Request $request)
    {
        $response = OrdendesCompras::UpdateImportacion($request);
        return response()->json($response);
    }
    // RECIBE LAS PETICIONES DEL HOME POR RANGOS DE FECHAS
    public function getOrdenesRangeDates(Request $request)
    {
        $response = OrdendesCompras::getOrdenesRangeDates($request);
        return response()->json($response);
    }
    //OBTIENE EL VALOR DE UN PRODUCTO EN LA ORDEN
    public function getInfoLinea(Request $request)
    {     
        $idProducto         = $request->input('id_linea');
        $LineaProducto      = OrdenCompraDetalle::where('id', $idProducto)->orderBy('id', 'asc')->get();
        return response()->json($LineaProducto);
    }
    // CAMBIA EL ESTADO DEL PRODUCTO EN LA A INACTIVO
    public function delInfoLinea(Request $request)
    {
        $response = OrdenCompraDetalle::delInfoLinea($request);
        return response()->json($response);
    }

    /**
     * Toda Las Rutas para los productos de UNIMARK
     */
    // MUESTRA TODA LA LISTA DE ARTICULOS QUE CONTIENE UNIMAK
    public function getProduct()
    {  
        $Tipos = ProductoType::where('activo', 'S')->get();
        $Articulos = ArticulosUMK::getArticulos();
        $Productos = Productos::where('activo', 'S')->get();
        return view('Importacion.Product', compact('Articulos','Tipos','Productos'));         
    }
    //GUARDA LA INFORMACION DE LA NUEVA PO
    public function SaveProducto(Request $request)
    {
        $response = Productos::SaveProducto($request);
        return response()->json($response);
    }
    //GUARDA LOS ARTICULOS AGREGADOS A LA PO
    public function AddProductPO(Request $request)
    {
        $response = OrdenCompraDetalle::AddProductPO($request);
        return response()->json($response);
    }
    // CAMBIA EL ESTADO DEL PRODUCTO EN LA A INACTIVO
    public function DeleteProducto(Request $request)
    {
        $response = Productos::DeleteProducto($request);
        return response()->json($response);
    }
    //OBTIENE EL VALOR DE UN PRODUCTO
    public function getOneProducto($ID)
    {     
        $Vendors = Productos::where('ID', $ID)->orderBy('id', 'asc')->get();
        return response()->json($Vendors);
    }



}