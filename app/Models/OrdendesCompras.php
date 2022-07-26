<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class OrdendesCompras extends Model {
    protected $table = "tbl_imp_importacion";
    protected $fillable = ['id','num_po','id_shipto','id_vendor','id_shipto','activo','created_at'];

    public function proveedor(){
        return $this->belongsTo('App\Models\ShipTo','id_shipto');
    }
    public function Vias(){
        return $this->belongsTo('App\Models\Vias','id_via');
    }
    public function EstadoPago(){
        return $this->belongsTo('App\Models\EstadosPagos','id_estados_pagos');
    }
    public function TipoCarga(){
        return $this->belongsTo('App\Models\TipoCarga','tipo_carga');
    }

    public function Estado(){
        return $this->belongsTo('App\Models\EstadoOrden','id_estado_orden','id');
    }
    
    public function Vendor(){
        return $this->belongsTo('App\Models\Vendor','id_vendor');
    }

    public function Detalles(){
        return $this->hasMany('App\Models\OrdenCompraDetalle','id_importacion','id');
    }

    
    public static function SaveNewPO(Request $request) {
        if ($request->ajax()) {
            try {

                $num_new_po    = $request->input('num_new_po');
                $slc_vendor    = $request->input('slc_vendor');
                $slc_shipto    = $request->input('slc_shipto');

                $obj_new_po = new OrdendesCompras();   
                $obj_new_po->num_po     = $num_new_po;                 
                $obj_new_po->id_vendor  = $slc_vendor;                    
                $obj_new_po->id_shipto  = $slc_shipto;                    
                $obj_new_po->activo     = 'S';
                $obj_new_po->save();

                $id_insert = $obj_new_po->id;

                return response()->json($id_insert);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public static function DeletePO(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   OrdendesCompras::where('id',  $id)->update([
                    "activo" => 'N',
                ]);

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }
    public static function UpdateImportacion(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id         = $request->input('id');
                $ori        = $request->input('origen');
                $valor      = $request->input('valor');
                $Campo      = $request->input('Campo');

                $array_Campos = ($ori == 0) ? array("factura", "recibo", "id_via", "","id_estados_pagos",'tipo_carga') : array("fecha_despacho", "fecha_estimada", "fecha_factura", "fecha_orden_compra") ;
                
                $response =   OrdendesCompras::where('id',  $id)->update([
                    $array_Campos[$Campo] => $valor,
                ]);

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }
    public static function getOrdenesRangeDates(Request $request)
    {
        DB::enableQueryLog();
        if ($request->ajax()) {
            try {
                $start   = $request->input('DateStart');
                $end     = $request->input('DateEnds');

                $start   = $start.' 00:00:00';
                $end     = $end.' 23:59:59';

                $response = OrdendesCompras::where('activo', 'S')->whereBetween('created_at', [$start, $end])->get();

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }

}