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

<section class="softura-service-row">
    <div class="onsh-free-images">
        <div class="onsh-card-back left">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=400&h=400&auto=format&fit=crop" alt="Desarrolladores Softura">
        </div>
        <div class="onsh-card-back right">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=400&h=400&auto=format&fit=crop" alt="Métricas de desarrollo">
        </div> 
        <div class="onsh-card-main">
            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&h=480&auto=format&fit=crop" alt="Reunión Onshoring">
        </div>
    </div>
    <div class="onsh-free-content">
        <h2 class="onsh-title-fluid">ONSHORING</h2>  
        <p class="onsh-desc-fluid">
            En esta modalidad, tu empresa nos transfiere las responsabilidades referentes al cumplimiento de tareas relacionadas con el desarrollo de software. No necesitas crecer tu nómina. Contamos con células especializadas para comenzar. Pertenecemos al padrón del <strong>REPSE</strong> (Registro de Prestadoras de Servicios Especializados u Obras Especializadas), obligatorio de la STPS para regular a las empresas que ofrecen servicios especializados.
        </p>
        <div class="onsh-actions-container">
            <div class="onsh-badge-gold">
                <div class="onsh-badge-inner">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <div class="onsh-line-decorator right-side"></div>
</section>

<section class="nearsh-section-wrapper">
    <div class="nearsh-container-split">  
        <div class="onsh-line-decorator left-side"></div>
        <div class="nearsh-content-col">
            <h2 class="nearsh-title-fluid">NEARSHORING</h2>
            <p class="nearsh-desc-fluid">
                Con este modelo de externalización de servicios, brindamos una solución integral a empresas establecidas en el extranjero (E.U.A. y Latinoamérica). A diferencia del onshoring, esta modalidad se enfoca únicamente en el desarrollo de software de manera remota, pensando en quienes no cuenten con un equipo de TI dedicado al desarrollo dentro de su empresa.
            </p>
            <div class="nearsh-bullets-group">
                <div class="nearsh-bullet-section">
                    <h3>Servicios de Onshoring:</h3>
                    <ul>
                        <li>Desarrollo e internacionalización de proyectos.</li>
                        <li>Digitalización y alcance en toda Latinoamérica.</li>
                    </ul>
                </div>
                <div class="nearsh-bullet-section">
                    <h3>Servicios de Outsourcing / Staffing:</h3>
                    <ul>
                        <li>Desarrollo de software y soluciones logísticas.</li>
                        <li>Optimización y vitalización de infraestructura TI.</li>
                    </ul>
                </div>
            </div>
        </div>  
        <div class="nearsh-image-col">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=800&h=600&auto=format&fit=crop" alt="Vista del planeta conectividad">
        </div>
    </div>
</section>

<section class="softura-support-fluid-row"> 
    <div class="supp-fluid-header">
        <h2 class="supp-fluid-title">TE ACOMPAÑAMOS EN TODO MOMENTO</h2>
    </div> 
    <div class="supp-fluid-body-grid">     
        <div class="supp-fluid-content">
            <p class="supp-fluid-lead">
                Más que un proveedor, somos tu aliado tecnológico a largo plazo.
            </p>
            <p class="supp-fluid-desc">
                Te acompañamos antes, durante y después de cada proyecto, brindando soporte técnico y creatividad para asegurar que tus soluciones evolucionen, generen valor y sigan impulsando el crecimiento de tu negocio.
            </p>
        </div>
        <div class="supp-fluid-image-col">
            <img src="https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?q=80&w=600&h=420&auto=format&fit=crop" alt="Equipo Softura acompañamiento tecnológico">
        </div>      
    </div>   
    <div class="supp-line-decorator bottom-side"></div>
</section>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const opciones = {
        root: null, 
        rootMargin: "0px",
        // Usamos un umbral balanceado para que detecte rápido tanto al bajar como al subir
        threshold: 0.1 
    };
    const activarMovimiento = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Si la sección entra a la pantalla (ya sea desde arriba o desde abajo), se activa
                entry.target.classList.add("visible");
            } else {
                // CRUCIAL: Si la sección sale de la pantalla, le quitamos la clase .visible
                // Esto hace que los elementos se vuelvan a ocultar y se preparen para el siguiente scroll
                entry.target.classList.remove("visible");
            }
        });
    };
    const descriptorScroll = new IntersectionObserver(activarMovimiento, opciones);
    const seccionOnshoring = document.querySelector("section.softura-service-row");
    if (seccionOnshoring) {
        descriptorScroll.observe(seccionOnshoring);
    }
  });
  document.addEventListener("DOMContentLoaded", () => {
    const opciones = {
        root: null, 
        rootMargin: "0px",
        threshold: 0.1 // Sensibilidad equilibrada para registrar la entrada y salida
    };
    const activarMovimiento = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Al entrar en el monitor (subiendo o bajando) se ejecuta la animación
                entry.target.classList.add("visible");
            } else {
                // Al salir completamente del monitor se limpia y resetea la animación
                entry.target.classList.remove("visible");
            }
        });
    };
    const descriptorScroll = new IntersectionObserver(activarMovimiento, opciones);
    // Registramos la sección de Onshoring
    const seccionOnshoring = document.querySelector("section.softura-service-row");
    if (seccionOnshoring) {
        descriptorScroll.observe(seccionOnshoring);
    }
    // Registramos la sección de Nearshoring usando el contenedor interno del Grid
    const seccionNearshoring = document.querySelector(".nearsh-container-split");
    if (seccionNearshoring) {
        descriptorScroll.observe(seccionNearshoring);
    }
});
document.addEventListener("DOMContentLoaded", () => {
    const opciones = {
        root: null, 
        rootMargin: "0px",
        threshold: 0.1
    };
    const activarMovimiento = (entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            } else {
                entry.target.classList.remove("visible");
            }
        });
    };
    const descriptorScroll = new IntersectionObserver(activarMovimiento, opciones);
    // 1. Radar Onshoring
    const seccionOnshoring = document.querySelector("section.softura-service-row");
    if (seccionOnshoring) {
        descriptorScroll.observe(seccionOnshoring);
    }
    // 2. Radar Nearshoring
    const seccionNearshoring = document.querySelector(".nearsh-container-split");
    if (seccionNearshoring) {
        descriptorScroll.observe(seccionNearshoring);
    }
    // 3. Radar Acompañamiento Fluido (Nueva sección)
    const seccionSoporteFluido = document.querySelector("section.softura-support-fluid-row");
    if (seccionSoporteFluido) {
        descriptorScroll.observe(seccionSoporteFluido);
    }
});
</script>


@endsection
