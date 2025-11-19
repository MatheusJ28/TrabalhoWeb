<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obra; 
use Illuminate\Support\Str;

class FixSlugsSeeder extends Seeder
{
    public function run()
    {
        Obra::all()->each(function ($obra) {
            if (empty($obra->slug)) {
                $obra->slug = Str::slug($obra->titulo);
                $obra->save();
            }
        });
    }
}