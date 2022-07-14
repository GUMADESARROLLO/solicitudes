<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ProductoType extends Model{
    protected $table = "tbl_imp_type_product";
    protected $fillable = ['id','Descripcion','activo','created_at'];

    public function Productos(){
        return $this->hasMany('App\Models\Productos');
    }
}