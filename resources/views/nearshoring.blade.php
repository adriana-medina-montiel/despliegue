@extends('layouts.web')

@section('title', 'Nearshoring / Onshoring — Softura Solutions')
@section('body-class', 'page-nearshoring')

@section('content')

@php
    $hero = $sections->get('hero');
    $propuesta = $sections->get('propuesta_valor');
    $ventajas = $sections->get('ventajas');
    $proceso = $sections->get('proceso');
@endphp

{{-- Hero Section --}}
@if(!$hero || $hero->is_visible)
<section class="ss-section ss-section--light subpage-hero-pad">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">{{ $hero?->content('badge_text', 'Servicios') }}</span>
      <h2 class="ss-title">{!! $hero?->content('title', 'Nearshoring &amp; <span>Onshoring</span>') !!}</h2>
      <p class="ss-lead ss-lead--center">{{ $hero?->content('description', 'Con nuestros modelos de externalización...') }}</p>
    </header>
  </div>
</section>
@endif

{{-- Propuesta de Valor Section --}}
@if(!$propuesta || $propuesta->is_visible)
<section class="ss-section ss-section--white">
  <div class="ss-container process-wrap">
    <div class="process-cards rev">
      @foreach($propuesta?->items ?? collect() as $item)
      <div class="p-card">
        <div class="p-icon-wrap">
          <i class="{{ $item->data('icon', 'fas fa-globe-americas') }}" aria-hidden="true"></i>
        </div>
        <h3>{{ $item->data('title') }}</h3>
        <p>{{ $item->data('description') }}</p>
      </div>
      @endforeach
    </div>
    <div class="process-footer rev">
      <p>{!! $propuesta?->content('description', 'Hagamos equipo y deja de preocuparte...') !!}</p>
      <a href="{{ $propuesta?->content('cta_url', '/contacto') }}" class="btn-p" style="margin-top:1.5rem;display:inline-flex;">{{ $propuesta?->content('cta_text', 'Hablemos de tu proyecto') }}</a>
    </div>
  </div>
</section>
@endif

{{-- Ventajas Competitivas Section --}}
@if(!$ventajas || $ventajas->is_visible)
<section class="ss-section ss-section--dark">
  <div class="ss-container ss-split rev">
    <div class="ss-split-text">
      <span class="ss-kicker ss-kicker--gold">{{ $ventajas?->content('badge_text', 'Onshoring') }}</span>
      <h2 class="ss-title ss-title--light">{{ $ventajas?->content('title', 'Células especializadas') }}</h2>
      <p class="ss-lead ss-lead--light">{{ $ventajas?->content('description') }}</p>
      <p class="ss-lead ss-lead--light ss-repse"><i class="fas fa-certificate" aria-hidden="true"></i> {!! $ventajas?->content('repse_text') !!}</p>
    </div>
    <div class="ss-split-media">
      @php
          $vimgSrc = cms_asset(($ventajas?->content('image')) ?: 'img/official/productos/onshoring.jpg');
      @endphp
      <img src="{{ $vimgSrc }}" alt="Equipo de desarrollo" class="ss-media-photo" loading="lazy">
    </div>
  </div>
</section>

<section class="softura-service-row">
    <div class="onsh-free-images">
        @php
            $oimg1Src = cms_asset(($ventajas?->content('onshoring_image1')) ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&h=400&auto=format&fit=crop');
            $oimg2Src = cms_asset(($ventajas?->content('onshoring_image2')) ?: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=400&h=400&auto=format&fit=crop');
            $oimg3Src = cms_asset(($ventajas?->content('onshoring_image3')) ?: 'img/official/productos/onshoring.jpg');
        @endphp
        <div class="onsh-card-back left">
            <img src="{{ $oimg1Src }}" alt="Desarrolladores Softura">
        </div>
        <div class="onsh-card-back right">
            <img src="{{ $oimg2Src }}" alt="Métricas de desarrollo">
        </div> 
        <div class="onsh-card-main">
            <img src="{{ $oimg3Src }}" alt="Reunión Onshoring">
        </div>
    </div>
    <div class="onsh-free-content">
        <h2 class="onsh-title-fluid">{{ $ventajas?->content('onshoring_title', 'ONSHORING') }}</h2>  
        <p class="onsh-desc-fluid">
            {!! $ventajas?->content('onshoring_description') !!}
        </p>
        <div class="onsh-actions-container">
            <div class="onsh-badge-gold">
                <div class="onsh-badge-inner">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="onsh-line-decorator right-side"></div>
</section>
@endif

{{-- Proceso de Trabajo Section --}}
@if(!$proceso || $proceso->is_visible)
<section class="nearsh-section-wrapper">
    <div class="nearsh-container-split">  
        <div class="onsh-line-decorator left-side"></div>
        <div class="nearsh-content-col">
            <h2 class="nearsh-title-fluid">{{ $proceso?->content('nearshoring_title', 'NEARSHORING') }}</h2>
            <p class="nearsh-desc-fluid">
                {{ $proceso?->content('nearshoring_description') }}
            </p>
            <div class="nearsh-bullets-group">
                <div class="nearsh-bullet-section">
                    <h3>{{ $proceso?->content('staffing_title', 'Servicios de Onshoring:') }}</h3>
                    <ul>
                        @foreach(explode("\n", str_replace("\r", "", $proceso?->content('staffing_bullets', ''))) as $bullet)
                            @if(trim($bullet))
                                <li>{{ trim($bullet) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="nearsh-bullet-section">
                    <h3>{{ $proceso?->content('outsourcing_title', 'Servicios de Outsourcing / Staffing:') }}</h3>
                    <ul>
                        @foreach(explode("\n", str_replace("\r", "", $proceso?->content('outsourcing_bullets', ''))) as $bullet)
                            @if(trim($bullet))
                                <li>{{ trim($bullet) }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>  
        <div class="nearsh-image-col">
            @php
                $nimgSrc = cms_asset(($proceso?->content('nearshoring_image')) ?: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&h=600&auto=format&fit=crop');
            @endphp
            <img src="{{ $nimgSrc }}" alt="Vista del planeta conectividad">
        </div>
    </div>
</section>

<section class="softura-support-fluid-row"> 
    <div class="supp-fluid-header">
        <h2 class="supp-fluid-title">{{ $proceso?->content('support_title', 'TE ACOMPAÑAMOS EN TODO MOMENTO') }}</h2>
    </div> 
    <div class="supp-fluid-body-grid">     
        <div class="supp-fluid-content">
            <p class="supp-fluid-lead">
                {{ $proceso?->content('support_lead') }}
            </p>
            <p class="supp-fluid-desc">
                {{ $proceso?->content('support_description') }}
            </p>
        </div>
        <div class="supp-fluid-image-col">
            @php
                $simgSrc = cms_asset(($proceso?->content('support_image')) ?: 'img/official/Conocenos/image5.png');
            @endphp
            <img src="{{ $simgSrc }}" alt="Equipo Softura acompañamiento tecnológico">
        </div>      
    </div>   
    <div class="supp-line-decorator bottom-side"></div>
</section>
@endif

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const opciones = {
        root: null, 
        rootMargin: "0px",
        threshold: 0.1 
    };
    const activarMovimiento = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            } else {
                entry.target.classList.remove("visible");
            }
        });
    };
    const descriptorScroll = new IntersectionObserver(activarMovimiento, opciones);
    const seccionOnshoring = document.querySelector("section.softura-service-row");
    if (seccionOnshoring) {
        descriptorScroll.observe(seccionOnshoring);
    }
  });
  document.addEventListener("DOMContentLoaded", () => {
    const opciones = {
        root: null, 
        rootMargin: "0px",
        threshold: 0.1
    };
    const activarMovimiento = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            } else {
                entry.target.classList.remove("visible");
            }
        });
    };

    const descriptorScroll = new IntersectionObserver(activarMovimiento, opciones);
    const seccionOnshoring = document.querySelector("section.softura-service-row");
    if (seccionOnshoring) {
        descriptorScroll.observe(seccionOnshoring);
    }
    const seccionNearshoring = document.querySelector(".nearsh-container-split");
    if (seccionNearshoring) {
        descriptorScroll.observe(seccionNearshoring);
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const opciones = {
        root: null, 
        rootMargin: "0px",
        threshold: 0.1
    };
    const activarMovimiento = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            } else {
                entry.target.classList.remove("visible");
            }
        });
    };
    const descriptorScroll = new IntersectionObserver(activarMovimiento, opciones);
    const seccionOnshoring = document.querySelector("section.softura-service-row");
    if (seccionOnshoring) {
        descriptorScroll.observe(seccionOnshoring);
    }
    const seccionNearshoring = document.querySelector(".nearsh-container-split");
    if (seccionNearshoring) {
        descriptorScroll.observe(seccionNearshoring);
    }
    const seccionSoporteFluido = document.querySelector("section.softura-support-fluid-row");
    if (seccionSoporteFluido) {
        descriptorScroll.observe(seccionSoporteFluido);
    }
});
</script>

@endsection
