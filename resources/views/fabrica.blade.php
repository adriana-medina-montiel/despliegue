@extends('layouts.web')

@section('title', 'Fábrica de Software — Softura Solutions')
@section('body-class', 'page-fabrica deck-page')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/softura-deck.css') }}">
<link rel="stylesheet" href="{{ asset('css/home-polish.css') }}">
@endpush

@section('content')

<div class="subpage-hero-pad">
  <section class="deck-section deck-section--alt">
    <div class="deck-container">
      <span class="deck-tag">Fábrica de software</span>
      <h1 class="deck-title">Un poco de software <em style="font-style:normal;color:#93c5fd">hace la diferencia</em></h1>
      <div class="deck-title-line"></div>
      <p class="deck-lead">Buscamos que tu empresa cuente con el impulso necesario para crecer y consolidarse día a día. Te ayudamos a alcanzar tus objetivos con desarrollo de software específico y consultoría acorde a lo que realmente requieres.</p>
    </div>
  </section>

  @foreach(config('softura-content.servicios') as $index => $servicio)
  <section class="deck-service-block" id="fabrica-{{ $servicio['slug'] }}">
    <div class="deck-container deck-grid-2 {{ $index % 2 === 1 ? 'deck-grid-2--reverse' : '' }}">
      <div class="deck-copy rev">
        <span class="deck-tag">{{ strtoupper($servicio['titulo']) }}</span>
        <h2 class="deck-title" style="font-size:clamp(1.5rem,3vw,2.2rem)">{{ $servicio['titulo'] }}</h2>
        <p class="deck-lead">{{ $servicio['texto'] }}</p>
        @if(!empty($servicio['logos']))
        <div class="sp-logo-strip" style="margin-top:1.5rem">
          @foreach($servicio['logos'] as $logo)
            @include('partials.official-logo', array_merge($logo, ['class' => 'sp-official-logo sp-official-logo--client']))
          @endforeach
        </div>
        @endif
      </div>
      <div class="deck-visual rev">
        <div class="deck-visual-frame">
          @if(!empty($servicio['logos'][0]))
            @include('partials.official-logo', array_merge($servicio['logos'][0], [
              'class' => 'sp-official-logo sp-official-logo--hero',
            ]))
          @endif
        </div>
      </div>
    </div>
  </section>
  @endforeach

  <section class="deck-section">
    <div class="deck-container rev">
      <span class="deck-tag">Stack tecnológico</span>
      <h2 class="deck-title">Somos especialistas</h2>
      <p class="deck-lead">Nuestro principal enfoque son tecnologías de software libre. Constante actualización para brindar el mejor servicio.</p>
      <div style="margin-top:2rem;background:#fff;border-radius:20px;padding:1.5rem">
        @include('partials.deck-tech-logos')
      </div>
    </div>
  </section>
</div>

@endsection
