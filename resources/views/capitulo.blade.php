<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/leitor.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <title>{{ $obra->titulo }} - Capítulo {{ $capitulo->numero }}</title>
</head>

<body>

    @php
        $currentNumber = $capitulo->numero;
        $totalChapters = $obra->capitulos->count();
        $isFirst = $currentNumber == 1;
        $isLast = $currentNumber == $totalChapters;
        $onlyOne = $totalChapters == 1;
    @endphp

    <header>
        <div class="logo_h1">
            <img src="{{ asset('assets/images/logoo.png') }}" alt="logo" class="logo">
            <a href="{{ route('home') }}">
                <h1>Lotus Mangas</h1>
            </a>

        </div>
    </header>

    <main class="leitor-container">

        <div class="chapter-info-box">
            <h3>{{ $obra->titulo }}</h3>
            <h2>Capítulo {{ $capitulo->numero }}</h2>
        </div>

        @forelse ($capitulo->imagens as $caminho)
            <img src="{{ asset(rawurlencode($caminho)) }}" alt="Página {{ $loop->iteration }}" class="page-image">
        @empty
            <p style="text-align: center;">Nenhuma imagem encontrada para este capítulo.</p>
        @endforelse

    </main>

    <footer class="leitor-footer">
        <div class="nav-buttons">

            @if (!$isFirst)
                <a href="{{ route('capitulo', [$obra->titulo, $currentNumber - 1]) }}" class="nav-btn prev">
                    &larr; Capítulo Anterior
                </a>
            @elseif (!$onlyOne)
                <a href="{{ route('obra.show', $obra->titulo) }}" class="nav-btn prev back-to-obra">
                    Voltar à Obra
                </a>
            @endif
            @if ($onlyOne)
                <a href="{{ route('obra.show', $obra->titulo) }}" class="nav-btn back-to-obra" style="width: 100%;">
                    Voltar à Obra
                </a>
            @endif
            @if (!$isLast)
                <a href="{{ route('capitulo', [$obra->titulo, $currentNumber + 1]) }}" class="nav-btn next">
                    Próximo Capítulo &rarr;
                </a>
            @elseif (!$onlyOne)
                <a href="{{ route('obra.show', $obra->titulo) }}" class="nav-btn next back-to-obra">
                    Voltar à Obra
                </a>
            @endif

        </div>
    </footer>

</body>

</html>
