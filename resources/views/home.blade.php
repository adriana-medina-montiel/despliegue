@extends('layouts.web')

@section('title', 'Softura Solutions')
@section('body-class', 'page-home')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home-inicio.css') }}">
<link rel="stylesheet" href="{{ asset('css/home-polish.css') }}">
<link rel="stylesheet" href="{{ asset('css/conocenos.css') }}">
@endpush

@push('head-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
@endpush

@section('content')

{{-- ─── HERO THREE.JS ─────────────────────────────────────────────────────── --}}
<section class="hero" id="hero-section">
  <canvas id="three-hero"></canvas>
  <div class="hero-content">
    <div class="hero-badge">
      <span class="badge-dot"></span>
      Softura Solutions
    </div>
    <h1>Software<br><em>a la</em><br>medida</h1>
    <p class="hero-sub">
      Impulsamos la evolución de tu empresa con tecnología de alto rendimiento diseñada para el mercado actual.
    </p>
    <div class="hero-actions">
      <a href="#servicios" class="btn-p" style="text-decoration:none;display:inline-block;">Conoce nuestros servicios</a>
      <a href="{{ route('conocenos') }}" class="btn-g">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Ver más
      </a>
    </div>
  </div>
</section>

{{-- ─── STATS ──────────────────────────────────────────────────────────────── --}}
@php $hero = $sections->get('hero'); @endphp
@if($hero && $hero->is_visible && $hero->items->count() > 0)
<div class="stats rev">
  @foreach($hero->items as $stat)
  <div class="stat">
    <div class="stat-n" data-target="{{ preg_replace('/[^0-9]/', '', $stat->data('value')) }}" data-suffix="{{ preg_replace('/[0-9]/', '', $stat->data('value')) }}">{{ $stat->data('value') }}</div>
    <div class="stat-l">{{ $stat->data('label') }}</div>
  </div>
  @endforeach
</div>
@else
<div class="stats rev">
  <div class="stat">
    <div class="stat-n" data-target="20" data-suffix="+">20+</div>
    <div class="stat-l" data-i18n="home.stat.years">Años de experiencia</div>
  </div>
  <div class="stat">
    <div class="stat-n" data-target="30" data-suffix="+">30+</div>
    <div class="stat-l" data-i18n="home.stat.team">Profesionales especializados</div>
  </div>
  <div class="stat">
    <div class="stat-n" data-target="100" data-suffix="+">100+</div>
    <div class="stat-l" data-i18n="home.stat.allies">Ingenieros aliados CLUSTEC</div>
  </div>
  <div class="stat">
    <div class="stat-n" data-target="7" data-suffix="">7</div>
    <div class="stat-l" data-i18n="home.stat.services">Servicios especializados</div>
  </div>
</div>
@endif

{{-- ─── FÁBRICA DE SOFTWARE ─────────────────────────────────────────────────── --}}
@php $srvIntro = $sections->get('services_intro'); @endphp
@if(!$srvIntro || $srvIntro->is_visible)
<section class="section" id="servicios">
  <div class="services-bg"></div>
  <div class="services-head rev">
    <div class="sec-label">{{ $srvIntro?->content('badge_text', 'Fábrica de software') }}</div>
    <h2>{!! $srvIntro?->content('title', 'Descubre cómo podemos <span>ayudarte</span>') !!}</h2>
    <p class="services-sub">{{ $srvIntro?->content('description', 'Soluciones integrales de desarrollo, consultoría y acompañamiento para llevar tu negocio al siguiente nivel.') }}</p>
  </div>
  <div class="services-grid">
    @php
      $fabricaSvc = \App\Models\PageSection::get('fabrica', 'servicios');
      $serviciosList = $fabricaSvc ? $fabricaSvc->items : collect();
    @endphp
    @if($serviciosList->count() > 0)
      @foreach($serviciosList->take(3) as $idx => $svc)
      @php $slug = Str::slug($svc->data('title', '')); $imgSrc = cms_asset($svc->data('image', '')); @endphp
      <div class="svc rev" style="transition-delay:{{ $idx * 0.1 }}s">
        <div class="svc-num">0{{ $idx + 1 }}</div>
        <div class="svc-icon">
          @if($imgSrc)
            <img src="{{ $imgSrc }}" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:14px;" loading="lazy">
          @else
          <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="7" height="7" rx="1" fill="#6366f1"/><rect x="14" y="3" width="7" height="7" rx="1" fill="#6366f1"/><rect x="14" y="14" width="7" height="7" rx="1" fill="#6366f1"/><rect x="3" y="14" width="7" height="7" rx="1" fill="#6366f1"/></svg>
          @endif
        </div>
        <h3 class="svc-title">{{ $svc->data('title') }}</h3>
        <p class="svc-desc">{{ $svc->data('text') }}</p>
        <a href="{{ route('fabrica') }}#svc-{{ $slug }}" class="svc-arrow" style="text-decoration:none;">→</a>
      </div>
      @endforeach
    @else
      @foreach(config('softura-content.servicios', []) as $idx => $servicio)
      @if($idx < 3)
      <div class="svc rev" style="transition-delay:{{ $idx * 0.1 }}s">
        <div class="svc-num">0{{ $idx + 1 }}</div>
        <div class="svc-icon">
          @if(!empty($servicio['imagen']) && file_exists(public_path($servicio['imagen'])))
            <img src="{{ asset($servicio['imagen']) }}" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:14px;" loading="lazy">
          @endif
        </div>
        <h3 class="svc-title">{{ $servicio['titulo'] }}</h3>
        <p class="svc-desc">{{ $servicio['descripcion'] ?? '' }}</p>
        <a href="{{ route('fabrica') }}#svc-{{ $servicio['slug'] ?? '' }}" class="svc-arrow" style="text-decoration:none;">→</a>
      </div>
      @endif
      @endforeach
    @endif
  </div>
  <div class="rev" style="text-align:center;margin-top:3rem;">
    <a href="{{ route('fabrica') }}" class="btn-p" style="text-decoration:none;display:inline-block;">Ver fábrica de software completa</a>
  </div>
</section>
@endif

{{-- ─── PRODUCTOS ───────────────────────────────────────────────────────────── --}}
@php
  $stack       = $sections->get('stack');
  $stackCtaUrl = ($stack?->content('cta_url')) ?: '/productos';
  $stackCtaHref = str_starts_with($stackCtaUrl, 'http') ? $stackCtaUrl : url($stackCtaUrl);
@endphp
@if(!$stack || $stack->is_visible)
<section class="stack-section ht-spot" id="stack">
  <div class="ht-spot__inner">

    <div class="ht-spot__head rev">
      <div class="sec-label">{{ $stack?->content('kicker', 'Portafolio') }}</div>
      <h2>{!! $stack?->content('title', 'Nuestros <span>productos</span>') !!}</h2>
    </div>

    <div class="ht-spot__card rev">
      <div class="ht-spot__copy">
        <span class="ht-spot__pill">✦ Producto estrella</span>
        <div class="ht-spot__brand">
          <img src="{{ asset('img/bituyu.png') }}" alt="Bituyú" class="ht-spot__logo">
          <h3>Bituyú</h3>
        </div>
        <p>Red virtual de negocios que conecta empresas, automatiza procesos y centraliza operaciones en una sola plataforma.</p>
        <ul class="ht-spot__list">
          <li>Catálogo digital y comercio electrónico</li>
          <li>Facturación electrónica CFDI</li>
          <li>Gestión multi-empresa en tiempo real</li>
        </ul>
        <a href="{{ url('/productos') }}#bituyu-full-section" class="ht-spot__link">Conoce Bituyú →</a>
      </div>
      <div class="ht-spot__visual">
        <img src="{{ asset('img/official/productos/bituyu-slide.png') }}" alt="Bituyú" loading="lazy">
      </div>
    </div>

    <div class="ht-spot__cta rev">
      <a href="{{ $stackCtaHref }}" class="btn-p" style="text-decoration:none;display:inline-block;">
        {{ $stack?->content('cta_text', 'Ver todos los productos') }}
      </a>
    </div>

  </div>
</section>
@endif

{{-- ─── CLIENTES ─────────────────────────────────────────────────────────────── --}}
@php
  $homeClients = $sections->get('home_clients');
  $cnClients   = \App\Models\PageSection::forPage('conocenos')->get('clients');
  $cnClientSectors = $cnClients?->content('sectors', [
    ['name' => 'Gobierno',  'tag' => 'Sector gobierno'],
    ['name' => 'Educativo', 'tag' => 'Sector educativo'],
    ['name' => "TIC's",     'tag' => "Sector TIC's"],
    ['name' => 'Privado',   'tag' => 'Iniciativa privada'],
  ]);
@endphp
@if(!$homeClients || $homeClients->is_visible)
<section class="cn-section" id="home-clientes">
  <div class="cn-container">
    <header class="cn-head rev">
      <span class="cn-label">{{ $cnClients?->content('badge_text', 'Confianza') }}</span>
      <h2>{{ $cnClients?->content('title', 'Ellos nos avalan') }}</h2>
      <p>{{ $cnClients?->content('description', 'A lo largo de los años hemos establecido relaciones comerciales basadas en la confianza con clientes de distintos giros y modelos de negocio.') }}</p>
    </header>
    <div class="cn-tabs rev" id="home-sector-tabs" role="tablist">
      @foreach($cnClientSectors as $i => $sector)
      <button type="button" {{ $i === 0 ? 'class="active"' : '' }} data-sector="{{ $i }}">{{ $sector['name'] }}</button>
      @endforeach
    </div>
    <div class="cn-panel rev" id="home-clients-carousel">
      @foreach($cnClientSectors as $i => $sector)
      @php $sectorLogos = $cnClients?->items->filter(fn($item) => (int)$item->data('sector', 0) === $i) ?? collect(); @endphp
      <div class="cn-carousel-item {{ $i === 0 ? 'active' : '' }}">
        <p class="cn-panel-tag">{{ $sector['tag'] }}</p>
        <div class="cn-logos">
          @foreach($sectorLogos as $logo)
            @php $src = cms_asset($logo->data('image') ?: ''); @endphp
            <img src="{{ $src }}" alt="{{ $logo->data('alt','') }}" loading="lazy">
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
    <div class="cn-dots" id="home-clients-dots"></div>
  </div>
</section>
@endif

{{-- ─── SOMOS DIFERENTES ───────────────────────────────────────────────────── --}}
@php $nosotros = $sections->get('nosotros'); @endphp
@if(!$nosotros || $nosotros->is_visible)
<section class="section" id="nosotros" style="background:var(--card);">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="sec-label rev">{{ $nosotros?->content('badge_text', 'Somos diferentes') }}</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:4rem;align-items:center;" class="rev">
      <div>
        <h2 style="margin-bottom:1.5rem;">{{ $nosotros?->content('title', '20 años impulsando la innovación') }}</h2>
        <p style="font-size:1.05rem;line-height:1.8;color:var(--gray);">{!! $nosotros?->content('description', 'Contamos con la experiencia y el compromiso necesarios para impulsar la innovación y el crecimiento de nuestros clientes, adaptándonos a las necesidades del mercado actual con soluciones tecnológicas de alto valor. <strong>Somos diferentes:</strong> más de 20 años impulsando la innovación.') !!}</p>
        <div style="display:flex;gap:1.5rem;align-items:center;margin-top:2rem;flex-wrap:wrap;">
          @if(file_exists(public_path('img/official/aliados/clustec.png')))
          <img src="{{ asset('img/official/aliados/clustec.png') }}" alt="CLUSTEC Tlaxcala" style="max-height:38px;object-fit:contain;opacity:.85;">
          @endif
          @if(file_exists(public_path('img/official/aliados/smartsoft.png')))
          <img src="{{ asset('img/official/aliados/smartsoft.png') }}" alt="SmartSoft" style="max-height:38px;object-fit:contain;opacity:.85;">
          @endif
        </div>
      </div>
      <div style="position:relative;">
        @php $nosotrosSrc = cms_asset($nosotros?->content('image', 'img/official/Conocenos/equipo.png')); @endphp
        <img src="{{ $nosotrosSrc }}" alt="Equipo Softura Solutions" style="width:100%;border-radius:20px;box-shadow:0 20px 50px rgba(0,0,0,.08);" loading="lazy">
      </div>
    </div>
  </div>
</section>
@endif

{{-- ─── STACK TECNOLÓGICO ───────────────────────────────────────────────────── --}}
@php $tecnologias = $sections->get('tecnologias'); @endphp
@if(!$tecnologias || $tecnologias->is_visible)
<section class="section ht-stack-section" id="tecnologias">
  <div class="ht-stack-inner">
    <div class="ht-stack-header rev">
      <div class="sec-label">{{ $tecnologias?->content('kicker', 'Stack tecnológico') }}</div>
      <h2>{{ $tecnologias?->content('title', 'Somos especialistas') }}</h2>
      <p>{{ $tecnologias?->content('description', 'Nuestro equipo trabaja con las tecnologías más relevantes del mercado, manteniéndose en constante actualización.') }}</p>
    </div>
    <div class="rev">
      @include('partials.deck-tech-logos')
    </div>
    @if($tecnologias?->content('quote'))
    <p class="ht-stack-quote rev">"{{ $tecnologias->content('quote') }}"</p>
    @endif
  </div>
</section>
@endif

{{-- ─── PROCESO (ONSHORING / NEARSHORING) ──────────────────────────────────── --}}
@php $proceso = $sections->get('proceso'); @endphp
@if(!$proceso || $proceso->is_visible)
<section class="ht-ext rev" id="proceso">
  <div class="ht-ext__inner">

    <div class="ht-ext__copy">
      <span class="sec-label">{{ $proceso?->content('kicker', 'Externalización') }}</span>
      <h2>{!! $proceso?->content('title', 'Tus verdaderos <span>aliados</span> de negocio') !!}</h2>
      <p>{{ $proceso?->content('footer_text', 'Hagamos equipo y deja de preocuparte de los costos de reclutamiento, selección y capacitación del personal.') }}</p>
      <a href="{{ route('nearshoring') }}" class="ht-ext__cta">
        Conoce Nearshoring y Onshoring
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>

    <div class="ht-ext__services">
      @php
        $extItems = $proceso?->items ?? collect();
        $fallback = [
          ['icon' => 'globe', 'title' => 'Onshoring', 'desc' => 'Ingenieros en tus instalaciones en México.'],
          ['icon' => 'pin',   'title' => 'Nearshoring', 'desc' => 'Trabajo remoto para E.U.A. y Latinoamérica.'],
        ];
      @endphp
      @if($extItems->count() > 0)
        @foreach($extItems as $idx => $card)
        <div class="ht-ext__pill">
          <div class="ht-ext__pill-icon">
            @if($idx % 2 === 0)
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
            @else
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            @endif
          </div>
          <div>
            <strong>{{ $card->data('title') }}</strong>
            <span>{{ $card->data('description') }}</span>
          </div>
        </div>
        @endforeach
      @else
        @foreach($fallback as $idx => $f)
        <div class="ht-ext__pill">
          <div class="ht-ext__pill-icon">
            @if($idx === 0)
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
            @else
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            @endif
          </div>
          <div>
            <strong>{{ $f['title'] }}</strong>
            <span>{{ $f['desc'] }}</span>
          </div>
        </div>
        @endforeach
      @endif
    </div>

  </div>
</section>
@endif

{{-- ─── CALIDAD CERTIFICADA ─────────────────────────────────────────────────── --}}
@php $calidad = $sections->get('calidad'); @endphp
@if(!$calidad || $calidad->is_visible)
<section class="ht-calidad rev" id="calidad">
  <div class="ht-calidad__inner">
    <div class="ht-calidad__copy">
      <span class="sec-label">{{ $calidad?->content('kicker', 'Calidad certificada') }}</span>
      <h2>{{ $calidad?->content('title', 'La calidad es nuestra prioridad') }}</h2>
      <p>{{ $calidad?->content('description', 'Desarrollamos con estándares internacionales — CMMi, PSP, MoProSoft y MAAGTICSI — combinados con metodologías ágiles y equipos certificados en Scrum.') }}</p>
    </div>
    @if($calidad?->items?->count() > 0)
    <div class="ht-calidad__logos">
      @foreach($calidad->items as $cert)
      <div class="ht-calidad__cert">
        @include('partials.official-logo', [
          'file'  => $cert->data('file') ?: null,
          'cdn'   => $cert->data('cdn') ?: null,
          'alt'   => $cert->data('name'),
          'class' => 'ht-calidad__img',
        ])
        <span>{{ $cert->data('name') }}</span>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- ─── FORMACIÓN CONTINUA ──────────────────────────────────────────────────── --}}
@php $capacitacion = $sections->get('capacitacion'); @endphp
@if(!$capacitacion || $capacitacion->is_visible)
<section class="section" id="capacitacion" style="background:var(--card);padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="rev" style="margin-bottom:3rem;">
      <div class="sec-label">{{ $capacitacion?->content('kicker', 'Formación continua') }}</div>
      <h2>{!! $capacitacion?->content('title', 'Equipo de profesionales <span>comprometidos</span>') !!}</h2>
    </div>
    @if($capacitacion?->items?->count() > 0)
    <div class="rev" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:2rem;margin-bottom:2.5rem;">
      @foreach($capacitacion->items as $metric)
      <div style="text-align:center;padding:2rem;background:var(--bg);border-radius:20px;border:1px solid var(--border);">
        <strong style="display:block;font-size:2.5rem;font-weight:700;color:var(--blue);line-height:1.1;margin-bottom:.5rem;">{{ $metric->data('value') }}</strong>
        <p style="color:var(--gray);font-size:.9rem;line-height:1.5;margin:0;">{{ $metric->data('text') }}</p>
      </div>
      @endforeach
    </div>
    @endif
    @if($capacitacion?->content('quote'))
    <p class="rev" style="text-align:center;color:var(--gray);font-size:1.05rem;font-style:italic;max-width:700px;margin:0 auto;">"{{ $capacitacion->content('quote') }}"</p>
    @endif
  </div>
</section>
@endif

{{-- ─── TALENTO ─────────────────────────────────────────────────────────────── --}}
@php $equipo = $sections->get('equipo'); @endphp
@if(!$equipo || $equipo->is_visible)
<section class="section" id="equipo" style="background:var(--bg);padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="rev" style="text-align:center;margin-bottom:3rem;">
      <div class="sec-label">{{ $equipo?->content('kicker', 'Talento') }}</div>
      <h2>{!! $equipo?->content('title', 'Contamos con un equipo de <span>especialistas</span>') !!}</h2>
      <p style="color:var(--gray);font-size:1.05rem;line-height:1.75;max-width:640px;margin:1rem auto 0;">{{ $equipo?->content('description') }}</p>
    </div>
    @if($equipo?->items?->count() > 0)
    <div data-cn-stagger class="talento-grid" style="display:flex;flex-wrap:wrap;justify-content:center;gap:.85rem;">
      @foreach($equipo->items as $rol)
      <span class="cn-stagger-item talento-pill">{{ $rol->data('label') }}</span>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- Red de aliados eliminada del home — se mantiene solo en conócenos --}}
{{-- Sección DevOps eliminada del home --}}
{{-- Sección Onshoring eliminada del home --}}
{{-- Sección Experiencia Integral eliminada del home --}}
{{-- Sección CTA Contacto eliminada del home --}}

@endsection

@push('scripts')
<script>
/* Animación stagger del home (independiente de page-conocenos, que es donde vive el observer original) */
(function () {
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  document.querySelectorAll('.page-home [data-cn-stagger]').forEach((group) => {
    const items = group.querySelectorAll('.cn-stagger-item');
    if (!items.length) return;
    if (reduced) {
      items.forEach((item) => item.classList.add('cn-visible'));
      return;
    }
    const obs = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          items.forEach((item, i) => {
            item.style.transitionDelay = i * 0.08 + 's';
            item.classList.add('cn-visible');
          });
          obs.unobserve(group);
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    obs.observe(group);
  });
})();
</script>
<script>
/* Carousel de clientes del home (independiente del de conócenos) — autoplay + spotlight de logos */
(function () {
  const section  = document.getElementById('home-clientes');
  const tabs     = document.querySelectorAll('#home-sector-tabs button');
  const carousel = document.getElementById('home-clients-carousel');
  const dotsEl   = document.getElementById('home-clients-dots');
  if (!section || !carousel || !tabs.length) return;

  const slides = carousel.querySelectorAll('.cn-carousel-item');
  let current = 0;
  let panelTimer = null;
  let spotTimer  = null;

  slides.forEach((_, i) => {
    const dot = document.createElement('button');
    dot.setAttribute('aria-label', 'Panel ' + (i + 1));
    if (i === 0) dot.classList.add('active');
    dot.addEventListener('click', () => show(i, true));
    dotsEl.appendChild(dot);
  });

  function show(i, userTriggered) {
    current = i;
    slides.forEach((s, j) => s.classList.toggle('active', j === i));
    tabs.forEach((t, j)   => t.classList.toggle('active', j === i));
    dotsEl.querySelectorAll('button').forEach((d, j) => d.classList.toggle('active', j === i));
    startSpotlight();
    if (userTriggered) restartPanelAutoplay();
  }

  function nextPanel() {
    show((current + 1) % slides.length, false);
  }

  function startPanelAutoplay() {
    panelTimer = setInterval(nextPanel, 5000);
  }

  function restartPanelAutoplay() {
    clearInterval(panelTimer);
    startPanelAutoplay();
  }

  function startSpotlight() {
    clearInterval(spotTimer);
    const activeSlide = slides[current];
    if (!activeSlide) return;
    const logos = activeSlide.querySelectorAll('.cn-logos img');
    if (!logos.length) return;
    let idx = 0;
    logos.forEach(l => l.classList.remove('cn-spotlight'));
    logos[0].classList.add('cn-spotlight');
    spotTimer = setInterval(() => {
      logos[idx].classList.remove('cn-spotlight');
      idx = (idx + 1) % logos.length;
      logos[idx].classList.add('cn-spotlight');
    }, 1400);
  }

  tabs.forEach((tab, i) => tab.addEventListener('click', () => show(i, true)));

  section.addEventListener('mouseenter', () => { clearInterval(panelTimer); clearInterval(spotTimer); });
  section.addEventListener('mouseleave', () => { startPanelAutoplay(); startSpotlight(); });

  startSpotlight();
  startPanelAutoplay();
})();
</script>
<script>
(function(){
  const canvas = document.getElementById('three-hero');
  const section = document.getElementById('hero-section');
  if(!canvas||!section) return;
  const renderer = new THREE.WebGLRenderer({canvas,alpha:true,antialias:true});
  renderer.setPixelRatio(Math.min(window.devicePixelRatio,2));
  renderer.setClearColor(0x000000,0);
  function resize(){renderer.setSize(section.offsetWidth,section.offsetHeight);camera.aspect=section.offsetWidth/section.offsetHeight;camera.updateProjectionMatrix();}
  const scene=new THREE.Scene();
  const camera=new THREE.PerspectiveCamera(60,1,0.1,100);
  camera.position.set(0,0,8);
  resize();
  window.addEventListener('resize',resize);
  scene.add(new THREE.AmbientLight(0xffffff,0.4));
  const dLight=new THREE.DirectionalLight(0x1A4FFF,1.5);dLight.position.set(5,5,5);scene.add(dLight);
  const dLight2=new THREE.DirectionalLight(0x00C9A7,1);dLight2.position.set(-5,-3,3);scene.add(dLight2);
  const wireMat=new THREE.MeshPhongMaterial({color:0x1A4FFF,wireframe:true,transparent:true,opacity:0.25});
  const objects=[];
  const mainSphere=new THREE.Mesh(new THREE.IcosahedronGeometry(1.8,3),wireMat.clone());mainSphere.material.opacity=0.15;scene.add(mainSphere);objects.push({mesh:mainSphere,rx:.003,ry:.005});
  const innerIco=new THREE.Mesh(new THREE.IcosahedronGeometry(1,1),new THREE.MeshPhongMaterial({color:0xEEF2FF,transparent:true,opacity:0.6,shininess:120}));scene.add(innerIco);objects.push({mesh:innerIco,rx:.006,ry:-.004});
  for(let i=0;i<3;i++){const ring=new THREE.Mesh(new THREE.TorusGeometry(2.5+i*.5,0.015,16,120),new THREE.MeshPhongMaterial({color:i===0?0x1A4FFF:i===1?0x00C9A7:0x6B6B80,transparent:true,opacity:0.5-i*.1}));ring.rotation.x=Math.PI/2*(i*.7+.5);ring.rotation.y=i*.8;scene.add(ring);objects.push({mesh:ring,rx:i%2===0?.004:-.003,ry:i%2===0?-.003:.005});}
  const orbiters=[];
  [{r:3.2,speed:.008,phase:0,y:.5,geo:new THREE.OctahedronGeometry(.18)},{r:3.5,speed:-.006,phase:2.1,y:-.4,geo:new THREE.TetrahedronGeometry(.15)},{r:2.8,speed:.01,phase:4.2,y:.8,geo:new THREE.OctahedronGeometry(.12)}].forEach(d=>{const m=new THREE.Mesh(d.geo,new THREE.MeshPhongMaterial({color:Math.random()>.5?0x1A4FFF:0x00C9A7,transparent:true,opacity:.8,shininess:100}));scene.add(m);orbiters.push({mesh:m,...d,t:d.phase});});
  const ptGeo=new THREE.BufferGeometry();const ptPos=new Float32Array(450);for(let i=0;i<450;i++)ptPos[i]=(Math.random()-.5)*20;ptGeo.setAttribute('position',new THREE.BufferAttribute(ptPos,3));scene.add(new THREE.Points(ptGeo,new THREE.PointsMaterial({color:0x1A4FFF,size:.04,transparent:true,opacity:.4})));
  const gridHelper=new THREE.GridHelper(20,30,0x1A4FFF,0xE4E4EE);gridHelper.material.transparent=true;gridHelper.material.opacity=0.15;gridHelper.position.y=-4;scene.add(gridHelper);
  let mox=0,moy=0;document.addEventListener('mousemove',e=>{mox=(e.clientX/window.innerWidth-.5)*2;moy=(e.clientY/window.innerHeight-.5)*2;});
  function animate(){requestAnimationFrame(animate);objects.forEach(o=>{o.mesh.rotation.x+=o.rx;o.mesh.rotation.y+=o.ry;});orbiters.forEach(o=>{o.t+=o.speed;o.mesh.position.x=Math.cos(o.t)*o.r;o.mesh.position.z=Math.sin(o.t)*o.r;o.mesh.position.y=o.y+Math.sin(o.t*2)*.3;o.mesh.rotation.x+=.02;o.mesh.rotation.y+=.015;});camera.position.x+=(mox*1.5-camera.position.x)*.04;camera.position.y+=(-moy*1-camera.position.y)*.04;camera.lookAt(0,0,0);renderer.render(scene,camera);}
  animate();
})();

// Satélites interactivos (fallback ecosistema)
document.addEventListener("DOMContentLoaded",()=>{
  const nodes=document.querySelectorAll('.sat-node');
  const core=document.getElementById('eco-core');
  if(!core) return;
  const coreLogo=document.getElementById('core-logo-placeholder');
  const coreDesc=document.getElementById('core-desc');
  const defaultTitle=coreLogo.innerHTML;
  const defaultDesc=coreDesc.innerHTML;
  nodes.forEach(node=>{
    node.addEventListener('mouseenter',()=>{
      core.style.borderColor="#1A4FFF";core.style.boxShadow="0 0 50px rgba(26,79,255,0.6)";
      coreLogo.innerHTML=`<img src="${node.getAttribute('data-img')}" style="max-height:100%;max-width:100%;object-fit:contain;">`;
      coreDesc.innerHTML=`<strong>${node.getAttribute('data-title')}</strong><br>${node.getAttribute('data-desc')}`;
    });
    node.addEventListener('mouseleave',()=>{core.style.borderColor="rgba(26,79,255,0.15)";core.style.boxShadow="0 0 40px rgba(26,79,255,0.4)";coreLogo.innerHTML=defaultTitle;coreDesc.innerHTML=defaultDesc;});
  });
});
</script>
@endpush
