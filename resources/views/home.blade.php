<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8" />

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
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
                    <img src="{{ asset('assets/images/funcoes/iconSearch.png') }}" alt="Buscar...">
                    <input type="text" name="nome" class="txtBusca" placeholder="Buscar..."
                        value="{{ request('nome') }}" />

                    <a href="{{ route('home') }}" class="btnClear">
                        <img src="{{ asset('assets/images/funcoes/limpar.png') }}" alt="Limpar">
                    </a>
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

                <a href="{{ route('obra.show', $obra->slug) }}">

                    <img src="{{ asset($obra->capa_url) }}" alt="{{ $obra->slug }}" height="415" width="280">
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
    </div>

    <div class="fixed_actions_bar">

        <a href="{{ route('obra.create') }}" class="add_obra_link">
            <div class="add_obra">
                <span class="txt_add">+</span>
            </div>
        </a>

        <div>

            <input type="checkbox" id="delete_modal_toggle" class="modal_toggle_input" hidden>
            <label for="delete_modal_toggle" class="open_delete_list_btn">
                <span class="delete_icon_fab">
                    <img src="{{ asset('assets/images/funcoes/lixeira.png') }}" alt="Deletar Obras">
                </span>
            </label>

            <div class="delete_modal_overlay">
                <div class="modal_content_list">
                    <label for="delete_modal_toggle" class="close_btn_list">&times;</label>
                    <div class="obras_list_container">
                        <h2>Catálogo de Obras (Exclusão)</h2>

                        @foreach ($obras as $obra)
                            <div class="obra_item">
                                <div class="obra_info">
                                    <h3>{{ $obra->titulo }}</h3>
                                    <p>Autor: {{ $obra->autor }}</p>
                                </div>

                                <div class="delete_container">
                                    <form action="{{ route('obra.destroy', $obra->slug) }}" method="POST"
                                        onsubmit="return confirm('Deseja apagar a obra {{ $obra->slug }}?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete_button_icon">
                                            <img src="{{ asset('assets/images/funcoes/lixeira.png') }}" alt="Apagar Obra"
                                                class="img_del">
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <hr>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>
