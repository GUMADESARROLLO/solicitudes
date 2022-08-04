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
    public function getMercados(){
        return $this->hasOne('App\Models\Mercados','id','id_tipo_mecado');
    }
    public function Comments(){
        return $this->hasMany('App\Models\CommentDetalle','id_linea','id')->where('activo','S')->count();    
    }

    public function getEstado(){
        return $this->hasOne('App\Models\EstadoOrden','id','Estado');
    }
    public function ttMific() {
        return $this->Detalles()->selectRaw('mific,count(mific) hit')->groupBy('id_importacion','mific');
    }
    public static function getCommentImportacion(Request $request){
        $Id     = $request->input('id_item');
        return ViewCommentDetalleArticulo::where('activo', 'S')->where('id_linea', $Id)->orderBy('id_comment', 'DESC')->get();
    }
    public static function UpdateEstado(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id         = $request->input('Id');
                $valor      = $request->input('valor');

                $response =   OrdenCompraDetalle::where('id',  $id)->update([
                    "Estado" => $valor,
                ]);

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

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
                
                $id_mercado         = $request->input('id_mercado');
                $id_tiene_venta     = $request->input('id_tiene_venta');

                


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

                    $obj_Productos->id_tipo_mecado      = $id_mercado;  
                    $obj_Productos->TieneVenta          = $id_tiene_venta;  

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
                        "id_tipo_mecado"        => $id_mercado,
                        "TieneVenta"            => $id_tiene_venta,
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
    public static function DeleteCommentDetalle(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   CommentDetalle::where('id',  $id)->update([
                    "Activo" => 'N',
                ]);

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }
    public static function AddComment(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id         = $request->input('id_item');
                $Comment    = $request->input('comment');
                $id_user    = $request->user()->id;

                

                $ObjComment = new CommentDetalle();
                $ObjComment->id_linea       = $id; 
                $ObjComment->descripcion       = $Comment; 
                $ObjComment->Activo        = 'S';      
                $ObjComment->id_user    = $id_user;           
                $ObjComment->save();                

                return response()->json($ObjComment);

            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }

}
