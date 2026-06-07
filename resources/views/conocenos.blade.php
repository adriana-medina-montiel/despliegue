@extends('layouts.web')

@section('title', 'Conócenos — Softura Solutions')
@section('body-class', 'page-conocenos')

@push('styles')
<link rel="stylesheet" href="/css/estilos.css">
<link rel="stylesheet" href="/css/conocenos.css">
@endpush

@section('content')

@php $hero = $sections->get('hero'); @endphp
@if(!$hero || $hero->is_visible)
<section class="cn-hero" id="portada">
  <div class="cn-hero-media" aria-hidden="true">
    @php $bgImg = $hero?->content('background_image', 'https://softura.com.mx/SofturaSolutions/images/Conocenos/image67.png');
         $bgSrc = ($bgImg && !str_starts_with($bgImg, 'http')) ? asset('storage/' . $bgImg) : $bgImg; @endphp
    <img src="{{ $bgSrc }}" alt="" loading="eager">
    <div class="cn-hero-shade"></div>
  </div>
  <div class="cn-container cn-hero-content rev">
    <span class="cn-hero-tag">{{ $hero?->content('badge_text', 'Quiénes somos') }}</span>
    <h1>{{ $hero?->content('title', 'Queremos ser tu aliado de negocio') }}</h1>
    <p class="cn-hero-lead">{{ $hero?->content('description', 'Soluciones de software a la medida con consultoría, calidad y acompañamiento en cada etapa de tu proyecto.') }}</p>
    <div class="cn-hero-btns">
      <a href="{{ route('contacto') }}" class="btn-p">Iniciar un proyecto</a>
      <a href="#form_correo" class="cn-btn-outline">Únete al equipo →</a>
    </div>
  </div>
  <a href="#diferenciadores" class="cn-scroll-hint" aria-label="Explorar secciones">
    <span>Explorar</span>
    <span class="cn-scroll-chevron" aria-hidden="true"></span>
  </a>
</section>
@endif

@php $diff = $sections->get('differentiators'); @endphp
@if(!$diff || $diff->is_visible)
<section class="cn-section cn-section-diff" id="diferenciadores">
  <div class="cn-container">
    <header class="cn-head rev">
      <span class="cn-label">{{ $diff?->content('badge_text', 'Por qué elegirnos') }}</span>
      <h2>{{ $diff?->content('title', '¡Te brindamos más que los demás!') }}</h2>
      <p>{{ $diff?->content('header_description', 'Complementamos el servicio de software con diferenciadores que hacen única cada colaboración con tu empresa.') }}</p>
    </header>
    <div class="cn-diff-split rev">
      <div class="cn-diff-left">
        @php $mImg = $diff?->content('medal_image','https://softura.com.mx/SofturaSolutions/images/Conocenos/images.png'); $mSrc = ($mImg && !str_starts_with($mImg,'http')) ? asset('storage/'.$mImg) : $mImg; @endphp
        <img class="cn-medal" src="{{ $mSrc }}" alt="" loading="lazy">
        <p class="cn-diff-intro">{{ $diff?->content('body_text', 'En Softura Solutions nos esforzamos por brindarte la mejor experiencia. Complementamos el desarrollo de software con diferenciadores clave para que tu experiencia con nosotros sea única.') }}</p>
      </div>
      <figure class="cn-diff-figure">
        @php $dImg = $diff?->content('diagram_image','https://softura.com.mx/SofturaSolutions/images/Conocenos/detalles.png'); $dSrc = ($dImg && !str_starts_with($dImg,'http')) ? asset('storage/'.$dImg) : $dImg; @endphp
        <img src="{{ $dSrc }}" alt="{{ $diff?->content('diagram_caption','Los detalles de valor') }}" loading="lazy">
        <figcaption class="cn-diff-caption">{{ $diff?->content('diagram_caption', 'Los detalles de valor') }}</figcaption>
      </figure>
    </div>
  </div>
</section>
@endif

@php $pillars = $sections->get('pillars'); @endphp
@if(!$pillars || $pillars->is_visible)
<section class="cn-section cn-section-pillars">
  <div class="cn-container">
    <header class="cn-head cn-head-light rev">
      <h2>{{ $pillars?->content('title', 'Ayudarte a mejorar es nuestra motivación') }}</h2>
      <p>{{ $pillars?->content('description', 'Especialistas en constante actualización, comprometidos con brindar el mejor servicio en cada entrega.') }}</p>
    </header>
    <div class="cn-pillars rev" data-cn-stagger>
      @foreach($pillars?->items ?? collect() as $item)
        @php $iImg = $item->data('image',''); $iSrc = ($iImg && !str_starts_with($iImg,'http')) ? asset('storage/'.$iImg) : $iImg; @endphp
        <article class="cn-pillar cn-stagger-item">
          <div class="cn-pillar-frame"><img src="{{ $iSrc }}" alt="{{ $item->data('label') }}" loading="lazy"></div>
          <h3>{{ $item->data('label') }}</h3>
        </article>
      @endforeach
    </div>
  </div>
</section>
@endif

@php $support = $sections->get('support'); @endphp
@if(!$support || $support->is_visible)
<section class="cn-section">
  <div class="cn-container cn-accompany rev">
    <div class="cn-accompany-copy">
      <span class="cn-label">{{ $support?->content('badge_text', 'Soporte 360°') }}</span>
      <h2>{{ $support?->content('title', '¡Te acompañamos en todo momento!') }}</h2>
      <p>{{ $support?->content('description', 'Aliado de negocio a largo plazo: soporte técnico y creativo antes, durante y después de cada proyecto.') }}</p>
      <div class="cn-timeline-wrap">
        <div class="cn-timeline-rail" aria-hidden="true"><div class="cn-timeline-fill" id="cn-timeline-fill"></div></div>
        <ol class="cn-steps">
          @foreach($support?->items ?? collect() as $item)
          <li>
            <span class="cn-step-dot" aria-hidden="true"></span>
            <div class="cn-step-body">
              <strong>{{ $item->data('phase_title') }}</strong>
              <span>{{ $item->data('phase_description') }}</span>
            </div>
          </li>
          @endforeach
        </ol>
      </div>
    </div>
    <div class="cn-accompany-photo">
      @php $sImg = $support?->content('side_image','https://softura.com.mx/SofturaSolutions/images/Conocenos/image5.png'); $sSrc = ($sImg && !str_starts_with($sImg,'http')) ? asset('storage/'.$sImg) : $sImg; @endphp
      <img src="{{ $sSrc }}" alt="" loading="lazy">
    </div>
  </div>
</section>
@endif

@php
$clients = $sections->get('clients');
$clientSectors = $clients?->content('sectors', [
    ['name' => 'Gobierno',  'tag' => 'Sector gobierno'],
    ['name' => 'Educativo', 'tag' => 'Sector educativo'],
    ['name' => "TIC's",     'tag' => "Sector TIC's"],
    ['name' => 'Privado',   'tag' => 'Iniciativa privada'],
]);
@endphp
@if(!$clients || $clients->is_visible)
<section class="cn-section cn-section-clients" id="clientes">
  <div class="cn-container">
    <div class="cn-clients-stat rev">
      <span class="cn-clients-stat-num">100%</span>
      <p>Clientes satisfechos con nuestro servicio y compromiso.</p>
    </div>
    <header class="cn-head rev">
      <span class="cn-label">{{ $clients?->content('badge_text', 'Confianza') }}</span>
      <h2>{{ $clients?->content('title', 'Ellos nos avalan') }}</h2>
      <p>{{ $clients?->content('description', 'Relaciones comerciales basadas en la confianza, en cualquier giro y modelo de negocio.') }}</p>
    </header>
    <div class="cn-tabs rev" id="sector-tabs" role="tablist">
      @foreach($clientSectors as $i => $sector)
      <button type="button" {{ $i === 0 ? 'class="active"' : '' }} data-sector="{{ $i }}">{{ $sector['name'] }}</button>
      @endforeach
    </div>
    <div class="cn-panel rev" id="clients-carousel">
      @foreach($clientSectors as $i => $sector)
      @php $sectorLogos = $clients?->items->filter(fn($item) => (int)$item->data('sector',0) === $i) ?? collect(); @endphp
      <div class="cn-carousel-item {{ $i === 0 ? 'active' : '' }}">
        <p class="cn-panel-tag">{{ $sector['tag'] }}</p>
        <div class="cn-logos">
          @foreach($sectorLogos as $logo)
            @php $img = $logo->data('image',''); $src = ($img && !str_starts_with($img,'http')) ? asset('storage/'.$img) : $img; @endphp
            <img src="{{ $src }}" alt="{{ $logo->data('alt') }}" loading="lazy">
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
    <div class="cn-dots" id="clients-dots"></div>
  </div>
</section>
@endif

@php $testimonials = $sections->get('testimonials'); @endphp
@if(!$testimonials || $testimonials->is_visible)
<section class="cn-section cn-section-quotes">
  <div class="cn-container">
    <header class="cn-head rev">
      <span class="cn-label">{{ $testimonials?->content('badge_text', 'Voces') }}</span>
      <h2>{{ $testimonials?->content('title', 'Lo que dicen nuestros clientes') }}</h2>
    </header>
    <div class="cn-quotes rev" id="testimonial-carousel">
      @foreach($testimonials?->items ?? collect() as $item)
        @php $logo = $item->data('logo_image',''); $logoSrc = ($logo && !str_starts_with($logo,'http')) ? asset('storage/'.$logo) : $logo; @endphp
        <article class="cn-quote">
          <span class="cn-quote-mark" aria-hidden="true">"</span>
          <header><img src="{{ $logoSrc }}" alt="{{ $item->data('author_name') }}" loading="lazy"></header>
          <blockquote>{{ $item->data('quote') }}</blockquote>
          <footer>
            <strong>{{ $item->data('author_name') }}</strong>
            <span>{{ $item->data('author_role') }}</span>
          </footer>
        </article>
      @endforeach
    </div>
    <div class="cn-dots" id="testimonial-dots"></div>
  </div>
</section>
@endif

<section class="cn-talent" id="form_correo">
  <div class="cn-talent-glow" aria-hidden="true"></div>
  <div class="cn-container cn-talent-grid rev">
    <div class="cn-talent-copy">
      <span class="cn-label cn-label-light" data-i18n="cn.label.careers">Carreras</span>
      <h2 data-i18n="cn.talent.title">Buscamos talento</h2>
      <p data-i18n="cn.talent.sub">¿Te gustaría construir tecnología con nosotros? Cuéntanos sobre ti.</p>
      <ul class="cn-perks">
        <li data-i18n="cn.perk.1">Proyectos retadores</li>
        <li data-i18n="cn.perk.2">Crecimiento profesional</li>
        <li data-i18n="cn.perk.3">Cultura colaborativa</li>
      </ul>
      <p class="cn-talent-mail"><a href="mailto:info@softura.com.mx">info@softura.com.mx</a></p>
    </div>
    <div class="cn-talent-form-wrap">
      <div class="cn-loader" id="cn-loader" aria-hidden="true"></div>
      <form class="cn-form" data-emailjs novalidate>
        <div class="cn-field"><label for="nombre" data-i18n="cn.label.name">Nombre</label><input type="text" id="nombre" name="nombre" required autocomplete="name" placeholder="Nombre"></div>
        <div class="cn-field"><label for="email" data-i18n="cn.label.email">Correo electrónico</label><input type="email" id="email" name="email" required autocomplete="email" placeholder="Correo"></div>
        <div class="cn-field"><label for="telefono" data-i18n="cn.label.phone">Teléfono</label><input type="tel" id="telefono" name="telefono" required autocomplete="tel" placeholder="Teléfono"></div>
        <div class="cn-field"><label for="comentario" data-i18n="cn.label.message">Mensaje</label><textarea id="comentario" name="mensaje" rows="4" required placeholder="Mensaje"></textarea></div>
        <button type="submit" class="cn-btn-primary" data-i18n="contact.send">Enviar mensaje</button>
        <p class="cn-form-message" id="cn-form-msg" role="alert" hidden></p>
      </form>
    </div>
  </div>
</section>

@endsection

@section('footer')
<footer class="cn-site-footer">
  <div class="cn-container cn-footer-row">
    <div class="logo">Softura<b style="color:var(--blue)">.</b></div>
    <p data-i18n="contact.location">Tlaxcala, México</p>
    <div class="cn-footer-links cn-social-links">
      <a class="cn-social-fb" href="https://www.facebook.com/SofturaSolutions" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12S0 5.446 0 12.073c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
      </a>
      <a class="cn-social-li" href="https://www.linkedin.com/company/softura-solutions" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
        <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="#0A66C2" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.048c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 1 1 0-4.124 2.062 2.062 0 0 1 0 4.124zM7.119 20.452H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
      </a>
    </div>
  </div>
  <p class="cn-copy" data-i18n="footer.rights">© 2026 Softura Solutions</p>
</footer>
<a href="#top" class="cn-scrollup" id="scroll-top" aria-label="Subir">↑</a>
<a href="https://api.whatsapp.com/send?phone=522411016729&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." class="cn-wa" target="_blank" rel="noopener" aria-label="WhatsApp">
  <svg width="26" height="26" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
</a>
@endsection
