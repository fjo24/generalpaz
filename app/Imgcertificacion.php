<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imgcertificacion extends Model
{
    protected $table    = "imgcertificaciones";
    protected $fillable = [
        'nombre', 'imagen', 'orden',
    ];

}
