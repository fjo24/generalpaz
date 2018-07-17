<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'descripcion', 'orden', 'categoria_id', 'modelo_id', 'tipovidrio_id', 'ventaja_id',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function modelos()
    {
        return $this->belongsToMany('App\Modelo', 'modelo_producto', 'producto_id', 'modelo_id');
    }

    public function tiposvidrio()
    {
        return $this->belongsToMany('App\Tipovidrio', 'tipovidrio_producto', 'producto_id', 'tipovidrio_id');
    }

    public function ventajas()
    {
        return $this->belongsToMany('App\Ventaja', 'ventaja_producto', 'producto_id', 'ventaja_id');
    }

    public function imagenes()
    {
    return $this->hasMany('App\Imgproducto');
    }
}
