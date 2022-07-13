<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class view_master_ordenes_compras extends Model {
    protected $table = "view_master_ordenes_compras";
    protected $fillable = ['id', 'num_po', 'nombre_shipto','Descripcion','activo'];

}