<?php

namespace Database\Seeders;

use App\Models\Obra;
use App\Models\Capitulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ChapterImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baseImagePath = public_path('assets/images');

        if (!File::exists($baseImagePath)) {
            $this->command->error("O diretório de imagens '$baseImagePath' não foi encontrado.");
            return;
        }

        $obraDirectories = File::directories($baseImagePath);

        foreach ($obraDirectories as $obraPath) {
            $obraFolderName = basename($obraPath);

            $obra = Obra::where('titulo', $obraFolderName)->first();

            if (!$obra) {
                $this->command->warn("Obra com título '$obraFolderName' não encontrada no banco. Ignorando esta pasta.");
                continue;
            }

            $this->command->info("Processando Obra: '{$obra->titulo}' (ID: {$obra->id})");

            $capituloDirectories = File::directories($obraPath);

            foreach ($capituloDirectories as $capituloPath) {
                $capituloFolderName = basename($capituloPath);

                if (!is_numeric($capituloFolderName)) {
                    $this->command->warn("Pasta de capítulo inválida: '$capituloFolderName'. Deve ser apenas um número. Ignorando.");
                    continue;
                }

                $capituloNumero = (int)$capituloFolderName;
                $imagensDoCapitulo = [];

                $imageFiles = File::files($capituloPath);

                foreach ($imageFiles as $imageFile) {
                    $fileName = $imageFile->getFilename();
                    
                    $imagePath = 'assets/images/' . $obraFolderName . '/' . $capituloFolderName . '/' . $fileName;
                    
                    $imagensDoCapitulo[] = $imagePath;
                }

                if (empty($imagensDoCapitulo)) {
                    $this->command->warn("Capítulo {$capituloNumero} da Obra '{$obra->titulo}' não tem imagens. Ignorando.");
                    continue;
                }
                
                Capitulo::updateOrCreate(
                    [
                        'obra_id' => $obra->id, 
                        'numero' => $capituloNumero,
                    ],
                    [
                        'nome' => "Capítulo {$capituloNumero}", 
                        'imagens' => $imagensDoCapitulo, 
                    ]
                );

                $this->command->info("   Capítulo {$capituloNumero} criado/atualizado com " . count($imagensDoCapitulo) . " imagens.");
            }
        }
        $this->command->info("Processamento de imagens e capítulos concluído.");
    }
}
