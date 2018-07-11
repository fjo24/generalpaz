<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra_imagen extends Model
{
    protected $table    = "obra_imagenes";
    protected $fillable = [
        'imagen', 'obra_id',
    ];

    public function obra()
    {
        return $this->belongsTo('App\Obra');
    }
}
