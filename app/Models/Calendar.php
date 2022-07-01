<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model {
    protected $table = "view_data_calendar";
    protected $fillable = ['id_produccion','Articulos', 'Descripcion','Cantidad', 'Comentarios','Fecha','nYear','nMonth'];

    public static function getDataCalendar($nMonth,$nYear)
    {
        return Calendar::where('nMonth', $nMonth)->where('nYear', $nYear)->get();
    }

}