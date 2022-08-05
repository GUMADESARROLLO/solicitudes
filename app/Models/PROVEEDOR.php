<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PROVEEDOR extends Model
{
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $table = "Softland.UMK.PROVEEDOR";
    
    public function Productos(){
        return $this->hasMany('App\Models\Productos');
    }

    public static function getProveedor()
    {

        return PROVEEDOR::all();
    }
}
