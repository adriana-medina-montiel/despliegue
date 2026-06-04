@extends('layouts.web')

@section('title', 'Conócenos — Softura Solutions')
@section('body-class', 'page-conocenos')
@section('body-attrs', 'id="top"')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/conocenos.css') }}">
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
@endpush

@section('content')
<section class="cn-hero" id="portada">
  <div class="cn-hero-media" aria-hidden="true">
    <img src="{{ asset('img/official/Conocenos/image67.png') }}" alt="" loading="eager">
    <div class="cn-hero-shade"></div>
  </div>
  <div class="cn-container cn-hero-content rev">
    <span class="cn-hero-tag" data-i18n="about.badge">Quiénes somos</span>
    <h1 data-i18n="cn.hero">Queremos ser tu aliado de negocio</h1>
    <p class="cn-hero-lead" data-i18n="cn.hero.lead">Soluciones de software a la medida con consultoría, calidad y acompañamiento en cada etapa de tu proyecto.</p>
    <div class="cn-hero-btns">
      <a href="{{ route('contacto') }}" class="btn-p" data-i18n="cn.cta.project">Iniciar un proyecto</a>
      <a href="#form_correo" class="cn-btn-outline" data-i18n="cn.cta.talent">Únete al equipo →</a>
    </div>
  </div>
  <a href="#diferenciadores" class="cn-scroll-hint" aria-label="Explorar secciones">
    <span data-i18n="cn.scroll">Explorar</span>
    <span class="cn-scroll-chevron" aria-hidden="true"></span>
  </a>
</section>

<!-- 2. Diferenciadores — medalla + diagrama oficial -->
<section class="cn-section cn-section-diff" id="diferenciadores">
  <div class="cn-container">
    <header class="cn-head rev">
      <span class="cn-label" data-i18n="cn.label.diff">Por qué elegirnos</span>
      <h2 data-i18n="cn.more.title">¡Te brindamos más que los demás!</h2>
      <p data-i18n="cn.more.text">Complementamos el servicio de software con diferenciadores que hacen única cada colaboración con tu empresa.</p>
    </header>
    <div class="cn-diff-split rev">
      <div class="cn-diff-left">
        <img class="cn-medal" src="{{ asset('img/official/Conocenos/images.png') }}" alt="" loading="lazy">
        <p class="cn-diff-intro" data-i18n="cn.more.text">En Softura Solutions nos esforzamos por brindarte la mejor experiencia. Complementamos el desarrollo de software con diferenciadores clave para que tu experiencia con nosotros sea única.</p>
      </div>
      <figure class="cn-diff-figure">
        <img src="{{ asset('img/official/Conocenos/detalles.png') }}" alt="Los detalles de valor" loading="lazy">
        <figcaption class="cn-diff-caption" data-i18n="cn.wheel.center">Los detalles de valor</figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- 3. Pilares -->
<section class="cn-section cn-section-pillars">
  <div class="cn-container">
    <header class="cn-head cn-head-light rev">
      <h2 data-i18n="cn.pillars.title">Ayudarte a mejorar es nuestra motivación</h2>
      <p data-i18n="cn.pillars.text">Especialistas en constante actualización, comprometidos con brindar el mejor servicio en cada entrega.</p>
    </header>
    <div class="cn-pillars rev" data-cn-stagger>
      <article class="cn-pillar cn-stagger-item">
        <div class="cn-pillar-frame">
          <img src="https://softura.com.mx/SofturaSolutions/images/Conocenos/ima1.png" alt="" loading="lazy">
        </div>
        <h3 data-i18n="cn.pillar.1">Profesionalismo</h3>
      </article>
      <article class="cn-pillar cn-stagger-item">
        <div class="cn-pillar-frame">
          <img src="https://softura.com.mx/SofturaSolutions/images/Conocenos/ima2.png" alt="" loading="lazy">
        </div>
        <h3 data-i18n="cn.pillar.2">Responsabilidad</h3>
      </article>
      <article class="cn-pillar cn-stagger-item">
        <div class="cn-pillar-frame">
          <img src="https://softura.com.mx/SofturaSolutions/images/Conocenos/ima3.png" alt="" loading="lazy">
        </div>
        <h3 data-i18n="cn.pillar.3">Compromiso</h3>
      </article>
      <article class="cn-pillar cn-stagger-item">
        <div class="cn-pillar-frame">
          <img src="https://softura.com.mx/SofturaSolutions/images/Conocenos/ima4.png" alt="" loading="lazy">
        </div>
        <h3 data-i18n="cn.pillar.4">Expertiz</h3>
      </article>
    </div>
  </div>
</section>

<!-- 4. Acompañamiento -->
<section class="cn-section">
  <div class="cn-container cn-accompany rev">
    <div class="cn-accompany-copy">
      <span class="cn-label" data-i18n="cn.label.support">Soporte 360°</span>
      <h2 data-i18n="cn.accompany.title">¡Te acompañamos en todo momento!</h2>
      <p data-i18n="cn.accompany.text">Aliado de negocio a largo plazo: soporte técnico y creativo antes, durante y después de cada proyecto.</p>
      <div class="cn-timeline-wrap">
        <div class="cn-timeline-rail" aria-hidden="true">
          <div class="cn-timeline-fill" id="cn-timeline-fill"></div>
        </div>
        <ol class="cn-steps">
          <li>
            <span class="cn-step-dot" aria-hidden="true"></span>
            <div class="cn-step-body">
              <strong data-i18n="cn.phase.1">Antes del proyecto</strong>
              <span data-i18n="cn.phase.1.desc">Consultoría y definición de alcance</span>
            </div>
          </li>
          <li>
            <span class="cn-step-dot" aria-hidden="true"></span>
            <div class="cn-step-body">
              <strong data-i18n="cn.phase.2">Durante el desarrollo</strong>
              <span data-i18n="cn.phase.2.desc">Seguimiento y comunicación constante</span>
            </div>
          </li>
          <li>
            <span class="cn-step-dot" aria-hidden="true"></span>
            <div class="cn-step-body">
              <strong data-i18n="cn.phase.3">Después de la entrega</strong>
              <span data-i18n="cn.phase.3.desc">Soporte, evolución y mejora continua</span>
            </div>
          </li>
        </ol>
      </div>
    </div>
    <div class="cn-accompany-photo">
      <img src="{{ asset('img/official/Conocenos/image5.png') }}" alt="" loading="lazy">
    </div>
  </div>
</section>

<!-- 5. Clientes -->
<section class="cn-section cn-section-clients" id="clientes">
  <div class="cn-container">
    <div class="cn-clients-stat rev">
      <span class="cn-clients-stat-num" data-i18n="cn.clients.stat">100%</span>
      <p data-i18n="cn.clients.stat.label">Clientes satisfechos con nuestro servicio y compromiso.</p>
    </div>
    <header class="cn-head rev">
      <span class="cn-label" data-i18n="cn.clients.endorse">Confianza</span>
      <h2 data-i18n="cn.clients.title">Ellos nos avalan</h2>
      <p data-i18n="cn.clients.text">Relaciones comerciales basadas en la confianza, en cualquier giro y modelo de negocio.</p>
    </header>
    <div class="cn-tabs rev" id="sector-tabs" role="tablist">
      <button type="button" class="active" data-sector="0" data-i18n="cn.sector.gov.short">Gobierno</button>
      <button type="button" data-sector="1" data-i18n="cn.sector.edu.short">Educativo</button>
      <button type="button" data-sector="2" data-i18n="cn.sector.tic.short">TIC's</button>
      <button type="button" data-sector="3" data-i18n="cn.sector.priv.short">Privado</button>
    </div>
    <div class="cn-panel rev" id="clients-carousel">
      <div class="cn-carousel-item active">
        <p class="cn-panel-tag" data-i18n="cn.sector.gov">Sector gobierno</p>
        <div class="cn-logos">
          <img src="{{ asset('img/official/clientes/indesol.png') }}" alt="Indesol">
          <img src="{{ asset('img/official/clientes/dgcft.png') }}" alt="DGCFT">
          <img src="{{ asset('img/official/clientes/oportunidades-ch.png') }}" alt="Oportunidades">
          <img src="{{ asset('img/official/clientes/sedesol.png') }}" alt="SEDESOL">
          <img src="{{ asset('img/official/clientes/prospera.png') }}" alt="PROSPERA">
          <img src="https://softura.com.mx/SofturaSolutions/images/clientes/coordinacion_del_sistema.png" alt="Coordinación">
        </div>
      </div>
      <div class="cn-carousel-item">
        <p class="cn-panel-tag" data-i18n="cn.sector.edu">Sector educativo</p>
        <div class="cn-logos">
          <img src="{{ asset('img/official/clientes/ipn.png') }}" alt="IPN">
          <img src="https://softura.com.mx/SofturaSolutions/images/cobat1.png" alt="COBAT">
          <img src="{{ asset('img/official/clientes/uat2.png') }}" alt="UAT">
          <img src="{{ asset('img/official/clientes/itsc-ch.png') }}" alt="ITSC">
          <img src="{{ asset('img/official/clientes/iesm.png') }}" alt="IESM">
          <img src="https://softura.com.mx/SofturaSolutions/images/clientes/instituto_tecnologico_superior_de_tlaxco.png" alt="ITST">
          <img src="https://softura.com.mx/SofturaSolutions/images/clientes/uda.png" alt="UDA">
        </div>
      </div>
      <div class="cn-carousel-item">
        <p class="cn-panel-tag" data-i18n="cn.sector.tic">Sector TIC's</p>
        <div class="cn-logos">
          <img src="{{ asset('img/official/clientes/grupo_Red.png') }}" alt="GrupoRed">
          <img src="{{ asset('img/official/clientes/core_one.png') }}" alt="Core One">
          <img src="{{ asset('img/official/clientes/clusted.png') }}" alt="CLUSTEC">
          <img src="{{ asset('img/official/clientes/smartsoft-local.png') }}" alt="SmartSoft">
        </div>
      </div>
      <div class="cn-carousel-item">
        <p class="cn-panel-tag" data-i18n="cn.sector.priv">Iniciativa privada</p>
        <div class="cn-logos">
          <img src="{{ asset('img/official/clientes/omnilife-ch.png') }}" alt="Omnilife">
          <img src="{{ asset('img/official/clientes/dentalia.png') }}" alt="Dentalia">
          <img src="{{ asset('img/official/clientes/deloitte.png') }}" alt="Deloitte">
          <img src="{{ asset('img/official/clientes/metalsa.png') }}" alt="Metalsa">
        </div>
      </div>
    </div>
    <div class="cn-dots" id="clients-dots"></div>
  </div>
</section>

<!-- 6. Testimonios -->
<section class="cn-section cn-section-quotes">
  <div class="cn-container">
    <header class="cn-head rev">
      <span class="cn-label" data-i18n="cn.label.voices">Voces</span>
      <h2 data-i18n="cn.testimonials.title">Lo que dicen nuestros clientes</h2>
    </header>
    <div class="cn-quotes rev" id="testimonial-carousel">
      <article class="cn-quote">
        <span class="cn-quote-mark" aria-hidden="true">"</span>
        <header>
          <img src="{{ asset('img/official/clientes/grupo_Red.png') }}" alt="GrupoRed">
        </header>
        <blockquote data-i18n="cn.testimonial.1"></blockquote>
        <footer>
          <strong>Emeterio Flores Landaverde</strong>
          <span data-i18n="cn.testimonial.role1" data-i18n-html="cn.testimonial.role1"></span>
        </footer>
      </article>
      <article class="cn-quote">
        <span class="cn-quote-mark" aria-hidden="true">"</span>
        <header>
          <img src="{{ asset('img/official/clientes/dentalia.png') }}" alt="Dentalia" class="cn-logo-tall">
        </header>
        <blockquote data-i18n="cn.testimonial.2"></blockquote>
        <footer>
          <strong>Eliud Arista González</strong>
          <span data-i18n="cn.testimonial.role2" data-i18n-html="cn.testimonial.role2"></span>
        </footer>
      </article>
    </div>
    <div class="cn-dots" id="testimonial-dots"></div>
  </div>
</section>

<!-- 7. Talento -->
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
        <div class="cn-field">
          <label for="nombre" data-i18n="cn.label.name">Nombre</label>
          <input type="text" id="nombre" name="nombre" required autocomplete="name" data-i18n-placeholder="cn.talent.name" placeholder="Nombre">
        </div>
        <div class="cn-field">
          <label for="email" data-i18n="cn.label.email">Correo electrónico</label>
          <input type="email" id="email" name="email" required autocomplete="email" data-i18n-placeholder="cn.talent.email" placeholder="Correo">
        </div>
        <div class="cn-field">
          <label for="telefono" data-i18n="cn.label.phone">Teléfono</label>
          <input type="tel" id="telefono" name="telefono" required autocomplete="tel" data-i18n-placeholder="cn.talent.phone" placeholder="Teléfono">
        </div>
        <div class="cn-field">
          <label for="comentario" data-i18n="cn.label.message">Mensaje</label>
          <textarea id="comentario" name="mensaje" rows="4" required data-i18n-placeholder="cn.talent.message" placeholder="Mensaje"></textarea>
        </div>
        <button type="submit" class="cn-btn-primary" id="enviarCorreo" data-i18n="contact.send">Enviar mensaje</button>
        <p class="cn-form-message" id="cn-form-msg" role="alert" hidden></p>
      </form>
    </div>
  </div>
</section>

<a href="#top" class="cn-scrollup" id="scroll-top" aria-label="Subir">↑</a>

@endsection

