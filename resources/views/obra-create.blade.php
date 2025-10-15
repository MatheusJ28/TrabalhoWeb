<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Nova Obra - Lotus Mangas</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
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

        
    <h2>Adicionar Nova Obra</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            Houve erros de validação:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('obra.store') }}" method="POST">
        @csrf <div>
            <label for="titulo">Título:</label>
            <input type="text" id="slug" name="titulo" value="{{ old('slug') }}" required>
        </div>

        <div>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}" required>
        </div>

        <div>
            <label for="nota">Nota (0 a 10):</label>
            <input type="number" id="nota" name="nota" step="0.01" min="0" max="10" value="{{ old('nota') }}" required>
        </div>

        <div>
            <label for="capa_url">Caminho da Capa (Asset/URL):</label>
            <input type="text" id="capa_url" name="capa_url" value="{{ old('capa_url') }}"    required>
            <small>Exemplo: assets/images/obra.jpg  (1 - 15)</small>
        </div>
        
        <div>
            <button type="submit">Salvar Obra</button>
            <a href="{{ route('home') }}">Cancelar</a>
        </div>
    </form>
</body>
</html>