<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Softura Solutions')</title>
<meta name="description" content="@yield('description', 'Impulsamos la evolución de tu empresa con tecnología de alto rendimiento.')">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
<link rel="stylesheet" href="{{ asset('css/softura-unified.css') }}">
<link rel="stylesheet" href="{{ asset('css/softura-ui.css') }}">
@stack('head-scripts')
@stack('styles')
</head>
<body class="site-marketing @yield('body-class')" @yield('body-attrs')>

<a class="skip-link" href="#main-content">Saltar al contenido</a>

<div id="cur"></div>
<div id="cur-r"></div>

<button type="button" class="nav-backdrop" aria-label="Cerrar menú" hidden></button>

<nav class="@yield('nav-class', 'nav-dark')" id="site-nav" @yield('nav-attrs')>
  <div class="@yield('nav-wrapper-class', 'nav-inner')">
    <div class="logo">
      <a href="{{ route('home') }}"><img src="{{ asset('img/s3.png') }}" alt="Softura Solutions"></a>
    </div>
    @hasSection('nav-toggle')
      @yield('nav-toggle')
    @else
    <button type="button" class="nav-toggle" aria-expanded="false" aria-controls="nav-menu" aria-label="Abrir menú">
      <span></span><span></span><span></span>
    </button>
    @endif
    <ul class="nav-links" id="nav-menu">
      @hasSection('nav-home-link')
        @yield('nav-home-link')
      @else
      <li><a href="{{ route('home') }}" data-i18n="nav.home">Inicio</a></li>
      @endif
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
      <li><a href="{{ route('contacto') }}" data-i18n="nav.contact">Contáctanos</a></li>
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
      @unless(View::hasSection('hide-nav-cta'))
      <li class="nav-cta-wrap">
        <a href="{{ route('contacto') }}" class="btn-nav-cta" data-i18n="nav.cta">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          Agenda una reunión
        </a>
      </li>
      @endunless
      @stack('nav-actions')
    </ul>
  </div>
</nav>

<main id="main-content">
@yield('content')
</main>

@section('footer')
<footer class="sp-site-footer @yield('footer-class')">
  <div class="sp-footer-inner">
    <div class="sp-footer-brand">
      <div class="logo">Softura<b>.</b></div>
      <p data-i18n="footer.rights">© 2026 Softura Solutions · Tlaxcala, México</p>
    </div>
    <nav class="sp-footer-links" aria-label="Enlaces del sitio">
      <a href="{{ route('home') }}" data-i18n="nav.home">Inicio</a>
      <a href="{{ route('productos') }}" data-i18n="nav.products">Productos</a>
      <a href="{{ route('contacto') }}" data-i18n="nav.contact">Contacto</a>
      <a href="https://www.linkedin.com/company/softura-solutions" target="_blank" rel="noopener noreferrer">LinkedIn</a>
      <a href="https://www.facebook.com/SofturaSolutions" target="_blank" rel="noopener noreferrer">Facebook</a>
    </nav>
  </div>
</footer>
@show

@hasSection('whatsapp')
  @yield('whatsapp')
@else
<a href="https://api.whatsapp.com/send?phone=522411016729&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="fab-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Contactar por WhatsApp">
  <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>
@endif

<script src="{{ asset('js/i18n.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
