<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class OrdendesCompras extends Model {
    protected $table = "tbl_imp_importacion";
    protected $fillable = ['id','num_po','id_vendor','id_shipto','activo','created_at'];

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

}