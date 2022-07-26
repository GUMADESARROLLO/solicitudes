<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class TipoCarga extends Model {
    protected $table = "tbl_imp_tipo_carga";
    protected $fillable = ['id','Descripcion','activo','created_at','updated_at'];
}