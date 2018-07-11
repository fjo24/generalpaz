<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    protected $table    = "certificaciones";
    protected $fillable = [
        'nombre', 'descripcion',
    ];

}
