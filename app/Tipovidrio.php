<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipovidrio extends Model
{

    protected $table = "tipovidrio";
    protected $fillable = ['nombre', 'descripcion','contenido', 'orden', 'imagen'];

    public function imagenes()
    {
    return $this->hasMany('App\Imgtipovidrio');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'tipovidrio_producto');
    }
}