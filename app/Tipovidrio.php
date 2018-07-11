<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipovidrio extends Model
{

    protected $table = "tipovidrio";
    protected $fillable = ['nombre', 'descripcion','contenido', 'orden'];

    public function imagenes()
    {
    return $this->hasMany('App\Imgtipovidrio');
    }

    public function productos()
    {
        return $this->belongsTo('App\Producto');
    }   
}