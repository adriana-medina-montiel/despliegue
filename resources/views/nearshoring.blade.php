@extends('layouts.web')

@section('title', 'Nearshoring / Onshoring — Softura Solutions')

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
@endpush

@section('content')

@php
    // Obtenemos todas las secciones de la página desde la BD
    $sections = \App\Models\PageSection::forPage('nearshoring');
@endphp

{{-- 1. HERO / BANNER PRINCIPAL --}}
<section style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding:8rem 5vw 4rem;text-align:center;">
  <div style="max-width:800px;margin:0 auto;">
    <div class="sec-label" style="text-transform:uppercase;letter-spacing:3px;margin-bottom:1rem;">
        {{ $sections->get('hero')?->content('badge_text') ?? 'Servicios' }}
    </div>
    <h1 style="font-family:'Syne',sans-serif;font-size:clamp(2.5rem,5vw,4rem);font-weight:800;line-height:1.15;margin-bottom:1.5rem;">
      {{ $sections->get('hero')?->content('title') ?? 'Nearshoring & Onshoring' }}
    </h1>
    <p style="font-size:1.15rem;line-height:1.7;color:#6B6B80;max-width:600px;margin:0 auto 2.5rem;">
      {{ $sections->get('hero')?->content('description') ?? 'Nuestros ingenieros trabajan remotamente en proyectos para tu empresa.' }}
    </p>
    <a href="{{ route('contacto') }}" style="display:inline-block;background:#1A4FFF;color:#fff;padding:1rem 2.5rem;border-radius:50px;font-weight:600;text-decoration:none;font-size:1rem;">
      Hablemos de tu proyecto →
    </a>
  </div>
</section>

{{-- 2. ONSHORING --}}
<section class="softura-service-row">
    <div class="onsh-free-images">
        <div class="onsh-card-back left"><img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&h=400&auto=format&fit=crop" alt="Desarrolladores Softura"></div>
        <div class="onsh-card-back right"><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=400&h=400&auto=format&fit=crop" alt="Métricas de desarrollo"></div> 
        <div class="onsh-card-main"><img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&h=480&auto=format&fit=crop" alt="Reunión Onshoring"></div>
    </div>
    <div class="onsh-free-content">
        <h2 class="onsh-title-fluid">{{ $sections->get('onshoring')?->content('title') ?? 'ONSHORING' }}</h2>  
        <p class="onsh-desc-fluid">
            {{ $sections->get('onshoring')?->content('description') ?? 'Descripción del servicio de Onshoring...' }}
        </p>
    </div>
    <div class="onsh-line-decorator right-side"></div>
</section>

{{-- 3. NEARSHORING --}}
<section class="nearsh-section-wrapper">
    <div class="nearsh-container-split">   
        <div class="onsh-line-decorator left-side"></div>
        <div class="nearsh-content-col">
            <h2 class="nearsh-title-fluid">{{ $sections->get('nearshoring')?->content('title') ?? 'NEARSHORING' }}</h2>
            <p class="nearsh-desc-fluid">
                {{ $sections->get('nearshoring')?->content('description') ?? 'Descripción del servicio de Nearshoring...' }}
            </p>
        </div>   
        <div class="nearsh-image-col">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&h=600&auto=format&fit=crop" alt="Conectividad">
        </div>
    </div>
</section>

{{-- 4. SOPORTE --}}
<section class="softura-support-fluid-row"> 
    <div class="supp-fluid-header">
        <h2 class="supp-fluid-title">{{ $sections->get('support')?->content('title') ?? 'TE ACOMPAÑAMOS EN TODO MOMENTO' }}</h2>
    </div> 
    <div class="supp-fluid-body-grid">     
        <div class="supp-fluid-content">
            <p class="supp-fluid-desc">
                {{ $sections->get('support')?->content('description') ?? 'Texto de soporte...' }}
            </p>
        </div>
        <div class="supp-fluid-image-col">
            <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?q=80&w=600&h=420&auto=format&fit=crop" alt="Soporte">
        </div>      
    </div>   
    <div class="supp-line-decorator bottom-side"></div>
</section>

{{-- Script de animaciones (mantenido igual) --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const opciones = { root: null, rootMargin: "0px", threshold: 0.1 };
        const activarMovimiento = (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) { entry.target.classList.add("visible"); } 
                else { entry.target.classList.remove("visible"); }
            });
        };
        const descriptorScroll = new IntersectionObserver(activarMovimiento, opciones);
        
        const elementos = [
            document.querySelector("section.softura-service-row"),
            document.querySelector(".nearsh-container-split"),
            document.querySelector("section.softura-support-fluid-row")
        ];
        
        elementos.forEach(el => { if(el) descriptorScroll.observe(el); });
    });
</script>

@endsection