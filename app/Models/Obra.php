<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Capitulo;
use Illuminate\Support\Str;

class Obra extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'nota',
        'capa_url',
        'slug',
    ];

    public function capitulos()
    {
        return $this->hasMany(Capitulo::class);
    }

    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    protected function capaUrlPublica(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => url('/') . '/' . $attributes['capa_url'],
        );
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'obra_favorites', 'slug', 'user_id')->withTimestamps();
    }
}
