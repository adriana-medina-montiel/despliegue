@extends('layouts.web')

@section('title', 'Softura Solutions')
@section('body-class', 'page-home')

@section('nav-home-link')
<li><a href="{{ route('home') }}" class="nav-active" data-i18n="nav.home">Inicio</a></li>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home-polish.css') }}">
<link rel="stylesheet" href="{{ asset('css/softura-deck.css') }}">
@endpush

@section('content')
@php
  $hero = $sections->get('hero');
@endphp
@if(!$hero || $hero->is_visible)
<section class="hero hero--photo" id="hero-section">
  <div class="hero-media" aria-hidden="true">
    @php
      $heroSrc = cms_asset($hero?->content('background_image', 'img/official/Conocenos/software.jpg'));
    @endphp
    <img src="{{ $heroSrc }}" alt="" loading="eager">
    <div class="hero-overlay"></div>
  </div>

  <div class="hero-content">
    <h1 data-i18n-html="home.hero.title">{!! $hero?->content('title', 'Un poco de software <em>hace la diferencia</em>') !!}</h1>
    <p class="hero-sub" data-i18n="home.hero.sub">
      {{ $hero?->content('description', 'Ayudamos a las empresas a crecer con soluciones de software a la medida, respaldadas por consultoría especializada y más de 20 años de experiencia.') }}
    </p>
    <div class="hero-actions">
      <a href="{{ $hero?->content('cta1_url', '#servicios') }}" class="btn-p btn-p--hero">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
        <span data-i18n="home.hero.cta1">{{ $hero?->content('cta1_text', 'Conoce nuestros servicios') }}</span>
      </a>
      <a href="{{ $hero?->content('cta2_url', route('conocenos')) }}" class="btn-g btn-g--hero">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        <span data-i18n="home.hero.cta2">{{ $hero?->content('cta2_text', 'Ver más') }}</span>
      </a>
    </div>
  </div>
</section>
@endif

@if($hero && $hero->is_visible && $hero->items->count() > 0)
<div class="stats-float rev">
  <div class="stats-inner">
    @foreach($hero->items as $stat)
    <div class="stat">
      <div class="stat-icon stat-icon--{{ $stat->data('color', 'blue') }}" aria-hidden="true">
        <i class="fas fa-{{ $stat->data('icon', 'chart-bar') }}" style="font-size:18px"></i>
      </div>
      <div class="stat-n" data-target="{{ preg_replace('/[^0-9]/', '', $stat->data('value')) }}" data-suffix="{{ preg_replace('/[0-9]/', '', $stat->data('value')) }}">{{ $stat->data('value') }}</div>
      <div class="stat-l">{{ $stat->data('label') }}</div>
    </div>
    @endforeach
  </div>
</div>
@else
<div class="stats-float rev">
  <div class="stats-inner">
    <div class="stat">
      <div class="stat-icon stat-icon--blue" aria-hidden="true">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      </div>
      <div class="stat-n" data-target="20" data-suffix="+">20+</div>
      <div class="stat-l" data-i18n="home.stat.years">Años de experiencia</div>
    </div>
    <div class="stat">
      <div class="stat-icon stat-icon--green" aria-hidden="true">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      </div>
      <div class="stat-n" data-target="30" data-suffix="+">30+</div>
      <div class="stat-l" data-i18n="home.stat.team">Profesionales especializados</div>
    </div>
    <div class="stat">
      <div class="stat-icon stat-icon--orange" aria-hidden="true">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
      </div>
      <div class="stat-n" data-target="100" data-suffix="+">100+</div>
      <div class="stat-l" data-i18n="home.stat.allies">Ingenieros aliados CLUSTEC</div>
    </div>
    <div class="stat">
      <div class="stat-icon stat-icon--purple" aria-hidden="true">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      </div>
      <div class="stat-n" data-target="7" data-suffix="">7</div>
      <div class="stat-l" data-i18n="home.stat.services">Servicios especializados</div>
    </div>
    <div class="stat">
      <div class="stat-icon stat-icon--teal" aria-hidden="true">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
      </div>
      <div class="stat-n" data-target="4" data-suffix="+">4+</div>
      <div class="stat-l" data-i18n="home.stat.quality">Normas de calidad</div>
    </div>
  </div>
</div>
@endif

@php $nosotros = $sections->get('nosotros'); @endphp
@if(!$nosotros || $nosotros->is_visible)
<section class="ss-section ss-section--light" id="nosotros">
  <div class="ss-container ss-split rev">
    <div class="ss-split-text">
      <span class="ss-kicker">{{ $nosotros?->content('badge_text', 'Somos diferentes') }}</span>
      <h2 class="ss-title">{{ $nosotros?->content('title', '20 años impulsando la innovación') }}</h2>
      <p class="ss-lead">{!! $nosotros?->content('description', 'Contamos con la experiencia y el compromiso necesarios para impulsar la innovación y el crecimiento de nuestros clientes, adaptándonos a las necesidades del mercado actual con soluciones tecnológicas de alto valor. <strong>Somos diferentes:</strong> más de 20 años impulsando la innovación.') !!}</p>
      <div class="ss-badges">
        <img src="{{ asset('img/official/aliados/clustec.png') }}" alt="CLUSTEC Tlaxcala" class="ss-partner-logo">
        <img src="{{ asset('img/official/aliados/smartsoft.png') }}" alt="SmartSoft" class="ss-partner-logo">
      </div>
    </div>
    <div class="ss-split-media">
      @php
        $nosotrosSrc = cms_asset($nosotros?->content('image', 'img/official/Conocenos/equipo.png'));
      @endphp
      <img src="{{ $nosotrosSrc }}" alt="Equipo Softura Solutions" class="ss-media-photo" loading="lazy">
    </div>
  </div>
</section>
@endif

@php $srvIntro = $sections->get('services_intro'); @endphp
@if(!$srvIntro || $srvIntro->is_visible)
<section class="ss-section ss-section--white" id="servicios">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">{{ $srvIntro?->content('badge_text', 'Fábrica de software') }}</span>
      <h2 class="ss-title">{!! $srvIntro?->content('title', 'Descubre cómo podemos <span>ayudarte</span>') !!}</h2>
      <p class="ss-lead ss-lead--center">{{ $srvIntro?->content('description', 'Soluciones integrales de desarrollo, consultoría y acompañamiento para llevar tu negocio al siguiente nivel.') }}</p>
    </header>
    <div class="ss-services-grid ss-services-grid--icons rev">
      @php
        $fabricaSvc = \App\Models\PageSection::get('fabrica', 'servicios');
        $serviciosList = $fabricaSvc ? $fabricaSvc->items : collect();
      @endphp
      @if($serviciosList->count() > 0)
        @foreach($serviciosList as $svc)
        @php
          $slug = Str::slug($svc->data('title', ''));
          $imgSrc = cms_asset($svc->data('image', ''));
        @endphp
        <a href="{{ route('fabrica') }}#svc-{{ $slug }}" class="ss-card ss-card--icon">
          @if($imgSrc)
            <img src="{{ $imgSrc }}" alt="" loading="lazy">
          @endif
          <h3>{{ $svc->data('title') }}</h3>
        </a>
        @endforeach
      @else
        @foreach(config('softura-content.servicios') as $servicio)
        <a href="{{ route('fabrica') }}#svc-{{ $servicio['slug'] }}" class="ss-card ss-card--icon">
          @if(!empty($servicio['imagen']) && file_exists(public_path($servicio['imagen'])))
            <img src="{{ asset($servicio['imagen']) }}" alt="" loading="lazy">
          @endif
          <h3>{{ $servicio['titulo'] }}</h3>
        </a>
        @endforeach
      @endif
    </div>
    <div class="ss-head-cta rev">
      <a href="{{ route('fabrica') }}" class="btn-p">Ver fábrica de software</a>
    </div>
  </div>
</section>
@endif

@php $devops = $sections->get('devops'); @endphp
@if(!$devops || $devops->is_visible)
<section class="ss-section ss-section--dark" id="devops">
  <div class="ss-container ss-split ss-split--reverse rev">
    <div class="ss-split-media ss-devops-visual">
      <img src="{{ cms_asset($devops?->content('image', 'img/official/productos/devops.jpg')) }}" alt="Entrega continua y DevOps" class="ss-media-photo" loading="lazy">
    </div>
    <div class="ss-split-text">
      <span class="ss-kicker ss-kicker--gold">{{ $devops?->content('kicker', 'DevOps') }}</span>
      <h2 class="ss-title ss-title--light">{{ $devops?->content('title', 'Entrega continua y confiable') }}</h2>
      <p class="ss-lead ss-lead--light">{{ $devops?->content('lead', 'Podemos ejecutar proyectos utilizando una filosofía para entregar software de forma más rápida, confiable y continua:') }}</p>
      <ul class="ss-list ss-list--light">
        @foreach(($devops?->items ?? collect()) as $bullet)
        <li>{{ $bullet->data('text') }}</li>
        @endforeach
      </ul>
    </div>
  </div>
</section>
@endif

@php $onshoring = $sections->get('onshoring'); @endphp
@if(!$onshoring || $onshoring->is_visible)
<section class="ss-section ss-section--dark ss-section--alt" id="onshoring">
  <div class="ss-container ss-split rev">
    <div class="ss-split-text">
      <span class="ss-kicker ss-kicker--gold">{{ $onshoring?->content('kicker', 'Onshoring') }}</span>
      <h2 class="ss-title ss-title--light">{{ $onshoring?->content('title', 'Onshoring') }}</h2>
      <p class="ss-lead ss-lead--light">{{ $onshoring?->content('description') }}</p>
      <p class="ss-lead ss-lead--light ss-repse"><i class="fas fa-certificate" aria-hidden="true"></i> {!! $onshoring?->content('repse_text') !!}</p>
    </div>
    <div class="ss-split-media">
      <img src="{{ cms_asset($onshoring?->content('image', 'img/official/productos/onshoring.jpg')) }}" alt="Equipo de desarrollo en México" class="ss-media-photo" loading="lazy">
    </div>
  </div>
</section>
@endif

@php $calidad = $sections->get('calidad'); @endphp
@if(!$calidad || $calidad->is_visible)
<section class="ss-section ss-section--dark" id="calidad">
  <div class="ss-container">
    <header class="ss-head ss-head--light rev">
      <span class="ss-kicker ss-kicker--gold">{{ $calidad?->content('kicker', 'Calidad certificada') }}</span>
      <h2 class="ss-title ss-title--light">{{ $calidad?->content('title', 'La calidad es nuestra prioridad') }}</h2>
      <p class="ss-lead ss-lead--light ss-lead--center">{{ $calidad?->content('description') }}</p>
    </header>
    <div class="ss-certs ss-certs--logos rev">
      @foreach(($calidad?->items ?? collect()) as $cert)
      <div class="ss-cert ss-cert--logo">
        @include('partials.official-logo', [
          'file' => $cert->data('file') ?: null,
          'cdn' => $cert->data('cdn') ?: null,
          'alt' => $cert->data('name'),
          'class' => 'sp-official-logo sp-official-logo--cert',
        ])
        <span>{{ $cert->data('name') }}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endif

@php $valor = $sections->get('valor'); @endphp
@if(!$valor || $valor->is_visible)
<section class="ss-section ss-section--light" id="valor">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">{{ $valor?->content('kicker', 'Experiencia integral') }}</span>
      <h2 class="ss-title">{!! $valor?->content('title', 'Mejoramos tu <span>experiencia</span>') !!}</h2>
      <p class="ss-lead ss-lead--center">{{ $valor?->content('description') }}</p>
    </header>
    <div class="ss-values rev">
      @foreach(($valor?->items ?? collect()) as $item)
      <article class="ss-value">
        <div class="ss-value-num">{{ $item->data('num') }}</div>
        <h3>{{ $item->data('title') }}</h3>
        <p>{{ $item->data('text') }}</p>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endif

@php $equipo = $sections->get('equipo'); @endphp
@if(!$equipo || $equipo->is_visible)
<section class="ss-section ss-section--white" id="equipo">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">{{ $equipo?->content('kicker', 'Talento') }}</span>
      <h2 class="ss-title">{!! $equipo?->content('title', 'Contamos con un equipo de <span>especialistas</span>') !!}</h2>
      <p class="ss-lead ss-lead--center">{{ $equipo?->content('description') }}</p>
    </header>
    <div class="ss-roles rev">
      @foreach(($equipo?->items ?? collect()) as $rol)
      <div class="ss-role"><span>{{ $rol->data('label') }}</span></div>
      @endforeach
    </div>
  </div>
</section>
@endif

@php $tecnologias = $sections->get('tecnologias'); @endphp
@if(!$tecnologias || $tecnologias->is_visible)
<section class="ss-section ss-section--light" id="tecnologias">
  <div class="ss-container ss-split rev">
    <div class="ss-tech-visual ss-tech-panel">
      @include('partials.deck-tech-logos')
    </div>
    <div class="ss-split-text">
      <span class="ss-kicker">{{ $tecnologias?->content('kicker', 'Stack tecnológico') }}</span>
      <h2 class="ss-title">{{ $tecnologias?->content('title', 'Somos especialistas') }}</h2>
      <p class="ss-lead">{{ $tecnologias?->content('description') }}</p>
      <blockquote class="ss-quote">"{{ $tecnologias?->content('quote', 'Nuestro principal enfoque son tecnologías de software libre') }}"</blockquote>
    </div>
  </div>
</section>
@endif

@php $capacitacion = $sections->get('capacitacion'); @endphp
@if(!$capacitacion || $capacitacion->is_visible)
<section class="ss-section ss-section--white" id="capacitacion">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">{{ $capacitacion?->content('kicker', 'Formación continua') }}</span>
      <h2 class="ss-title">{!! $capacitacion?->content('title', 'Equipo de profesionales <span>comprometidos</span>') !!}</h2>
    </header>
    <div class="ss-capacitacion-wrap rev">
      <div class="ss-metrics">
        @foreach(($capacitacion?->items ?? collect()) as $metric)
        <article class="ss-metric">
          <strong class="ss-metric-n">{{ $metric->data('value') }}</strong>
          <p>{{ $metric->data('text') }}</p>
        </article>
        @endforeach
      </div>
      <img src="{{ cms_asset($capacitacion?->content('image', 'img/official/Conocenos/equipo.png')) }}" alt="" class="ss-capacitacion-char" loading="lazy" aria-hidden="true">
    </div>
    <p class="ss-quote ss-quote--center rev">{{ $capacitacion?->content('quote') }}</p>
  </div>
</section>
@endif

@php $acompanamiento = $sections->get('acompanamiento'); @endphp
@if(!$acompanamiento || $acompanamiento->is_visible)
<section class="ss-section ss-section--dark" id="acompanamiento">
  <div class="ss-container ss-split rev">
    <div class="ss-split-text">
      <span class="ss-kicker ss-kicker--gold">{{ $acompanamiento?->content('kicker', 'Aliado tecnológico') }}</span>
      <h2 class="ss-title ss-title--light">{{ $acompanamiento?->content('title', 'Te acompañamos en todo momento') }}</h2>
      <p class="ss-lead ss-lead--light">{!! $acompanamiento?->content('paragraph_1') !!}</p>
      <p class="ss-lead ss-lead--light">{{ $acompanamiento?->content('paragraph_2') }}</p>
    </div>
    <div class="ss-split-media">
      <img src="{{ cms_asset($acompanamiento?->content('image', 'img/official/Conocenos/image5.png')) }}" alt="Acompañamiento Softura" class="ss-media-photo" loading="lazy">
    </div>
  </div>
</section>
@endif

@php
  $ecosistema = $sections->get('ecosistema');
  $ecoCtaUrl = ($ecosistema?->content('cta_url')) ?: '/conocenos';
  $ecoCtaHref = str_starts_with($ecoCtaUrl, 'http') ? $ecoCtaUrl : url($ecoCtaUrl);
@endphp
@if(!$ecosistema || $ecosistema->is_visible)
<section class="ss-section ss-section--dark" id="ecosistema">
  <div class="ss-container">
    <header class="ss-head ss-head--light rev">
      <span class="ss-kicker ss-kicker--gold">{{ $ecosistema?->content('kicker', 'Red de aliados') }}</span>
      <h2 class="ss-title ss-title--light">{!! $ecosistema?->content('title', 'Tenemos un gran <span>respaldo</span>') !!}</h2>
      <p class="ss-lead ss-lead--light ss-lead--center">{{ $ecosistema?->content('description') }}</p>
    </header>
    <div class="ss-eco-grid rev">
      @foreach(($ecosistema?->items ?? collect()) as $aliado)
      <article class="ss-eco-card">
        @include('partials.official-logo', [
          'file' => $aliado->data('file') ?: null,
          'cdn' => $aliado->data('cdn') ?: null,
          'alt' => $aliado->data('alt'),
          'class' => 'sp-official-logo sp-official-logo--eco',
        ])
        <p>{{ $aliado->data('text') }}</p>
      </article>
      @endforeach
    </div>
    <div class="ss-eco-highlight rev">
      <p>{{ $ecosistema?->content('highlight_text') }}</p>
      <a href="{{ $ecoCtaHref }}" class="btn-p btn-p--hero">{{ $ecosistema?->content('cta_text', 'Conoce más sobre nosotros') }}</a>
    </div>
  </div>
</section>
@endif

<section class="ss-section ss-section--light" id="clientes">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">Confianza</span>
      <h2 class="ss-title">Ellos nos <span>aprueban</span></h2>
      <p class="ss-lead ss-lead--center">A lo largo de los años hemos establecido relaciones comerciales basadas en la confianza con clientes de distintos giros y modelos de negocio.</p>
    </header>
    @include('partials.official-clientes-grid')
  </div>
</section>

@php
  $rse = $sections->get('rse');
  $rsePoints = ($rse?->items ?? collect())->filter(fn ($i) => $i->data('kind') === 'point');
  $rseLogos = ($rse?->items ?? collect())->filter(fn ($i) => $i->data('kind') === 'logo');
@endphp
@if(!$rse || $rse->is_visible)
<section class="ss-section ss-section--dark" id="rse">
  <div class="ss-container">
    <header class="ss-head ss-head--light rev">
      <span class="ss-kicker ss-kicker--gold">{{ $rse?->content('kicker', 'Responsabilidad social') }}</span>
      <h2 class="ss-title ss-title--light">{{ $rse?->content('title') }}</h2>
    </header>
    <div class="ss-rse-list rev">
      @foreach($rsePoints as $point)
      <article class="ss-rse-item">
        <div class="ss-rse-icon"><i class="fas fa-{{ $point->data('icon', 'circle') }}"></i></div>
        <p>{!! $point->data('text') !!}</p>
      </article>
      @endforeach
    </div>
    <div class="ss-rse-logos rev">
      @foreach($rseLogos as $ies)
        @include('partials.official-logo', [
          'file' => $ies->data('file') ?: null,
          'cdn' => $ies->data('cdn') ?: null,
          'alt' => $ies->data('alt'),
          'class' => 'sp-official-logo sp-official-logo--rse',
        ])
      @endforeach
    </div>
  </div>
</section>
@endif

@php
  $bituyu = $sections->get('bituyu_preview');
  $bituyuCtaUrl = ($bituyu?->content('cta_url')) ?: '/productos#sec-bituyu';
  $bituyuCtaHref = str_starts_with($bituyuCtaUrl, 'http') ? $bituyuCtaUrl : url($bituyuCtaUrl);
@endphp
@if(!$bituyu || $bituyu->is_visible)
<section class="ss-section ss-section--light" id="bituyu-preview">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">{{ $bituyu?->content('kicker', 'Producto destacado') }}</span>
      <h2 class="ss-title">{!! $bituyu?->content('title', 'Ecosistema <span>Bituyú</span>') !!}</h2>
      <p class="ss-lead ss-lead--center">{{ $bituyu?->content('description') }}</p>
    </header>
    <div class="ss-bituyu-preview-media rev">
      <img src="{{ cms_asset($bituyu?->content('diagram_image', 'img/ecosistema bituyu.png')) }}" alt="Ecosistema Bituyú" loading="lazy">
    </div>
    <div class="ss-bituyu-stats rev">
      @foreach(($bituyu?->items ?? collect()) as $stat)
      <article class="ss-bituyu-stat"><strong>{{ $stat->data('value') }}</strong><span>{{ $stat->data('label') }}</span></article>
      @endforeach
    </div>
    <div class="ss-head-cta rev">
      <a href="{{ $bituyuCtaHref }}" class="btn-p">{{ $bituyu?->content('cta_text', 'Conoce Bituyú') }}</a>
    </div>
  </div>
</section>
@endif

@php $proceso = $sections->get('proceso'); @endphp
@if(!$proceso || $proceso->is_visible)
<section class="ss-section ss-section--white" id="proceso">
  <div class="ss-container process-wrap">
    <div class="process-header rev">
      <h2>{!! $proceso?->content('title') !!}</h2>
    </div>
    <div class="process-cards rev">
      @foreach(($proceso?->items ?? collect()) as $idx => $card)
      <div class="p-card">
        <div class="p-icon-wrap">
          @if($idx % 2 === 0)
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
            <path d="M2 12h20"/>
            <path d="M16 14a2 2 0 0 0-3-1.73V11a1 1 0 0 0-2 0v1.27a2 2 0 0 0-3 1.73 2 2 0 0 0 4 0h2a2 2 0 0 0 2 0z"/>
          </svg>
          @else
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
            <path d="M7 21h10"/>
          </svg>
          @endif
        </div>
        <h3>{{ $card->data('title') }}</h3>
        <p>{{ $card->data('description') }}</p>
      </div>
      @endforeach
    </div>
    <div class="process-footer rev">
      <p>{!! $proceso?->content('footer_text') !!}</p>
    </div>
  </div>
</section>
@endif

@php
  $stack = $sections->get('stack');
  $stackCtaUrl = ($stack?->content('cta_url')) ?: '/productos';
  $stackCtaHref = str_starts_with($stackCtaUrl, 'http') ? $stackCtaUrl : url($stackCtaUrl);
@endphp
@if(!$stack || $stack->is_visible)
<section class="ss-section ss-section--light" id="stack">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">{{ $stack?->content('kicker', 'Portafolio') }}</span>
      <h2 class="ss-title">{!! $stack?->content('title', 'Nuestros <span>productos</span>') !!}</h2>
      <p class="ss-lead ss-lead--center">{{ $stack?->content('description') }}</p>
    </header>
    <div class="ss-products rev">
      @foreach(($stack?->items ?? collect()) as $product)
      @php
        $prodUrl = $product->data('url') ?: '#';
        $prodHref = str_starts_with($prodUrl, 'http') ? $prodUrl : url($prodUrl);
      @endphp
      <a href="{{ $prodHref }}" class="ss-product">
        <img src="{{ cms_asset($product->data('logo')) }}" alt="" class="ss-product-logo">
        <span class="ss-product-name">{{ $product->data('name') }}</span>
        <span>{{ $product->data('description') }}</span>
      </a>
      @endforeach
    </div>
    <div class="ss-head-cta rev">
      <a href="{{ $stackCtaHref }}" class="btn-p">{{ $stack?->content('cta_text', 'Ver todos los productos') }}</a>
    </div>
  </div>
</section>
@endif










@php $cta = $sections->get('cta'); @endphp
@if(!$cta || $cta->is_visible)
<section class="cta-section" id="contacto" style="position:relative; z-index:10; background:#020714; padding:5rem 5vw; color:#fff; font-family:'Inter', sans-serif;">
  
  <div class="rev" style="max-width:1200px; margin:0 auto; display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap:4rem; align-items: center;">
    
    <div>
      <div class="sec-label" style="color:#1A4FFF; text-transform:uppercase; letter-spacing:2px; font-weight:600; margin-bottom:1rem; font-size:0.9rem;">{{ $cta?->content('badge_text', 'Contacto') }}</div>
      
      <h2 style="font-family:'Syne', sans-serif; font-size:clamp(2.2rem, 4vw, 3.5rem); font-weight:800; line-height:1.2; margin-bottom:1.5rem;">
        {!! $cta?->content('title', 'Emprende este <br>viaje <span style="color:#1A4FFF;">con nosotros</span>') !!}
      </h2>
      
      <p style="color:#94a3b8; font-size:1.1rem; line-height:1.6; max-width:480px; margin-bottom:3.5rem;">
        {{ $cta?->content('description', 'Cuéntanos tu idea y construyamos juntos soluciones tecnológicas que impulsen tu negocio.') }}
      </p>

      <div style="display:flex; flex-wrap:wrap; gap:2rem; align-items:center;">
        
        <div style="display:flex; align-items:center; gap:0.75rem;">
          <div style="background:rgba(26, 79, 255, 0.1); border:1px solid rgba(26, 79, 255, 0.3); width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#1A4FFF;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2.5 3.19-2.5 5.5h20c0-2.31-1-4.24-2.5-5.5"></path><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path></svg>
          </div>
          <span style="font-size:0.85rem; font-weight:500; color:#cbd5e1; max-width:90px; line-height:1.3;">Soluciones a la medida</span>
        </div>

        <div style="display:flex; align-items:center; gap:0.75rem;">
          <div style="background:rgba(26, 79, 255, 0.1); border:1px solid rgba(26, 79, 255, 0.3); width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#1A4FFF;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          </div>
          <span style="font-size:0.85rem; font-weight:500; color:#cbd5e1; max-width:100px; line-height:1.3;">Confidencialidad garantizada</span>
        </div>

        <div style="display:flex; align-items:center; gap:0.75rem;">
          <div style="background:rgba(26, 79, 255, 0.1); border:1px solid rgba(26, 79, 255, 0.3); width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; color:#1A4FFF;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
          </div>
          <span style="font-size:0.85rem; font-weight:500; color:#cbd5e1; max-width:90px; line-height:1.3;">Respuesta rápida</span>
        </div>

      </div>
    </div>

    <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.05); backdrop-filter:blur(10px); padding:2.5rem; border-radius:24px; box-shadow:0 30px 60px rgba(0,0,0,0.4);">
      
      <div style="display:flex; align-items:center; gap:1rem; margin-bottom:2rem;">
        <div style="background:#1A4FFF; width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; color:#fff; box-shadow:0 8px 20px rgba(26,79,255,0.4);">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        </div>
        <div>
          <h3 style="font-size:1.2rem; font-weight:600; margin:0; color:#fff;">Envíanos un mensaje</h3>
          <p style="font-size:0.85rem; color:#64748b; margin:0; margin-top:0.2rem;">Llene el formulario y nos pondremos en contacto contigo.</p>
        </div>
      </div>

      <form data-contact novalidate style="display:flex; flex-direction:column; gap:1.2rem;">
        
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:1.2rem;">
          <div style="position:relative;">
            <input type="text" name="nombre" data-i18n-placeholder="contact.name" placeholder="Nombre completo" required style="width:100%; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); padding:0.9rem 1rem; border-radius:10px; color:#fff; font-family:inherit; font-size:0.9rem; outline:none; box-sizing:border-box;">
          </div>
          <div style="position:relative;">
            <input type="text" name="empresa" data-i18n-placeholder="contact.company" placeholder="Empresa (opcional)" style="width:100%; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); padding:0.9rem 1rem; border-radius:10px; color:#fff; font-family:inherit; font-size:0.9rem; outline:none; box-sizing:border-box;">
          </div>
        </div>

        <div style="position:relative;">
          <input type="email" name="email" data-i18n-placeholder="contact.email" placeholder="Correo electrónico" required style="width:100%; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); padding:0.9rem 1rem; border-radius:10px; color:#fff; font-family:inherit; font-size:0.9rem; outline:none; box-sizing:border-box;">
        </div>

        <div style="position:relative;">
          <input type="tel" name="telefono" data-i18n-placeholder="contact.phone" placeholder="Teléfono (opcional)" style="width:100%; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); padding:0.9rem 1rem; border-radius:10px; color:#fff; font-family:inherit; font-size:0.9rem; outline:none; box-sizing:border-box;">
        </div>

        <div style="position:relative;">
          <textarea name="mensaje" data-i18n-placeholder="contact.message" placeholder="Cuéntanos sobre tu proyecto o lo que necesitas..." rows="4" required style="width:100%; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); padding:0.9rem 1rem; border-radius:10px; color:#fff; font-family:inherit; font-size:0.9rem; outline:none; resize:none; box-sizing:border-box; display:block;"></textarea>
        </div>

        <button type="submit" data-i18n="contact.send" style="width:100%; background:linear-gradient(90deg, #1A4FFF 0%, #3b82f6 100%); color:#fff; border:none; padding:1rem; border-radius:10px; font-family:inherit; font-weight:600; font-size:1rem; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:0.5rem; box-shadow:0 10px 25px rgba(26,79,255,0.3); transition:all 0.3s ease;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
          Enviar mensaje
        </button>

        <div style="display:flex; align-items:center; justify-content:center; gap:0.5rem; color:#64748b; font-size:0.75rem; margin-top:0.5rem;">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          <span>Tu información está segura y no será compartida.</span>
        </div>

      </form>

    </div>

  </div>
</section>
@endif



@endsection
