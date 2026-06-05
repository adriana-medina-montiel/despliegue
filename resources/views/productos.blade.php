@extends('layouts.web')

@section('title', 'Productos — Softura Solutions')
@section('body-class', 'page-productos')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/estilos2.css') }}">
<link rel="stylesheet" href="{{ asset('css/productos-polish.css') }}">
@endpush

@section('content')

<section class="prod-hero">
  <div class="prod-hero-bg" style="background-image:url('{{ asset('img/empresas.png') }}');" aria-hidden="true"></div>
  <div class="prod-hero-overlay" aria-hidden="true"></div>
  <div class="prod-hero-inner rev">
    <span class="prod-hero-badge"><i class="fas fa-box-open"></i> Portafolio</span>
    <h1>Productos que <em>impulsan</em> tu organización</h1>
    <p class="prod-hero-lead">Soluciones de software personalizables para digitalizar procesos, conectar negocios y escalar resultados.</p>
  </div>
</section>

<section class="products-section">
        <div class="products-header">
            <span class="subtitle">NUESTROS PRODUCTOS</span>
            <h1>Échale un vistazo a <span class="highlight">nuestros productos</span> y potencializa el éxito de tu organización</h1>
            <p>Soluciones de software personalizables que se adaptan a tus necesidades y te ayudan a alcanzar <span class="highlight-blue">mejores resultados</span>.</p>
        </div>

        <div class="products-grid">

            <div class="product-card">
                <div class="card-logo logo-indigo">
                    <img src="{{ asset('img/bituyu compras.png') }}" alt="Bituyú Logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>Bituyú</h3>
                    <p>Red virtual de negocios y tiendas digitales para MiPyMEs.</p>
                    <div class="card-line line-indigo"></div>
                </div>
                <button class="card-btn btn-indigo" data-target="#sec-bituyu" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>
            
            <div class="product-card">
                <div class="card-logo logo-purple">
                    <img src="{{ asset('img/binibia.png') }}" alt="Binibiaa Logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>Binibiaa</h3>
                    <p>Sistema de gestión cultural y administrativa.</p>
                    <div class="card-line line-purple"></div>
                </div>
                <button class="card-btn btn-purple" data-target="#sec-binibiaa" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="product-card">
                <div class="card-logo logo-blue">
                    <img src="{{ asset('img/academica.png') }}" alt="Academica Logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>Academika</h3>
                    <p>Plataforma académica integral para instituciones.</p>
                    <div class="card-line line-blue"></div>
                </div>
                <button class="card-btn btn-blue" data-target="#sec-academika" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="product-card">
                <div class="card-logo logo-yellow">
                    <img src="{{ asset('img/siga.png') }}" alt="SIGA Logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>SIGA</h3>
                    <p>Sistema de información para la gestión académica.</p>
                    <div class="card-line line-yellow"></div>
                </div>
                <button class="card-btn btn-yellow" data-target="#sec-siga" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>

            <div class="product-card">
                <div class="card-logo logo-orange">
                    <img src="{{ asset('img/fenix.png') }}" alt="Fenix logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>Fenyx Admin</h3>
                    <p>Administración empresarial ágil y eficiente.</p>
                    <div class="card-line line-orange"></div>
                </div>
                <button class="card-btn btn-orange" data-target="#sec-fenix-orbit" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>

            <div class="product-card">
                <div class="card-logo logo-gold">
                    <img src="{{ asset('img/pbr.png') }}" alt="MI PBR Logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>MI PBR</h3>
                    <p>Monitoreo y control de indicadores y proyectos.</p>
                    <div class="card-line line-gold"></div>
                </div>
                <button class="card-btn btn-gold" data-target="#pbr-full-section" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>

            <div class="product-card">
                <div class="card-logo logo-gray">
                    <img src="{{ asset('img/sspip.png') }}" alt="SSPIP Logo" class="product-logo">
                </div>
                <div class="card-content">
                    <h3>SSPIP</h3>
                    <p>Sistema especializado para procesos y operaciones.</p>
                    <div class="card-line line-gray"></div>
                </div>
                <button class="card-btn btn-gray" data-target="#sec-sspip" aria-label="Ver más"><i class="fas fa-chevron-right"></i></button>
            </div>

        </div>

        <div class="features-bar">
            <div class="feature-item">
                <i class="fas fa-puzzle-piece icon-blue"></i>
                <div class="feature-text">
                    <strong>Soluciones</strong>
                    <span>personalizables</span>
                </div>
            </div>
            <div class="feature-line"></div>
            <div class="feature-item">
                <i class="fas fa-shield-alt icon-blue"></i>
                <div class="feature-text">
                    <strong>Tecnología segura</strong>
                    <span>y confiable</span>
                </div>
            </div>
            <div class="feature-line"></div>
            <div class="feature-item">
                <i class="fas fa-rocket icon-blue"></i>
                <div class="feature-text">
                    <strong>Optimiza procesos</strong>
                    <span>y aumenta productividad</span>
                </div>
            </div>
            <div class="feature-line"></div>
            <div class="feature-item">
                <i class="fas fa-headset bar-icon"></i>
                <div class="feature-text">
                    <strong>Soporte técnico</strong>
                    <span>acompañamiento</span>
                </div>
            </div>
        </div>
    </section>

    <div class="products-detail">

    <section id="sec-bituyu" class="bituyu-section bituyu-section--corp">
        <div class="bituyu-wrapper">
            <header class="bituyu-hero rev">
                <div class="bituyu-hero-grid">
                    <div class="bituyu-hero-copy">
                    <div class="bituyu-brand-lockup">
                        <img src="{{ asset('img/bituyu compras.png') }}" alt="" class="bituyu-brand-icon" aria-hidden="true">
                        <span class="bituyu-brand-word">BITUYÚ</span>
                    </div>
                        <p class="bituyu-tagline">
                            {{ config('softura-content.bituyu.descripcion') }}
                        </p>
                        <div class="bituyu-stores">
                            <a href="#" class="bituyu-store" aria-label="Disponible en Google Play">
                                <span>DISPONIBLE EN</span><strong>Google Play</strong>
                            </a>
                            <a href="#" class="bituyu-store" aria-label="Disponible en App Store">
                                <span>DISPONIBLE EN</span><strong>App Store</strong>
                            </a>
                        </div>
                    </div>
                    <div class="bituyu-hero-mascot">
                        <img src="{{ asset('img/official/productos/bituyu movil.png') }}" alt="Bituyú — promociones exclusivas" class="bituyu-mascot-img" loading="lazy">
                    </div>
                </div>
            </header>

            <div class="bituyu-ecosystem rev">
                <img src="{{ asset('img/ecosistema bituyu.png') }}" alt="Ecosistema Bituyú — aliados y sectores" class="bituyu-eco-diagram" loading="lazy">
                <div class="bituyu-eco-stats">
                    <article class="bituyu-eco-stat">
                        <i class="fas fa-store"></i>
                        <strong>1,000+</strong>
                        <span>MiPyME's</span>
                    </article>
                    <article class="bituyu-eco-stat">
                        <i class="fas fa-shopping-basket"></i>
                        <strong>6,000+</strong>
                        <span>Productos y servicios</span>
                    </article>
                    <article class="bituyu-eco-stat">
                        <i class="fas fa-tags"></i>
                        <strong>100+</strong>
                        <span>Promociones</span>
                    </article>
                </div>
            </div>

            <div class="bituyu-features-grid rev">
                <article class="bituyu-feature">
                    <div class="bituyu-feature-icon icon-store"><i class="fas fa-store"></i></div>
                    <div><h3>Tienda virtual</h3><p>Crea tu sucursal digital con catálogo, horarios y datos de contacto disponibles 24/7.</p></div>
                </article>
                <article class="bituyu-feature">
                    <div class="bituyu-feature-icon icon-promo"><i class="fas fa-tags"></i></div>
                    <div><h3>Promociones</h3><p>Publica descuentos y ofertas para atraer más clientes a tu negocio.</p></div>
                </article>
                <article class="bituyu-feature">
                    <div class="bituyu-feature-icon icon-map"><i class="fas fa-map-marker-alt"></i></div>
                    <div><h3>Localización</h3><p>Facilita que te encuentren con mapa, dirección y referencias claras.</p></div>
                </article>
                <article class="bituyu-feature">
                    <div class="bituyu-feature-icon icon-network"><i class="fas fa-project-diagram"></i></div>
                    <div><h3>Red de negocios</h3><p>Integra comercios locales en una red colaborativa de MiPyMEs.</p></div>
                </article>
            </div>

            <div class="bituyu-bar">
                <div class="bituyu-bar-text">
                    <i class="fas fa-mobile-alt" aria-hidden="true"></i>
                    <span>Cierra la brecha digital de tu negocio con <strong>Bituyú</strong></span>
                </div>
                <a href="{{ route('contacto') }}" class="bituyu-bar-btn">Solicitar información</a>
            </div>
        </div>
    </section>
  
    <section id="sec-binibiaa" class="binibiaa-section animate-fade-in">
    
    <div class="binibiaa-inner-wrapper">
        
        <div class="binibiaa-header">
            <span class="brand-subtitle">COMERCIALIZADORA</span>
            <h2 class="brand-title">Binibiaa</h2>
            <span class="brand-slogan">La marca del artesano</span>
            <p class="brand-description">
                Iniciativa que fomenta e impulsa la comercialización de productos artesanales 
                a nivel nacional e internacional a través de las principales plataformas de comercio electrónico.
            </p>
        </div>

        <div class="showcase-show-grid">
            
            <div class="showcase-item">
                <div class="showcase-img-wrapper">
                    <img src="{{ asset('img/scronchies.jpg') }}" alt="Scrunchies">
                </div>
                <div class="showcase-info">
                    <h3>Scrunchies</h3>
                    <p>Complementos únicos que realzan tu estilo.</p>
                    <div class="showcase-badge">Premium</div>
                </div>
            </div>

            <div class="showcase-item">
                <div class="showcase-img-wrapper">
                    <img src="{{ asset('img/reboso.jpg') }}" alt="Rebozos">
                </div>
                <div class="showcase-info">
                    <h3>Rebozos</h3>
                    <p>Tradición y diseño en cada pieza artesanal.</p>
                    <div class="showcase-badge">Artesanal</div>
                </div>
            </div>

            <div class="showcase-item">
                <div class="showcase-img-wrapper">
                    <img src="{{ asset('img/bolsas.jpg') }}" alt="Bolsas">
                </div>
                <div class="showcase-info">
                    <h3>Bolsas</h3>
                    <p>Artesanía que combina elegancia y funcionalidad.</p>
                    <div class="showcase-badge">Exclusivo</div>
                </div>
            </div>

            <div class="showcase-item">
                <div class="showcase-img-wrapper">
                    <img src="{{ asset('img/accesorios.jpg') }}" alt="Accesorios">
                </div>
                <div class="showcase-info">
                    <h3>Accesorios</h3>
                    <p>Detalles que cuentan historias y reflejan tu esencia.</p>
                    <div class="showcase-badge">Detalles</div>
                </div>
            </div>

        </div>

        <div class="marketplace-bar">
            <div class="marketplace-title">
                <i class="fas fa-shopping-cart cart-icon-bg"></i>
                <span>Conoce nuestro <strong>catálogo</strong> y <strong>pide ahora</strong> en</span>
            </div>
            
            <div class="platforms-links">
                <a href="https://www.mercadolibre.com" target="_blank" class="platform-btn mlibre">
                    <img src="{{ asset('img/ml.png') }}" alt="Mercado Libre">
                    <span>mercado libre</span>
                </a>
                
                <div class="separator-line"></div>
                
                <a href="https://www.etsy.com" target="_blank" class="platform-btn etsy">
                    <img src="{{ asset('img/etzi.png') }}" alt="Etsy">
                </a>
            </div>
            
            <div class="bag-icon-container">
                <i class="fas fa-shopping-bag bag-icon-bg"></i>
            </div>
        </div>

    </div>
 </section>

 
  <section id="sec-academika" class="academika-section-flat">
    
    <div class="academika-header-flat">
        <div class="header-badge-icon">
            <i class="fas fa-user-graduate"></i>
        </div>
        <h2 class="academika-title-flat">ACADEMIKA</h2>
        <p class="academika-desc-flat">
            Sistema de Servicios Escolares que permite la autorización de los procesos de control escolar de una Institución Educativa, ofreciendo mejores servicios a directivos, administrativos, docentes, alumnos y padres de familia.
        </p>
    </div>

    <div class="academika-grid-flat">
        
        <div class="module-card-flat">
            <div class="module-icon-circle bg-blue-soft">
                <i class="fas fa-book-open icon-blue"></i>
            </div>
            <div class="module-text-flat">
                <h3>Administra planes y programas de estudios.</h3>
                <p>Organiza y gestiona planes de estudio de manera eficiente.</p>
            </div>
        </div>

        <div class="module-card-flat">
            <div class="module-icon-circle bg-purple-soft">
                <i class="fas fa-user-shield icon-purple"></i>
            </div>
            <div class="module-text-flat">
                <h3>Gestión de usuarios y privilegios.</h3>
                <p>Controla accesos y roles para una gestión segura.</p>
            </div>
        </div>

        <div class="module-card-flat">
            <div class="module-icon-circle bg-green-soft">
                <i class="fas fa-chart-bar icon-green"></i>
            </div>
            <div class="module-text-flat">
                <h3>Reportes y seguimiento académico.</h3>
                <p>Genera reportes detallados y da seguimiento al desempeño.</p>
            </div>
        </div>

        <div class="module-card-flat">
            <div class="module-icon-circle bg-orange-soft">
                <i class="fas fa-file-signature icon-orange"></i>
            </div>
            <div class="module-text-flat">
                <h3>Administra inscripciones y bajas.</h3>
                <p>Gestiona inscripciones, bajas y actualiza información fácilmente.</p>
            </div>
        </div>

        <div class="module-card-flat">
            <div class="module-icon-circle bg-pink-soft">
                <i class="fas fa-credit-card icon-pink"></i>
            </div>
            <div class="module-text-flat">
                <h3>Control de pagos.</h3>
                <p>Administra pagos, adeudos y métodos de cobro.</p>
            </div>
        </div>

        <div class="module-card-flat">
            <div class="module-icon-circle bg-cyan-soft">
                <i class="fas fa-calendar-alt icon-cyan"></i>
            </div>
            <div class="module-text-flat">
                <h3>Horarios, calificaciones, etc.</h3>
                <p>Organiza horarios, calificaciones y demás información académica.</p>
            </div>
        </div>

    </div>

    <div class="academika-features-flat-bar">
        
        <div class="feature-inline-item">
            <div class="feature-bullet-icon"><i class="fas fa-database"></i></div>
            <span>Centraliza la información en un solo sistema</span>
        </div>
        
        <div class="feature-divider"></div>
        
        <div class="feature-inline-item">
            <div class="feature-bullet-icon"><i class="fas fa-comments"></i></div>
            <span>Mejora la comunicación entre todos los usuarios</span>
        </div>
        
        <div class="feature-divider"></div>
        
        <div class="feature-inline-item">
            <div class="feature-bullet-icon"><i class="fas fa-tachometer-alt"></i></div>
            <span>Optimiza procesos y ahorra tiempo</span>
        </div>
        
        <div class="feature-divider"></div>
        
        <div class="feature-inline-item">
            <div class="feature-bullet-icon"><i class="fas fa-user-lock"></i></div>
            <span>Seguridad y control en cada módulo</span>
        </div>

    </div>

 </section>
 
    <section id="sec-siga" class="siga-section-flat">
    <div class="siga-inner-wrapper">
        
        <div class="siga-header-flat">
            <h2 class="siga-title-flat">SIGA</h2>
            <h3 class="siga-subtitle-flat">(Sistema Integral de Gestión del Aprendizaje)</h3>
            <div class="siga-title-line"></div>
            <p class="siga-desc-flat">
                Permite **establecer entornos virtuales** de aprendizaje (e-Learning) mediante la distribución masiva de información, el trabajo colaborativo y la comunicación entre participantes.
            </p>
        </div>

        <div class="siga-content-layout">
            
            <div class="siga-image-column">
                <div class="siga-img-wrapper">
                    <img src="{{ asset('img/sigalaptop.png') }}" alt="SIGA e-Learning Platform">
                </div>
            </div>

            <div class="siga-features-grid">
                
                <div class="siga-feature-card">
                    <div class="siga-icon-circle ico-blue">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="siga-card-text">
                        <h3>Gestión de contenidos.</h3>
                    </div>
                </div>

                <div class="siga-feature-card">
                    <div class="siga-icon-circle ico-purple">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="siga-card-text">
                        <h3>Herramientas de comunicación.</h3>
                    </div>
                </div>

                <div class="siga-feature-card">
                    <div class="siga-icon-circle ico-navy">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div class="siga-card-text">
                        <h3>Videos Streaming.</h3>
                    </div>
                </div>

                <div class="siga-feature-card">
                    <div class="siga-icon-circle ico-green">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="siga-card-text">
                        <h3>Gestión de conocimientos.</h3>
                    </div>
                </div>

                <div class="siga-feature-card">
                    <div class="siga-icon-circle ico-orange">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="siga-card-text">
                        <h3>Gestión de estudiantes.</h3>
                    </div>
                </div>

                <div class="siga-feature-card">
                    <div class="siga-icon-circle ico-teal">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="siga-card-text">
                        <h3>Herramientas de seguimiento.</h3>
                    </div>
                </div>

            </div>
        </div>

    </div>
 </section>


 <section id="sec-fenix-orbit" class="fenix-orbit-section">
    <div class="fenix-orbit-container">
        
        <div class="fenix-left-info">
            <span class="fenix-badge">PUNTO DE VENTA</span>
            <h2 class="fenix-title">FENIX ADMIN</h2>
            <div class="fenix-divider"></div>
            <p class="fenix-description">
                Punto de venta para la gestión del proceso administrativo que conlleva la operación diaria de un negocio de giro comercial.
            </p>
            <div class="fenix-note-bubble">
                <div class="bubble-icon"><i class="fas fa-rocket"></i></div>
                <p>Agregamos, modificamos y personalizamos este producto para que se ajuste de la mejor manera a lo que <strong>tu negocio necesite.</strong></p>
            </div>
        </div>

        <div class="fenix-orbit-stage">
            
            <svg class="orbit-svg-canvas" viewBox="0 0 800 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M 140 250 A 280 280 0 0 1 660 250" stroke="rgba(15, 23, 42, 0.08)" stroke-width="2" stroke-dasharray="6 6"/>
                <path d="M 140 250 Q 240 390 400 410" stroke="rgba(15, 23, 42, 0.05)" stroke-width="1.5" stroke-dasharray="4 4"/>
                <path d="M 660 250 Q 560 390 400 410" stroke="rgba(15, 23, 42, 0.05)" stroke-width="1.5" stroke-dasharray="4 4"/>
            </svg>

            <div class="orbit-node node-compras">
                <div class="icon-sphere icon-blue"><i class="fas fa-shopping-cart"></i></div>
                <h3>Compras</h3>
                <p>Gestiona tus compras de manera eficiente.</p>
            </div>

            <div class="orbit-node node-proveedores">
                <div class="icon-sphere icon-purple"><i class="fas fa-user-tie"></i></div>
                <h3>Proveedores</h3>
                <p>Administra proveedores y controla su desempeño.</p>
            </div>

            <div class="orbit-laptop-center">
                <div class="laptop-wrapper">
                    <img src="{{ asset('img/pcfenix.png') }}" alt="Fenix Admin Dashboard">
                </div>
            </div>

            <div class="orbit-node node-ventas">
                <div class="icon-sphere icon-green"><i class="fas fa-tags"></i></div>
                <h3>Ventas</h3>
                <p>Optimiza tu proceso de ventas y facturación.</p>
            </div>

            <div class="orbit-node node-inventario">
                <div class="icon-sphere icon-orange"><i class="fas fa-boxes"></i></div>
                <h3>Inventario</h3>
                <p>Controla tu inventario en tiempo real.</p>
            </div>

            <div class="orbit-node node-cotizaciones">
                <div class="icon-sphere icon-cyan"><i class="fas fa-file-invoice-dollar"></i></div>
                <h3>Cotizaciones</h3>
                <p>Crea y gestiona cotizaciones fácilmente.</p>
            </div>

            <div class="orbit-node node-facturacion">
                <div class="icon-sphere icon-red"><i class="fas fa-file-signature"></i></div>
                <h3>Facturación</h3>
                <p>Emite facturas rápidas y sin complicaciones.</p>
            </div>

        </div>

    </div>
 </section>
 
 <section id="pbr-full-section" class="pbr-full-section">
    <div class="pbr-fluid-wrapper">
        
        <header class="pbr-header-block">
            <h1 class="pbr-badge-text">MI PBR</h1>
            
            <h2 class="pbr-main-heading">Sistema para control y gestión del presupuesto basado en resultados</h2>
            <p class="pbr-subheading">
                Genera la información necesaria para la Evaluación del Desempeño (SHD) de los entes públicos.
            </p>
        </header>

        <div class="pbr-main-layout">
            
            <div class="pbr-grid-container">
                
                <div class="pbr-row">
                    <div class="pbr-benefit-card">
                        <div class="pbr-check-icon">✓</div>
                        <div class="pbr-card-content">
                            <p><strong>Presenta los objetivos</strong> de un problema.</p>
                            <span class="pbr-indicator-bar"></span>
                        </div>
                    </div>

                    <div class="pbr-benefit-card">
                        <div class="pbr-check-icon">✓</div>
                        <div class="pbr-card-content">
                            <p><strong>Apoya la toma de decisiones</strong> sobre los programas y la asignación de recursos.</p>
                            <span class="pbr-indicator-bar"></span>
                        </div>
                    </div>
                </div>

                <div class="pbr-row">
                    <div class="pbr-benefit-card">
                        <div class="pbr-check-icon">✓</div>
                        <div class="pbr-card-content">
                            <p><strong>Identificar y definir los factores externos</strong> al programa que pueden influir en él.</p>
                            <span class="pbr-indicator-bar"></span>
                        </div>
                    </div>

                    <div class="pbr-benefit-card">
                        <div class="pbr-check-icon">✓</div>
                        <div class="pbr-card-content">
                            <p><strong>Propiciar la planeación participativa</strong>, y estimula el logro de acuerdos y su instrumentación.</p>
                            <span class="pbr-indicator-bar"></span>
                        </div>
                    </div>
                </div>

                <div class="pbr-row">
                    <div class="pbr-benefit-card">
                        <div class="pbr-check-icon">✓</div>
                        <div class="pbr-card-content">
                            <p><strong>Evaluar el avance en la consecución</strong> de los objetivos.</p>
                            <span class="pbr-indicator-bar"></span>
                        </div>
                    </div>

                    <div class="pbr-benefit-card">
                        <div class="pbr-check-icon">✓</div>
                        <div class="pbr-card-content">
                            <p><strong>Apoyar el monitoreo/seguimiento</strong> y la evaluación.</p>
                            <span class="pbr-indicator-bar"></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pbr-image-sidebar">
                <div class="pbr-pattern-dots pt-top"></div>
                <div class="pbr-img-frame">
                    <img src="{{ asset('img/corporativo.png') }}" alt="Análisis de presupuesto en equipo">
                    <div class="pbr-floating-widget">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"></path><path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"></path></svg>
                    </div>
                </div>
            </div>

        </div>

        <footer class="pbr-footer-bar">
            <div class="pbr-obj-heading">
                <div class="pbr-target-circle">🎯</div>
                <h3>Nuestro objetivo</h3>
            </div>
            <div class="pbr-vertical-line"></div>
            <div class="pbr-obj-description">
                <p>Facilitar a los entes públicos una herramienta integral que mejora la planificación, el seguimiento y la evaluación del desempeño, impulsando una gestión más eficiente, transparente y orientada a resultados.</p>
            </div>
            <div class="pbr-pattern-dots pt-bottom"></div>
        </footer>

    </div>
 </section>

 <section id="sec-sspip" class="sspip-fluid-section">
    <div class="sspip-wrapper">
        
        <header class="sspip-header-block">
            <h1 class="sspip-badge-text">SSPIP</h1>
            <h2 class="sspip-main-heading">Sistema informático <strong>integral único en su tipo</strong></h2>
            <p class="sspip-subheading">
                A través de la incorporación de tecnologías Web, IoT y BigData Analytics permite brindar una herramienta para la maximización de <strong>seguridad y productividad</strong> de la fuerza laboral en la industria petrolera.
            </p>
        </header>

        <div class="sspip-timeline-layout">
            <div class="sspip-connecting-line"></div>
            
            <div class="sspip-row-items">
                
                <div class="sspip-node-item">
                    <div class="sspip-node-number">01</div>
                    <div class="sspip-node-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="sspip-node-text">
                        <p><strong>Genera estrategias</strong> para maximizar productividad.</p>
                    </div>
                </div>

                <div class="sspip-node-item">
                    <div class="sspip-node-number">02</div>
                    <div class="sspip-node-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="sspip-node-text">
                        <p><strong>Controla diferentes</strong> zonas.</p>
                    </div>
                </div>

                <div class="sspip-node-item">
                    <div class="sspip-node-number">03</div>
                    <div class="sspip-node-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="sspip-node-text">
                        <p><strong>Crea y visualiza</strong> clientes.</p>
                    </div>
                </div>

                <div class="sspip-node-item">
                    <div class="sspip-node-number">04</div>
                    <div class="sspip-node-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="sspip-node-text">
                        <p><strong>Identifica la ubicación</strong> de las plantas.</p>
                    </div>
                </div>

                <div class="sspip-node-item">
                    <div class="sspip-node-number">05</div>
                    <div class="sspip-node-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="sspip-node-text">
                        <p><strong>Configura</strong> alertas.</p>
                    </div>
                </div>

            </div>
        </div>

        <footer class="sspip-footer-clean">
            <div class="sspip-footer-content">
                <i class="far fa-lightbulb sspip-bulb-icon"></i>
                <p>Sistema desarrollado con fondos de Conacyt con el Programa de Estímulos a la Innovación (PEI).</p>
            </div>
        </footer>

    </div>
 </section>

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
