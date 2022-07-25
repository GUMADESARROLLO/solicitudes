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
        'cantidad',
        'precio_farmacia',
        'precio_publico',
        'precio_institucion',
        'mific',
        'regencia',
        'minsa',
        'created_at'
    ];
    public function isProduct(){
        return $this->hasOne('App\Models\Productos','id','id_product');
    }

    public static function AddProductPO(Request $request) {
        if ($request->ajax()) {
            try {

                $idProducto         = $request->input('id_producto');
                $idPo               = $request->input('id_po');
                
                $Cantidad           = $request->input('Cantidad');

                $precioFarmacia     = $request->input('frm_precio_farma');
                $precioPublico      = $request->input('frm_precio_public');
                $precioInsti        = $request->input('frm_precio_insti');

                $Mific              = $request->input('isChkMific');
                $Regencia           = $request->input('isChkRegen');
                $Minsa              = $request->input('isChkMinsa');



                $obj_Productos = new OrdenCompraDetalle();   
                $obj_Productos->id_importacion      = $idPo;                
                $obj_Productos->id_product          = $idProducto;                
                $obj_Productos->cantidad            = $Cantidad;
                
                $obj_Productos->precio_farmacia     = $precioFarmacia;
                $obj_Productos->precio_publico      = $precioPublico;                 
                $obj_Productos->precio_institucion  = $precioInsti;      
                
                $obj_Productos->mific               = $Mific;
                $obj_Productos->regencia            = $Regencia;                 
                $obj_Productos->minsa               = $Minsa;  
                
                $response = $obj_Productos->save();


                /*if ($id_Pro=="0") {
                   
                } else {
                    $response =   Productos::where('id',  $id_Pro)->update([
                        "Articulo_exactus" => $cod_sistema,
                        "descripcion_corta" => $descrip_corta,
                        "descripcion_larga" => $descrip_larga,
                        "id_type_product" => $produc_type,
                    ]);
                }*/

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