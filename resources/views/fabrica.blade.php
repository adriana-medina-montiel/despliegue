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
  <section class="app-development-section">
    <div class="app-header">
      <h2>Desarrollo de <span>Aplicaciones</span></h2>
      <p class="app-subtitle">
        Creación de software intuitivo y potente diseñado específicamente para dispositivos móviles de usuarios finales.
      </p>
    </div>
    <div class="app-content-container">
      <div class="app-features-column left-column">
        <article class="app-feature-item">
          <div class="feature-icon-wrapper">
            <i class="fas fa-window-restore"></i>
          </div>
          <div class="feature-text">
            <h3>Interfaz Innovadora</h3>
            <p>Convierte tu idea en una aplicación móvil real con lo último en desarrollo para iOS y Android.</p>
          </div>
        </article>
        <article class="app-feature-item">
          <div class="feature-icon-wrapper">
            <i class="fas fa-chart-line"></i>
          </div>
          <div class="feature-text">
            <h3>Escalabilidad Global</h3>
            <p>Arquitectura preparada para el crecimiento global, intercambio de datos rápido y redes dinámicas.</p>
          </div>
        </article>
      </div>
      <div class="app-mockup-center">
        <div class="decorative-box-bg"></div>
        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?q=80&w=600" alt="App Mockup" class="phone-img">
      </div>
      <div class="app-features-column right-column">
        <article class="app-feature-item">
          <div class="feature-icon-wrapper">
            <i class="fas fa-coins"></i>
          </div>
          <div class="feature-text">
            <h3>Monetización Efectiva</h3>
            <p>Estrategias integradas para maximizar tus ingresos en tiendas de aplicaciones.</p>
          </div>
        </article>
        <article class="app-feature-item">
          <div class="feature-icon-wrapper">
            <i class="fas fa-star"></i>
          </div>
          <div class="feature-text">
            <h3>Experiencia de Usuario</h3>
            <p>Optimización de funciones favoritas y diseño enfocado en la retención del usuario.</p>
          </div>
        </article>
      </div>
    </div>
  </section>
  <section class="software-factory-section">
    <div class="factory-container"> 
      <div class="factory-left">
        <header class="factory-header">
          <h2><span>Maquila de Desarrollo</span></h2>
          <p class="factory-description">
            Amplía la capacidad de desarrollo de tu empresa sin aumentar tu estructura interna. Nuestro equipo de profesionales en ingeniería de software te permite responder rápidamente a picos de demanda, evitando costos y tiempos asociados al reclutamiento y capacitación.
          </p>
        </header>
        <div class="factory-image-wrapper">
          <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800" alt="Equipo de desarrollo Softura" class="factory-img">
        </div>
      </div>
      <div class="factory-right-grid">
        <article class="factory-card">
          <div class="card-icon-header">
            <i class="fas fa-users-cog"></i>
          </div>
          <h3>Escalabilidad de Equipos</h3>
          <p>Aumenta tu capacidad de desarrollo rápidamente con ingenieros especializados bajo demanda.</p>
        </article>
        <article class="factory-card">
          <div class="card-icon-header">
            <i class="fas fa-chart-line-down" style="transform: scaleY(-1);"></i> <i class="fas fa-dollar-sign"></i>
          </div>
          <h3>Eficiencia Nearshore</h3>
          <p>Optimiza tu presupuesto con modelos de subcontratación rentables y geográficamente cercanos.</p>
        </article>
        <article class="factory-card">
          <div class="card-icon-header">
            <i class="fas fa-brain"></i>
          </div>
          <h3>Enfoque Estratégico</h3>
          <p>Libera recursos internos para enfocarte en tu estrategia comercial principal, mientras nosotros gestionamos el desarrollo.</p>
        </article>
        <article class="factory-card">
          <div class="card-icon-header">
            <i class="fas fa-certificate"></i>
          </div>
          <h3>Calidad Certificada</h3>
          <p>Asegura la entrega de software con metodologías ágiles y un control de calidad riguroso y constante.</p>
        </article>
      </div>
    </div>
  </section>
  <br> <br>
  <section class="cloud-section-compact">
  <div class="cloud-main-grid">  
    <div class="cloud-left-content">
      <div class="cloud-title-area">
        <h2>SOLUCIONES <br><span>CLOUD</span></h2>
        <p>
          Impulsamos la transformación digital de tu empresa mediante soluciones en la nube diseñadas a la medida. Seleccionamos e implementamos la mejor combinación de proveedores, tecnologías y configuraciones para garantizar flexibilidad, seguridad y crecimiento escalable.
        </p>
      </div>
      <div class="cloud-img-box">
        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=600" alt="Consultoría Cloud">
      </div>
    </div>
    <div class="cloud-right-stack">   
      <div class="cloud-row-item">
        <div class="cloud-row-header">
          <i class="fab fa-google"></i>
          <h3>Google Cloud Services</h3>
        </div>
        <div class="cloud-row-features">
          <span>• Cloud Storage</span>
          <span>• Messaging</span>
          <span>• Firebase Realtime DB</span>
          <span>• File Storage</span>
        </div>
      </div>
      <div class="cloud-row-item">
        <div class="cloud-row-header">
          <i class="fab fa-microsoft"></i>
          <h3>Microsoft Azure Services</h3>
        </div>
        <div class="cloud-row-features">
          <span>• Virtual Machine</span>
          <span>• DNS</span>
          <span>• Kubernetes</span>
          <span>• SQL DB</span>
          <span>• Functions & Blob Storage</span>
          <span>• Cosmos DB</span>
        </div>
      </div>
      <div class="cloud-row-item">
        <div class="cloud-row-header">
          <i class="fas fa-database"></i>
          <h3>Oracle Cloud Services</h3>
        </div>
        <div class="cloud-row-features">
          <span>• Virtual Machine</span>
          <span>• NoSQL DB</span>
          <span>• DNS</span>
          <span>• Visual Cloud Network</span>
          <span>• Resource Manager</span>
        </div>
      </div>
      <div class="cloud-row-item">
        <div class="cloud-row-header">
          <i class="fab fa-aws"></i>
          <h3>Amazon Web Services</h3>
        </div>
        <div class="cloud-row-features">
          <span>• EC2 (Compute)</span>
          <span>• Simple Storage (S3)</span>
          <span>• Elastic File System</span>
          <span>• AWS Lambda</span>
          <span>• Virtual Private Cloud</span>
          <span>• Global Infrastructure</span>
        </div>
      </div>

      </div>
    </div>
  </section>
<br> <br> <br>
<section class="devops-flow-interactive">
  <header class="devops-flow-main-header">
    <h2>SOLUCIONES DEVOPS</h2>
    <p>
      Implementamos y optimizamos flujos de trabajo DevOps para potenciar el ciclo de vida del software, logrando entregas rápidas, confiables y continuas. Integramos personas, procesos y herramientas para garantizar agilidad y crecimiento escalable.
    </p>
  </header>
  <div class="devops-timeline-wrapper">
    <div class="devops-pipeline-line"></div>
    <div class="timeline-step step-up">
      <div class="step-icon-glow icon-purple">
        <i class="fas fa-cloud-upload-alt"></i>
      </div>
      <div class="step-text-content">
        <h3>Integración y Entrega <br>Continua (CI/CD)</h3>
        <ul>
          <li>• Automatización de Builds</li>
          <li>• Pipelines de Despliegue</li>
          <li>• Control de Versiones Avanzado</li>
          <li>• Estrategias de Branching</li>
        </ul>
      </div>
    </div>
    <div class="timeline-step step-down">
      <div class="step-text-content text-bottom">
        <h3>Pruebas y Calidad <br>Automatizada</h3>
        <ul>
          <li>• Test Suites Automatizados (Unitarios, Integración)</li>
          <li>• Análisis Estático de Código (SAST)</li>
          <li>• Pruebas de Carga y Rendimiento</li>
          <li>• Quality Gates</li>
        </ul>
      </div>
      <div class="step-icon-glow icon-blue">
        <i class="fas fa-flask"></i>
      </div>
    </div>
    <div class="timeline-step step-up">
      <div class="step-icon-glow icon-orange">
        <i class="fas fa-chart-line"></i>
      </div>
      <div class="step-text-content">
        <h3>Monitoreo y <br>Observabilidad</h3>
        <ul>
          <li>• Telemetría Avanzada</li>
          <li>• Logging Centralizado</li>
          <li>• Monitoreo de Infraestructura y Aplicaciones</li>
          <li>• Alertas Inteligentes y Respuestas</li>
        </ul>
      </div>
    </div>
    <div class="timeline-step step-down">
      <div class="step-text-content text-bottom">
        <h3>Cultura y <br>Colaboración</h3>
        <ul>
          <li>• Workshops de Cultura DevOps</li>
          <li>• Comunicación Interfuncional</li>
          <li>• Mejora Continua de Procesos</li>
          <li>• Estrategias de Retrospectiva</li>
        </ul>
      </div>
      <div class="step-icon-glow icon-teal">
        <i class="fas fa-users"></i>
      </div>
    </div>
  </div>
</section>


</main>


@endsection
