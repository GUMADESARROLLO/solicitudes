<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticulosCalendar extends Model {
    protected $table = "view_proyeccion";
    protected $fillable = ['Articulos', 'Descripcion','nAnnio','nMes'];

    public static function getArticuloCalendar($nMonth,$nYear)
    {
        return ArticulosCalendar::where('nMes', $nMonth)->where('nAnnio', $nYear)->get();
    }

}