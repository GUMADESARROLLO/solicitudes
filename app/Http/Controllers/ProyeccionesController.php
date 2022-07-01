<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proyeccion;
use App\Models\Calendar;
use App\Models\ArticulosCalendar;
use App\Models\tlb_ingresos_proyeccion;

class ProyeccionesController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getProyecciones()
    {
        return view('Proyecciones.Proyecciones');
    }

    public function getCalendario()
    {
        return view('Proyecciones.Calendario');
    }
    public function postGuardarExcelProyecciones(Request $request)
    {
        $response = Proyeccion::GuardarExcel($request);
        return response()->json($response);
    }
    public function getDataProyeccion(Request $request)
    {
        $Proyec[] = array(
            'data' => Proyeccion::getProyecciones($request)
        );

        return response()->json($Proyec);

    }
    public function getDataCalendar($nMonth,$nYear)
    {
        $response = Calendar::getDataCalendar($nMonth,$nYear);
        return response()->json($response);
    }
    public function getArticuloCalendar($nMonth,$nYear)
    {
        $response = ArticulosCalendar::getArticuloCalendar($nMonth,$nYear);
        return response()->json($response);
    }
    public function dltEvent(Request $request)
    {
        if ($request->ajax()) {
            try {

                $id     = $request->input('id');
                
                $response =   tlb_ingresos_proyeccion::where('id_produccion',  $id)->update([
                    "Activo" => 'N',
                ]);

                return response()->json($response);


            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
    public function InsertEvento(Request $request){        
        if ($request->ajax()) {
            try {

                $Articulo         = $request->input('Articulo');
                $Descrip         = $request->input('Descrip');
                $Fecha      = $request->input('fecha');
                $Cantidad   = $request->input('cantidad');
                $comentario   = $request->input('comentario');

                $obj_metas = new tlb_ingresos_proyeccion();
                $obj_metas->Articulos           = $Articulo;
                $obj_metas->Descripcion         = $Descrip;                
                $obj_metas->Cantidad           = $Cantidad;
                $obj_metas->Comentarios         = $comentario;                
                $obj_metas->Fecha         = $Fecha;                
                $obj_metas->Activo         = 'S';                
                
                $obj_metas->save();

                return response()->json($obj_metas);
                
            } catch (Exception $e) {
                $mensaje =  'Excepción capturada: ' . $e->getMessage() . "\n";
                return response()->json($mensaje);
            }
        }
    }
}