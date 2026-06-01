@extends('layouts.web')

@section('title', 'Contacto — Softura Solutions')
@section('body-class', 'subpage subpage-dark')
@section('nav-class', 'nav-dark')
@section('footer-class', 'footer-dark')

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
@endpush

@section('content')

<section class="contact-page rev">
  <div class="contact-page-inner">
    <div class="contact-info">
      <div class="sec-label" data-i18n="contact.badge">Contacto</div>
      <h1 data-i18n="contact.title">Emprende este viaje con nosotros</h1>
      <p class="contact-lead" data-i18n="contact.lead">Cuéntanos tu idea y construyamos juntos soluciones tecnológicas que impulsen tu negocio.</p>
      <div class="contact-details">
        <div class="contact-detail-item">
          <span class="contact-detail-label" data-i18n="contact.location">Tlaxcala, México</span>
        </div>
        <div class="contact-detail-item">
          <span class="contact-detail-label" data-i18n="contact.email.label">Correo</span>
          <a href="mailto:contacto@softura.com.mx">contacto@softura.com.mx</a>
        </div>
      </div>
    </div>
    <div class="contact-form-card">
      <div class="contact-form-head">
        <h3 data-i18n="contact.form.title">Envíanos un mensaje</h3>
        <p data-i18n="contact.form.sub">Llena el formulario y nos pondremos en contacto contigo.</p>
      </div>
      <form data-contact novalidate>
        <div class="form-row">
          <input type="text" name="nombre" required data-i18n-placeholder="contact.name" placeholder="Nombre completo">
          <input type="text" name="empresa" data-i18n-placeholder="contact.company" placeholder="Empresa (opcional)">
        </div>
        <input type="email" name="email" required data-i18n-placeholder="contact.email" placeholder="Correo electrónico">
        <input type="tel" name="telefono" data-i18n-placeholder="contact.phone" placeholder="Teléfono (opcional)">
        <textarea name="mensaje" rows="4" required data-i18n-placeholder="contact.message" placeholder="Cuéntanos sobre tu proyecto o lo que necesitas..."></textarea>
        <button type="submit" class="btn-submit" data-i18n="contact.send">Enviar mensaje</button>
        <p class="form-privacy" data-i18n="contact.privacy">Tu información está segura y no será compartida.</p>
      </form>
    </div>
  </div>
</section>

@endsection
