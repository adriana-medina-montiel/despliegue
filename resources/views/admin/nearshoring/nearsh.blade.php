@extends('layouts.admin')
@section('title', 'Nearshoring — Nearshoring')
@section('breadcrumb', 'Nearshoring › Nearshoring')

@section('content')
<style>
    /* Estilos generales */
    .form-page-header { display: flex; align-items: center; gap: 14px; margin-bottom: 28px; padding-bottom: 20px; border-bottom: 1px solid #e2e8f0; }
    .fph-icon { width: 46px; height: 46px; border-radius: 12px; background: #fffbeb; color: #ca8a04; display: flex; align-items: center; justify-content: center; font-size: 18px; }
    
    /* GRID PARA LA ESTRUCTURA PRINCIPAL */
    .admin-content-grid { display: grid; grid-template-columns: 1fr 320px; gap: 24px; align-items: start; }
    
    .form-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; margin-bottom: 20px; }
    .form-card-header { padding: 18px 24px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
    .form-card-body { padding: 24px; }
    .field-group { margin-bottom: 22px; }
    .field-label { display: block; font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .field-input { width: 100%; padding: 10px 13px; border-radius: 8px; border: 1px solid #d1d5db; font-size: 13.5px; background: #fafafa; outline: none; }
    
    .save-bar { background: white; border: 1px solid #e2e8f0; border-radius: 14px; padding: 18px 24px; text-align: right; }
    .btn-save { padding: 10px 24px; border-radius: 9px; background: #ca8a04; color: white; font-weight: 700; border: none; cursor: pointer; }

    /* Visibilidad */
    .visibility-card { background:white; border:1px solid #e2e8f0; border-radius:14px; overflow:hidden; }
    .visibility-card-top { height:4px; background:linear-gradient(90deg,#16a34a,#4ade80); }
    .visibility-body { padding:18px 20px; }
    .visibility-row { display:flex; align-items:center; justify-content:space-between; gap:12px; }
    .visibility-info h4 { font-size:13px; font-weight:700; color:#0f172a; margin:0 0 2px; }
    .visibility-info p { font-size:11.5px; color:#94a3b8; margin:0; }
    .toggle-wrap { display:flex; align-items:center; gap:8px; flex-shrink:0; }
    .toggle-label { font-size:12px; font-weight:600; color:#64748b; min-width:24px; text-align:right; }
    .switch { position:relative; display:inline-block; width:48px; height:26px; }
    .switch input { opacity:0; width:0; height:0; }
    .slider { position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background:#e2e8f0; border-radius:26px; transition:background .2s; }
    .slider::before { position:absolute; content:""; height:20px; width:20px; left:3px; bottom:3px; background:white; border-radius:50%; transition:transform .2s; box-shadow:0 1px 4px rgba(0,0,0,.18); }
    .switch input:checked + .slider { background:#16a34a; }
    .switch input:checked + .slider::before { transform:translateX(22px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-layer-group"></i></div>
    <div class="fph-text">
        <h2>Nearshoring</h2>
        <p>Configuración de la sección de Nearshoring</p>
    </div>
    <a href="{{ route('admin.pages.nearshoring') }}" style="margin-left:auto; color:#64748b; font-size:13px; font-weight:600; text-decoration:none;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
</div>

@if(session('success'))
<div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:10px; padding:13px 18px; margin-bottom:22px; color:#15803d; font-size:13.5px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.nearshoring.nearsh.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="admin-content-grid">
        
        <div>
            <div class="form-card">
                <div class="form-card-header">
                    <i class="fas fa-font" style="color:#ca8a04;font-size:13px"></i>
                    <h3>Contenido Nearshoring</h3>
                </div>
                <div class="form-card-body">
                    <div class="field-group">
                        <label class="field-label" for="title">Título</label>
                        <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content['title'] ?? '') }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="description">Descripción</label>
                        <textarea id="description" name="description" class="field-input" rows="4" required>{{ old('description', $section->content['description'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="save-bar">
                <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
            </div>
        </div>

        <div class="visibility-card">
            <div class="visibility-card-top"></div>
            <div class="visibility-body">
                <div class="visibility-row">
                    <div class="visibility-info">
                        <h4>Visibilidad</h4>
                        <p>Muestra u oculta esta sección.</p>
                    </div>
                    <div class="toggle-wrap">
                        <span class="toggle-label" id="vis-label">{{ $section->is_visible ? 'Sí' : 'No' }}</span>
                        <label class="switch">
                            <input type="checkbox" name="is_visible" {{ $section->is_visible ? 'checked' : '' }} onchange="updateVisLabel(this)">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <div style="margin-top:12px;padding-top:10px;border-top:1px solid #f1f5f9">
                    <div id="vis-status" style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:600;{{ $section->is_visible ? 'color:#16a34a' : 'color:#94a3b8' }}">
                        <span style="width:7px;height:7px;border-radius:50%;background:currentColor;display:inline-block"></span>
                        <span id="vis-status-text">{{ $section->is_visible ? 'Visible en el sitio' : 'Oculto en el sitio' }}</span>
                    </div>
                </div>
            </div>
        </div>
        
    </div> </form>

<script>
    function updateVisLabel(checkbox) {
        document.getElementById('vis-label').textContent      = checkbox.checked ? 'Sí' : 'No';
        document.getElementById('vis-status').style.color      = checkbox.checked ? '#16a34a' : '#94a3b8';
        document.getElementById('vis-status-text').textContent = checkbox.checked ? 'Visible en el sitio' : 'Oculto en el sitio';
    }
</script>
@endsection