<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_proyecciones extends Model {
    protected $table = "tbl_proyecciones";
    protected $fillable = ['Articulos', 'Descripcion', 'Cant_solicitada','Ingreso','proyect_mensual','Inventario_real','Tiempo_Entrega','Transito','Proveedor','Estados','Activo','Pendiente','Dias_Transcurridos','nMes','nAnnio'];

}