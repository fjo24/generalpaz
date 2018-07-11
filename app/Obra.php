<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $table    = "obras";
    protected $fillable = [
        'nombre', 'descripcion', 'categoria_obra_id', 'orden',
    ];

    public function categoria_obra()
    {
        return $this->belongsTo('App\Categoria_obra');
    }

    public function imagenes()
    {
        return $this->hasMany('App\Obra_imagen');
    }
}
