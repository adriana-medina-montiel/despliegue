<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Softura Solutions')</title>
<meta name="description" content="@yield('description', 'Impulsamos la evolución de tu empresa con tecnología de alto rendimiento.')">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@stack('head-scripts')
@stack('styles')
</head>
<body class="@yield('body-class')">

<div id="cur"></div>
<div id="cur-r"></div>

<nav class="@yield('nav-class')">
  <div class="logo">
    <a href="{{ route('home') }}"><img src="/img/s3.png" alt="Softura Solutions Logo"></a>
  </div>
  <ul class="nav-links">
    <li class="dropdown">
      <a href="#" data-i18n="nav.services">Servicios ▾</a>
      <ul class="dropdown-menu">
        <li><a href="{{ route('fabrica') }}" data-i18n="nav.factory">Fábrica de Software</a></li>
        <li><a href="{{ route('nearshoring') }}" data-i18n="nav.nearshoring">Nearshoring / Onshoring</a></li>
      </ul>
    </li>
    <li><a href="{{ route('productos') }}" data-i18n="nav.products">Productos</a></li>
    <li><a href="{{ route('blog') }}" data-i18n="nav.blog">Blog</a></li>
    <li><a href="{{ route('conocenos') }}" data-i18n="nav.about">Conócenos</a></li>
    <li><a href="{{ route('contacto') }}" data-i18n="nav.contact">Contacto</a></li>
    <li class="lang-switch" role="group" aria-label="Idioma">
      <span class="lang-switch-icon" aria-hidden="true">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"/>
          <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
        </svg>
      </span>
      <div class="lang-switch-track">
        <button type="button" class="lang-option active" data-lang="es" data-i18n="lang.es" aria-pressed="true">Español</button>
        <button type="button" class="lang-option" data-lang="en" data-i18n="lang.en" aria-pressed="false">Inglés</button>
      </div>
    </li>
  </ul>
</nav>

@yield('content')

@section('footer')
<footer class="@yield('footer-class')">
  <div class="logo">Softura<b style="color:var(--blue)">.</b></div>
  <p data-i18n="footer.rights">© 2026 Softura Solutions. Todos los derechos reservados.</p>
  <div class="f-links">
    <a href="https://www.linkedin.com/company/softura-solutions" target="_blank" rel="noopener">LinkedIn</a>
    <a href="https://www.facebook.com/SofturaSolutions" target="_blank" rel="noopener">Facebook</a>
    <a href="{{ route('contacto') }}">Contacto</a>
  </div>
</footer>
@show

<script src="{{ asset('js/i18n.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
