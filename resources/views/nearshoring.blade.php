@extends('layouts.web')

@section('title', 'Nearshoring / Onshoring — Softura Solutions')
@section('body-class', 'page-nearshoring subpage')

@section('content')

@php
    $hero     = $sections->get('hero');
    $propuesta = $sections->get('propuesta_valor');
    $ventajas  = $sections->get('ventajas');
    $proceso   = $sections->get('proceso');
@endphp

{{-- Hero --}}
@if(!$hero || $hero->is_visible)
<section class="nrs-hero rev">
  <div class="nrs-hero-inner">
    <div class="sec-label nrs-hero-badge">{{ $hero?->content('badge_text', 'Servicios') }}</div>
    <h1 class="nrs-hero-h1">{!! $hero?->content('title', 'Nearshoring &amp; <span class="nrs-accent">Onshoring</span>') !!}</h1>
    <p class="nrs-hero-lead">
      {{ $hero?->content('description', 'Con nuestros modelos de externalización, nuestros ingenieros se integran a tu equipo desde México, ya sea presencialmente o de forma remota.') }}
    </p>
    <a href="{{ route('contacto') }}" class="btn-p">Hablemos de tu proyecto</a>
  </div>
</section>
@endif

{{-- Propuesta de Valor --}}
@if(!$propuesta || $propuesta->is_visible)
<section class="section" style="background:var(--card);">
  <div class="process-wrap">
    <div class="process-cards rev">
      @foreach($propuesta?->items ?? collect() as $item)
      <div class="p-card">
        <div class="p-icon-wrap">
          @if(str_contains($item->data('icon', ''), 'globe') || str_contains($item->data('icon', ''), 'earth'))
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
          </svg>
          @elseif(str_contains($item->data('icon', ''), 'map') || str_contains($item->data('icon', ''), 'location'))
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
          </svg>
          @elseif(str_contains($item->data('icon', ''), 'users') || str_contains($item->data('icon', ''), 'team'))
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
          @else
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>
          </svg>
          @endif
        </div>
        <h3>{{ $item->data('title') }}</h3>
        <p>{{ $item->data('description') }}</p>
      </div>
      @endforeach
    </div>
    @if($propuesta?->content('description'))
    <div class="process-footer rev">
      <p>{!! $propuesta->content('description') !!}</p>
      @if($propuesta?->content('cta_text'))
      <a href="{{ url($propuesta->content('cta_url', '/contacto')) }}" class="btn-p" style="margin-top:1.5rem;display:inline-block;text-decoration:none;">{{ $propuesta->content('cta_text', 'Hablemos de tu proyecto') }}</a>
      @endif
    </div>
    @endif
  </div>
</section>
@endif

{{-- Ventajas / Células Especializadas --}}
@if(!$ventajas || $ventajas->is_visible)
<section class="nrs-ventajas">
  <div class="nrs-ventajas-inner rev">
    <div class="nrs-ventajas-copy">
      <div class="nrs-ventajas-badge">{{ $ventajas?->content('badge_text', 'Onshoring') }}</div>
      <h2 class="nrs-ventajas-h2">{{ $ventajas?->content('title', 'Células especializadas') }}</h2>
      <p class="nrs-ventajas-desc">{{ $ventajas?->content('description') }}</p>
      @if($ventajas?->content('repse_text'))
      <p class="nrs-ventajas-repse">{!! $ventajas->content('repse_text') !!}</p>
      @endif
    </div>
    <div class="nrs-ventajas-visual">
      @php $vimgSrc = cms_asset(($ventajas?->content('image')) ?: 'img/official/productos/onshoring.jpg'); @endphp
      <img src="{{ $vimgSrc }}" alt="Equipo de desarrollo" loading="lazy">
    </div>
  </div>
</section>

{{-- Onshoring visual --}}
<section class="softura-service-row">
  <div class="onsh-free-images">
    @php
      $oimg1Src = cms_asset(($ventajas?->content('onshoring_image1')) ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&h=400&auto=format&fit=crop');
      $oimg2Src = cms_asset(($ventajas?->content('onshoring_image2')) ?: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=400&h=400&auto=format&fit=crop');
      $oimg3Src = cms_asset(($ventajas?->content('onshoring_image3')) ?: 'img/official/productos/onshoring.jpg');
    @endphp
    <div class="onsh-card-back left"><img src="{{ $oimg1Src }}" alt="Desarrolladores Softura"></div>
    <div class="onsh-card-back right"><img src="{{ $oimg2Src }}" alt="Métricas de desarrollo"></div>
    <div class="onsh-card-main"><img src="{{ $oimg3Src }}" alt="Reunión Onshoring"></div>
  </div>
  <div class="onsh-free-content">
    <h2 class="onsh-title-fluid">{{ $ventajas?->content('onshoring_title', 'ONSHORING') }}</h2>
    <p class="onsh-desc-fluid">{!! $ventajas?->content('onshoring_description') !!}</p>
    <div class="onsh-actions-container">
      <div class="onsh-badge-gold">
        <div class="onsh-badge-inner">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/>
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div class="onsh-line-decorator right-side"></div>
</section>
@endif

{{-- Nearshoring --}}
@if(!$proceso || $proceso->is_visible)
<section class="nearsh-section-wrapper">
  <div class="nearsh-container-split">
    <div class="onsh-line-decorator left-side"></div>
    <div class="nearsh-content-col">
      <h2 class="nearsh-title-fluid">{{ $proceso?->content('nearshoring_title', 'NEARSHORING') }}</h2>
      <p class="nearsh-desc-fluid">{{ $proceso?->content('nearshoring_description') }}</p>
      <div class="nearsh-bullets-group">
        @if($proceso?->content('staffing_title'))
        <div class="nearsh-bullet-section">
          <h3>{{ $proceso->content('staffing_title') }}</h3>
          <ul>
            @foreach(explode("\n", str_replace("\r", "", $proceso->content('staffing_bullets', ''))) as $bullet)
              @if(trim($bullet))<li>{{ trim($bullet) }}</li>@endif
            @endforeach
          </ul>
        </div>
        @endif
        @if($proceso?->content('outsourcing_title'))
        <div class="nearsh-bullet-section">
          <h3>{{ $proceso->content('outsourcing_title') }}</h3>
          <ul>
            @foreach(explode("\n", str_replace("\r", "", $proceso->content('outsourcing_bullets', ''))) as $bullet)
              @if(trim($bullet))<li>{{ trim($bullet) }}</li>@endif
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>
    <div class="nearsh-image-col">
      @php $nimgSrc = cms_asset(($proceso?->content('nearshoring_image')) ?: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&h=600&auto=format&fit=crop'); @endphp
      <img src="{{ $nimgSrc }}" alt="Nearshoring conectividad">
    </div>
  </div>
</section>

{{-- Acompañamiento --}}
<section class="softura-support-fluid-row">
  <div class="supp-fluid-header">
    <h2 class="supp-fluid-title">{{ $proceso?->content('support_title', 'TE ACOMPAÑAMOS EN TODO MOMENTO') }}</h2>
  </div>
  <div class="supp-fluid-body-grid">
    <div class="supp-fluid-content">
      <p class="supp-fluid-lead">{{ $proceso?->content('support_lead') }}</p>
      <p class="supp-fluid-desc">{{ $proceso?->content('support_description') }}</p>
    </div>
    <div class="supp-fluid-image-col">
      @php $simgSrc = cms_asset(($proceso?->content('support_image')) ?: 'img/official/Conocenos/image5.png'); @endphp
      <img src="{{ $simgSrc }}" alt="Equipo Softura acompañamiento tecnológico">
    </div>
  </div>
  <div class="supp-line-decorator bottom-side"></div>
</section>
@endif

@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) entry.target.classList.add("visible");
      else entry.target.classList.remove("visible");
    });
  }, { threshold: 0.1 });

  const targets = [
    document.querySelector("section.softura-service-row"),
    document.querySelector(".nearsh-container-split"),
    document.querySelector("section.softura-support-fluid-row"),
  ];
  targets.forEach(el => el && observer.observe(el));
});
</script>
@endpush
