@extends('layouts.admin')
@section('title', 'Conócenos')
@section('breadcrumb', 'Conócenos')

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
        background: #eff6ff; color: #1e3a8a;
    }
    .pg-header-text h2 { font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 3px; }
    .pg-header-text .route { font-size: 12px; color: #94a3b8; font-family: ui-monospace, monospace; }
    .pg-header-text .route span { color: #1e3a8a; }
    .pg-back-btn {
        margin-left: auto; display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600;
        color: #475569; background: #f1f5f9; border: 1px solid #e2e8f0;
        text-decoration: none; transition: all 0.15s;
    }
    .pg-back-btn:hover { background: #e2e8f0; color: #1e293b; }

    .section-header { display: flex; align-items: center; gap: 10px; margin-bottom: 18px; }
    .section-header-line { width: 3px; height: 20px; background: #1e3a8a; border-radius: 2px; }
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
    .badge-soon {
        font-size: 10px; font-weight: 700; padding: 3px 9px; border-radius: 20px;
        background: #f1f5f9; color: #94a3b8; letter-spacing: 0.06em;
        text-transform: uppercase; margin-right: 12px;
    }

    .edit-btn {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 7px 16px; border-radius: 8px; font-size: 12px; font-weight: 600;
        color: white; text-decoration: none; transition: filter 0.15s;
    }
    .edit-btn:hover { filter: brightness(1.1); }
    .edit-btn-disabled {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 7px 16px; border-radius: 8px; font-size: 12px; font-weight: 600;
        color: #cbd5e1; background: #f8fafc; border: 1px solid #e2e8f0; cursor: default;
    }
</style>

<div class="pg-header">
    <div class="pg-header-icon"><i class="fas fa-users"></i></div>
    <div class="pg-header-text">
        <h2>Conócenos</h2>
        <div class="route">softurasolutions.com<span>/conocenos</span></div>
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

    {{-- Hero --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#eff6ff;color:#1e3a8a">
            <i class="fas fa-image"></i>
        </div>
        <div class="section-row-info">
            <h3>Banner / Hero</h3>
            <p>Imagen de fondo, título, subtítulo y descripción principal.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.hero.edit') }}" class="edit-btn" style="background:#1e3a8a">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- Porque elegirnos --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#f5f3ff;color:#7c3aed">
            <i class="fas fa-star"></i>
        </div>
        <div class="section-row-info">
            <h3>¿Por qué elegirnos?</h3>
            <p>Diferenciadores clave y propuesta de valor de Softura.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.differentiators.edit') }}" class="edit-btn" style="background:#7c3aed">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- Ayudarte a mejorar --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#ecfeff;color:#0891b2">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="section-row-info">
            <h3>Ayudarte a mejorar es nuestra motivación</h3>
            <p>Pilares: profesionalismo, responsabilidad, compromiso y expertiz.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.pillars.edit') }}" class="edit-btn" style="background:#0891b2">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- Soporte 360 --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fff7ed;color:#ea580c">
            <i class="fas fa-headset"></i>
        </div>
        <div class="section-row-info">
            <h3>Soporte 360°</h3>
            <p>Acompañamiento antes, durante y después de cada proyecto.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.support.edit') }}" class="edit-btn" style="background:#ea580c">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- Clientes --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#f0fdf4;color:#16a34a">
            <i class="fas fa-building"></i>
        </div>
        <div class="section-row-info">
            <h3>Clientes — Quiénes nos avalan</h3>
            <p>Logos por sector: gobierno, educativo, TIC's e iniciativa privada.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.clients.edit') }}" class="edit-btn" style="background:#16a34a">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- Testimonios --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fef9c3;color:#ca8a04">
            <i class="fas fa-quote-left"></i>
        </div>
        <div class="section-row-info">
            <h3>Lo que dicen nuestros clientes</h3>
            <p>Testimonios y reseñas de clientes actuales.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.testimonials.edit') }}" class="edit-btn" style="background:#ca8a04">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- Carreras --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fdf2f8;color:#db2777">
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="section-row-info">
            <h3>Carreras — Buscamos talento</h3>
            <p>Formulario de contacto para candidatos interesados.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.conocenos.careers.edit') }}" class="edit-btn" style="background:#db2777">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

</div>
@endsection
