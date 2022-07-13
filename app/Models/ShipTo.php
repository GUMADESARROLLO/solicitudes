<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ShipTo extends Model {
    protected $table = "tbl_imp_shipto";
    protected $fillable = ['id','nombre_shipto','Descripcion','activo','created_at'];

    public function Ordenes(){
        return $this->hasMany('App\Models\OrdendesCompras');
    }

    public static function SaveShipTo(Request $request) {
        if ($request->ajax()) {
            try {

                $name_shipto    = $request->input('name_shipto');
                $description    = $request->input('description');
                $id             = $request->input('idShipto');


                if ($id=="0") {
                    $obj_shipto = new ShipTo();   
                    $obj_shipto->nombre_shipto      = $name_shipto;                 
                    $obj_shipto->Descripcion        = $description;                    
                    $obj_shipto->activo             = 'S';
                    $obj_shipto->save();
                    
                } else {
                    $response =   ShipTo::where('id',  $id)->update([
                        "nombre_shipto" => $name_shipto,
                        "Descripcion" => $description,
                    ]);
                }

                return response()->json($response);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public static function DeleteShipTo(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   ShipTo::where('id',  $id)->update([
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