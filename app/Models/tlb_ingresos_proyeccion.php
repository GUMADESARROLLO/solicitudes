<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tlb_ingresos_proyeccion extends Model {
    protected $table = "tlb_ingresos_proyeccion";
    protected $fillable = ['id_produccion','Articulos', 'Descripcion', 'Comentarios','Fecha'];   
}