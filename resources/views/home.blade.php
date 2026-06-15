@extends('layouts.web')

@section('title', 'Softura Solutions')

@push('head-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
@endpush

@section('content')

{{-- ─── HERO THREE.JS ─────────────────────────────────────────────────────── --}}
<section class="hero" id="hero-section">
  <canvas id="three-hero"></canvas>
  <div class="hero-content">
    <div class="hero-badge">
      <span class="badge-dot"></span>
      Softura Solutions
    </div>
    <h1>Software<br><em>a la</em><br>medida</h1>
    <p class="hero-sub">
      Impulsamos la evolución de tu empresa con tecnología de alto rendimiento diseñada para el mercado actual.
    </p>
    <div class="hero-actions">
      <a href="#servicios" class="btn-p" style="text-decoration:none;display:inline-block;">Conoce nuestros servicios</a>
      <a href="{{ route('conocenos') }}" class="btn-g">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Ver más
      </a>
    </div>
  </div>
</section>

{{-- ─── STATS ──────────────────────────────────────────────────────────────── --}}
@php $hero = $sections->get('hero'); @endphp
@if($hero && $hero->is_visible && $hero->items->count() > 0)
<div class="stats rev">
  @foreach($hero->items as $stat)
  <div class="stat">
    <div class="stat-n" data-target="{{ preg_replace('/[^0-9]/', '', $stat->data('value')) }}" data-suffix="{{ preg_replace('/[0-9]/', '', $stat->data('value')) }}">{{ $stat->data('value') }}</div>
    <div class="stat-l">{{ $stat->data('label') }}</div>
  </div>
  @endforeach
</div>
@else
<div class="stats rev">
  <div class="stat">
    <div class="stat-n" data-target="20" data-suffix="+">20+</div>
    <div class="stat-l" data-i18n="home.stat.years">Años de experiencia</div>
  </div>
  <div class="stat">
    <div class="stat-n" data-target="30" data-suffix="+">30+</div>
    <div class="stat-l" data-i18n="home.stat.team">Profesionales especializados</div>
  </div>
  <div class="stat">
    <div class="stat-n" data-target="100" data-suffix="+">100+</div>
    <div class="stat-l" data-i18n="home.stat.allies">Ingenieros aliados CLUSTEC</div>
  </div>
  <div class="stat">
    <div class="stat-n" data-target="7" data-suffix="">7</div>
    <div class="stat-l" data-i18n="home.stat.services">Servicios especializados</div>
  </div>
</div>
@endif

{{-- ─── SOMOS DIFERENTES ───────────────────────────────────────────────────── --}}
@php $nosotros = $sections->get('nosotros'); @endphp
@if(!$nosotros || $nosotros->is_visible)
<section class="section" id="nosotros" style="background:var(--card);">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="sec-label rev">{{ $nosotros?->content('badge_text', 'Somos diferentes') }}</div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:4rem;align-items:center;" class="rev">
      <div>
        <h2 style="margin-bottom:1.5rem;">{{ $nosotros?->content('title', '20 años impulsando la innovación') }}</h2>
        <p style="font-size:1.05rem;line-height:1.8;color:var(--gray);">{!! $nosotros?->content('description', 'Contamos con la experiencia y el compromiso necesarios para impulsar la innovación y el crecimiento de nuestros clientes, adaptándonos a las necesidades del mercado actual con soluciones tecnológicas de alto valor. <strong>Somos diferentes:</strong> más de 20 años impulsando la innovación.') !!}</p>
        <div style="display:flex;gap:1.5rem;align-items:center;margin-top:2rem;flex-wrap:wrap;">
          @if(file_exists(public_path('img/official/aliados/clustec.png')))
          <img src="{{ asset('img/official/aliados/clustec.png') }}" alt="CLUSTEC Tlaxcala" style="max-height:38px;object-fit:contain;opacity:.85;">
          @endif
          @if(file_exists(public_path('img/official/aliados/smartsoft.png')))
          <img src="{{ asset('img/official/aliados/smartsoft.png') }}" alt="SmartSoft" style="max-height:38px;object-fit:contain;opacity:.85;">
          @endif
        </div>
      </div>
      <div style="position:relative;">
        @php $nosotrosSrc = cms_asset($nosotros?->content('image', 'img/official/Conocenos/equipo.png')); @endphp
        <img src="{{ $nosotrosSrc }}" alt="Equipo Softura Solutions" style="width:100%;border-radius:20px;box-shadow:0 20px 50px rgba(0,0,0,.08);" loading="lazy">
      </div>
    </div>
  </div>
</section>
@endif

{{-- ─── FÁBRICA DE SOFTWARE ─────────────────────────────────────────────────── --}}
@php $srvIntro = $sections->get('services_intro'); @endphp
@if(!$srvIntro || $srvIntro->is_visible)
<section class="section" id="servicios">
  <div class="services-bg"></div>
  <div class="services-head rev">
    <div class="sec-label">{{ $srvIntro?->content('badge_text', 'Fábrica de software') }}</div>
    <h2>{!! $srvIntro?->content('title', 'Descubre cómo podemos <span>ayudarte</span>') !!}</h2>
    <p class="services-sub">{{ $srvIntro?->content('description', 'Soluciones integrales de desarrollo, consultoría y acompañamiento para llevar tu negocio al siguiente nivel.') }}</p>
  </div>
  <div class="services-grid">
    @php
      $fabricaSvc = \App\Models\PageSection::get('fabrica', 'servicios');
      $serviciosList = $fabricaSvc ? $fabricaSvc->items : collect();
    @endphp
    @if($serviciosList->count() > 0)
      @foreach($serviciosList->take(3) as $idx => $svc)
      @php $slug = Str::slug($svc->data('title', '')); $imgSrc = cms_asset($svc->data('image', '')); @endphp
      <div class="svc rev" style="transition-delay:{{ $idx * 0.1 }}s">
        <div class="svc-num">0{{ $idx + 1 }}</div>
        <div class="svc-icon">
          @if($imgSrc)
            <img src="{{ $imgSrc }}" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:14px;" loading="lazy">
          @else
          <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="7" height="7" rx="1" fill="#6366f1"/><rect x="14" y="3" width="7" height="7" rx="1" fill="#6366f1"/><rect x="14" y="14" width="7" height="7" rx="1" fill="#6366f1"/><rect x="3" y="14" width="7" height="7" rx="1" fill="#6366f1"/></svg>
          @endif
        </div>
        <h3 class="svc-title">{{ $svc->data('title') }}</h3>
        <p class="svc-desc">{{ $svc->data('text') }}</p>
        <a href="{{ route('fabrica') }}#svc-{{ $slug }}" class="svc-arrow" style="text-decoration:none;">→</a>
      </div>
      @endforeach
    @else
      @foreach(config('softura-content.servicios', []) as $idx => $servicio)
      @if($idx < 3)
      <div class="svc rev" style="transition-delay:{{ $idx * 0.1 }}s">
        <div class="svc-num">0{{ $idx + 1 }}</div>
        <div class="svc-icon">
          @if(!empty($servicio['imagen']) && file_exists(public_path($servicio['imagen'])))
            <img src="{{ asset($servicio['imagen']) }}" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:14px;" loading="lazy">
          @endif
        </div>
        <h3 class="svc-title">{{ $servicio['titulo'] }}</h3>
        <p class="svc-desc">{{ $servicio['descripcion'] ?? '' }}</p>
        <a href="{{ route('fabrica') }}#svc-{{ $servicio['slug'] ?? '' }}" class="svc-arrow" style="text-decoration:none;">→</a>
      </div>
      @endif
      @endforeach
    @endif
  </div>
  <div class="rev" style="text-align:center;margin-top:3rem;">
    <a href="{{ route('fabrica') }}" class="btn-p" style="text-decoration:none;display:inline-block;">Ver fábrica de software completa</a>
  </div>
</section>
@endif

{{-- ─── DEVOPS ─────────────────────────────────────────────────────────────── --}}
@php $devops = $sections->get('devops'); @endphp
@if(!$devops || $devops->is_visible)
<section class="section" id="devops" style="background:#020714;color:#fff;padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:4rem;align-items:center;" class="rev">
    <div>
      <div style="font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:#00C9A7;margin-bottom:1rem;font-weight:500;">{{ $devops?->content('kicker', 'DevOps') }}</div>
      <h2 style="font-family:'Syne',sans-serif;font-weight:800;font-size:clamp(1.8rem,3.5vw,3rem);color:#fff;margin-bottom:1.5rem;letter-spacing:-.03em;line-height:1.1;">{{ $devops?->content('title', 'Entrega continua y confiable') }}</h2>
      <p style="color:#94a3b8;font-size:1.05rem;line-height:1.75;margin-bottom:1.5rem;">{{ $devops?->content('lead', 'Podemos ejecutar proyectos utilizando una filosofía para entregar software de forma más rápida, confiable y continua.') }}</p>
      @if($devops?->items?->count() > 0)
      <ul style="list-style:none;display:flex;flex-direction:column;gap:.75rem;">
        @foreach($devops->items as $bullet)
        <li style="display:flex;align-items:center;gap:.75rem;color:#cbd5e1;font-size:.95rem;">
          <span style="width:6px;height:6px;border-radius:50%;background:#00C9A7;flex-shrink:0;"></span>
          {{ $bullet->data('text') }}
        </li>
        @endforeach
      </ul>
      @endif
    </div>
    <div>
      @php $devImg = cms_asset($devops?->content('image', 'img/official/productos/devops.jpg')); @endphp
      <img src="{{ $devImg }}" alt="DevOps" style="width:100%;border-radius:20px;box-shadow:0 25px 60px rgba(0,0,0,.4);" loading="lazy">
    </div>
  </div>
</section>
@endif

{{-- ─── ONSHORING ───────────────────────────────────────────────────────────── --}}
@php $onshoring = $sections->get('onshoring'); @endphp
@if(!$onshoring || $onshoring->is_visible)
<section class="section" id="onshoring" style="background:var(--bg);padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;" class="rev">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:4rem;align-items:center;">
      <div>
        @php $onshrImg = cms_asset($onshoring?->content('image', 'img/official/productos/onshoring.jpg')); @endphp
        <img src="{{ $onshrImg }}" alt="Onshoring" style="width:100%;border-radius:20px;box-shadow:0 20px 50px rgba(0,0,0,.07);" loading="lazy">
      </div>
      <div>
        <div style="font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--blue);margin-bottom:1rem;font-weight:500;">{{ $onshoring?->content('kicker', 'Onshoring') }}</div>
        <h2 style="font-family:'Syne',sans-serif;font-weight:800;font-size:clamp(1.8rem,3.5vw,3rem);color:var(--ink);margin-bottom:1.5rem;letter-spacing:-.03em;line-height:1.1;">{{ $onshoring?->content('title', 'Onshoring') }}</h2>
        <p style="color:var(--gray);font-size:1.05rem;line-height:1.75;margin-bottom:1rem;">{{ $onshoring?->content('description') }}</p>
        @if($onshoring?->content('repse_text'))
        <p style="color:var(--gray);font-size:.95rem;line-height:1.6;border-left:3px solid var(--blue);padding-left:1rem;">{!! $onshoring->content('repse_text') !!}</p>
        @endif
      </div>
    </div>
  </div>
</section>
@endif

{{-- ─── CALIDAD CERTIFICADA ─────────────────────────────────────────────────── --}}
@php $calidad = $sections->get('calidad'); @endphp
@if(!$calidad || $calidad->is_visible)
<section class="section" id="calidad" style="background:var(--card);padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="rev" style="text-align:center;margin-bottom:3.5rem;">
      <div class="sec-label">{{ $calidad?->content('kicker', 'Calidad certificada') }}</div>
      <h2 style="margin-bottom:1rem;">{{ $calidad?->content('title', 'La calidad es nuestra prioridad') }}</h2>
      <p style="color:var(--gray);font-size:1.05rem;line-height:1.75;max-width:640px;margin:0 auto;">{{ $calidad?->content('description') }}</p>
    </div>
    @if($calidad?->items?->count() > 0)
    <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:2.5rem;align-items:center;" class="rev">
      @foreach($calidad->items as $cert)
      <div style="text-align:center;">
        @include('partials.official-logo', [
          'file' => $cert->data('file') ?: null,
          'cdn'  => $cert->data('cdn') ?: null,
          'alt'  => $cert->data('name'),
          'class'=> '',
        ])
        <span style="display:block;font-size:.78rem;letter-spacing:.06em;text-transform:uppercase;color:var(--gray);margin-top:.5rem;">{{ $cert->data('name') }}</span>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- ─── EXPERIENCIA INTEGRAL ────────────────────────────────────────────────── --}}
@php $valor = $sections->get('valor'); @endphp
@if(!$valor || $valor->is_visible)
<section class="section" id="valor" style="padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="rev" style="margin-bottom:3.5rem;">
      <div class="sec-label">{{ $valor?->content('kicker', 'Experiencia integral') }}</div>
      <h2>{!! $valor?->content('title', 'Mejoramos tu <span>experiencia</span>') !!}</h2>
      <p style="color:var(--gray);font-size:1.05rem;line-height:1.75;max-width:640px;margin-top:1rem;">{{ $valor?->content('description') }}</p>
    </div>
    @if($valor?->items?->count() > 0)
    <div class="value-grid rev">
      @foreach($valor->items as $item)
      <div class="value-card">
        <div class="value-icon">{{ $item->data('num') }}</div>
        <h3>{{ $item->data('title') }}</h3>
        <p>{{ $item->data('text') }}</p>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- ─── TALENTO ─────────────────────────────────────────────────────────────── --}}
@php $equipo = $sections->get('equipo'); @endphp
@if(!$equipo || $equipo->is_visible)
<section class="section" id="equipo" style="background:var(--card);padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="rev" style="text-align:center;margin-bottom:3rem;">
      <div class="sec-label">{{ $equipo?->content('kicker', 'Talento') }}</div>
      <h2>{!! $equipo?->content('title', 'Contamos con un equipo de <span>especialistas</span>') !!}</h2>
      <p style="color:var(--gray);font-size:1.05rem;line-height:1.75;max-width:640px;margin:1rem auto 0;">{{ $equipo?->content('description') }}</p>
    </div>
    @if($equipo?->items?->count() > 0)
    <div class="rev" style="display:flex;flex-wrap:wrap;justify-content:center;gap:.75rem;">
      @foreach($equipo->items as $rol)
      <span style="background:var(--bg);border:1px solid var(--border);color:var(--ink);font-family:'Syne',sans-serif;font-weight:600;font-size:.8rem;letter-spacing:.06em;text-transform:uppercase;padding:.6rem 1.2rem;border-radius:50px;">{{ $rol->data('label') }}</span>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

{{-- ─── STACK TECNOLÓGICO ───────────────────────────────────────────────────── --}}
@php $tecnologias = $sections->get('tecnologias'); @endphp
@if(!$tecnologias || $tecnologias->is_visible)
<section class="section" id="tecnologias" style="padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:4rem;align-items:center;" class="rev">
    <div>
      @include('partials.deck-tech-logos')
    </div>
    <div>
      <div class="sec-label">{{ $tecnologias?->content('kicker', 'Stack tecnológico') }}</div>
      <h2 style="margin-bottom:1.5rem;">{{ $tecnologias?->content('title', 'Somos especialistas') }}</h2>
      <p style="color:var(--gray);font-size:1.05rem;line-height:1.75;margin-bottom:1.5rem;">{{ $tecnologias?->content('description') }}</p>
      @if($tecnologias?->content('quote'))
      <blockquote style="border-left:3px solid var(--blue);padding-left:1.2rem;font-style:italic;color:var(--gray);font-size:.98rem;line-height:1.7;">"{{ $tecnologias->content('quote') }}"</blockquote>
      @endif
    </div>
  </div>
</section>
@endif

{{-- ─── FORMACIÓN CONTINUA ──────────────────────────────────────────────────── --}}
@php $capacitacion = $sections->get('capacitacion'); @endphp
@if(!$capacitacion || $capacitacion->is_visible)
<section class="section" id="capacitacion" style="background:var(--card);padding:6rem 5vw;">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="rev" style="margin-bottom:3rem;">
      <div class="sec-label">{{ $capacitacion?->content('kicker', 'Formación continua') }}</div>
      <h2>{!! $capacitacion?->content('title', 'Equipo de profesionales <span>comprometidos</span>') !!}</h2>
    </div>
    @if($capacitacion?->items?->count() > 0)
    <div class="rev" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:2rem;margin-bottom:2.5rem;">
      @foreach($capacitacion->items as $metric)
      <div style="text-align:center;padding:2rem;background:var(--bg);border-radius:20px;border:1px solid var(--border);">
        <strong style="display:block;font-family:'Syne',sans-serif;font-size:2.5rem;font-weight:800;color:var(--blue);line-height:1;margin-bottom:.5rem;">{{ $metric->data('value') }}</strong>
        <p style="color:var(--gray);font-size:.9rem;line-height:1.5;margin:0;">{{ $metric->data('text') }}</p>
      </div>
      @endforeach
    </div>
    @endif
    @if($capacitacion?->content('quote'))
    <p class="rev" style="text-align:center;color:var(--gray);font-size:1.05rem;font-style:italic;max-width:700px;margin:0 auto;">"{{ $capacitacion->content('quote') }}"</p>
    @endif
  </div>
</section>
@endif

{{-- ─── RED DE ALIADOS ──────────────────────────────────────────────────────── --}}
@php
  $ecosistema = $sections->get('ecosistema');
  $ecoCtaUrl  = ($ecosistema?->content('cta_url')) ?: '/conocenos';
  $ecoCtaHref = str_starts_with($ecoCtaUrl, 'http') ? $ecoCtaUrl : url($ecoCtaUrl);
@endphp
@if(!$ecosistema || $ecosistema->is_visible)
<section id="ecosistema" class="rev" style="position:relative;z-index:10;background:#000000;color:#fff;padding:6rem 0;overflow:hidden;font-family:'Inter',sans-serif;">
  <div style="position:absolute;top:-10%;left:-10%;width:50vw;height:50vw;background:radial-gradient(circle,rgba(26,79,255,0.15) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;bottom:-10%;right:-10%;width:40vw;height:40vw;background:radial-gradient(circle,rgba(255,255,255,0.1) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="max-width:1300px;margin:0 auto;padding:0 5vw;">
    <div style="text-align:center;margin-bottom:3rem;">
      <div style="text-transform:uppercase;letter-spacing:3px;color:#00C9A7;font-weight:700;font-size:0.85rem;margin-bottom:.75rem;">{{ $ecosistema?->content('kicker', 'Red de aliados') }}</div>
      <h2 style="font-size:clamp(2.2rem,4vw,3.2rem);font-family:'Syne',sans-serif;font-weight:800;line-height:1.15;margin:0 0 1.5rem 0;color:#ffffff;">{!! $ecosistema?->content('title', 'Tenemos un gran <span style="background:linear-gradient(90deg,#00C6FF,#0072FF);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">respaldo</span>') !!}</h2>
      <p style="color:#94A3B8;font-size:1.05rem;line-height:1.6;max-width:600px;margin:0 auto;">{{ $ecosistema?->content('description') }}</p>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;">
      @if($ecosistema?->items?->count() > 0)
        @foreach($ecosistema->items as $aliado)
        <div style="background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.08);border-radius:20px;padding:2rem;text-align:center;transition:border-color .3s;" onmouseover="this.style.borderColor='rgba(26,79,255,0.5)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.08)'">
          @include('partials.official-logo', [
            'file'  => $aliado->data('file') ?: null,
            'cdn'   => $aliado->data('cdn') ?: null,
            'alt'   => $aliado->data('alt'),
            'class' => '',
          ])
          <p style="color:#94A3B8;font-size:.9rem;line-height:1.55;margin:1rem 0 0;">{{ $aliado->data('text') }}</p>
        </div>
        @endforeach
      @else
      {{-- Fallback: nodos satélite interactivos --}}
      <div style="grid-column:1/-1;position:relative;height:550px;display:flex;align-items:center;justify-content:center;">
        <div style="position:absolute;border:1px dashed rgba(26,79,255,0.2);border-radius:50%;width:320px;height:320px;animation:spin 40s linear infinite;"></div>
        <div style="position:absolute;border:1px solid rgba(255,255,255,0.05);border-radius:50%;width:460px;height:460px;"></div>
        <div id="eco-core" style="position:relative;z-index:5;width:190px;height:190px;background:#fff;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:1.5rem;text-align:center;color:#030816;box-shadow:0 0 40px rgba(26,79,255,0.4);border:6px solid rgba(26,79,255,0.15);transition:all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);">
          <div id="core-logo-placeholder" style="height:40px;display:flex;align-items:center;margin-bottom:0.5rem;font-family:'Syne',sans-serif;font-weight:800;font-size:1.1rem;color:#1A4FFF;">SOFTURA</div>
          <p id="core-desc" style="font-size:0.72rem;color:#475569;line-height:1.3;margin:0;font-weight:500;">Pasa el cursor sobre un aliado.</p>
        </div>
        @foreach([
          ['img'=>'/img/Imagen1.png','title'=>'CLUSTEC','desc'=>'Impulsando la innovación y competitividad tecnológica regional.','bg'=>'#fff','pos'=>'top:5%'],
          ['img'=>'/img/Imagen2.png','title'=>'AMITI','desc'=>'Fortaleciendo la industria de TI y el desarrollo de talento en México.','bg'=>'#454545','pos'=>'top:25%;right:5%'],
          ['img'=>'/img/Imagen3.png','title'=>'COPARMEX','desc'=>'Unidos por la justicia social, un México próspero y lleno de oportunidades.','bg'=>'#fff','pos'=>'bottom:25%;right:5%'],
          ['img'=>'/img/Imagen4.png','title'=>'mxTI','desc'=>'Promoviendo el desarrollo y la internacionalización de la industria de software nacional.','bg'=>'#fff','pos'=>'bottom:5%'],
          ['img'=>'/img/Imagen5.png','title'=>'Aliado 5','desc'=>'Descripción del aliado estratégico.','bg'=>'#3f3e3e','pos'=>'bottom:25%;left:5%'],
          ['img'=>'/img/Imagen1.1.png','title'=>'Aliado 6','desc'=>'Descripción del aliado estratégico.','bg'=>'#383838','pos'=>'top:25%;left:5%'],
        ] as $node)
        <div class="sat-node" data-title="{{ $node['title'] }}" data-desc="{{ $node['desc'] }}" data-img="{{ $node['img'] }}" style="position:absolute;{{ $node['pos'] }};background:{{ $node['bg'] }};border-radius:14px;padding:10px;width:85px;height:55px;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 10px 25px rgba(0,0,0,0.3);transition:all 0.3s ease;z-index:6;">
          <img src="{{ $node['img'] }}" alt="{{ $node['title'] }}" style="max-width:100%;max-height:100%;object-fit:contain;">
        </div>
        @endforeach
      </div>
      @endif
    </div>
    @if($ecosistema?->content('highlight_text') || $ecosistema?->content('cta_text'))
    <div style="text-align:center;margin-top:3rem;">
      @if($ecosistema?->content('highlight_text'))
      <p style="color:#94A3B8;font-size:1.05rem;line-height:1.6;margin-bottom:1.5rem;">{{ $ecosistema->content('highlight_text') }}</p>
      @endif
      @if($ecosistema?->content('cta_text'))
      <a href="{{ $ecoCtaHref }}" class="btn-p" style="text-decoration:none;display:inline-block;">{{ $ecosistema->content('cta_text', 'Conoce más sobre nosotros') }}</a>
      @endif
    </div>
    @endif
  </div>
</section>
@endif

{{-- ─── CLIENTES ─────────────────────────────────────────────────────────────── --}}
<section class="section" id="clientes" style="background:var(--card);">
  <div style="max-width:1100px;margin:0 auto;">
    <div class="rev" style="text-align:center;margin-bottom:3rem;">
      <div class="sec-label">Confianza</div>
      <h2>Ellos nos <span>avalan</span></h2>
      <p style="color:var(--gray);font-size:1.05rem;line-height:1.75;max-width:620px;margin:1rem auto 0;">A lo largo de los años hemos establecido relaciones comerciales basadas en la confianza con clientes de distintos giros y modelos de negocio.</p>
    </div>
    @include('partials.official-clientes-grid')
  </div>
</section>

{{-- ─── PROCESO (ONSHORING / NEARSHORING) ──────────────────────────────────── --}}
@php $proceso = $sections->get('proceso'); @endphp
@if(!$proceso || $proceso->is_visible)
<section class="section" id="proceso">
  <div class="process-wrap">
    <div class="process-header rev">
      <h2>{!! $proceso?->content('title', 'Con nuestros modelos de externalización,<br>seremos tus verdaderos <strong>aliados de negocio</strong>') !!}</h2>
    </div>
    <div class="process-cards rev">
      @if($proceso?->items?->count() > 0)
        @foreach($proceso->items as $idx => $card)
        <div class="p-card">
          <div class="p-icon-wrap">
            @if($idx % 2 === 0)
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>
            </svg>
            @else
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
            </svg>
            @endif
          </div>
          <h3>{{ $card->data('title') }}</h3>
          <p>{{ $card->data('description') }}</p>
        </div>
        @endforeach
      @else
      <div class="p-card">
        <div class="p-icon-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>
          </svg>
        </div>
        <h3>Onshoring</h3>
        <p>Nuestros ingenieros trabajan directamente en tus instalaciones ubicadas en México cuando así se requiera.</p>
      </div>
      <div class="p-card">
        <div class="p-icon-wrap">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
          </svg>
        </div>
        <h3>Nearshoring</h3>
        <p>Nuestros ingenieros trabajan remotamente en proyectos para tu empresa ubicada en E.U.A o Latinoamérica.</p>
      </div>
      @endif
    </div>
    @if($proceso?->content('footer_text'))
    <div class="process-footer rev">
      <p>{!! $proceso->content('footer_text') !!}</p>
    </div>
    @else
    <div class="process-footer rev">
      <p>Hagamos equipo y <strong>deja de preocuparte</strong> de los costos de reclutamiento, selección, capacitación y continuidad del personal.</p>
    </div>
    @endif
  </div>
</section>
@endif

{{-- ─── PRODUCTOS ───────────────────────────────────────────────────────────── --}}
@php
  $stack       = $sections->get('stack');
  $stackCtaUrl = ($stack?->content('cta_url')) ?: '/productos';
  $stackCtaHref = str_starts_with($stackCtaUrl, 'http') ? $stackCtaUrl : url($stackCtaUrl);
@endphp
@if(!$stack || $stack->is_visible)
<section class="stack-section" id="stack">
  <div class="products-top rev">
    <div class="sec-label">{{ $stack?->content('kicker', 'Portafolio') }}</div>
    <h2>{!! $stack?->content('title', 'Descubre nuestros <span>productos</span>') !!}</h2>
    <p class="products-sub">{{ $stack?->content('description', 'Soluciones diseñadas para optimizar procesos, automatizar tareas y acelerar el crecimiento de tu empresa.') }}</p>
  </div>
  <div class="stack-grid">
    @if($stack?->items?->count() > 0)
      @foreach($stack->items as $product)
      @php
        $prodUrl  = $product->data('url') ?: '#';
        $prodHref = str_starts_with($prodUrl, 'http') ? $prodUrl : url($prodUrl);
      @endphp
      <a href="{{ $prodHref }}" class="stack-tag rev" style="text-decoration:none;">
        <div class="dot">✦</div>
        <div>
          <h3>{{ $product->data('name') }}</h3>
          <p>{{ $product->data('description') }}</p>
        </div>
      </a>
      @endforeach
    @else
    <div class="stack-tag rev"><div class="dot">✦</div><div><h3>Bituyú</h3><p>Gestión moderna y automatización empresarial.</p></div></div>
    <div class="stack-tag rev"><div class="dot">⬡</div><div><h3>Binibiaa</h3><p>Soluciones inteligentes para procesos digitales.</p></div></div>
    <div class="stack-tag rev"><div class="dot">▣</div><div><h3>Academica</h3><p>Plataforma educativa moderna y eficiente.</p></div></div>
    <div class="stack-tag rev"><div class="dot">◫</div><div><h3>SIGA</h3><p>Administración y control de información avanzada.</p></div></div>
    <div class="stack-tag rev"><div class="dot">◈</div><div><h3>Fenyx Admin</h3><p>Herramientas administrativas ágiles y escalables.</p></div></div>
    <div class="stack-tag rev"><div class="dot">⬢</div><div><h3>MI PBR</h3><p>Monitoreo y gestión estratégica de recursos.</p></div></div>
    <div class="stack-tag rev"><div class="dot">⌘</div><div><h3>SSPIP</h3><p>Solución tecnológica segura y eficiente.</p></div></div>
    @endif
  </div>
  <div class="rev" style="text-align:center;margin-top:3rem;">
    <a href="{{ $stackCtaHref }}" class="btn-p" style="text-decoration:none;display:inline-block;">{{ $stack?->content('cta_text', 'Ver todos los productos') }}</a>
  </div>
</section>
@endif

{{-- ─── CTA CONTACTO ────────────────────────────────────────────────────────── --}}
@php $cta = $sections->get('cta'); @endphp
@if(!$cta || $cta->is_visible)
<section class="cta-section" id="contacto" style="position:relative;z-index:10;background:#020714;padding:5rem 5vw;color:#fff;font-family:'Inter',sans-serif;">
  <div class="rev" style="max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:4rem;align-items:center;">
    <div>
      <div class="sec-label" style="color:#1A4FFF;">{{ $cta?->content('badge_text', 'Contacto') }}</div>
      <h2 style="font-family:'Syne',sans-serif;font-size:clamp(2.2rem,4vw,3.5rem);font-weight:800;line-height:1.2;margin-bottom:1.5rem;color:#fff;">
        {!! $cta?->content('title', 'Emprende este <br>viaje <span style="color:#1A4FFF;">con nosotros</span>') !!}
      </h2>
      <p style="color:#94a3b8;font-size:1.1rem;line-height:1.6;max-width:480px;margin-bottom:3.5rem;">
        {{ $cta?->content('description', 'Cuéntanos tu idea y construyamos juntos soluciones tecnológicas que impulsen tu negocio.') }}
      </p>
    </div>
    <div style="background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.05);backdrop-filter:blur(10px);padding:2.5rem;border-radius:24px;box-shadow:0 30px 60px rgba(0,0,0,0.4);">
      <form data-contact novalidate style="display:flex;flex-direction:column;gap:1.2rem;">
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.2rem;">
          <input type="text" name="nombre" data-i18n-placeholder="contact.name" placeholder="Nombre completo" required style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
          <input type="text" name="empresa" data-i18n-placeholder="contact.company" placeholder="Empresa (opcional)" style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
        </div>
        <input type="email" name="email" data-i18n-placeholder="contact.email" placeholder="Correo electrónico" required style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
        <input type="tel" name="telefono" data-i18n-placeholder="contact.phone" placeholder="Teléfono (opcional)" style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;box-sizing:border-box;">
        <textarea name="mensaje" data-i18n-placeholder="contact.message" placeholder="Cuéntanos sobre tu proyecto..." rows="4" required style="width:100%;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);padding:0.9rem 1rem;border-radius:10px;color:#fff;font-family:inherit;font-size:0.9rem;outline:none;resize:none;box-sizing:border-box;display:block;"></textarea>
        <button type="submit" data-i18n="contact.send" style="width:100%;background:linear-gradient(90deg,#1A4FFF 0%,#3b82f6 100%);color:#fff;border:none;padding:1rem;border-radius:10px;font-family:inherit;font-weight:600;font-size:1rem;cursor:pointer;">
          Enviar mensaje
        </button>
      </form>
    </div>
  </div>
</section>
@endif

@endsection

@push('scripts')
<script>
(function(){
  const canvas = document.getElementById('three-hero');
  const section = document.getElementById('hero-section');
  if(!canvas||!section) return;
  const renderer = new THREE.WebGLRenderer({canvas,alpha:true,antialias:true});
  renderer.setPixelRatio(Math.min(window.devicePixelRatio,2));
  renderer.setClearColor(0x000000,0);
  function resize(){renderer.setSize(section.offsetWidth,section.offsetHeight);camera.aspect=section.offsetWidth/section.offsetHeight;camera.updateProjectionMatrix();}
  const scene=new THREE.Scene();
  const camera=new THREE.PerspectiveCamera(60,1,0.1,100);
  camera.position.set(0,0,8);
  resize();
  window.addEventListener('resize',resize);
  scene.add(new THREE.AmbientLight(0xffffff,0.4));
  const dLight=new THREE.DirectionalLight(0x1A4FFF,1.5);dLight.position.set(5,5,5);scene.add(dLight);
  const dLight2=new THREE.DirectionalLight(0x00C9A7,1);dLight2.position.set(-5,-3,3);scene.add(dLight2);
  const wireMat=new THREE.MeshPhongMaterial({color:0x1A4FFF,wireframe:true,transparent:true,opacity:0.25});
  const objects=[];
  const mainSphere=new THREE.Mesh(new THREE.IcosahedronGeometry(1.8,3),wireMat.clone());mainSphere.material.opacity=0.15;scene.add(mainSphere);objects.push({mesh:mainSphere,rx:.003,ry:.005});
  const innerIco=new THREE.Mesh(new THREE.IcosahedronGeometry(1,1),new THREE.MeshPhongMaterial({color:0xEEF2FF,transparent:true,opacity:0.6,shininess:120}));scene.add(innerIco);objects.push({mesh:innerIco,rx:.006,ry:-.004});
  for(let i=0;i<3;i++){const ring=new THREE.Mesh(new THREE.TorusGeometry(2.5+i*.5,0.015,16,120),new THREE.MeshPhongMaterial({color:i===0?0x1A4FFF:i===1?0x00C9A7:0x6B6B80,transparent:true,opacity:0.5-i*.1}));ring.rotation.x=Math.PI/2*(i*.7+.5);ring.rotation.y=i*.8;scene.add(ring);objects.push({mesh:ring,rx:i%2===0?.004:-.003,ry:i%2===0?-.003:.005});}
  const orbiters=[];
  [{r:3.2,speed:.008,phase:0,y:.5,geo:new THREE.OctahedronGeometry(.18)},{r:3.5,speed:-.006,phase:2.1,y:-.4,geo:new THREE.TetrahedronGeometry(.15)},{r:2.8,speed:.01,phase:4.2,y:.8,geo:new THREE.OctahedronGeometry(.12)}].forEach(d=>{const m=new THREE.Mesh(d.geo,new THREE.MeshPhongMaterial({color:Math.random()>.5?0x1A4FFF:0x00C9A7,transparent:true,opacity:.8,shininess:100}));scene.add(m);orbiters.push({mesh:m,...d,t:d.phase});});
  const ptGeo=new THREE.BufferGeometry();const ptPos=new Float32Array(450);for(let i=0;i<450;i++)ptPos[i]=(Math.random()-.5)*20;ptGeo.setAttribute('position',new THREE.BufferAttribute(ptPos,3));scene.add(new THREE.Points(ptGeo,new THREE.PointsMaterial({color:0x1A4FFF,size:.04,transparent:true,opacity:.4})));
  const gridHelper=new THREE.GridHelper(20,30,0x1A4FFF,0xE4E4EE);gridHelper.material.transparent=true;gridHelper.material.opacity=0.15;gridHelper.position.y=-4;scene.add(gridHelper);
  let mox=0,moy=0;document.addEventListener('mousemove',e=>{mox=(e.clientX/window.innerWidth-.5)*2;moy=(e.clientY/window.innerHeight-.5)*2;});
  function animate(){requestAnimationFrame(animate);objects.forEach(o=>{o.mesh.rotation.x+=o.rx;o.mesh.rotation.y+=o.ry;});orbiters.forEach(o=>{o.t+=o.speed;o.mesh.position.x=Math.cos(o.t)*o.r;o.mesh.position.z=Math.sin(o.t)*o.r;o.mesh.position.y=o.y+Math.sin(o.t*2)*.3;o.mesh.rotation.x+=.02;o.mesh.rotation.y+=.015;});camera.position.x+=(mox*1.5-camera.position.x)*.04;camera.position.y+=(-moy*1-camera.position.y)*.04;camera.lookAt(0,0,0);renderer.render(scene,camera);}
  animate();
})();

// Satélites interactivos (fallback ecosistema)
document.addEventListener("DOMContentLoaded",()=>{
  const nodes=document.querySelectorAll('.sat-node');
  const core=document.getElementById('eco-core');
  if(!core) return;
  const coreLogo=document.getElementById('core-logo-placeholder');
  const coreDesc=document.getElementById('core-desc');
  const defaultTitle=coreLogo.innerHTML;
  const defaultDesc=coreDesc.innerHTML;
  nodes.forEach(node=>{
    node.addEventListener('mouseenter',()=>{
      core.style.borderColor="#1A4FFF";core.style.boxShadow="0 0 50px rgba(26,79,255,0.6)";
      coreLogo.innerHTML=`<img src="${node.getAttribute('data-img')}" style="max-height:100%;max-width:100%;object-fit:contain;">`;
      coreDesc.innerHTML=`<strong>${node.getAttribute('data-title')}</strong><br>${node.getAttribute('data-desc')}`;
    });
    node.addEventListener('mouseleave',()=>{core.style.borderColor="rgba(26,79,255,0.15)";core.style.boxShadow="0 0 40px rgba(26,79,255,0.4)";coreLogo.innerHTML=defaultTitle;coreDesc.innerHTML=defaultDesc;});
  });
});
</script>
@endpush
