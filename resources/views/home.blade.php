<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Página Principal</title>

</head>

<body>
    <header>

        <div class="logo_h1">
            <img src="{{ asset('assets/images/logoo.png') }}" alt="logo" class="logo">
            <h1>Lotus Mangas</h1>
        </div>

        <div class="header_align">

            <form action="{{ route('search') }}" method="GET" class="form_busca">
                <div class="divBusca">
                    <img src="{{ asset('assets/images/iconSearch.png') }}" alt="Buscar...">
                    <input type="text" name="nome" class="txtBusca" placeholder="Buscar..."
                        value="{{ request('nome') }}" />
                    <button type="submit" class="btnBusca">Buscar</button>
                </div>
            </form>


            <form action="{{ route('logout') }}" method="GET">
                @csrf
                <button type="submit" class="btnLogout">Logout</button>
            </form>


        </div>

    </header>

    {{-- <div class="img_row">
        <div class="label">
            <a href=" {{ route('obra1') }} ">
                <img src="{{ asset('assets/images/visionsOfV.jpg') }}" alt="V" height="415" width="280">
            </a>
            <div class="text">
                <h3>
                    Devil May Cry 5 - Visions Of V -
                </h3>
                <h2>
                    ☆ 9.25
                </h2>
            </div>
        </div>

        <div class="label">
            <a href="{{ route('obra2') }}">
                <img src="{{ asset('assets/images/wcnkl.jpg') }}" alt="NKL" class="fix_img" height="415"
                    width="280">
            </a>
            <div class="text">
                <h3>
                    Webtoon Character Na Kang Lim
                </h3>
                <h2>
                    ☆ 9.44
                </h2>
            </div>
        </div>

        <div class="label">
            <a href="{{ route('obra3') }}">
                <img src="{{ asset('assets/images/lookback.jpg') }}" alt="lb" class="fix_img" height="415"
                    width="280">
            </a>
            <div class="text">
                <h3>
                    Look Back
                </h3>
                <h2>
                    ☆ 9.25
                </h2>
            </div>
        </div>

        <div class="label">
            <a href="{{ route('obra4') }}">
                <img src="{{ asset('assets/images/tokyoghoul.jpg') }}" alt="tg" class="fix_img" height="415"
                    width="280">
            </a>
            <div class="text">
                <h3>
                    Tokyo Ghoul
                </h3>
                <h2>
                    ☆ 9.23
                </h2>
            </div>
        </div>
    </div> --}}

    <div class="img_row">

        @foreach ($obras as $obra)
            <div class="label">

                @if ($obra->titulo == 'Devil May Cry 5 - Visions Of V -')
                    <a href="{{ route('obra1') }}">
                    @elseif ($obra->titulo == 'Webtoon Character Na Kang Lim')
                        <a href="{{ route('obra2') }}">
                        @elseif ($obra->titulo == 'Look Back')
                            <a href="{{ route('obra3') }}">
                            @elseif ($obra->titulo == 'Tokyo Ghoul')
                                <a href="{{ route('obra4') }}">
                                @else
                                    <a href="#">
                @endif

                <img src="{{ asset($obra->capa_url) }}" alt="{{ $obra->titulo }}" height="415" width="280">
                </a>

                <div class="text">
                    <h2>
                        {{ $obra->titulo }}
                    </h2>
                    <h3>
                        ☆ {{ number_format($obra->nota, 2) }}
                    </h3>
                </div>

            </div>
        @endforeach
        @empty($obras)
            @if (request('nome'))
                <p class="no-results">Nenhuma obra encontrada para "{{ request('nome') }}"</p>
            @else
                <p class="no-results">Nenhuma obra cadastrada no momento.</p>
            @endif
        @endempty

    </div>
</body>

</html>
