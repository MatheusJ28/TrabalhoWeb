<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/obra.css') }}">
    <title>Obra</title>
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

    <div class="img_row">
        <img src="{{ asset('assets/images/lookback.jpg') }}" alt="lb" class="img_v">

        <div class="text_column">

            <h2>
                Look Back
            </h2>

            <div class="info_container">

                <div class="info_box">
                    <h3>
                        Autor
                    </h3>
                    <p>
                        Tatsuki Fujimoto
                    </p>
                </div>

                <div class="info_box">
                    <h3>
                        Artist
                    </h3>
                    <p>
                        Tatsuki Fujimoto
                    </p>
                </div>
            </div>

            <div class="info_container info_genres">

                <div class="info_box">
                    <h3>
                        Gêneros
                    </h3>
                    <p>
                        Gore, Psicológico, Comédia, Crime, Filosófico
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="chapters_container">
        <div class="chapters_list">
            @foreach ($capitulos as $capitulo)
                <a href="{{ route('capitulo', [$obra->slug, $capitulo->numero]) }}" class="chapter_link">
                    <div class="chapter_item">
                        <span class="chapter_number">Capítulo {{ $capitulo->numero }} - {{ $capitulo->nome }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>

</html>