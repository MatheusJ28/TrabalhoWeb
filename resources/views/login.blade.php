<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>LotusMangas - Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}">
  </head>
  <body>

    <img src="{{ asset('assets/images/backgroundimg.png') }}" class="background_1">

    <div class="login_container">
      <div class="login_card">
        <div class="logo">
          <img src="{{ asset('assets/images/logoo.png') }}" alt="Logo" height="100" width="100">
          <h1>Lotus Mangas</h1>
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="form_login">
          @csrf
          
          <div class="input_group">
            <label for="text_username">Username</label>
            <input type="text" id="text_username" name="text_username" value="{{ old('text_username') }}" required>
            @error('text_username')
              <div class="error_message">{{ $message }}</div>
            @enderror
          </div>

          <div class="input_group">
            <label for="text_password">Password</label>
            <input type="password" id="text_password" name="text_password" required>
            @error('text_password')
              <div class="error_message">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn_login">LOGIN</button>

          @if(session('login_error'))
            <div class="alert">{{ session('login_error') }}</div>
          @endif
        </form>

        <footer>
          <small>&copy; 2025 LotusMangas</small>
        </footer>
      </div>
    </div>

  </body>
</html>