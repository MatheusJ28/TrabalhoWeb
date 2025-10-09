<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obra extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'nota',
        'capa_url',
        'slug',
    ];

    // public function capitulos(){
    //     return $this.hasMany(Capitulo::class)
    // }
}
