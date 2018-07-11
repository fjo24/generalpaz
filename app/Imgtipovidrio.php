<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imgtipovidrio extends Model
{
    protected $table = "imgtipovidrio";
    protected $fillable = [
        'imagen', 'tipovidrio_id', 'orden',
    ];

    public function tipovidrio()
    {
    return $this->belongsTo('App\Tipovidrio');
    }
}