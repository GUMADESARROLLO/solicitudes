<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model {
    protected $table = "tbl_comment";
    protected $fillable = ['id_solicitud', 'comment', 'Activo','id_usuario'];

}