<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class viewcomment extends Model {
    protected $table = "view_comment";
    protected $fillable = ['id_solicitud', 'comment', 'Activo','username','created_at'];

}