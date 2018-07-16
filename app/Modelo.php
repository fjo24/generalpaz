<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = "modelos";
    protected $fillable = ['nombre', 'descripcion', 'orden', 'imagen'];

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'modelo_producto');
    }

}
