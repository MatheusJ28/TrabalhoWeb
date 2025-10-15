<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obra;
use Illuminate\Support\Str; 


class ObrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obras = [
            [
                'titulo' => 'Devil May Cry 5 Visions Of V',
                'autor' => 'Tomio Ogata',
                'nota' => 9.25,
                'capa_url' => 'assets/images/visionsOfV.jpg',
            ],
            [
                'titulo' => 'Webtoon Character Na Kang Lim',
                'autor' => 'Young-jin Yoon',
                'nota' => 9.44,
                'capa_url' => 'assets/images/wcnkl.jpg',
            ],
            [
                'titulo' => 'Look Back',
                'autor' => 'Tatsuki Fujimoto',
                'nota' => 9.30,
                'capa_url' => 'assets/images/lookback.jpg',
            ],
            [
                'titulo' => 'Tokyo Ghoul',
                'autor' => 'Sui Ishida',
                'nota' => 9.23,
                'capa_url' => 'assets/images/tokyoghoul.jpg',
            ],
        ];

        foreach ($obras as $data) {
            $data['slug'] = Str::slug($data['titulo']);
            
            Obra::create($data);
        }

    }
}
