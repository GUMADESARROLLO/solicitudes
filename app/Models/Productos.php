<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class Productos extends Model{
    protected $table = "tbl_imp_product";

    public function Tipo(){
        return $this->belongsTo('App\Models\ProductoType','id_type_product');
    }
    public function Laboratorio(){
        return $this->belongsTo('App\Models\LABORATORIO','Clasificacion_2','CLASIFICACION');
    }
    public function Proveedor(){
        return $this->belongsTo('App\Models\PROVEEDOR','Clasificacion_3','PROVEEDOR');
    }
    public static function SaveProducto(Request $request) {
        if ($request->ajax()) {
            try {

                $cod_sistema        = $request->input('cod_sistema');
                $descrip_corta      = $request->input('descrip_corta');
                $descrip_larga      = $request->input('descrip_larga');
                $produc_type        = $request->input('produc_type');
                $id_Pro             = $request->input('idProducto');

                $Unidad_Almacen     = $request->input('cod_unidad');
                $Laboratorio        = $request->input('cod_labora');
                $Proveedor          = $request->input('cod_provee');


                if ($id_Pro=="0") {
                    $obj_Productos = new Productos();   
                    $obj_Productos->Articulo_exactus        = $cod_sistema;                
                    $obj_Productos->descripcion_corta       = $descrip_corta;                    
                    $obj_Productos->descripcion_larga       = $descrip_larga;
                    $obj_Productos->id_type_product         = $produc_type;
                    $obj_Productos->Clasificacion_1         = $Unidad_Almacen;
                    $obj_Productos->Clasificacion_2         = $Laboratorio;
                    $obj_Productos->Clasificacion_3         = $Proveedor;
                    $obj_Productos->activo                  = 'S';                 
                    $response = $obj_Productos->save();
                } else {
                    $response =   Productos::where('id',  $id_Pro)->update([
                        "Articulo_exactus" => $cod_sistema,
                        "descripcion_corta" => $descrip_corta,
                        "descripcion_larga" => $descrip_larga,
                        "id_type_product" => $produc_type,

                        "Clasificacion_1" => $Unidad_Almacen,
                        "Clasificacion_2" => $Laboratorio,
                        "Clasificacion_3" => $Proveedor,
                    ]);
                }

                return response()->json($response);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public static function DeleteProducto(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   Productos::where('id',  $id)->update([
                    "activo" => 'N',
                ]);

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }
}