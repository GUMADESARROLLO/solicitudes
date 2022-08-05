<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LABORATORIO extends Model
{
    protected $connection = 'sqlsrv';
    public $timestamps = false;
    protected $table = "Softland.UMK.CLASIFICACION";

    public function Productos(){
        return $this->hasMany('App\Models\Productos');
    }

    public static function getLaboratorio()
    {

        return LABORATORIO::WHERE('AGRUPACION','2')->get();
    }
}
