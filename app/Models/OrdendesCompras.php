<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class OrdendesCompras extends Model {
    protected $table = "tbl_imp_importacion";
    protected $fillable = ['id','num_po','Fecha','id_shipto','id_vendor','id_shipto','activo','created_at'];

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
    public static function SaveNewPO(Request $request) 
    {
        if ($request->ajax()) {
            try {

                $num_new_po             = $request->input('num_new_po');
                $slc_vendor             = $request->input('slc_vendor');
                $slc_shipto             = $request->input('slc_shipto');
                $dtaFecha               = $request->input('dtaFecha');



                $obj_new_po             = new OrdendesCompras();   
                $obj_new_po->num_po     = $num_new_po;                 
                $obj_new_po->id_vendor  = $slc_vendor;                    
                $obj_new_po->id_shipto  = $slc_shipto;

                if($dtaFecha !='N/D') $obj_new_po->Fecha  = $dtaFecha;
                if($dtaFecha !='N/D') $obj_new_po->fecha_orden_compra  = $dtaFecha;
                
                $obj_new_po->activo              = 'S';
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
        if ($request->ajax()) {
            try {
                $response = array();
                
                
                $start   = $request->input('DateStart');
                $end     = $request->input('DateEnds');

                $start   = $start.' 00:00:00';
                $end     = $end.' 23:59:59';

                $Ordenes = OrdendesCompras::where('activo', 'S')->whereBetween('created_at', [$start, $end])->get();

                $Detalle = OrdenesCompraRpt::whereBetween('created_at', [$start, $end])->get();
                


                $UnidadDeMedida = UNIDAD_DE_MEDIDA::getUnidadDeMedida()->toArray();
                $Proveedor      = PROVEEDOR::getProveedor()->toArray();
                $Laboratorio    = LABORATORIO::getLaboratorio()->toArray();
                //$MasterArtic    = Articulos_master::getArticulos()->toArray();
                

                $i = 0;
                foreach($Ordenes as $o){
                    
                    $response['RESUMEN'][$i]['id']         =  $o->id;
                    $response['RESUMEN'][$i]['num_po']     =  (!empty($o->num_po))? $o->num_po : 'N/D';
                    $response['RESUMEN'][$i]['factura']    =  (!empty($o->factura))? $o->factura : 'N/D';
                    $response['RESUMEN'][$i]['recibo']     =  (!empty($o->recibo))? $o->recibo: 'N/D';

                    $response['RESUMEN'][$i]['Vendor']     =  (!empty($o->Vendor->nombre_vendor))? $o->Vendor->nombre_vendor : 'N/D';
                    $response['RESUMEN'][$i]['proveedor']  =  (!empty($o->proveedor->nombre_shipto))? $o->proveedor->nombre_shipto : 'N/D';

                    $response['RESUMEN'][$i]['Vias']       =  (!empty($o->Vias->Descripcion))? $o->Vias->Descripcion : 'N/D';

                    $response['RESUMEN'][$i]['ttMific']    =  (!empty($o->ttMific))? $o->ttMific : 'N/D';
                    $response['RESUMEN'][$i]['ttRegencia'] =  (!empty($o->ttRegencia))? $o->ttRegencia : 'N/D';
                    $response['RESUMEN'][$i]['ttMinsa']    =  (!empty($o->ttMinsa))? $o->ttMinsa : 'N/D';

                    $response['RESUMEN'][$i]['TipoCarga']  =  (!empty($o->TipoCarga->Descripcion))? $o->TipoCarga->Descripcion : 'N/D';
                    $response['RESUMEN'][$i]['Estado']     =  (!empty($o->Estado->descripcion))? $o->Estado->descripcion : 'N/D'; 

                    $response['RESUMEN'][$i]['Fecha']      =  (!empty($o->fecha_orden_compra))? date('F d, Y', strtotime($o->fecha)) : 'N/D';

                    $i++;
                }

                $i = 0;
                foreach($Detalle as $d){

                    $und ='N/D';
                    $Lab ='N/D';
                    $pro ='N/D';
                    
                    if (!is_null($d->Clasificacion_1)) {
                        $und = array_search($d->Clasificacion_1, array_column($UnidadDeMedida, 'UNIDAD_MEDIDA'));                        
                        $und = $UnidadDeMedida[$und]['UNIDAD_MEDIDA'];
                    }

                    if (!is_null($d->Clasificacion_2)) {                        
                        $Lab = array_search($d->Clasificacion_2, array_column($Laboratorio, 'CLASIFICACION'));                        
                        $Lab = $Laboratorio[$Lab]['DESCRIPCION'];
                    }
                    if (!is_null($d->Clasificacion_3)) {
                        $pro = array_search($d->Clasificacion_3, array_column($Proveedor, 'PROVEEDOR'));                        
                        $pro = $Proveedor[$pro]['NOMBRE'];
                    }
                    
                    //TODO: RECUPERAR LA INFORMACION AHORA DESDE EL MASTER DE ARTICULO

                    


                    //TRANSITO UNIMARK (PRIVADO)
                    if($d->id_shipto ==3 && $d->id_mercado ==2)
                    {
                        $response['UMK_PRIVADO'][$i]['id']                     =  $d->id;
                        $response['UMK_PRIVADO'][$i]['id_po']                  =  $d->id_po;
                        $response['UMK_PRIVADO'][$i]['Articulo_exactus']       =  $d->Articulo_exactus;
                        $response['UMK_PRIVADO'][$i]['descripcion_corta']      =  $d->descripcion_corta;
                        $response['UMK_PRIVADO'][$i]['descripcion_larga']      =  $d->descripcion_larga;
                        $response['UMK_PRIVADO'][$i]['cantidad']               =  number_format($d->cantidad,0);
                        $response['UMK_PRIVADO'][$i]['Estado']                 =  $d->Estado;
                        $response['UMK_PRIVADO'][$i]['fecha_orden_compra']     =  $d->fecha_orden_compra;
                        $response['UMK_PRIVADO'][$i]['DiasAcumulados']         =  $d->DiasAcumulados;
                        $response['UMK_PRIVADO'][$i]['fecha_despacho']         =  $d->fecha_despacho;
                        $response['UMK_PRIVADO'][$i]['fecha_estimada']         =  $d->fecha_estimada;
                        $response['UMK_PRIVADO'][$i]['Via']                    =  $d->Via;
                        $response['UMK_PRIVADO'][$i]['num_po']                 =  $d->num_po;
                        $response['UMK_PRIVADO'][$i]['factura']                =  $d->factura;
                        $response['UMK_PRIVADO'][$i]['recibo']                 =  $d->recibo;
                        $response['UMK_PRIVADO'][$i]['id_mercado']             =  $d->id_mercado;
                        $response['UMK_PRIVADO'][$i]['id_shipto']              =  $d->id_shipto;
                        $response['UMK_PRIVADO'][$i]['descripcion']            =  $d->descripcion;
                        $response['UMK_PRIVADO'][$i]['minsa']                  =  $d->minsa;
                        $response['UMK_PRIVADO'][$i]['Commentario']            =  $d->Commentario;
                        $response['UMK_PRIVADO'][$i]['TieneVenta']             =  $d->TieneVenta;

                        $response['UMK_PRIVADO'][$i]['UND']             =  $und;
                        $response['UMK_PRIVADO'][$i]['LAB']             =  $Lab;
                        $response['UMK_PRIVADO'][$i]['PRO']             =  $pro;



                    }

                     //TRANSITO UNIMARK (MINSA)
                    if($d->id_shipto ==3 && $d->id_mercado ==1)
                    {

                        $response['UMK_MINSA'][$i]['id']                     =  $d->id;
                        $response['UMK_MINSA'][$i]['id_po']                  =  $d->id_po;
                        $response['UMK_MINSA'][$i]['Articulo_exactus']       =  $d->Articulo_exactus;
                        $response['UMK_MINSA'][$i]['descripcion_corta']      =  $d->descripcion_corta;
                        $response['UMK_MINSA'][$i]['descripcion_larga']      =  $d->descripcion_larga;
                        $response['UMK_MINSA'][$i]['cantidad']               =  number_format($d->cantidad,0);
                        $response['UMK_MINSA'][$i]['Estado']                 =  $d->Estado;
                        $response['UMK_MINSA'][$i]['fecha_orden_compra']     =  $d->fecha_orden_compra;
                        $response['UMK_MINSA'][$i]['DiasAcumulados']         =  $d->DiasAcumulados;
                        $response['UMK_MINSA'][$i]['fecha_despacho']         =  $d->fecha_despacho;
                        $response['UMK_MINSA'][$i]['fecha_estimada']         =  $d->fecha_estimada;
                        $response['UMK_MINSA'][$i]['Via']                    =  $d->Via;
                        $response['UMK_MINSA'][$i]['num_po']                 =  $d->num_po;
                        $response['UMK_MINSA'][$i]['factura']                =  $d->factura;
                        $response['UMK_MINSA'][$i]['recibo']                 =  $d->recibo;
                        $response['UMK_MINSA'][$i]['id_mercado']             =  $d->id_mercado;
                        $response['UMK_MINSA'][$i]['id_shipto']              =  $d->id_shipto;
                        $response['UMK_MINSA'][$i]['descripcion']            =  $d->descripcion;
                        $response['UMK_MINSA'][$i]['minsa']                  =  $d->minsa;
                        $response['UMK_MINSA'][$i]['Commentario']            =  $d->Commentario;
                        $response['UMK_MINSA'][$i]['TieneVenta']             =  $d->TieneVenta;

                        $response['UMK_MINSA'][$i]['UND']             =  $und;
                        $response['UMK_MINSA'][$i]['LAB']             =  $Lab;
                        $response['UMK_MINSA'][$i]['PRO']             =  $pro;

                    }

                     //TRANSITO GUMA (PRIVADO)
                    if($d->id_shipto ==2 && $d->id_mercado ==2)
                    {

                        $response['GUMA_PRIVADO'][$i]['id']                     =  $d->id;
                        $response['GUMA_PRIVADO'][$i]['id_po']                  =  $d->id_po;
                        $response['GUMA_PRIVADO'][$i]['Articulo_exactus']       =  $d->Articulo_exactus;
                        $response['GUMA_PRIVADO'][$i]['descripcion_corta']      =  $d->descripcion_corta;
                        $response['GUMA_PRIVADO'][$i]['descripcion_larga']      =  $d->descripcion_larga;
                        $response['GUMA_PRIVADO'][$i]['cantidad']               =  number_format($d->cantidad,0);
                        $response['GUMA_PRIVADO'][$i]['Estado']                 =  $d->Estado;
                        $response['GUMA_PRIVADO'][$i]['fecha_orden_compra']     =  $d->fecha_orden_compra;
                        $response['GUMA_PRIVADO'][$i]['DiasAcumulados']         =  $d->DiasAcumulados;
                        $response['GUMA_PRIVADO'][$i]['fecha_despacho']         =  $d->fecha_despacho;
                        $response['GUMA_PRIVADO'][$i]['fecha_estimada']         =  $d->fecha_estimada;
                        $response['GUMA_PRIVADO'][$i]['Via']                    =  $d->Via;
                        $response['GUMA_PRIVADO'][$i]['num_po']                 =  $d->num_po;
                        $response['GUMA_PRIVADO'][$i]['factura']                =  $d->factura;
                        $response['GUMA_PRIVADO'][$i]['recibo']                 =  $d->recibo;
                        $response['GUMA_PRIVADO'][$i]['id_mercado']             =  $d->id_mercado;
                        $response['GUMA_PRIVADO'][$i]['id_shipto']              =  $d->id_shipto;
                        $response['GUMA_PRIVADO'][$i]['descripcion']            =  $d->descripcion;
                        $response['GUMA_PRIVADO'][$i]['minsa']                  =  $d->minsa;
                        $response['GUMA_PRIVADO'][$i]['Commentario']            =  $d->Commentario;
                        $response['GUMA_PRIVADO'][$i]['TieneVenta']             =  $d->TieneVenta;

                        $response['GUMA_PRIVADO'][$i]['UND']             =  $und;
                        $response['GUMA_PRIVADO'][$i]['LAB']             =  $Lab;
                        $response['GUMA_PRIVADO'][$i]['PRO']             =  $pro;

                    }

                     //TRANSITO GUMA (MINSA)
                    if($d->id_shipto ==2 && $d->id_mercado ==1)
                    {

                        $response['GUMA_MINSA'][$i]['id']                     =  $d->id;
                        $response['GUMA_MINSA'][$i]['id_po']                  =  $d->id_po;
                        $response['GUMA_MINSA'][$i]['Articulo_exactus']       =  $d->Articulo_exactus;
                        $response['GUMA_MINSA'][$i]['descripcion_corta']      =  $d->descripcion_corta;
                        $response['GUMA_MINSA'][$i]['descripcion_larga']      =  $d->descripcion_larga;                        
                        $response['GUMA_MINSA'][$i]['cantidad']               =  number_format($d->cantidad,0);
                        $response['GUMA_MINSA'][$i]['Estado']                 =  $d->Estado;
                        $response['GUMA_MINSA'][$i]['fecha_orden_compra']     =  $d->fecha_orden_compra;
                        $response['GUMA_MINSA'][$i]['DiasAcumulados']         =  $d->DiasAcumulados;
                        $response['GUMA_MINSA'][$i]['fecha_despacho']         =  $d->fecha_despacho;
                        $response['GUMA_MINSA'][$i]['fecha_estimada']         =  $d->fecha_estimada;
                        $response['GUMA_MINSA'][$i]['Via']                    =  $d->Via;
                        $response['GUMA_MINSA'][$i]['num_po']                 =  $d->num_po;
                        $response['GUMA_MINSA'][$i]['factura']                =  $d->factura;
                        $response['GUMA_MINSA'][$i]['recibo']                 =  $d->recibo;
                        $response['GUMA_MINSA'][$i]['id_mercado']             =  $d->id_mercado;
                        $response['GUMA_MINSA'][$i]['id_shipto']              =  $d->id_shipto;
                        $response['GUMA_MINSA'][$i]['descripcion']            =  $d->descripcion;
                        $response['GUMA_MINSA'][$i]['minsa']                  =  $d->minsa;
                        $response['GUMA_MINSA'][$i]['Commentario']            =  $d->Commentario;
                        $response['GUMA_MINSA'][$i]['TieneVenta']             =  $d->TieneVenta;

                        $response['GUMA_MINSA'][$i]['UND']             =  $und;
                        $response['GUMA_MINSA'][$i]['LAB']             =  $Lab;
                        $response['GUMA_MINSA'][$i]['PRO']             =  $pro;

                    }
                    

                    $i++;
                }
                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }

    public static function getInfoEmail()
    { 
            $response = array();
            $i=0;
            $dtHoy          = date('Y-m-d');
            $Ordenes = OrdendesCompras::where('activo', 'S')->get();
            foreach ($Ordenes as $orden){
                foreach ($orden->Detalles as $lstProducto){
                    //CUANDO EXCEDE EL TIEMPO DE ESTIMADO DE DESPACHO
                    if(!empty($orden->fecha_orden_compra )){   
                        if(empty($lstProducto->fecha_real_despacho)){
                            $dtEstimado     = date('Y-m-d', strtotime($orden->fecha_orden_compra. ' + '.$orden->Vendor->time_transito.' days'));
                            $DiasDiff       = round((strtotime($dtEstimado) - strtotime($dtHoy))/86400);
                            if($DiasDiff < 0){                      
                                $response[$i]['num_po']         =  $orden->num_po;
                                $response[$i]['ARTICULO']       =  $lstProducto->isProduct->Tipo->descripcion . ' : ' . $lstProducto->isProduct->descripcion_corta;
                                $response[$i]['PROVEEDOR']      =  $orden->Vendor->nombre_vendor;
                                $response[$i]['INFORMACION']    =  abs($DiasDiff).' Dias Excedidos en despacho';
                            }
                        }
                        $i++;
                    }

                    //CUANDO EXCEDE EL TIEMPO DE ESTIMADO ARRIBO A DUANA
                    if(!empty($lstProducto->fecha_real_despacho )){
                        if(empty($lstProducto->fecha_real_aduana)){
                            $dtEstimado     = date('Y-m-d', strtotime($lstProducto->fecha_real_despacho. ' + '.$orden->Vendor->time_aduana.' days'));
                            $DiasDiff       = round((strtotime($dtEstimado) - strtotime($dtHoy))/86400);
                            if($DiasDiff < 0){                      
                                $response[$i]['num_po']         =  $orden->num_po;
                                $response[$i]['ARTICULO']       =  $lstProducto->isProduct->Tipo->descripcion . ' : ' . $lstProducto->isProduct->descripcion_corta;
                                $response[$i]['PROVEEDOR']      =  $orden->Vendor->nombre_vendor;
                                $response[$i]['INFORMACION']    =  abs($DiasDiff).' Dias Excedidos en arribo aduana';
                            }
                            $i++;
                        }
                    }
                    //CUANDO EXCEDE EL TIEMPO DE ESTIMADO ARRIBO A BODEGA
                    if(!empty($lstProducto->fecha_real_aduana )){
                        if(empty($lstProducto->fecha_real_bodega)){
                            $dtEstimado     = date('Y-m-d', strtotime($lstProducto->fecha_real_aduana. ' + '.$orden->Vendor->time_aduana.' days'));
                            $DiasDiff       = round((strtotime($dtEstimado) - strtotime($dtHoy))/86400);
                            if($DiasDiff < 0){                      
                                $response[$i]['num_po']         =  $orden->num_po;
                                $response[$i]['ARTICULO']       =  $lstProducto->isProduct->Tipo->descripcion . ' : ' . $lstProducto->isProduct->descripcion_corta;
                                $response[$i]['PROVEEDOR']      =  $orden->Vendor->nombre_vendor;
                                $response[$i]['INFORMACION']    =  abs($DiasDiff).' Dias Excedidos en arribo bodega';
                            }
                            $i++;
                        }        
                    }
                }
            }
            return $response;
    }

}