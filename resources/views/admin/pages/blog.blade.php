@extends('layouts.admin')
@section('title', 'Blog')
@section('breadcrumb', 'Blog')

@section('content')
<style>
    .pg-header { display:flex;align-items:center;gap:16px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .pg-header-icon { width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;background:#f0fdf4;color:#16a34a; }
    .pg-header-text h2 { font-size:20px;font-weight:700;color:#0f172a;margin:0 0 3px; }
    .pg-header-text .route { font-size:12px;color:#94a3b8;font-family:ui-monospace,monospace; }
    .pg-header-text .route span { color:#16a34a; }
    .pg-back-btn { margin-left:auto;display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;color:#475569;background:#f1f5f9;border:1px solid #e2e8f0;text-decoration:none; }
    .section-header { display:flex;align-items:center;gap:10px;margin-bottom:18px; }
    .section-header-line { width:3px;height:20px;background:#16a34a;border-radius:2px; }
    .section-header h2 { font-size:15px;font-weight:700;color:#1e293b;margin:0; }
    .sections-list { display:flex;flex-direction:column;gap:12px; }
    .section-row { background:white;border:1px solid #e2e8f0;border-radius:12px;padding:18px 22px;display:flex;align-items:center;gap:16px; }
    .section-row-icon { width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0; }
    .section-row-info { flex:1; }
    .section-row-info h3 { font-size:14px;font-weight:700;color:#0f172a;margin:0 0 2px; }
    .section-row-info p { font-size:12px;color:#94a3b8;margin:0; }
    .badge-ready { font-size:10px;font-weight:700;padding:3px 9px;border-radius:20px;letter-spacing:.06em;text-transform:uppercase;margin-right:12px;background:#f0fdf4;color:#16a34a; }
    .edit-btn { display:inline-flex;align-items:center;gap:6px;padding:7px 16px;border-radius:8px;font-size:12px;font-weight:600;color:white;text-decoration:none; }
</style>

<div class="pg-header">
    <div class="pg-header-icon"><i class="fas fa-newspaper"></i></div>
    <div class="pg-header-text">
        <h2>Blog</h2>
        <div class="route">softurasolutions.com<span>/blog</span></div>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="pg-back-btn"><i class="fas fa-arrow-left"></i> Volver al dashboard</a>
</div>

<div class="section-header">
    <div class="section-header-line"></div>
    <h2>Secciones de la página</h2>
</div>

<div class="sections-list">
    <div class="section-row">
        <div class="section-row-icon" style="background:#f0fdf4;color:#16a34a"><i class="fas fa-heading"></i></div>
        <div class="section-row-info"><h3>Cabecera del blog</h3><p>Etiqueta "Blog" y título "Insights & Tecnología".</p></div>
        <span class="badge-ready">Listo</span>
        <a href="{{ route('admin.blog.header.edit') }}" class="edit-btn" style="background:#16a34a"><i class="fas fa-pen" style="font-size:10px"></i> Editar</a>
    </div>
    <div class="section-row">
        <div class="section-row-icon" style="background:#eff6ff;color:#1d6fdb"><i class="fas fa-newspaper"></i></div>
        <div class="section-row-info"><h3>Publicaciones</h3><p>Tarjetas de artículos: título, fecha, autor, extracto e imagen.</p></div>
        <span class="badge-ready">Listo</span>
        <a href="{{ route('admin.blog.posts.edit') }}" class="edit-btn" style="background:#1d6fdb"><i class="fas fa-pen" style="font-size:10px"></i> Editar</a>
    </div>
</div>
@endsection
