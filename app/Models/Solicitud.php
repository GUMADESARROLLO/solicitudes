<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Notificaciones;
use App\Models\Ingreso;

class solicitud extends Model {
    protected $table = "view_solicitudes";
    protected $fillable = ['id_metas','Articulos', 'Descripcion', 'Cant_solicitada','Fecha_Solicitada','Ingreso','proyect_mensual','Inventario_real','Tiempo_Entrega','Transito','Proveedor','Estados','Activo','Pendiente','Dias_Transcurridos','nMes','nAnnio','CountComment'];

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
    public static function UpdateSolicitud(Request $request) {
        if ($request->ajax()) {
            try {

                $id         = $request->input('rowID');
                $Fecha      = $request->input('fecha');
                $Cantidad   = $request->input('cantidad');


                $response =   Ingreso::where('id_ingreso',  $id)->update([
                    'Fecha'  => $Fecha,
                    'Cantidad'   => $Cantidad,
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
                    $datos_a_insertar[$key]['Estados']              = '0';
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
    public static function Delete_Ingreso($Id_Ingreso)
    {
        try {                
            $response =   Ingreso::where('id_ingreso',  $Id_Ingreso)->update([
                'Activo' => 'N',
            ]);
            return response()->json($response);

        } catch (Exception $e) {
            $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
            return response()->json($mensaje);
        }

    }
    public static function postGuardarComment(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id         = $request->input('id_item');
                $Comment    = $request->input('comment');
                $id_user    = $request->user()->id;

                

                $ObjComment = new Comment();
                $ObjComment->id_solicitud  = $id;
                $ObjComment->comment       = $Comment; 
                $ObjComment->Activo        = 'S';      
                $ObjComment->id_usuario    = $id_user;           
                $ObjComment->save();                

                return response()->json($ObjComment);

            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }
    public static function AddFavs(Request $request)
    {
        if ($request->ajax()) {
            try {

                $Solicitud  = $request->input('Solicitud');
                $id_user    = $request->user()->id;

                $Estado     = $request->input('Stado');


                if ($Estado=="S") {
                    
                    $response = SolicitudesFav::where('id_user',$id_user)->where('id_solicitud',$Solicitud)->delete();
                }else{

                    $ObjComment = new SolicitudesFav();
                    $ObjComment->id_solicitud    = $Solicitud; 
                    $ObjComment->id_user         = $id_user;           
                    $response = $ObjComment->save(); 
                    
                }            

                return response()->json($response);

            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

    }
    public static function getSolicitudesFav(Request $request){

        $Mes     = $request->input('mes');
        $Annio   = $request->input('annio');

        $userId  = $request->user()->id;

    
        return solicitud::where('Activo', 'S')->where('nMes', $Mes)->where('nAnnio', $Annio)->whereIn('id_solicitud', function($q)  use ($userId){
            $q->select('id_solicitud')->from('tbl_solicitudes_fav')->where("id_user", $userId);
        })->get();

        

    }
    public static function getSolicitudes(Request $request){

        $Mes     = $request->input('mes');
        $Annio   = $request->input('annio');

        $userId  = $request->user()->id;

        return solicitud::where('Activo', 'S')->where('nMes', $Mes)->where('nAnnio', $Annio)->whereNotIn('id_solicitud', function($q)  use ($userId){
            $q->select('id_solicitud')->from('tbl_solicitudes_fav')->where("id_user", $userId);
        })->get();

    }
    public static function getSolicitudes_Detalles($id_solicitud){
        return Ingreso::where('id_solicitud', $id_solicitud)->where('Activo', 'S')->get();
    }
    public static function getComment(Request $request){
        $Id     = $request->input('id_item');
        return viewcomment::where('Activo', 'S')->where('id_solicitud', $Id)->orderBy('id_solicitud', 'DESC')->get();
    }
    public static function DeleteComment(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   comment::where('id_comment',  $id)->update([
                    "Activo" => 'N',
                ]);

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }

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
