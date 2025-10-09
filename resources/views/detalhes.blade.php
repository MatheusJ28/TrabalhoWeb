<div class="obra-container">
    <h1>{{ $obra->titulo }}</h1>

    <div class="header-info">
        <img src="{{ asset($obra->capa_url) }}" alt="{{ $obra->titulo }}" class="capa-detalhe">
        <div class="meta-info">
            <p><strong>Autor:</strong> {{ $obra->autor }}</p>
            <p><strong>Nota:</strong> ☆ {{ number_format($obra->nota, 2) }}</p>
        </div>
    </div>

    <div class="description">
        <h2>Sinopse</h2>
        <p>{{ $obra->desc }}</p>
    </div>

</div>
