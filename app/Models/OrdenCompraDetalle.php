<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class OrdenCompraDetalle extends Model {
    protected $table = "tbl_imp_importacion_detalle";
    protected $fillable = [
        'id',
        'id_importacion',
        'id_product',
        'linea',
        'cantidad',
        'precio_farmacia',
        'precio_publico',
        'precio_institucion',
        'mific',
        'regencia',
        'minsa',
        'Estado',
        'created_at'
    ];

    public function isProduct(){
        return $this->hasOne('App\Models\Productos','id','id_product');
    }

    public function getEstado(){
        return $this->hasOne('App\Models\EstadoOrden','id','Estado');
    }

    public static function AddProductPO(Request $request) {
        if ($request->ajax()) {
            try {

                $idProducto         = $request->input('id_producto');
                $idPo               = $request->input('id_po');
                $modl_states        = $request->input('modl_states');
                
                $Cantidad           = $request->input('Cantidad');

                $precioFarmacia     = $request->input('precio_farma');
                $precioPublico      = $request->input('precio_public');
                $precioInsti        = $request->input('precio_insti');

                $Mific              = $request->input('isChkMific');
                $Regencia           = $request->input('isChkRegen');
                $Minsa              = $request->input('isChkMinsa');

                $Minsa              = $request->input('isChkMinsa');

                $number_linea       = $request->input('number_linea');
                $id_este            = $request->input('id_este');

                


                if ($modl_states =='Agregar') {
                    $obj_Productos = new OrdenCompraDetalle();   
                    $obj_Productos->id_importacion      = $idPo;                
                    $obj_Productos->id_product          = $idProducto;                
                    $obj_Productos->cantidad            = $Cantidad;
                    $obj_Productos->linea               = $number_linea;
                    $obj_Productos->Estado              = $id_este;
                    
                    $obj_Productos->precio_farmacia     = $precioFarmacia;
                    $obj_Productos->precio_publico      = $precioPublico;                 
                    $obj_Productos->precio_institucion  = $precioInsti;      
                    
                    $obj_Productos->mific               = $Mific;
                    $obj_Productos->regencia            = $Regencia;                 
                    $obj_Productos->minsa               = $Minsa;  

                    $response = $obj_Productos->save();
                } else {
                    $response =   OrdenCompraDetalle::where('id',  $idPo)->update([
                        "cantidad"              => $Cantidad,
                        "Estado"                => $id_este,
                        "precio_farmacia"       => $precioFarmacia,
                        "precio_publico"        => $precioPublico,
                        "precio_institucion"    => $precioInsti,
                        "mific"                 => $Mific,
                        "regencia"              => $Regencia,
                        "minsa"                 => $Minsa,
                    ]);
                }

                return response()->json($response);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public static function delInfoLinea(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   OrdenCompraDetalle::where('id',  $id)->delete();

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }

}
