@extends('layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

<style>
    .dash-welcome {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 32px;
        flex-wrap: wrap;
        gap: 16px;
    }
    .dash-welcome-text h1 {
        font-size: 22px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 4px;
    }
    .dash-welcome-text p {
        font-size: 14px;
        color: #64748b;
        margin: 0;
    }

    /* ── Section title ── */
    .section-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }
    .section-header-line {
        width: 3px;
        height: 20px;
        background: #1d6fdb;
        border-radius: 2px;
    }
    .section-header h2 {
        font-size: 15px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        letter-spacing: -0.01em;
    }
    .section-header span {
        font-size: 12px;
        color: #94a3b8;
        font-weight: 400;
    }

    /* ── Pages grid ── */
    .pages-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 18px;
        margin-bottom: 40px;
    }

    .page-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        overflow: hidden;
        transition: all 0.2s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .page-card:hover {
        box-shadow: 0 8px 30px rgba(15, 23, 42, 0.09);
        transform: translateY(-2px);
        border-color: #cbd5e1;
    }

    /* Top color bar — same pattern as producto cards */
    .page-card-bar {
        height: 4px;
        width: 100%;
    }

    .page-card-inner {
        padding: 20px 22px 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .page-card-icon-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 14px;
    }
    .page-card-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
    }
    .page-card-status {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 3px 8px;
        border-radius: 20px;
    }

    .page-card-title {
        font-size: 15px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 5px;
    }
    .page-card-meta {
        font-size: 12px;
        color: #94a3b8;
        margin: 0 0 18px;
        flex: 1;
    }

    .page-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 14px;
        border-top: 1px solid #f1f5f9;
    }
    .page-card-route {
        font-size: 11px;
        color: #cbd5e1;
        font-family: ui-monospace, monospace;
    }
    .page-card-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        transition: filter 0.15s;
    }
    .page-card-btn:hover { filter: brightness(1.1); }
    .page-card-btn i { font-size: 10px; }

    /* Color themes per page */
    .theme-blue   .page-card-bar { background: linear-gradient(90deg, #1d6fdb, #2d82f0); }
    .theme-blue   .page-card-icon { background: #eff6ff; color: #1d6fdb; }
    .theme-blue   .page-card-status { background: #eff6ff; color: #1d6fdb; }
    .theme-blue   .page-card-btn { background: #1d6fdb; }

    .theme-purple .page-card-bar { background: linear-gradient(90deg, #7c3aed, #9f64f5); }
    .theme-purple .page-card-icon { background: #f5f3ff; color: #7c3aed; }
    .theme-purple .page-card-status { background: #f5f3ff; color: #7c3aed; }
    .theme-purple .page-card-btn { background: #7c3aed; }

    .theme-teal   .page-card-bar { background: linear-gradient(90deg, #0891b2, #22c4e8); }
    .theme-teal   .page-card-icon { background: #ecfeff; color: #0891b2; }
    .theme-teal   .page-card-status { background: #ecfeff; color: #0891b2; }
    .theme-teal   .page-card-btn { background: #0891b2; }

    .theme-orange .page-card-bar { background: linear-gradient(90deg, #ea580c, #fb923c); }
    .theme-orange .page-card-icon { background: #fff7ed; color: #ea580c; }
    .theme-orange .page-card-status { background: #fff7ed; color: #ea580c; }
    .theme-orange .page-card-btn { background: #ea580c; }

    .theme-green  .page-card-bar { background: linear-gradient(90deg, #16a34a, #22c55e); }
    .theme-green  .page-card-icon { background: #f0fdf4; color: #16a34a; }
    .theme-green  .page-card-status { background: #f0fdf4; color: #16a34a; }
    .theme-green  .page-card-btn { background: #16a34a; }

    .theme-navy   .page-card-bar { background: linear-gradient(90deg, #1e3a8a, #2d55c7); }
    .theme-navy   .page-card-icon { background: #eff6ff; color: #1e3a8a; }
    .theme-navy   .page-card-status { background: #eff6ff; color: #1e3a8a; }
    .theme-navy   .page-card-btn { background: #1e3a8a; }

    /* ── Quick stats row ── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 14px;
        margin-bottom: 36px;
    }
    .stat-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .stat-icon {
        width: 38px;
        height: 38px;
        border-radius: 9px;
        background: #eff6ff;
        color: #1d6fdb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }
    .stat-info .val {
        font-size: 20px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
        margin-bottom: 2px;
    }
    .stat-info .lbl {
        font-size: 11px;
        color: #94a3b8;
        font-weight: 500;
    }
</style>

{{-- Welcome --}}
<div class="dash-welcome">
    <div class="dash-welcome-text">
        <h1>Bienvenido, {{ auth()->user()->name }} 👋</h1>
        <p>Desde aquí puedes gestionar y personalizar todo el contenido del sitio web de Softura Solutions.</p>
    </div>
</div>

{{-- Stats rápidos --}}
<div class="section-header">
    <div class="section-header-line"></div>
    <h2>Resumen del sitio</h2>
</div>

<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-file-alt"></i></div>
        <div class="stat-info">
            <div class="val">6</div>
            <div class="lbl">Páginas activas</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fdf4;color:#16a34a"><i class="fas fa-newspaper"></i></div>
        <div class="stat-info">
            <div class="val">—</div>
            <div class="lbl">Posts publicados</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fff7ed;color:#ea580c"><i class="fas fa-clock"></i></div>
        <div class="stat-info">
            <div class="val">—</div>
            <div class="lbl">Posts pendientes</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f5f3ff;color:#7c3aed"><i class="fas fa-box-open"></i></div>
        <div class="stat-info">
            <div class="val">—</div>
            <div class="lbl">Productos</div>
        </div>
    </div>
</div>

{{-- Páginas del sitio --}}
<div class="section-header">
    <div class="section-header-line"></div>
    <h2>Páginas del sitio</h2>
    <span>Selecciona una página para editarla</span>
</div>

<div class="pages-grid">

    {{-- Inicio --}}
    <div class="page-card theme-blue">
        <div class="page-card-bar"></div>
        <div class="page-card-inner">
            <div class="page-card-icon-row">
                <div class="page-card-icon"><i class="fas fa-home"></i></div>
                <span class="page-card-status">Activa</span>
            </div>
            <h3 class="page-card-title">Página principal</h3>
            <p class="page-card-meta">Hero, logos de clientes, servicios destacados y sección de contacto rápido.</p>
            <div class="page-card-footer">
                <span class="page-card-route">/</span>
                <a href="{{ route('admin.pages.inicio') }}" class="page-card-btn">
                    Gestionar <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Fábrica de software --}}
    <div class="page-card theme-purple">
        <div class="page-card-bar"></div>
        <div class="page-card-inner">
            <div class="page-card-icon-row">
                <div class="page-card-icon"><i class="fas fa-code"></i></div>
                <span class="page-card-status">Activa</span>
            </div>
            <h3 class="page-card-title">Fábrica de software</h3>
            <p class="page-card-meta">Servicios de desarrollo a la medida, metodologías y casos de uso.</p>
            <div class="page-card-footer">
                <span class="page-card-route">/fabrica</span>
                <a href="{{ route('admin.pages.fabrica') }}" class="page-card-btn">
                    Gestionar <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Nearshoring --}}
    <div class="page-card theme-teal">
        <div class="page-card-bar"></div>
        <div class="page-card-inner">
            <div class="page-card-icon-row">
                <div class="page-card-icon"><i class="fas fa-globe-americas"></i></div>
                <span class="page-card-status">Activa</span>
            </div>
            <h3 class="page-card-title">Nearshoring & Outsourcing</h3>
            <p class="page-card-meta">Propuesta de valor para clientes internacionales, ventajas y proceso.</p>
            <div class="page-card-footer">
                <span class="page-card-route">/nearshoring</span>
                <a href="{{ route('admin.pages.nearshoring') }}" class="page-card-btn">
                    Gestionar <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Productos --}}
    <div class="page-card theme-orange">
        <div class="page-card-bar"></div>
        <div class="page-card-inner">
            <div class="page-card-icon-row">
                <div class="page-card-icon"><i class="fas fa-box-open"></i></div>
                <span class="page-card-status">Activa</span>
            </div>
            <h3 class="page-card-title">Productos</h3>
            <p class="page-card-meta">Catálogo de productos propios: Binibiaa, Academika, SIGA, Fenix Admin, etc.</p>
            <div class="page-card-footer">
                <span class="page-card-route">/productos</span>
                <a href="{{ route('admin.pages.productos') }}" class="page-card-btn">
                    Gestionar <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Blog --}}
    <div class="page-card theme-green">
        <div class="page-card-bar"></div>
        <div class="page-card-inner">
            <div class="page-card-icon-row">
                <div class="page-card-icon"><i class="fas fa-newspaper"></i></div>
                <span class="page-card-status">Activa</span>
            </div>
            <h3 class="page-card-title">Blog</h3>
            <p class="page-card-meta">Artículos enviados por visitantes y publicaciones propias del equipo.</p>
            <div class="page-card-footer">
                <span class="page-card-route">/blog</span>
                <a href="{{ route('admin.pages.blog') }}" class="page-card-btn">
                    Gestionar <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Conócenos --}}
    <div class="page-card theme-navy">
        <div class="page-card-bar"></div>
        <div class="page-card-inner">
            <div class="page-card-icon-row">
                <div class="page-card-icon"><i class="fas fa-users"></i></div>
                <span class="page-card-status">Activa</span>
            </div>
            <h3 class="page-card-title">Conócenos</h3>
            <p class="page-card-meta">Historia, valores, equipo, clientes y formulario de talento.</p>
            <div class="page-card-footer">
                <span class="page-card-route">/conocenos</span>
                <a href="{{ route('admin.pages.conocenos') }}" class="page-card-btn">
                    Gestionar <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

</div>

@endsection
