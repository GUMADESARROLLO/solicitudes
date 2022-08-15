<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulos_master extends Model
{
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $table = "PRODUCCION.dbo.view_importaciones_master_articulo";

    public static function getArticulos()
    {

        return Articulos_master::all();
    }
}
