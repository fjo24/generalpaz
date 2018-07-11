<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventaja extends Model
{
    protected $table = "ventajas";
    protected $fillable = ['nombre', 'imagen', 'orden'];

    public function productos()
    {
        return $this->belongsTo('App\Producto');
    }  
}
