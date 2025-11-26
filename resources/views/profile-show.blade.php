<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
    <title>Perfil</title>
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

    <div class="profile-container">
        
        @if (session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 4px; margin: 20px;">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 4px; margin: 20px;">
                <h4>⚠️ Ocorreram erros:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="profile-highlight-bar" style="background-color: {{ $user->profile_color ?? '#5865f2' }};"></div>

        <div class="profile-main-section">
            <img src="{{ asset($user->profile_photo ?? 'assets/images/funcoes/profile.png') }}"
                alt="{{ $user->name ?? 'Usuário' }} Profile Photo" class="profile-picture">

            <div class="profile-info">
                <h2>{{ $user->name ?? 'Usuário' }}</h2>
            </div>

            <button type="button" class="btn-edit-profile" onclick="document.getElementById('edit-form').style.display = 'block';">
                Editar perfil de usuário
            </button>
        </div>
        
        <div class="profile-details-section">
            
            <div class="profile-detail-card">
                <div class="detail-label-group">
                    <strong>Nome de Usuário</strong>
                    <span>{{ $user->name ?? 'N/A' }}</span>
                </div>
            </div>
            
            <div class="profile-detail-card">
                <div class="detail-label-group">
                    <strong>Descrição</strong>
                    <span>{{ $user->profile_description ?? 'Nenhuma descrição definida.' }}</span>
                </div>
            </div>

            <div class="profile-detail-card">
                <div class="detail-label-group">
                    <strong>Cor de Destaque</strong>
                    <span>Cor usada na faixa superior e em detalhes do perfil.</span>
                </div>
                <div class="detail-actions">
                    <span style="width: 20px; height: 20px; border-radius: 50%; background-color: {{ $user->profile_color ?? '#393939' }}; border: 1px solid #555; display: inline-block; margin-right: 10px;"></span>
                </div>
            </div>
        </div>
        
        <div id="edit-form" style="display: none;">
            <h3 style="color: #00d1d9;">Editar Perfil</h3>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <label for="name">Nome de Usuário:</label>
                <input type="text" name="name" id="name" class="form-control" 
                    value="{{ old('name', $user->name ?? '') }}" required>
                
                <label for="profile_photo">Foto de Perfil:</label>
                <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="form-control">

                <label for="profile_description">Descrição do Perfil:</label>
                <textarea name="profile_description" id="profile_description" class="form-control" rows="3" maxlength="200">{{ old('profile_description', $user->profile_description ?? '') }}</textarea>

                <label for="profile_color" style="margin-top: 15px; display: block;">Cor de Destaque:</label>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <input type="color" name="profile_color" id="profile_color"
                        value="{{ old('profile_color', $user->profile_color ?? '#2a2a2a') }}"
                        class="color-picker-ball">
                    <span style="color: #bbb;">Escolha a cor</span>
                </div>

                <button type="submit" class="btn-primary" style="margin-top: 20px; margin-right: 10px">Salvar Alterações</button>
                <button type="button" class="btn-primary" style="background-color: #2b2b2b; margin-top: 10px;" onclick="document.getElementById('edit-form').style.display = 'none';">Cancelar</button>
            </form>
        </div>
    </div>
</body>
</html>