<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Nova Obra</title>
</head>

<body>
    <h1>Adicionar Nova Obra</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('obra.store') }}" method="POST">
        @csrf

        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}" required>
        </div>

        <div>
            <label for="nota">Nota (0 a 10):</label>
            <input type="number" id="nota" name="nota" step="0.01" min="0" max="10"
                value="{{ old('nota') }}" required>
        </div>

        <div>
            <label for="capa_url">Caminho da Capa (Asset/URL):</label>
            <input type="text" id="capa_url" name="capa_url" value="{{ old('capa_url') }}" required>
            <small>Exemplo: assets/images/nova_obra.jpg</small>
        </div>

        <div>
            <button type="submit">Salvar Obra</button>
            <a href="{{ route('home') }}">Cancelar</a>
        </div>
    </form>
</body>

</html>