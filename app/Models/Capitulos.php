<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Capitulos extends Model
{
    protected $fillable = [
        'nome',
        'numero',
        'imagens',
        'obra_id', 
    ];

    protected $casts = [
        'imagens' => 'array',
    ];

    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }
}
