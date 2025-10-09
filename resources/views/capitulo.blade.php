<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/leitor.css') }}">
    <title>{{ isset($obra) ? $obra->titulo : 'Obra Não Encontrada' }} - Capítulo {{ isset($capitulo) ? $capitulo->numero : 'N/A' }}</title>
    <style>
        body {
            background-color: #1a202c;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .page-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 5px auto;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    @if(!isset($obra) || !isset($capitulo))
        <p>Erro: Obra ou capítulo não encontrados.</p>
    @else
        <header class="header-leitor">
            <a href="{{ route('obra3', $obra->slug) }}">
                &larr; Voltar para {{ $obra->titulo }}
            </a>
            <h1>
                Capítulo {{ $capitulo->numero }}: {{ $capitulo->nome ?? 'Nome não disponível' }}
            </h1>
            <span></span> <!-- Espaçador para centralizar o título -->
        </header>

        <main class="leitor-container">
            @php
                $imagens = is_string($capitulo->imagens) ? json_decode($capitulo->imagens, true) : $capitulo->imagens;
            @endphp

            @if (is_array($imagens) && count($imagens) > 0)
                @foreach ($imagens as $caminho)
                    <img src="{{ asset($caminho) }}" alt="Página {{ $loop->iteration }}" class="page-image">
                @endforeach
            @else
                <p style="text-align: center;">Nenhuma imagem encontrada para este capítulo.</p>
            @endif
        </main>
    @endif

</body>
</html>
