<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class Vendor extends Model {
    protected $table = "tbl_imp_vendor";
    protected $fillable = ['id','nombre_vendor','Descripcion','time_despacho','activo','created_at'];
    
    public function Ordenes(){
        return $this->hasMany('App\Models\OrdendesCompras');
    }

    public static function SaveVendor(Request $request) {
        if ($request->ajax()) {
            try {

                $name_vendor    = $request->input('name_vendor');
                $description    = $request->input('description');
                $id             = $request->input('idVendor');


                if ($id=="0") {
                    $obj_vendor = new Vendor();
                    $obj_vendor->nombre_vendor      = $name_vendor;
                    $obj_vendor->Descripcion        = $description;
                    $obj_vendor->time_despacho      = 0;     
                    $obj_vendor->activo             = 'S';
                    $obj_vendor->save();
                } else {
                    $response =   Vendor::where('id',  $id)->update([
                        "nombre_vendor" => $name_vendor,
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
    public static function DeleteVendor(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   Vendor::where('id',  $id)->update([
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