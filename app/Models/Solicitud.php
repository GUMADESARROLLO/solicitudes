<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Notificaciones;

class solicitud extends Model {
    protected $table = "view_Solicitudes";
    protected $fillable = ['Articulos', 'Descripcion', 'Cant_solicitada','Fecha_Solicitada','Ingreso','proyect_mensual','Inventario_real','Tiempo_Entrega','Transito','Proveedor','Estados','Activo','Pendiente','Dias_Transcurridos','nMes','nAnnio'];

    public static function GuardarSolicitud(Request $request) {
        if ($request->ajax()) {
            try {

                $obj_solicitud = new tblsolicitud();
                $obj_solicitud->Articulos           = $request->input('articulo');
                $obj_solicitud->Descripcion         = $request->input('descripcion');                
                $obj_solicitud->Fecha_Solicitada    = $request->input('fecha');
                $obj_solicitud->Cant_solicitada     = number_format(0,2);
                $obj_solicitud->proyect_mensual     = $request->input('cantidad');
                $obj_solicitud->Inventario_real     = number_format(0,2);                                
                $obj_solicitud->Ingreso             = number_format(0,2);                
                $obj_solicitud->Tiempo_Entrega      = 'N/D';                
                $obj_solicitud->Proveedor           = 'N/D';                
                $obj_solicitud->Activo              = 'S';
                $obj_solicitud->Estados             = '0';

                $obj_solicitud->save();
                solicitud::InsertNotificaciones($request);
                return response()->json($obj_solicitud);
                
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

                $response =   solicitud::where('id_solicitud',  $id)->update([
                    $Campo => $Valor,
                ]);

                

                return response()->json($response);

                solicitud::InsertNotificaciones($request);

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
