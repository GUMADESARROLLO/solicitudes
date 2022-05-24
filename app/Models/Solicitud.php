<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Notificaciones;
use App\Models\Ingreso;

class solicitud extends Model {
    protected $table = "view_Solicitudes";
    protected $fillable = ['id_metas','Articulos', 'Descripcion', 'Cant_solicitada','Fecha_Solicitada','Ingreso','proyect_mensual','Inventario_real','Tiempo_Entrega','Transito','Proveedor','Estados','Activo','Pendiente','Dias_Transcurridos','nMes','nAnnio'];

    public static function GuardarSolicitud(Request $request) {
        if ($request->ajax()) {
            try {

                $id         = $request->input('rowID');
                $Fecha      = $request->input('fecha');
                $Cantidad   = $request->input('cantidad');


                $response =   tblsolicitud::where('id_solicitud',  $id)->update([
                    'Fecha_Solicitada'  => $Fecha,
                    'proyect_mensual'   => $Cantidad,
                ]);
                return response()->json($response);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public static function GuardarExcel(Request $request) {
        if ($request->ajax()) {
            try {
                $var_mes    = $request->input('mes');
                $var_annio  = $request->input('annio');
                $datos_a_insertar = array();     
                $id_insert = '';
                

                $isExit = solicitud::getSolicitudes($request);

                if(count($isExit) <= 0){
                    $obj_metas = new tbl_metas();
                    $obj_metas->nMes           = $var_mes;
                    $obj_metas->nAnnio         = $var_annio;                
                    $obj_metas->save();
                    $id_insert = $obj_metas->id;

                }else{                    
                    $id_insert = $isExit[0]['id_metas'];

                    tblsolicitud::where('id_meta',$id_insert)->delete();
                }
                
                foreach ($request->input('datos') as $key => $val) {
                    $datos_a_insertar[$key]['Articulos']            = $val['Articulos'];
                    $datos_a_insertar[$key]['Descripcion']          = $val['Descripcion'];
                    $datos_a_insertar[$key]['proyect_mensual']      = $val['proyect_mensual'];
                    $datos_a_insertar[$key]['Fecha_Solicitada']     = $val['Fecha_Solicitada'];
                    $datos_a_insertar[$key]['Activo']               = 'S';
                    $datos_a_insertar[$key]['Proveedor']            = 'N/D';
                    $datos_a_insertar[$key]['created_at']           = date('Y-m-d H:i:s');
                    $datos_a_insertar[$key]['id_meta']              = $id_insert;
                }

                tblsolicitud::insert($datos_a_insertar); 

                return response()->json($datos_a_insertar);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public static function InsertNotificaciones(Request $request) {
        
        if ($request->ajax()) {
            try {
                

                $obj_Notificaciones = new notificaciones();
                $obj_Notificacione->Articulo           = '';
                $obj_Notificacione->Descripcion         = '';                
                $obj_Notificacione->Usuario    = '';
                $obj_Notificacione->Campo     = '';
                
                $obj_Notificacione->save();

                dd($obj_Notificacione);


                //return response()->json($obj_Notificacione);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public static function getUpdate(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                $Campo  = $request->input('Campo');
                $Valor  = $request->input('valor');

                

                if($Campo!='Ingreso'){
                    $response =   tblsolicitud::where('id_solicitud',  $id)->update([
                        $Campo => $Valor,
                    ]);
                }else{
                    $Ingreso = new Ingreso();
                    $Ingreso->id_solicitud           = $id;
                    $Ingreso->Cantidad         = $Valor;                
                    $Ingreso->Fecha    = date('Y-m-d');
                    $Ingreso->Activo     = 'S';
                    
                    $Ingreso->save();
                }

                

                return response()->json($response);

                //solicitud::InsertNotificaciones($request);

            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }
    public static function getSolicitudes(Request $request){
        $Mes     = $request->input('mes');
        $Annio  = $request->input('annio');
        return solicitud::where('Activo', 'S')->where('nMes', $Mes)->where('nAnnio', $Annio)->get();
    }

    public static function getSolicitudesCount(Request $request){
        $Mes     = $request->input('mes');
        $Annio  = $request->input('annio');


        return solicitud::where('Activo', 'S')
        ->selectRaw('Estados,COUNT(Estados) Hits')
        ->groupByRaw('Estados')
        ->where('nMes', $Mes)
        ->where('nAnnio', $Annio)->get();
    }

}
