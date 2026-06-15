@extends('layouts.admin')
@section('title', 'Nearshoring & Outsourcing')
@section('breadcrumb', 'Nearshoring')

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



{{-- Usamos exactamente las mismas clases de 'Conócenos' para asegurar el mismo diseño --}}
<div class="pg-header">
    <div class="pg-header-icon"><i class="fas fa-globe-americas"></i></div>
    <div class="pg-header-text">
        <h2>Nearshoring & Outsourcing</h2>
        <div class="route">softurasolutions.com<span>/nearshoring</span></div>
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

    {{-- 1. HERO --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#eff6ff;color:#1e3a8a">
            <i class="fas fa-image"></i>
        </div>
        <div class="section-row-info">
            <h3>Banner / Hero</h3>
            <p>Imagen de fondo, título, subtítulo y descripción principal.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.nearshoring.hero.edit') }}" class="edit-btn" style="background:#1e3a8a">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>

    {{-- Aquí podemos añadir las otras secciones siguiendo el mismo formato --}}

    {{-- Sección Onshoring --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fefce8;color:#ca8a04">
            <i class="fas fa-layer-group"></i>
        </div>
        <div class="section-row-info">
            <h3>Onshoring</h3>
            <p>Título, descripción y llamada a la acción principal.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.nearshoring.onshoring.edit') }}" class="edit-btn" style="background:#ca8a04">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>


    {{-- Sección Nearshoring --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fefce8;color:#ca8a04">
            <i class="fas fa-layer-group"></i>
        </div>
        <div class="section-row-info">
            <h3>Nearshoring</h3>
            <p>Título, descripción y llamada a la acción principal.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.nearshoring.nearsh.edit') }}" class="edit-btn" style="background:#ca8a04">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>


    {{-- Sección CTA --}}
    <div class="section-row">
        <div class="section-row-icon" style="background:#fefce8;color:#ca8a04">
            <i class="fas fa-layer-group"></i>
        </div>
        <div class="section-row-info">
            <h3>CTA</h3>
            <p>Título, descripción y llamada a la acción principal.</p>
        </div>
        <span class="badge-ready" style="background:#f0fdf4;color:#16a34a">Listo</span>
        <a href="{{ route('admin.nearshoring.cta.edit') }}" class="edit-btn" style="background:#ca8a04">
            <i class="fas fa-pen" style="font-size:10px"></i> Editar
        </a>
    </div>




</div>
@endsection