@extends('layouts.admin')
@section('title', 'CTA — Nearshoring')
@section('breadcrumb', 'Nearshoring › CTA')

@section('content')
<style>
    /* Estilos del header */
    .form-page-header { display: flex; align-items: center; gap: 14px; margin-bottom: 28px; padding-bottom: 20px; border-bottom: 1px solid #e2e8f0; }
    .fph-icon { width: 46px; height: 46px; border-radius: 12px; background: #eff6ff; color: #1e3a8a; display: flex; align-items: center; justify-content: center; font-size: 18px; }
    .fph-text h2 { font-size: 19px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .fph-text p { font-size: 12px; color: #94a3b8; margin: 0; }
    .fph-back { margin-left: auto; display: inline-flex; align-items: center; gap: 7px; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #475569; background: #f1f5f9; border: 1px solid #e2e8f0; text-decoration: none; }
    
    /* Grid de dos columnas */
    .admin-content-grid { display: grid; grid-template-columns: 1fr 320px; gap: 24px; align-items: start; }
    
    /* Componentes del formulario */
    .form-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; margin-bottom: 20px; }
    .form-card-header { padding: 18px 24px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
    .form-card-body { padding: 24px; }
    .field-group { margin-bottom: 22px; }
    .field-label { display: block; font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .field-input { width: 100%; padding: 10px 13px; border-radius: 8px; border: 1px solid #d1d5db; font-size: 13.5px; background: #fafafa; outline: none; }
    .btn-save { display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px; border-radius: 9px; background: #1e3a8a; color: white; font-size: 13.5px; font-weight: 700; border: none; cursor: pointer; }

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
    <div class="fph-icon"><i class="fas fa-bullhorn"></i></div>
    <div class="fph-text">
        <h2>Call to Action</h2>
        <p>Edita el contenido del bloque de llamada a la acción</p>
    </div>
    <a href="{{ route('admin.pages.nearshoring') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
</div>

@if(session('success'))
    <div class="alert-success" style="display: flex; align-items: center; gap: 10px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 10px; padding: 13px 18px; margin-bottom: 22px; font-size: 13.5px; font-weight: 500; color: #15803d;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.nearshoring.cta.update') }}" method="POST">
    @csrf
    
    <div class="admin-content-grid">
        <div>
            <div class="form-card">
                <div class="form-card-header">
                    <h3>Contenido del CTA</h3>
                </div>
                <div class="form-card-body">
                    <div class="field-group">
                        <label class="field-label">Título</label>
                        <input type="text" name="title" class="field-input" value="{{ old('title', is_array($section->content) ? ($section->content['title'] ?? '') : '') }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Descripción</label>
                        <textarea name="description" class="field-input" rows="3">{{ old('description', is_array($section->content) ? ($section->content['description'] ?? '') : '') }}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
        </div>

        <div class="visibility-card">
            <div class="visibility-card-top"></div>
            <div class="visibility-body">
                <div class="visibility-row">
                    <div class="visibility-info">
                        <h4>Visibilidad</h4>
                        <p>Controla si este banner aparece en el sitio.</p>
                    </div>
                    <div class="toggle-wrap">
                        <span class="toggle-label" id="vis-label">{{ $section->is_visible ? 'Sí' : 'No' }}</span>
                        <label class="switch">
                            <input type="checkbox" name="is_visible" id="is_visible" {{ $section->is_visible ? 'checked' : '' }} onchange="updateVisLabel(this)">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <div style="margin-top:14px;padding-top:12px;border-top:1px solid #f1f5f9">
                    <div id="vis-status" style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:600;{{ $section->is_visible ? 'color:#16a34a' : 'color:#94a3b8' }}">
                        <span style="width:7px;height:7px;border-radius:50%;background:currentColor;display:inline-block"></span>
                        <span id="vis-status-text">{{ $section->is_visible ? 'Visible en el sitio' : 'Oculto en el sitio' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function updateVisLabel(checkbox) {
        document.getElementById('vis-label').textContent = checkbox.checked ? 'Sí' : 'No';
        document.getElementById('vis-status').style.color  = checkbox.checked ? '#16a34a' : '#94a3b8';
        document.getElementById('vis-status-text').textContent = checkbox.checked ? 'Visible en el sitio' : 'Oculto en el sitio';
    }
</script>
@endsection