@extends('layouts.admin')
@section('title', 'Página principal')
@section('breadcrumb', 'Página principal')

@section('content')
<style>
    .pg-header {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .pg-header-icon {
        width: 48px; height: 48px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px; flex-shrink: 0;
        background: #eff6ff; color: #1d6fdb;
    }
    .pg-header-text h2 { font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 3px; }
    .pg-header-text .route { font-size: 12px; color: #94a3b8; font-family: ui-monospace, monospace; }
    .pg-header-text .route span { color: #1d6fdb; }
    .pg-back-btn {
        margin-left: auto; display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600;
        color: #475569; background: #f1f5f9; border: 1px solid #e2e8f0;
        text-decoration: none; transition: all 0.15s;
    }
    .pg-back-btn:hover { background: #e2e8f0; color: #1e293b; }

    .section-header { display: flex; align-items: center; gap: 10px; margin-bottom: 18px; }
    .section-header-line { width: 3px; height: 20px; background: #1d6fdb; border-radius: 2px; }
    .section-header h2 { font-size: 15px; font-weight: 700; color: #1e293b; margin: 0; }

    .sections-list { display: flex; flex-direction: column; gap: 12px; }

    .section-row {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 18px 22px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: box-shadow 0.15s;
    }
    .section-row:hover { box-shadow: 0 4px 16px rgba(15,23,42,0.07); }

    .section-row-icon {
        width: 40px; height: 40px; border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 16px; flex-shrink: 0;
    }
    .section-row-info { flex: 1; }
    .section-row-info h3 { font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .section-row-info p { font-size: 12px; color: #94a3b8; margin: 0; }

    .badge-ready {
        font-size: 10px; font-weight: 700; padding: 3px 9px; border-radius: 20px;
        letter-spacing: 0.06em; text-transform: uppercase; margin-right: 12px;
    }

    .edit-btn {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 7px 16px; border-radius: 8px; font-size: 12px; font-weight: 600;
        color: white; text-decoration: none; transition: filter 0.15s;
    }
    .edit-btn:hover { filter: brightness(1.1); }
</style>

<div class="pg-header">
    <div class="pg-header-icon"><i class="fas fa-home"></i></div>
    <div class="pg-header-text">
        <h2>Página principal (Inicio)</h2>
        <div class="route">softurasolutions.com<span>/</span></div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="pg-back-btn">
        <i class="fas fa-arrow-left"></i> Volver al dashboard
    </a>
</div>

<div class="section-header">
    <div class="section-header-line"></div>
    <h2>Secciones de la página</h2>
</div>

<div class="sections-list">

    {{-- 1. Hero / Software a la medida + Números (stats) --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#eff6ff;color:#1d6fdb">
            <i class="fas fa-image"></i>
        </div>
        <div class="section-row-info">
            <h3>Hero (Software a la medida) & Números</h3>
            <p>Imagen de fondo, título, subtítulo, descripción principal y los 4 valores estadísticos.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.hero.edit') }}" class="edit-btn" style="background:#1d6fdb">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- 2. Fábrica de Software (cabecera) --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#ecfeff;color:#0891b2">
            <i class="fas fa-layer-group"></i>
        </div>
        <div class="section-row-info">
            <h3>Fábrica de Software</h3>
            <p>Etiqueta, título y descripción para la sección que introduce la Fábrica de Software.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.services_intro.edit') }}" class="edit-btn" style="background:#0891b2">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- 3. Externalización (Proceso Nearshoring/Onshoring) --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#eff6ff;color:#1d6fdb"><i class="fas fa-project-diagram"></i></div>
        <div class="section-row-info"><h3>Externalización</h3><p>Título, descripción y tarjetas Onshoring / Nearshoring.</p></div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.proceso.edit') }}" class="edit-btn" style="background:#1d6fdb"><i class="fas fa-pen" style="font-size:10px"></i> Editar</a>
    </div>

    {{-- 4. Portafolio (Bituyú) --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#eff6ff;color:#1d6fdb"><i class="fas fa-boxes"></i></div>
        <div class="section-row-info"><h3>Portafolio</h3><p>Producto destacado (Bituyú) y enlace al catálogo de productos.</p></div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.stack.edit') }}" class="edit-btn" style="background:#1d6fdb"><i class="fas fa-pen" style="font-size:10px"></i> Editar</a>
    </div>

    {{-- 5. Confianza (Clientes) --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#f0fdf4;color:#16a34a">
            <i class="fas fa-building"></i>
        </div>
        <div class="section-row-info">
            <h3>Confianza (Clientes)</h3>
            <p>Logos de empresas que nos avalan. <em>Nota: Esta sección se comparte con el módulo de Conócenos.</em></p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.clients.edit') }}" class="edit-btn" style="background:#16a34a">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- 6. Somos Diferentes (Nosotros) --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#f5f3ff;color:#7c3aed">
            <i class="fas fa-info-circle"></i>
        </div>
        <div class="section-row-info">
            <h3>Somos Diferentes</h3>
            <p>Título, descripción e imagen lateral para la sección de los 20 años de trayectoria.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.nosotros.edit') }}" class="edit-btn" style="background:#7c3aed">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- 7. Stack Tecnológico --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#f5f3ff;color:#7c3aed"><i class="fas fa-microchip"></i></div>
        <div class="section-row-info"><h3>Stack Tecnológico</h3><p>Textos y cita (logos desde partial).</p></div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.tecnologias.edit') }}" class="edit-btn" style="background:#7c3aed"><i class="fas fa-pen" style="font-size:10px"></i> Editar</a>
    </div>

    {{-- 8. Calidad Certificada --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fef9c3;color:#ca8a04"><i class="fas fa-award"></i></div>
        <div class="section-row-info"><h3>Calidad Certificada</h3><p>Certificaciones y logos de calidad.</p></div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.calidad.edit') }}" class="edit-btn" style="background:#ca8a04"><i class="fas fa-pen" style="font-size:10px"></i> Editar</a>
    </div>

    {{-- 9. Voces / Testimonios --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fef9c3;color:#ca8a04"><i class="fas fa-quote-left"></i></div>
        <div class="section-row-info"><h3>Voces (Testimonios)</h3><p>Lo que dicen los clientes — carrusel de testimonios.</p></div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.inicio.testimonials.edit') }}" class="edit-btn" style="background:#ca8a04"><i class="fas fa-pen" style="font-size:10px"></i> Editar</a>
    </div>

</div>
@endsection
