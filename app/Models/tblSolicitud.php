<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblsolicitud extends Model {
    protected $table = "tbl_solicitudes";
    protected $fillable = ['Articulos', 'Descripcion', 'Cant_solicitada','Fecha_Solicitada','Ingreso','proyect_mensual','Inventario_real','Tiempo_Entrega','Transito','Proveedor','Estados','Activo','Pendiente','Dias_Transcurridos','nMes','nAnnio'];

}