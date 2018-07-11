<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_obra extends Model
{
    protected $table    = "categoria_obras";
    protected $fillable = [
        'nombre', 'imagen', 'orden',
    ];

    public function obras()
    {
        return $this->hasMany('App\Obra');
    }
}
