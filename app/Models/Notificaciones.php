<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notificaciones extends Model {
    protected $table = "tbl_notificaciones";
    protected $fillable = ['Articulo', 'Descripcion', 'Usuario','Campo'];

}