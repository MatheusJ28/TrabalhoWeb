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

    <div class="img_row">

        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($obras as $obra)
            <div class="label">

                <a href="{{ route('obra.show', $obra->titulo) }}">

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

        <div class="add_obra">
            <form action="{{ route('obra.create') }}" method="GET">
                <button type="submit" class="txt_add">+</button>
            </form>
        </div>

        <div class="obras_list_container">
            <h2>Catálogo de Obras</h2>

            @foreach ($obras as $obra)
                <div class="obra_item">
                    <div class="obra_info">
                        <h3>{{ $obra->titulo }}</h3>
                        <p>Autor: {{ $obra->autor }}</p>
                    </div>

                    <div class="delete_container">
                        <form action="{{ route('obra.destroy', $obra->titulo) }}" method="POST"
                            onsubmit="return confirm('Deseja apagar a obra {{ $obra->titulo }}?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete_button_icon">
                                <img src="{{ asset('assets/images/lixeira.png') }}" alt="Apagar Obra" class="img_del">
                            </button>
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>

    </div>

    {{-- <div class="img_row">

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

    </div> --}}
</body>

</html>
