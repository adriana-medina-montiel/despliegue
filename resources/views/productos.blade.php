@extends('layouts.web')

@section('title', 'Productos — Softura Solutions')
@section('body-class', 'page-productos')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/estilos2.css') }}">
<link rel="stylesheet" href="{{ asset('css/productos-polish.css') }}">
@endpush

@section('content')

@php
    $hero = $sections->get('hero');
    $intro = $sections->get('intro');
    $catalogo = $sections->get('catalogo');
    $bituyu = $sections->get('bituyu');
    $binibiaa = $sections->get('binibiaa');
    $academika = $sections->get('academika');
    $siga = $sections->get('siga');
    $fenix_admin = $sections->get('fenix_admin');
    $mipbr = $sections->get('mipbr');
    $sspip = $sections->get('sspip');
@endphp

@if(!$hero || $hero->is_visible)
<section class="prod-hero">
  <div class="prod-hero-bg" style="background-image:url('{{ cms_asset($hero?->content('background_image', 'img/empresas.png')) }}');" aria-hidden="true"></div>
  <div class="prod-hero-overlay" aria-hidden="true"></div>
  <div class="prod-hero-inner rev">
    <span class="prod-hero-badge"><i class="fas fa-box-open"></i> Portafolio</span>
    <h1>{!! $hero?->content('title', 'Productos que <em>impulsan</em> tu organización') !!}</h1>
    <p class="prod-hero-lead">{{ $hero?->content('description', 'Soluciones de software personalizables para digitalizar procesos, conectar negocios y escalar resultados.') }}</p>
  </div>
</section>
@endif

@if((!$intro || $intro->is_visible) || (!$catalogo || $catalogo->is_visible))
<section class="products-section">
        @if(!$intro || $intro->is_visible)
        <div class="products-header">
            <span class="subtitle">{{ $intro?->content('badge_text', 'NUESTROS PRODUCTOS') }}</span>
            <h1>{!! $intro?->content('title', 'Échale un vistazo a <span class="highlight">nuestros productos</span> y potencializa el éxito de tu organización') !!}</h1>
            <p>{!! $intro?->content('description', 'Soluciones de software personalizables que se adaptan a tus necesidades y te ayudan a alcanzar <span class="highlight-blue">mejores resultados</span>.') !!}</p>
        </div>
        @endif

        @if(!$catalogo || $catalogo->is_visible)
        <div class="products-grid">

            @foreach($catalogo?->items ?? collect() as $item)
            <div class="product-card">
                <div class="card-logo logo-{{ $item->data('color_class', 'indigo') }}">
                    <img src="{{ cms_asset($item->data('logo')) }}" alt="{{ $item->data('title') }} Logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>{{ $item->data('title') }}</h3>
                    <p>{{ $item->data('description') }}</p>
                    <div class="card-line line-{{ $item->data('color_class', 'indigo') }}"></div>
                </div>
                <button class="card-btn btn-{{ $item->data('color_class', 'indigo') }}" data-target="{{ $item->data('target') }}" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>
            @endforeach

        </div>
        @endif

        @if(!$intro || $intro->is_visible)
        <div class="features-bar">
            @foreach($intro?->items ?? collect() as $item)
            <div class="feature-item">
                <i class="{{ $item->data('icon', 'fas fa-puzzle-piece icon-blue') }}"></i>
                <div class="feature-text">
                    <strong>{{ $item->data('title') }}</strong>
                    <span>{{ $item->data('text') }}</span>
                </div>
            </div>
            @if(!$loop->last)
            <div class="feature-line"></div>
            @endif
            @endforeach
        </div>
        @endif
    </section>
@endif

    <div class="products-detail">

    @if(!$bituyu || $bituyu->is_visible)
    <section id="sec-bituyu" class="bituyu-section bituyu-section--corp">
        <div class="bituyu-wrapper">
            <header class="bituyu-hero rev">
                <div class="bituyu-hero-grid">
                    <div class="bituyu-hero-copy">
                    <div class="bituyu-brand-lockup">
                        <img src="{{ cms_asset('img/bituyu compras.png') }}" alt="" class="bituyu-brand-icon" aria-hidden="true">
                        <span class="bituyu-brand-word">BITUYÚ</span>
                    </div>
                        <p class="bituyu-tagline">
                            {{ $bituyu?->content('tagline', 'Plataforma tecnológica para la gestión de promociones y digitalización de MiPyMEs para Sindicatos, IES, Grupos Empresariales y Municipios.') }}
                        </p>
                        <div class="bituyu-stores">
                            <a href="{{ $bituyu?->content('google_play_url', '#') }}" class="bituyu-store" aria-label="Disponible en Google Play">
                                <span>DISPONIBLE EN</span><strong>Google Play</strong>
                            </a>
                            <a href="{{ $bituyu?->content('app_store_url', '#') }}" class="bituyu-store" aria-label="Disponible en App Store">
                                <span>DISPONIBLE EN</span><strong>App Store</strong>
                            </a>
                        </div>
                    </div>
                    <div class="bituyu-hero-mascot">
                        <img src="{{ cms_asset($bituyu?->content('mascot_image', 'img/official/productos/bituyu movil.png')) }}" alt="Bituyú — promociones exclusivas" class="bituyu-mascot-img" loading="lazy">
                    </div>
                </div>
            </header>

            <div class="bituyu-ecosystem rev">
                <img src="{{ cms_asset($bituyu?->content('eco_diagram_image', 'img/ecosistema bituyu.png')) }}" alt="Ecosistema Bituyú — aliados y sectores" class="bituyu-eco-diagram" loading="lazy">
                <div class="bituyu-eco-stats">
                    @foreach($bituyu?->content('stats', []) as $stat)
                    <article class="bituyu-eco-stat">
                        <i class="{{ $stat['icon'] ?? 'fas fa-store' }}"></i>
                        <strong>{{ $stat['value'] ?? '' }}</strong>
                        <span>{{ $stat['label'] ?? '' }}</span>
                    </article>
                    @endforeach
                </div>
            </div>

            <div class="bituyu-features-grid rev">
                @foreach($bituyu?->content('features', []) as $feat)
                <article class="bituyu-feature">
                    <div class="bituyu-feature-icon {{ $feat['icon'] ?? 'icon-store' }}"><i class="{{ $feat['inner_icon'] ?? 'fas fa-store' }}"></i></div>
                    <div><h3>{{ $feat['title'] ?? '' }}</h3><p>{{ $feat['description'] ?? '' }}</p></div>
                </article>
                @endforeach
            </div>

            <div class="bituyu-bar">
                <div class="bituyu-bar-text">
                    <i class="fas fa-mobile-alt" aria-hidden="true"></i>
                    <span>{!! $bituyu?->content('bar_text', 'Cierra la brecha digital de tu negocio con <strong>Bituyú</strong>') !!}</span>
                </div>
                <a href="{{ url($bituyu?->content('cta_url', '/contacto')) }}" class="bituyu-bar-btn">{{ $bituyu?->content('cta_text', 'Solicitar información') }}</a>
            </div>
        </div>
    </section>
    @endif
  
    @if(!$binibiaa || $binibiaa->is_visible)
    <section id="sec-binibiaa" class="binibiaa-section animate-fade-in">
    
    <div class="binibiaa-inner-wrapper">
        
        <div class="binibiaa-header">
            <span class="brand-subtitle">{{ $binibiaa?->content('subtitle', 'COMERCIALIZADORA') }}</span>
            <h2 class="brand-title">{{ $binibiaa?->content('title', 'Binibiaa') }}</h2>
            <span class="brand-slogan">{{ $binibiaa?->content('slogan', 'La marca del artesano') }}</span>
            <p class="brand-description">
                {{ $binibiaa?->content('description', 'Iniciativa que fomenta e impulsa la comercialización de productos artesanales a nivel nacional e internacional a través de las principales plataformas de comercio electrónico.') }}
            </p>
        </div>

        <div class="showcase-show-grid">
            
            @foreach($binibiaa?->content('items', []) as $item)
            <div class="showcase-item">
                <div class="showcase-img-wrapper">
                    <img src="{{ cms_asset($item['image'] ?? '') }}" alt="{{ $item['title'] ?? '' }}">
                </div>
                <div class="showcase-info">
                    <h3>{{ $item['title'] ?? '' }}</h3>
                    <p>{{ $item['description'] ?? '' }}</p>
                    <div class="showcase-badge">{{ $item['badge'] ?? '' }}</div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="marketplace-bar">
            <div class="marketplace-title">
                <i class="fas fa-shopping-cart cart-icon-bg"></i>
                <span>{!! $binibiaa?->content('marketplace_title', 'Conoce nuestro <strong>catálogo</strong> y <strong>pide ahora</strong> en') !!}</span>
            </div>
            
            <div class="platforms-links">
                <a href="{{ $binibiaa?->content('mlibre_url', 'https://www.mercadolibre.com') }}" target="_blank" class="platform-btn mlibre">
                    <img src="{{ cms_asset('img/ml.png') }}" alt="Mercado Libre">
                    <span>mercado libre</span>
                </a>
                
                <div class="separator-line"></div>
                
                <a href="{{ $binibiaa?->content('etsy_url', 'https://www.etsy.com') }}" target="_blank" class="platform-btn etsy">
                    <img src="{{ cms_asset('img/etzi.png') }}" alt="Etsy">
                </a>
            </div>
            
            <div class="bag-icon-container">
                <i class="fas fa-shopping-bag bag-icon-bg"></i>
            </div>
        </div>

    </div>
 </section>
 @endif

 @if(!$academika || $academika->is_visible)
  <section id="sec-academika" class="academika-section-flat">
    
    <div class="academika-header-flat">
        <div class="header-badge-icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <h2 class="academika-title-flat">{{ $academika?->content('title', 'ACADEMIKA') }}</h2>
        <p class="academika-desc-flat">
            {{ $academika?->content('description', 'Sistema de Servicios Escolares que permite la autorización de los procesos de control escolar de una Institución Educativa, ofreciendo mejores servicios a directivos, administrativos, docentes, alumnos y padres de familia.') }}
        </p>
    </div>

    <div class="academika-grid-flat">
        
        @foreach($academika?->content('modules', []) as $mod)
        <div class="module-card-flat">
            <div class="module-icon-circle {{ $mod['color'] ?? 'bg-blue-soft' }}">
                <i class="{{ $mod['icon'] ?? 'fas fa-book-open icon-blue' }}"></i>
            </div>
            <div class="module-text-flat">
                <h3>{{ $mod['title'] ?? '' }}</h3>
                <p>{{ $mod['description'] ?? '' }}</p>
            </div>
        </div>
        @endforeach

    </div>

    <div class="academika-features-flat-bar">
        
        @foreach($academika?->content('features', []) as $feat)
        <div class="feature-inline-item">
            <div class="feature-bullet-icon"><i class="{{ $feat['icon'] ?? 'fas fa-database' }}"></i></div>
            <span>{{ $feat['text'] ?? '' }}</span>
        </div>
        @if(!$loop->last)
        <div class="feature-divider"></div>
        @endif
        @endforeach

    </div>

 </section>
 @endif
 
    @if(!$siga || $siga->is_visible)
    <section id="sec-siga" class="siga-section-flat">
    <div class="siga-inner-wrapper">
        
        <div class="siga-header-flat">
            <h2 class="siga-title-flat">{{ $siga?->content('title', 'SIGA') }}</h2>
            <h3 class="siga-subtitle-flat">{{ $siga?->content('subtitle', '(Sistema Integral de Gestión del Aprendizaje)') }}</h3>
            <div class="siga-title-line"></div>
            <p class="siga-desc-flat">
                {{ $siga?->content('description', 'Permite **establecer entornos virtuales** de aprendizaje (e-Learning) mediante la distribución masiva de información, el trabajo colaborativo y la comunicación entre participantes.') }}
            </p>
        </div>

        <div class="siga-content-layout">
            
            <div class="siga-image-column">
                <div class="siga-img-wrapper">
                    <img src="{{ cms_asset($siga?->content('laptop_image', 'img/sigalaptop.png')) }}" alt="SIGA e-Learning Platform">
                </div>
            </div>

            <div class="siga-features-grid">
                
                @foreach($siga?->content('features', []) as $feat)
                <div class="siga-feature-card">
                    <div class="siga-icon-circle {{ $feat['color'] ?? 'ico-blue' }}">
                        <i class="{{ $feat['icon'] ?? 'fas fa-file-alt' }}"></i>
                    </div>
                    <div class="siga-card-text">
                        <h3>{{ $feat['title'] ?? '' }}</h3>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
 </section>
 @endif


 @if(!$fenix_admin || $fenix_admin->is_visible)
 <section id="sec-fenix-orbit" class="fenix-orbit-section">
    <div class="fenix-orbit-container">
        
        <div class="fenix-left-info">
            <span class="fenix-badge">{{ $fenix_admin?->content('badge', 'PUNTO DE VENTA') }}</span>
            <h2 class="fenix-title">{{ $fenix_admin?->content('title', 'FENIX ADMIN') }}</h2>
            <div class="fenix-divider"></div>
            <p class="fenix-description">
                {{ $fenix_admin?->content('description', 'Punto de venta para la gestión del proceso administrativo que conlleva la operación diaria de un negocio de giro comercial.') }}
            </p>
            <div class="fenix-note-bubble">
                <div class="bubble-icon"><i class="fas fa-rocket"></i></div>
                <p>{!! $fenix_admin?->content('note_bubble_text', 'Agregamos, modificamos y personalizamos este producto para que se ajuste de la mejor manera a lo que <strong>tu negocio necesite.</strong>') !!}</p>
            </div>
        </div>

        <div class="fenix-orbit-stage">
            
            <svg class="orbit-svg-canvas" viewBox="0 0 800 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M 140 250 A 280 280 0 0 1 660 250" stroke="rgba(15, 23, 42, 0.08)" stroke-width="2" stroke-dasharray="6 6"/>
                <path d="M 140 250 Q 240 390 400 410" stroke="rgba(15, 23, 42, 0.05)" stroke-width="1.5" stroke-dasharray="4 4"/>
                <path d="M 660 250 Q 560 390 400 410" stroke="rgba(15, 23, 42, 0.05)" stroke-width="1.5" stroke-dasharray="4 4"/>
            </svg>

            @foreach($fenix_admin?->content('nodes', []) as $i => $node)
            <div class="orbit-node {{ $node['class'] ?? '' }}">
                <div class="icon-sphere {{ $node['icon_class'] ?? 'icon-blue' }}"><i class="{{ $node['icon'] ?? 'fas fa-shopping-cart' }}"></i></div>
                <h3>{{ $node['title'] ?? '' }}</h3>
                <p>{{ $node['description'] ?? '' }}</p>
            </div>
            @if($i === 1)
            <div class="orbit-laptop-center">
                <div class="laptop-wrapper">
                    <img src="{{ cms_asset($fenix_admin?->content('laptop_image', 'img/pcfenix.png')) }}" alt="Fenix Admin Dashboard">
                </div>
            </div>
            @endif
            @endforeach

        </div>

    </div>
 </section>
 @endif
 
 @if(!$mipbr || $mipbr->is_visible)
 <section id="pbr-full-section" class="pbr-full-section">
    <div class="pbr-fluid-wrapper">
        
        <header class="pbr-header-block">
            <h1 class="pbr-badge-text">{{ $mipbr?->content('badge_text', 'MI PBR') }}</h1>
            
            <h2 class="pbr-main-heading">{{ $mipbr?->content('main_heading', 'Sistema para control y gestión del presupuesto basado en resultados') }}</h2>
            <p class="pbr-subheading">
                {{ $mipbr?->content('subheading', 'Genera la información necesaria para la Evaluación del Desempeño (SHD) de los entes públicos.') }}
            </p>
        </header>

        <div class="pbr-main-layout">
            
            <div class="pbr-grid-container">
                
                @foreach(collect($mipbr?->content('benefits', []))->chunk(2) as $row)
                <div class="pbr-row">
                    @foreach($row as $benefit)
                    <div class="pbr-benefit-card">
                        <div class="pbr-check-icon">✓</div>
                        <div class="pbr-card-content">
                            <p>{!! $benefit['text'] ?? '' !!}</p>
                            <span class="pbr-indicator-bar"></span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach

            </div>

            <div class="pbr-image-sidebar">
                <div class="pbr-pattern-dots pt-top"></div>
                <div class="pbr-img-frame">
                    <img src="{{ cms_asset($mipbr?->content('image', 'img/corporativo.png')) }}" alt="Análisis de presupuesto en equipo">
                    <div class="pbr-floating-widget">
                        @php
                            $widgetPaths = $mipbr?->content('widget_icon', 'M3 3v18h18 M18.7 8l-5.1 5.2-2.8-2.7L7 14.3');
                            $paths = preg_split('/\s+(?=M)/', $widgetPaths);
                        @endphp
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            @foreach($paths as $d)
                            <path d="{{ trim($d) }}"></path>
                            @endforeach
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        <footer class="pbr-footer-bar">
            <div class="pbr-obj-heading">
                <div class="pbr-target-circle">🎯</div>
                <h3>{{ $mipbr?->content('objective_heading', 'Nuestro objetivo') }}</h3>
            </div>
            <div class="pbr-vertical-line"></div>
            <div class="pbr-obj-description">
                <p>{{ $mipbr?->content('objective_description', 'Facilitar a los entes públicos una herramienta integral que mejora la planificación, el seguimiento y la evaluación del desempeño, impulsando una gestión más eficiente, transparente y orientada a resultados.') }}</p>
            </div>
            <div class="pbr-pattern-dots pt-bottom"></div>
        </footer>

    </div>
 </section>
 @endif

 @if(!$sspip || $sspip->is_visible)
 <section id="sec-sspip" class="sspip-fluid-section">
    <div class="sspip-wrapper">
        
        <header class="sspip-header-block">
            <h1 class="sspip-badge-text">{{ $sspip?->content('badge_text', 'SSPIP') }}</h1>
            <h2 class="sspip-main-heading">{!! $sspip?->content('main_heading', 'Sistema informático <strong>integral único en su tipo</strong>') !!}</h2>
            <p class="sspip-subheading">
                {!! $sspip?->content('subheading', 'A través de la incorporación de tecnologías Web, IoT y BigData Analytics permite brindar una herramienta para la maximización de <strong>seguridad y productividad</strong> de la fuerza laboral en la industria petrolera.') !!}
            </p>
        </header>

        <div class="sspip-timeline-layout">
            <div class="sspip-connecting-line"></div>
            
            <div class="sspip-row-items">
                
                @foreach($sspip?->content('timeline', []) as $node)
                <div class="sspip-node-item">
                    <div class="sspip-node-number">{{ $node['number'] ?? '' }}</div>
                    <div class="sspip-node-icon">
                        <i class="{{ $node['icon'] ?? 'fas fa-chart-line' }}"></i>
                    </div>
                    <div class="sspip-node-text">
                        <p>{!! $node['text'] ?? '' !!}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <footer class="sspip-footer-clean">
            <div class="sspip-footer-content">
                <i class="far fa-lightbulb sspip-bulb-icon"></i>
                <p>{{ $sspip?->content('footer_text', 'Sistema desarrollado con fondos de Conacyt con el Programa de Estímulos a la Innovación (PEI).') }}</p>
            </div>
        </footer>

    </div>
 </section>
 @endif

    </div>

    
@endsection

@push('scripts')
<script>
document.querySelectorAll('.card-btn').forEach(button => {
  button.addEventListener('click', function() {
    const targetId = this.getAttribute('data-target');
    if (!targetId) return;
    const targetSection = document.querySelector(targetId);
    if (targetSection) {
      targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.08 });
  document.querySelectorAll('.page-productos .rev').forEach(el => obs.observe(el));
});
</script>
@endpush
