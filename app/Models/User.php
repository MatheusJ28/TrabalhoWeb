<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'profile_description',
        'profile_color',
        'profile_photo'
    ];

    public function favorites()
    {
        return $this->belongsToMany(Obra::class, 'obra_favorites', 'user_id', 'slug')->withTimestamps();
    }
}
