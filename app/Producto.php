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
        return $this->hasMany('App\Modelo');
    }

    public function tipovidrio()
    {
        return $this->hasMany('App\Tipovidrio')
    }

    public function ventajas()
    {
        return $this->hasMany('App\Ventaja')
    }

}
