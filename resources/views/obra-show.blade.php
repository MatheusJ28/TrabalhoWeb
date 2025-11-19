<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <title>{{ $obra->slug }}</title>
    <link rel="stylesheet" href="{{ asset('css/obra.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
    <header>
        <div class="logo_h1">
            <img src="{{ asset('assets/images/logoo.png') }}" alt="logo" class="logo">
            <a href="{{ route('home') }}">
                <h1>Lotus Mangas</h1>
            </a>

        </div>
    </header>

    <div class="obra_container">
        <div class="obra_header">
            <img src="{{ asset($obra->capa_url) }}" alt="{{ $obra->slug }}" class="obra_capa">
            <div class="obra_info">
                <h1>{{ $obra->titulo }}</h1>
                <div class="obra_details_bottom">
                    <p class="obra_autor"><strong>Autor:</strong> {{ $obra->autor }}</p>
                    <p class="obra_nota"><strong>Nota:</strong> ☆ {{ number_format($obra->nota, 1) }} / 10</p>
                </div>
            </div>
        </div>

        <a href="{{ route('obra.edit', $obra->slug) }}" class="edit_button">
            <img src="{{ asset('assets/images/funcoes/edit.png') }}" alt="" class="img_edit">
        </a>

        <form action="{{ route('obra.destroy', $obra->slug) }}" method="POST" class="delete_button">
            @csrf

            @method('DELETE')

            <button type="submit" style="border: none; background: none; padding: 0;">
                <img src="{{ asset('assets/images/funcoes/lixeira.png') }}" alt="Excluir" class="img_delete">
            </button>
        </form>

        <hr>

        <div class="capitulos_list">
            <h2>Capítulos</h2>

            @forelse ($obra->capitulos as $capitulo)
                <div class="capitulo_item">
                    <a href="{{ route('capitulo', [$obra->slug, $capitulo->numero]) }}" class="chapter_link">
                        <div class="chapter_item">
                            <span class="chapter_number">Cap. {{ $capitulo->numero }}:</span>
                            <span>{{ $capitulo->nome }}</span>
                        </div>
                    </a>
                </div>
            @empty
                <p>Ainda não há capítulos para esta obra.</p>
            @endforelse
        </div>

        <a href="{{ route('home') }}" class="back_button">← Voltar para a Home</a>
    </div>
</body>

</html>
