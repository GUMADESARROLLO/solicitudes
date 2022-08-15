<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticulosUMK extends Model
{
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $table = "PRODUCCION.dbo.iweb_articulos";

    public static function getArticulos()
    {

        return ArticulosUMK::all();
    }
}
