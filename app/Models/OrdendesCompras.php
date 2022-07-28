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

    public function ttMific() {
        return $this->Detalles()->selectRaw('mific,count(mific) hit')->groupBy('id_importacion','mific');
    }
    public function ttRegencia() {
        return $this->Detalles()->selectRaw('regencia,count(regencia) hit')->groupBy('id_importacion','regencia');
    }
    public function ttMinsa() {
        return $this->Detalles()->selectRaw('minsa,count(minsa) hit')->groupBy('id_importacion','minsa');
    }
    public static function SaveNewPO(Request $request) {
        if ($request->ajax()) {
            try {

                $num_new_po             = $request->input('num_new_po');
                $slc_vendor             = $request->input('slc_vendor');
                $slc_shipto             = $request->input('slc_shipto');

                $obj_new_po             = new OrdendesCompras();   
                $obj_new_po->num_po     = $num_new_po;                 
                $obj_new_po->id_vendor  = $slc_vendor;                    
                $obj_new_po->id_shipto  = $slc_shipto;
                
                
                $obj_new_po->activo     = 'S';
                $obj_new_po->id_estado_orden     = '1';
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
        //DB::enableQueryLog();
        if ($request->ajax()) {
            try {
                $response = array();
                $i = 0;
                $start   = $request->input('DateStart');
                $end     = $request->input('DateEnds');

                $start   = $start.' 00:00:00';
                $end     = $end.' 23:59:59';

                $Ordenes = OrdendesCompras::where('activo', 'S')->whereBetween('created_at', [$start, $end])->get();


           

                foreach($Ordenes as $o){
                    $response[$i]['id'] =  $o->id;
                    $response[$i]['num_po'] =  (!empty($o->num_po))? $o->num_po : 'N/D';
                    $response[$i]['factura'] =  (!empty($o->factura))? $o->factura : 'N/D';
                    $response[$i]['recibo'] =  (!empty($o->recibo))? $o->recibo: 'N/D';

                    $response[$i]['Vendor'] =  (!empty($o->Vendor->nombre_vendor))? $o->Vendor->nombre_vendor : 'N/D';
                    $response[$i]['proveedor'] =  (!empty($o->proveedor->nombre_shipto))? $o->proveedor->nombre_shipto : 'N/D';

                    $response[$i]['Vias'] =  (!empty($o->Vias->Descripcion))? $o->Vias->Descripcion : 'N/D';

                    $response[$i]['ttMific'] =  (!empty($o->ttMific))? $o->ttMific : 'N/D';
                    $response[$i]['ttRegencia'] =  (!empty($o->ttRegencia))? $o->ttRegencia : 'N/D';
                    $response[$i]['ttMinsa'] =  (!empty($o->ttMinsa))? $o->ttMinsa : 'N/D';

                    $response[$i]['TipoCarga'] =  (!empty($o->TipoCarga->Descripcion))? $o->TipoCarga->Descripcion : 'N/D';
                    $response[$i]['Estado'] =  (!empty($o->Estado->descripcion))? $o->Estado->descripcion : 'N/D'; 

                    $response[$i]['Fecha'] =  '0000/00/00';

                    $i++;
                }
                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }

}