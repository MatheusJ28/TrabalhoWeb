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
                <img src="{{ asset('assets/images/logoo.png') }}" alt="logo"
                    class="logo">
                <a href="{{ route('home') }}">
                    <h1>Lotus Mangas</h1>
                </a>
                
            </div>
        </header>

        <div class="img_row">
            <img src="{{ asset('assets/images/tokyoghoul.jpg') }}" alt="uzumaki"
                class="img_v">

            <div class="text_column">

                <h2>
                    Tokyo Ghoul
                </h2>

                <div class="info_container">

                    <div class="info_box">
                        <h3>
                            Autor
                        </h3>
                        <p>
                            Sui Ishida
                        </p>
                    </div>

                    <div class="info_box">
                        <h3>
                            Artist
                        </h3>
                        <p>
                            Sui Ishida
                        </p>
                    </div>
                </div>

                <div class="info_container info_genres">

                    <div class="info_box">
                        <h3>
                            Gêneros
                        </h3>
                        <p>
                            Gore, Monstros, Psicológico, Drama, Tragédia
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="chapters_container">
            <div class="chapters_list">

                <div class="chapter_item">
                    <span class="chapter_number">Capítulo 1</span>
                </div>

                <div class="chapter_item">
                    <span class="chapter_number">Capítulo 2</span>
                </div>

                <div class="chapter_item">
                    <span class="chapter_number">Capítulo 3</span>
                </div>

                <div class="chapter_item">
                    <span class="chapter_number">Capítulo 4</span>
                </div>

                <div class="chapter_item">
                    <span class="chapter_number">Capítulo 5</span>
                </div>
            </div>
        </div>
    </body>
</html>