<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class Proyeccion extends Model {
    protected $table = "view_proyeccion";
    protected $fillable = ['id_metas','Articulos', 'Descripcion', 'Cant_solicitada','Ingreso','proyect_mensual','Inventario_real','Tiempo_Entrega','Transito','Proveedor','Estados','Activo','Pendiente','Dias_Transcurridos','nMes','nAnnio','CountComment'];
    
    public static function getProyecciones(Request $request){
        $Mes     = $request->input('mes');
        $Annio  = $request->input('annio');
        return Proyeccion::where('Activo', 'S')->where('nMes', $Mes)->where('nAnnio', $Annio)->get();
    }

    public static function GuardarExcel(Request $request) {
        if ($request->ajax()) {
            try {
                $var_mes    = $request->input('mes');
                $var_annio  = $request->input('annio');
                $datos_a_insertar = array();     
                $id_insert = '';
                

                $isExit = Proyeccion::getProyecciones($request);

                if(count($isExit) <= 0){
                    $obj_metas = new tbl_metas_proyecciones();
                    $obj_metas->nMes           = $var_mes;
                    $obj_metas->nAnnio         = $var_annio;                
                    $obj_metas->save();
                    $id_insert = $obj_metas->id;

                }else{                    
                    $id_insert = $isExit[0]['id_metas'];
                    tbl_proyecciones::where('id_meta',$id_insert)->delete();
                }
                
                foreach ($request->input('datos') as $key => $val) {
                    $datos_a_insertar[$key]['Articulos']            = $val['Articulos'];
                    $datos_a_insertar[$key]['Descripcion']          = $val['Descripcion'];
                    $datos_a_insertar[$key]['proyect_mensual']      = $val['proyect_mensual'];
                    $datos_a_insertar[$key]['Activo']               = 'S';
                    $datos_a_insertar[$key]['Proveedor']            = 'N/D';
                    $datos_a_insertar[$key]['Estados']              = '0';
                    $datos_a_insertar[$key]['created_at']           = date('Y-m-d H:i:s');
                    $datos_a_insertar[$key]['id_meta']              = $id_insert;
                }

                tbl_proyecciones::insert($datos_a_insertar); 
                
                return response()->json($datos_a_insertar);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }

}