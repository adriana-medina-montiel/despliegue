@extends('layouts.web')

@section('title', 'Nearshoring / Onshoring — Softura Solutions')

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
@endpush

@section('content')

<section style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding:8rem 5vw 4rem;text-align:center;">
  <div style="max-width:800px;margin:0 auto;">
    <div class="sec-label" style="text-transform:uppercase;letter-spacing:3px;margin-bottom:1rem;">Servicios</div>
    <h1 style="font-family:'Syne',sans-serif;font-size:clamp(2.5rem,5vw,4rem);font-weight:800;line-height:1.15;margin-bottom:1.5rem;">
      Nearshoring &amp; Onshoring
    </h1>
    <p style="font-size:1.15rem;line-height:1.7;color:#6B6B80;max-width:600px;margin:0 auto 2.5rem;">
      Nuestros ingenieros trabajan remotamente en proyectos para tu empresa ubicada en E.U.A o Latinoamérica, o directamente en tus instalaciones cuando se requiera.
    </p>
    <a href="{{ route('contacto') }}" style="display:inline-block;background:#1A4FFF;color:#fff;padding:1rem 2.5rem;border-radius:50px;font-weight:600;text-decoration:none;font-size:1rem;">
      Hablemos de tu proyecto →
    </a>
  </div>
</section>

@endsection
