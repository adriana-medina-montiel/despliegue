@extends('layouts.web')

@section('title', 'Fábrica de Software — Softura Solutions')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="/css/estilos3.css">
@endpush

@section('content')

<main class="main-container">
  <header class="section-header">
    <span class="badge">
      <i class="fas fa-rocket"></i> SOLUCIONES QUE IMPULSAN TU NEGOCIO
    </span>
    <h1>Software <span>a la Medida</span></h1>
    <p class="subtitle">
      Buscamos que tu empresa cuente con el impulso necesario para crecer y consolidarse día a día.<br>
      Te ayudamos a alcanzar tus objetivos con el desarrollo de software específico y especializado que necesitas.
    </p>
  </header>

  <section class="services-grid">
    <article class="service-item">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=400" alt="Automatiza procesos">
        <div class="icon-floating"><i class="fas fa-cog"></i></div>
      </div>
      <h3>Automatiza procesos</h3>
      <p>Optimiza tareas y aumenta la productividad.</p>
    </article>
    <article class="service-item">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=400" alt="Reduce costos">
        <div class="icon-floating"><i class="fas fa-dollar-sign"></i></div>
      </div>
      <h3>Reduce costos</h3>
      <p>Soluciones eficientes que impactan tu rentabilidad.</p>
    </article>
    <article class="service-item">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=400" alt="Fortalece tu competitividad">
        <div class="icon-floating"><i class="fas fa-chart-line"></i></div>
      </div>
      <h3>Fortalece tu competitividad</h3>
      <p>Te ayudamos a innovar y estar siempre un paso adelante.</p>
    </article>
    <article class="service-item">
      <div class="image-wrapper">
        <img src="https://images.unsplash.com/photo-1556742044-3c52d6e88c62?q=80&w=400" alt="Mejora tus servicios">
        <div class="icon-floating"><i class="fas fa-star"></i></div>
      </div>
      <h3>Mejora tus servicios</h3>
      <p>Ofrece experiencias que generan lealtad.</p>
    </article>
  </section>

  <div class="quote-banner">
    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
    <div class="quote-text">
      <h2>El software ha cambiado el mundo, <span>imagínate lo que hará por ti...</span></h2>
    </div>
    <div class="quote-illustration"><i class="fas fa-laptop-code"></i></div>
  </div>
</main>

@endsection
