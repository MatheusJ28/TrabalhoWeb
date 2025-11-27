<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <title>Editar {{ $obra->slug }}</title>
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
        <h1>Editar Obra: {{ $obra->titulo }}</h1>

        <form action="{{ route('obra.update',  $obra->slug) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $obra->titulo) }}" required>
                @error('titulo')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="{{ old('autor', $obra->autor) }}" required>
                @error('autor')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="nota">Nota:</label>
                <input type="number" step="0.1" min="0" max="10" id="nota" name="nota" value="{{ old('nota', $obra->nota) }}" required>
                @error('nota')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="form-actions">
                <button type="submit" class="save-btn">Salvar Alterações</button>
                <a href="{{ route('obra.show', $obra->slug) }}" class="cancel-btn">Cancelar</a>
            </div>
        </form>
    </div>

</body>

</html>