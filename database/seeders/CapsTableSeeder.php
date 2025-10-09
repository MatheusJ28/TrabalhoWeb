<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obra;
use App\Models\Capitulos;
use Illuminate\Support\Str; 

class CapsTableSeeder extends Seeder
{
    public function run(): void
    {
        Capitulos::query()->delete(); 

        $obras = Obra::all();

        foreach ($obras as $obra) {
            
            $obraSlug = Str::slug($obra->titulo); 
            $numImages = 3; 
            $imagens = [];
            
            for ($j = 1; $j <= $numImages; $j++) {
                $imagens[] = "assets/images/{$obraSlug}/pg{$j}.jpg";
            }
            for ($i = 1; $i <= 1; $i++) {
                Capitulos::create([
                    'obra_id' => $obra->id,
                    'nome' => "teste",
                    'numero' => $i,
                    'imagens' => $imagens, 
                ]);
            }
        }
    }
}
