@extends('layouts.web')

@section('title', 'Softura Solutions')
@section('body-class', 'page-home')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home-inicio.css') }}">
<link rel="stylesheet" href="{{ asset('css/home-polish.css') }}">
<link rel="stylesheet" href="{{ asset('css/conocenos.css') }}">
@endpush

@php
  $hero        = $sections->get('hero');
  $heroBgPath  = $hero?->content('background_image');
  $heroBgSrc   = $heroBgPath ? cms_asset($heroBgPath) : null;
  $heroIsPhoto = (bool) $hero?->content('use_image', false) && $heroBgSrc;
@endphp

@unless($heroIsPhoto)
@push('head-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
@endpush
@endunless

@section('content')

{{-- ─── HERO (animación o imagen, según el admin) ─────────────────────────────── --}}
<section class="hero @if($heroIsPhoto) hero--photo @endif" id="hero-section">
  @if($heroIsPhoto)
    <div class="hero-media"><img src="{{ $heroBgSrc }}" alt="" loading="eager"></div>
    <div class="hero-overlay"></div>
  @else
    <canvas id="three-hero"></canvas>
  @endif
  <div class="hero-content">
    <div class="hero-badge">
      <span class="badge-dot"></span>
      {{ $hero?->content('badge_text', 'Softura Solutions') }}
    </div>
    <h1>{!! $hero?->content('title', 'Software<br><em>a la</em><br>medida') !!}</h1>
    <p class="hero-sub">
      {{ $hero?->content('description', 'Impulsamos la evolución de tu empresa con tecnología de alto rendimiento diseñada para el mercado actual.') }}
    </p>
    <div class="hero-actions">
      <a href="{{ $hero?->content('cta1_url', '#servicios') }}" class="btn-p @if($heroIsPhoto) btn-p--hero @endif" style="text-decoration:none;display:inline-block;">{{ $hero?->content('cta1_text', 'Conoce nuestros servicios') }}</a>
      <a href="{{ $hero?->content('cta2_url') ?: route('conocenos') }}" class="btn-g @if($heroIsPhoto) btn-g--hero @endif">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        {{ $hero?->content('cta2_text', 'Ver más') }}
      </a>
    </div>
  </div>
</section>

{{-- ─── STATS ──────────────────────────────────────────────────────────────── --}}
@if($hero && $hero->is_visible && $hero->items->count() > 0)
<div class="stats">
  @foreach($hero->items as $i => $stat)
  <div class="stat rev" style="transition-delay:{{ $i * 0.1 }}s">
    <div class="stat-n" data-target="{{ preg_replace('/[^0-9]/', '', $stat->data('value')) }}" data-suffix="{{ preg_replace('/[0-9]/', '', $stat->data('value')) }}">{{ $stat->data('value') }}</div>
    <div class="stat-l">{{ $stat->data('label') }}</div>
  </div>
  @endforeach
</div>
@else
<div class="stats">
  <div class="stat rev" style="transition-delay:0s">
    <div class="stat-n" data-target="20" data-suffix="+">20+</div>
    <div class="stat-l" data-i18n="home.stat.years">Años de experiencia</div>
  </div>
  <div class="stat rev" style="transition-delay:0.1s">
    <div class="stat-n" data-target="30" data-suffix="+">30+</div>
    <div class="stat-l" data-i18n="home.stat.team">Profesionales especializados</div>
  </div>
  <div class="stat rev" style="transition-delay:0.2s">
    <div class="stat-n" data-target="100" data-suffix="+">100+</div>
    <div class="stat-l" data-i18n="home.stat.allies">Ingenieros aliados CLUSTEC</div>
  </div>
  <div class="stat rev" style="transition-delay:0.3s">
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
  <div class="services-inner">
    <div class="services-head rev">
      <div class="sec-label">{{ $srvIntro?->content('badge_text', 'Fábrica de software') }}</div>
      <h2>{!! $srvIntro?->content('title', 'Descubre cómo podemos <span>ayudarte</span>') !!}</h2>
      <p class="services-sub">{{ $srvIntro?->content('description', 'Soluciones integrales de desarrollo, consultoría y acompañamiento para llevar tu negocio al siguiente nivel.') }}</p>
    </div>
    <div class="services-grid">
      @php
        $fabricaSvc = \App\Models\PageSection::get('fabrica', 'servicios');
        $serviciosList = $fabricaSvc ? $fabricaSvc->items : collect();
        $svcIcons = [
          '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
          '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><circle cx="12" cy="17" r="1" fill="currentColor" stroke="none"/></svg>',
          '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
          '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
          '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>',
          '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>',
        ];
      @endphp
      @if($serviciosList->count() > 0)
        @foreach($serviciosList->take(3) as $idx => $svc)
        @php $slug = Str::slug($svc->data('title', '')); @endphp
        <div class="svc rev" style="transition-delay:{{ $idx * 0.1 }}s">
          <div class="svc-num">0{{ $idx + 1 }}</div>
          <div class="svc-icon">
            {!! $svcIcons[$idx] ?? $svcIcons[0] !!}
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
            {!! $svcIcons[$idx] ?? $svcIcons[0] !!}
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
  </div>
</section>
@endif

{{-- ─── PROCESO (ONSHORING / NEARSHORING) ──────────────────────────────────── --}}
@php $proceso = $sections->get('proceso'); @endphp
@if(!$proceso || $proceso->is_visible)
<section class="ht-ext" id="proceso">
  <div class="ht-ext__inner">

    <div class="ht-ext__copy rev">
      <span class="sec-label">{{ $proceso?->content('kicker', 'Externalización') }}</span>
      <h2>{!! $proceso?->content('title', 'Tus verdaderos <span>aliados</span> de negocio') !!}</h2>
      <p>{!! $proceso?->content('footer_text', 'Hagamos equipo y deja de preocuparte de los costos de reclutamiento, selección y capacitación del personal.') !!}</p>
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
        <div class="ht-ext__pill rev" style="transition-delay:{{ 0.1 + $idx * 0.12 }}s">
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
        <div class="ht-ext__pill rev" style="transition-delay:{{ 0.1 + $idx * 0.12 }}s">
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

{{-- ─── PRODUCTOS ───────────────────────────────────────────────────────────── --}}
@php
  $stack       = $sections->get('stack');
  $stackCtaUrl = ($stack?->content('cta_url')) ?: '/productos';
  $stackCtaHref = str_starts_with($stackCtaUrl, 'http') ? $stackCtaUrl : url($stackCtaUrl);
  $stackLinkUrl = $stack?->content('link_url') ?: '/productos#bituyu-full-section';
  $stackLinkHref = str_starts_with($stackLinkUrl, 'http') ? $stackLinkUrl : url($stackLinkUrl);
  $stackLogo = cms_asset($stack?->content('brand_logo') ?: 'img/bituyu.png');
  $stackImage = cms_asset($stack?->content('product_image') ?: 'img/official/productos/bituyu-slide.png');
  $stackWebsiteUrl = $stack?->content('website_url');
@endphp
@if(!$stack || $stack->is_visible)
<section class="stack-section ht-spot" id="stack">
  <div class="ht-spot__inner">

    <div class="ht-spot__grid rev">
      <div class="ht-spot__head">
        <div class="sec-label">{{ $stack?->content('kicker', 'Portafolio') }}</div>
        <h2>{!! $stack?->content('title', 'Nuestros <span>productos</span>') !!}</h2>
      </div>

      <div class="ht-spot__copy">
        <div class="ht-spot__brand">
          <img src="{{ $stackLogo }}" alt="{{ $stack?->content('brand_name', 'Bituyú') }}" class="ht-spot__logo">
          <h3>{{ $stack?->content('brand_name', 'Bituyú') }}</h3>
        </div>
        <p>{{ $stack?->content('description', 'Red virtual de negocios que conecta empresas, automatiza procesos y centraliza operaciones en una sola plataforma.') }}</p>
        @if($stack?->items?->count() > 0)
        <ul class="ht-spot__list">
          @foreach($stack->items as $point)
          <li>{{ $point->data('text') }}</li>
          @endforeach
        </ul>
        @endif
        <div class="ht-spot__links">
          <a href="{{ $stackLinkHref }}" class="ht-spot__link">{{ $stack?->content('link_text', 'Conoce Bituyú →') }}</a>
          @if($stackWebsiteUrl)
          <a href="{{ $stackWebsiteUrl }}" class="ht-spot__weblink" target="_blank" rel="noopener">
            {{ $stack?->content('website_text') ?: 'Visitar sitio web' }}
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><path d="M15 3h6v6"/><path d="M10 14L21 3"/></svg>
          </a>
          @endif
        </div>
      </div>
      <div class="ht-spot__visual">
        <div class="ht-spot__blob" aria-hidden="true"></div>
        <img src="{{ $stackImage }}" alt="{{ $stack?->content('brand_name', 'Bituyú') }}" loading="lazy">
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
<section class="ht-nosotros" id="nosotros">
  <div class="ht-nosotros__inner">
    <div class="ht-nosotros__copy rev">
      <span class="sec-label">{{ $nosotros?->content('badge_text', 'Somos diferentes') }}</span>
      <h2>{{ $nosotros?->content('title', '20 años impulsando la innovación') }}</h2>
      <p>{!! $nosotros?->content('description', 'Contamos con la experiencia y el compromiso necesarios para impulsar la innovación y el crecimiento de nuestros clientes, adaptándonos a las necesidades del mercado actual con soluciones tecnológicas de alto valor. <strong>Somos diferentes:</strong> más de 20 años impulsando la innovación.') !!}</p>
    </div>
    <div class="ht-nosotros__visual rev" style="transition-delay:0.15s">
      @php $nosotrosSrc = cms_asset($nosotros?->content('image', 'img/official/Conocenos/equipo.png')); @endphp
      <img src="{{ $nosotrosSrc }}" alt="Equipo Softura Solutions" loading="lazy">
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

{{-- ─── CALIDAD CERTIFICADA ─────────────────────────────────────────────────── --}}
@php $calidad = $sections->get('calidad'); @endphp
@if(!$calidad || $calidad->is_visible)
<section class="ht-calidad" id="calidad">
  <div class="ht-calidad__inner">
    <div class="ht-calidad__copy rev">
      <span class="sec-label">{{ $calidad?->content('kicker', 'Calidad certificada') }}</span>
      <h2>{{ $calidad?->content('title', 'La calidad es nuestra prioridad') }}</h2>
      <p>{{ $calidad?->content('description', 'Desarrollamos con estándares internacionales — CMMi, PSP, MoProSoft y MAAGTICSI — combinados con metodologías ágiles y equipos certificados en Scrum.') }}</p>
    </div>
    @if($calidad?->items?->count() > 0)
    <div class="ht-calidad__logos">
      @foreach($calidad->items as $cert)
      <div class="ht-calidad__cert rev" style="transition-delay:{{ 0.1 + $loop->index * 0.1 }}s">
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

{{-- ─── VOCES / TESTIMONIOS ─────────────────────────────────────────────────── --}}
@php $testimonials = $sections->get('testimonials'); @endphp
@if(!$testimonials || $testimonials->is_visible)
<section class="ht-testi rev" id="testimonios">
  <div class="ht-testi__inner">
    <div class="ht-testi__head">
      <span class="sec-label">{{ $testimonials?->content('badge_text', 'Voces') }}</span>
      <h2>{{ $testimonials?->content('title', 'Lo que dicen nuestros clientes') }}</h2>
    </div>

    <div class="ht-testi__viewport" id="testimonial-carousel">
      <div class="ht-testi__track">
        @foreach($testimonials?->items ?? collect() as $item)
          @php $logoSrc = cms_asset($item->data('logo_image') ?: ''); @endphp
          <article class="cn-quote ht-testi__slide">
            <span class="cn-quote-mark" aria-hidden="true">"</span>
            <header><img src="{{ $logoSrc }}" alt="{{ $item->data('author_name') }}" loading="lazy"></header>
            <blockquote>{{ $item->data('quote') }}</blockquote>
            <footer>
              <strong>{{ $item->data('author_name') }}</strong>
              <span>{{ $item->data('author_role') }}</span>
            </footer>
          </article>
        @endforeach
      </div>
    </div>

    <div class="ht-testi__nav">
      <button type="button" class="ht-testi__arrow" id="testimonial-prev" aria-label="Testimonio anterior">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
      <div class="cn-dots" id="testimonial-dots"></div>
      <button type="button" class="ht-testi__arrow" id="testimonial-next" aria-label="Siguiente testimonio">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
      </button>
    </div>
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
/* Carrusel "coverflow" de testimonios — activa al centro, vecinas a los lados, loop infinito */
(function () {
  const viewport = document.getElementById('testimonial-carousel');
  if (!viewport) return;
  const track = viewport.querySelector('.ht-testi__track');
  const realSlides = Array.from(track.querySelectorAll('.ht-testi__slide'));
  const dotsEl = document.getElementById('testimonial-dots');
  const prevBtn = document.getElementById('testimonial-prev');
  const nextBtn = document.getElementById('testimonial-next');
  const n = realSlides.length;
  if (!n) return;

  let current = n > 1 ? 1 : 0;   // posición en la pista (1 = primer slide real, ya que 0 es el clon del último)
  let startX = 0;
  let timer = null;
  const track_n = n;

  if (n > 1) {
    const firstClone = realSlides[0].cloneNode(true);
    const lastClone = realSlides[n - 1].cloneNode(true);
    firstClone.setAttribute('aria-hidden', 'true');
    lastClone.setAttribute('aria-hidden', 'true');
    track.appendChild(firstClone);
    track.insertBefore(lastClone, realSlides[0]);
  }

  const allSlides = Array.from(track.querySelectorAll('.ht-testi__slide'));
  const total = allSlides.length;

  function realIndexOf(trackIdx) {
    return ((trackIdx - 1) % track_n + track_n) % track_n;
  }

  function updateClasses() {
    allSlides.forEach((el, i) => el.classList.toggle('is-active', i === current));
    dotsEl?.querySelectorAll('button').forEach((d, i) => d.classList.toggle('active', i === realIndexOf(current)));
  }

  function center(withTransition) {
    const slide = allSlides[current];
    const offset = (viewport.offsetWidth - slide.offsetWidth) / 2 - slide.offsetLeft;
    track.style.transition = withTransition === false ? 'none' : '';
    track.style.transform = 'translateX(' + offset + 'px)';
  }

  function goTo(trackIndex, withTransition) {
    current = trackIndex;
    updateClasses();
    center(withTransition);
  }

  function next() { if (n > 1) goTo(current + 1); }
  function prev() { if (n > 1) goTo(current - 1); }

  track.addEventListener('transitionend', (e) => {
    if (e.target !== track || n < 2) return;
    if (current === total - 1) {
      requestAnimationFrame(() => goTo(1, false));
    } else if (current === 0) {
      requestAnimationFrame(() => goTo(total - 2, false));
    }
  });

  if (dotsEl && n > 1) {
    dotsEl.innerHTML = '';
    realSlides.forEach((_, i) => {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.setAttribute('aria-label', 'Testimonio ' + (i + 1));
      if (i === 0) dot.classList.add('active');
      dot.addEventListener('click', () => { goTo(i + 1); restart(); });
      dotsEl.appendChild(dot);
    });
  }

  prevBtn?.addEventListener('click', () => { prev(); restart(); });
  nextBtn?.addEventListener('click', () => { next(); restart(); });

  function start() {
    if (n < 2) return;
    timer = setInterval(next, 9000);
  }
  function restart() { clearInterval(timer); start(); }

  viewport.addEventListener('mouseenter', () => clearInterval(timer));
  viewport.addEventListener('mouseleave', start);

  viewport.addEventListener('touchstart', (e) => { startX = e.changedTouches[0].screenX; }, { passive: true });
  viewport.addEventListener('touchend', (e) => {
    const diff = e.changedTouches[0].screenX - startX;
    if (Math.abs(diff) < 50) return;
    diff < 0 ? next() : prev();
    restart();
  }, { passive: true });

  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => center(false), 120);
  });

  updateClasses();
  center(false);
  start();
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
