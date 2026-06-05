@extends('layouts.web')

@section('title', 'Fábrica de Software — Softura Solutions')
@section('body-class', 'page-fabrica deck-page')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/softura-deck.css') }}">
<link rel="stylesheet" href="{{ asset('css/fabrica-polish.css') }}">
@endpush

@section('content')

<section class="deck-hero fab-hero">
  <div class="deck-container">
    <span class="deck-anniversary-badge">20 Aniversario</span>
    <span class="deck-tag">Fábrica de software</span>
    <h1>Software <em>a la medida</em></h1>
    <p class="deck-hero-sub">
      Ayudamos a las empresas a crecer y consolidarse mediante soluciones de software a la medida,
      respaldadas por consultoría especializada que garantiza que cada desarrollo responda realmente
      a las necesidades y objetivos del negocio.
    </p>
    <div class="deck-btns">
      <a href="#servicios-overview" class="deck-btn">Descubre nuestros servicios</a>
      <a href="{{ route('contacto') }}" class="deck-btn deck-btn--outline">Agenda una reunión</a>
    </div>
  </div>
  <div class="fab-hero-visual" aria-hidden="true">
    <img src="{{ asset('img/official/productos/tecnologia.jpg') }}" alt="" loading="eager">
  </div>
</section>

<section class="deck-section deck-section--alt" id="servicios-overview">
  <div class="deck-container">
    <span class="deck-tag">Fábrica de software</span>
    <h2 class="deck-title">Descubre cómo podemos ayudarte</h2>
    <div class="deck-title-line"></div>
    <div class="deck-services-overview">
      @foreach(config('softura-content.servicios') as $servicio)
      <a href="#svc-{{ $servicio['slug'] }}" class="deck-svc-card">
        @if(!empty($servicio['imagen']) && file_exists(public_path($servicio['imagen'])))
          <img src="{{ asset($servicio['imagen']) }}" alt="" class="deck-svc-img" loading="lazy">
        @endif
        <h3>{{ $servicio['titulo'] }}</h3>
      </a>
      @endforeach
    </div>
  </div>
</section>

@foreach(config('softura-content.servicios') as $index => $servicio)
<section class="deck-service-block {{ $index % 2 === 1 ? 'deck-service-block--reverse' : '' }}" id="svc-{{ $servicio['slug'] }}">
  <div class="deck-container deck-grid-2 {{ $index % 2 === 1 ? 'deck-grid-2--reverse' : '' }}">
    <div class="deck-copy">
      <span class="deck-tag">Fábrica de software</span>
      <h2 class="deck-title">{{ $servicio['titulo'] }}</h2>
      <div class="deck-title-line"></div>
      <p class="deck-lead">{{ $servicio['texto'] }}</p>
      @if(!empty($servicio['bullets']))
      <ul class="deck-list">
        @foreach($servicio['bullets'] as $bullet)
        <li>{{ $bullet }}</li>
        @endforeach
      </ul>
      @endif
      @if(!empty($servicio['repse']))
      <p class="deck-lead fab-repse"><i class="fas fa-certificate" aria-hidden="true"></i> Pertenecemos al padrón del <strong>REPSE</strong> (Registro de Prestadoras de Servicios Especializados u Obras Especializadas), obligatorio de la STPS.</p>
      @endif
      @if(!empty($servicio['logos']))
      <div class="deck-partners">
        @foreach($servicio['logos'] as $logo)
          @include('partials.official-logo', array_merge($logo, ['alt' => $logo['name'] ?? '', 'class' => 'fab-partner-logo']))
        @endforeach
      </div>
      @endif
    </div>
    <div class="deck-visual">
      @if(!empty($servicio['imagen']) && file_exists(public_path($servicio['imagen'])))
        <img src="{{ asset($servicio['imagen']) }}" alt="{{ $servicio['titulo'] }}" loading="lazy">
      @endif
    </div>
  </div>

  @if($servicio['slug'] === 'cloud' && !empty($servicio['cloud_servicios']))
  <div class="deck-container fab-cloud-wrap">
    <div class="deck-cloud-grid">
      @foreach($servicio['cloud_servicios'] as $cloud)
      <article class="deck-cloud-card">
        @if(file_exists(public_path($cloud['logo'])))
          <img src="{{ asset($cloud['logo']) }}" alt="{{ $cloud['nombre'] }}" class="cloud-logo" loading="lazy">
        @endif
        <h4>{{ $cloud['nombre'] }}</h4>
        <ul>
          @foreach($cloud['items'] as $item)
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

<section class="deck-band">
  <div class="deck-band-inner deck-grid-2">
    <div class="deck-copy">
      <h2 class="deck-title">El software ha cambiado el mundo</h2>
      <p class="deck-lead"><strong>Imagínate lo que hará por ti...</strong></p>
      <a href="{{ route('contacto') }}" class="deck-btn" style="margin-top:1.5rem;">Iniciar un proyecto</a>
    </div>
    <div class="deck-visual">
      <img src="{{ asset('img/official/Conocenos/software.jpg') }}" alt="Equipo de desarrollo Softura" loading="lazy">
    </div>
  </div>
</section>

@endsection
