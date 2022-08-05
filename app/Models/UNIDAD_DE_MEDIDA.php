<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UNIDAD_DE_MEDIDA extends Model
{
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $table = "Softland.UMK.UNIDAD_DE_MEDIDA";

    public static function getUnidadDeMedida()
    {

        return UNIDAD_DE_MEDIDA::all();
    }
}
