@extends('layouts.web')

@section('title', 'Fábrica de Software — Softura Solutions')
@section('body-class', 'page-fabrica deck-page')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/softura-deck.css') }}">
<link rel="stylesheet" href="{{ asset('css/fabrica-polish.css') }}">
@endpush

@section('content')

@php
    $hero = $sections->get('hero');
    $overview = $sections->get('services_overview');
    $serviciosSec = $sections->get('servicios');
    $serviciosList = $serviciosSec?->items ?? collect();
    $band = $sections->get('band');
@endphp

@if(!$hero || $hero->is_visible)
<section class="deck-hero fab-hero">
  <div class="deck-container">
    <span class="deck-anniversary-badge">{{ $hero?->content('badge_text', '20 Aniversario') }}</span>
    <span class="deck-tag">{{ $hero?->content('tag', 'Fábrica de software') }}</span>
    <h1>{!! $hero?->content('title', 'Software <em>a la medida</em>') !!}</h1>
    <p class="deck-hero-sub">
      {{ $hero?->content('description', 'Ayudamos a las empresas a crecer y consolidarse mediante soluciones de software a la medida.') }}
    </p>
    <div class="deck-btns">
      <a href="{{ $hero?->content('cta1_url', '#servicios-overview') }}" class="deck-btn">{{ $hero?->content('cta1_text', 'Descubre nuestros servicios') }}</a>
      <a href="{{ url($hero?->content('cta2_url', '/contacto')) }}" class="deck-btn deck-btn--outline">{{ $hero?->content('cta2_text', 'Agenda una reunión') }}</a>
    </div>
  </div>
  <div class="fab-hero-visual" aria-hidden="true">
    <img src="{{ cms_asset($hero?->content('background_image', 'img/official/productos/tecnologia.jpg')) }}" alt="" loading="eager">
  </div>
</section>
@endif

@if(!$overview || $overview->is_visible)
<section class="deck-section deck-section--alt" id="servicios-overview">
  <div class="deck-container">
    <span class="deck-tag">{{ $overview?->content('tag', 'Fábrica de software') }}</span>
    <h2 class="deck-title">{{ $overview?->content('title', 'Descubre cómo podemos ayudarte') }}</h2>
    <div class="deck-title-line"></div>
    <div class="deck-services-overview">
      @foreach($serviciosList as $svc)
      @php $slug = Str::slug($svc->data('title', '')); @endphp
      <a href="#svc-{{ $slug }}" class="deck-svc-card">
        @php $img = $svc->data('image', ''); @endphp
        @if($img)
          <img src="{{ cms_asset($img) }}" alt="" class="deck-svc-img" loading="lazy">
        @endif
        <h3>{{ $svc->data('title') }}</h3>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif

@if(!$serviciosSec || $serviciosSec->is_visible)
@foreach($serviciosList as $index => $svc)
@php
  $slug = Str::slug($svc->data('title', ''));
  $bullets = $svc->data('bullets', []);
  $logos = $svc->data('logos', []);
  $cloudServicios = $svc->data('cloud_servicios', []);
@endphp
<section class="deck-service-block {{ $index % 2 === 1 ? 'deck-service-block--reverse' : '' }}" id="svc-{{ $slug }}">
  <div class="deck-container deck-grid-2 {{ $index % 2 === 1 ? 'deck-grid-2--reverse' : '' }}">
    <div class="deck-copy">
      <span class="deck-tag">Fábrica de software</span>
      <h2 class="deck-title">{{ $svc->data('title') }}</h2>
      <div class="deck-title-line"></div>
      <p class="deck-lead">{{ $svc->data('text') }}</p>
      @if(!empty($bullets))
      <ul class="deck-list">
        @foreach($bullets as $bullet)
        <li>{{ $bullet }}</li>
        @endforeach
      </ul>
      @endif
      @if($svc->data('repse'))
      <p class="deck-lead fab-repse"><i class="fas fa-certificate" aria-hidden="true"></i> Pertenecemos al padrón del <strong>REPSE</strong> (Registro de Prestadoras de Servicios Especializados u Obras Especializadas), obligatorio de la STPS.</p>
      @endif
      @if(!empty($logos))
      <div class="deck-partners">
        @foreach($logos as $logo)
          @include('partials.official-logo', array_merge($logo, ['alt' => $logo['name'] ?? '', 'class' => 'fab-partner-logo']))
        @endforeach
      </div>
      @endif
    </div>
    <div class="deck-visual">
      @php $mainImg = $svc->data('image', ''); @endphp
      @if($mainImg)
        <img src="{{ cms_asset($mainImg) }}" alt="{{ $svc->data('title') }}" loading="lazy">
      @endif
    </div>
  </div>

  @if(!empty($cloudServicios))
  <div class="deck-container fab-cloud-wrap">
    <div class="deck-cloud-grid">
      @foreach($cloudServicios as $cloud)
      <article class="deck-cloud-card">
        @if(!empty($cloud['logo']))
          <img src="{{ cms_asset($cloud['logo']) }}" alt="{{ $cloud['nombre'] ?? '' }}" class="cloud-logo" loading="lazy">
        @endif
        <h4>{{ $cloud['nombre'] ?? '' }}</h4>
        <ul>
          @foreach($cloud['items'] ?? [] as $item)
          <li>{{ $item }}</li>
          @endforeach
        </ul>
      </article>
      @endforeach
    </div>
  </div>
  @endif
</section>
@endforeach
@endif

@if(!$band || $band->is_visible)
<section class="deck-band">
  <div class="deck-band-inner deck-grid-2">
    <div class="deck-copy">
      <h2 class="deck-title">{{ $band?->content('title', 'El software ha cambiado el mundo') }}</h2>
      <p class="deck-lead">{!! $band?->content('lead', '<strong>Imagínate lo que hará por ti...</strong>') !!}</p>
      <a href="{{ url($band?->content('cta_url', '/contacto')) }}" class="deck-btn" style="margin-top:1.5rem;">{{ $band?->content('cta_text', 'Iniciar un proyecto') }}</a>
    </div>
    <div class="deck-visual">
      <img src="{{ cms_asset($band?->content('image', 'img/official/Conocenos/software.jpg')) }}" alt="Equipo de desarrollo Softura" loading="lazy">
    </div>
  </div>
</section>
@endif

@endsection
