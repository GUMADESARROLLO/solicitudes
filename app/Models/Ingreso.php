<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingreso extends Model {
    protected $table = "tbl_ingresos";
    protected $fillable = ['id_solicitud', 'Cantidad', 'Fecha','Activo'];

}