<x-guest-layout>

  <div class="auth-card">
    <div class="auth-card-header">
      <h1>Bienvenido de vuelta</h1>
      <p>Ingresa tus credenciales para acceder al panel</p>
    </div>

    @if (session('status'))
      <div class="auth-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input id="email" class="form-input" type="email" name="email"
               value="{{ old('email') }}" required autofocus autocomplete="username"
               placeholder="tu@correo.com">
        @error('email')
          <p class="form-error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Contraseña</label>
        <input id="password" class="form-input" type="password" name="password"
               required autocomplete="current-password" placeholder="••••••••">
        @error('password')
          <p class="form-error">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-row">
        <label class="form-check">
          <input type="checkbox" name="remember" id="remember_me">
          <span>Recordarme</span>
        </label>

        @if (Route::has('password.request'))
          <a class="form-link" href="{{ route('password.request') }}">
            ¿Olvidaste tu contraseña?
          </a>
        @endif
      </div>

      <button type="submit" class="btn-auth">Iniciar sesión</button>
    </form>
  </div>

</x-guest-layout>
