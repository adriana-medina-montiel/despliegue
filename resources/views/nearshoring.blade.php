@extends('layouts.web')

@section('title', 'Nearshoring / Onshoring — Softura Solutions')
@section('body-class', 'page-nearshoring')

@section('content')

<section class="ss-section ss-section--light subpage-hero-pad">
  <div class="ss-container">
    <header class="ss-head rev">
      <span class="ss-kicker">Servicios</span>
      <h2 class="ss-title">Nearshoring &amp; <span>Onshoring</span></h2>
      <p class="ss-lead ss-lead--center">Con nuestros modelos de externalización, seremos tus verdaderos aliados de negocio. Deja de preocuparte por los costos de reclutamiento, selección, capacitación y continuidad del personal.</p>
    </header>
  </div>
</section>

<section class="ss-section ss-section--white">
  <div class="ss-container process-wrap">
    <div class="process-cards rev">
      <div class="p-card">
        <div class="p-icon-wrap">
          <i class="fas fa-globe-americas" aria-hidden="true"></i>
        </div>
        <h3>Nearshoring</h3>
        <p>Nuestros ingenieros trabajan remotamente en proyectos para tu empresa ubicada en E.U.A. o Latinoamérica, con zona horaria compatible y comunicación en tiempo real.</p>
      </div>
      <div class="p-card">
        <div class="p-icon-wrap">
          <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
        </div>
        <h3>Onshoring</h3>
        <p>Nuestros ingenieros trabajan directamente en tus instalaciones ubicadas en México cuando así se requiera, integrándose a tu equipo local.</p>
      </div>
    </div>
    <div class="process-footer rev">
      <p>Hagamos equipo y <strong>deja de preocuparte</strong> de los costos de reclutamiento, selección, capacitación y continuidad del personal.</p>
      <a href="{{ route('contacto') }}" class="btn-p" style="margin-top:1.5rem;display:inline-flex;">Hablemos de tu proyecto</a>
    </div>
  </div>
</section>

<section class="ss-section ss-section--dark">
  <div class="ss-container ss-split rev">
    <div class="ss-split-text">
      <span class="ss-kicker ss-kicker--gold">Onshoring</span>
      <h2 class="ss-title ss-title--light">Células especializadas</h2>
      <p class="ss-lead ss-lead--light">En esta modalidad, tu empresa nos transfiere las responsabilidades referentes al cumplimiento de tareas relacionadas con el desarrollo de software. No necesitas crecer tu nómina.</p>
      <p class="ss-lead ss-lead--light ss-repse"><i class="fas fa-certificate" aria-hidden="true"></i> Pertenecemos al padrón del <strong>REPSE</strong>, obligatorio de la STPS para regular a las empresas que ofrecen servicios especializados.</p>
    </div>
    <div class="ss-split-media">
      <img src="{{ asset('img/Imagen5.png') }}" alt="Equipo de desarrollo" class="ss-media-photo" loading="lazy">
    </div>
  </div>
</section>

@endsection
