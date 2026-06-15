@extends('layouts.admin')
@section('title', 'Introducción — Productos')
@section('breadcrumb', 'Productos › Introducción')

@section('content')
<style>
    /* Page header */
    .form-page-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .fph-icon {
        width: 46px; height: 46px; border-radius: 12px;
        background: #fff7ed; color: #ea580c;
        display: flex; align-items: center; justify-content: center; font-size: 18px;
    }
    .fph-text h2 { font-size: 19px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .fph-text p  { font-size: 12px; color: #94a3b8; margin: 0; }
    .fph-back {
        margin-left: auto; display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600;
        color: #475569; background: #f1f5f9; border: 1px solid #e2e8f0;
        text-decoration: none; transition: all 0.15s;
    }
    .fph-back:hover { background: #e2e8f0; }

    /* Success alert */
    .alert-success {
        display: flex; align-items: center; gap: 10px;
        background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 10px;
        padding: 13px 18px; margin-bottom: 22px;
        font-size: 13.5px; font-weight: 500; color: #15803d;
    }

    /* Layout */
    .editor-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 22px;
        align-items: start;
    }

    /* Form card */
    .form-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 18px;
    }
    .form-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid #f1f5f9;
        display: flex; align-items: center; gap: 10px;
    }
    .form-card-header h3 { font-size: 14px; font-weight: 700; color: #0f172a; margin: 0; }
    .form-card-body { padding: 24px; }

    /* Fields */
    .field-group { margin-bottom: 20px; }
    .field-group:last-child { margin-bottom: 0; }
    .field-label {
        display: block; font-size: 12.5px; font-weight: 600;
        color: #374151; margin-bottom: 6px;
    }
    .field-hint { font-size: 11px; color: #9ca3af; margin-bottom: 6px; display: block; }
    .field-input {
        width: 100%; padding: 10px 13px; border-radius: 8px;
        border: 1px solid #d1d5db; font-size: 13.5px; color: #1e293b;
        transition: border-color 0.15s, box-shadow 0.15s;
        background: #fafafa;
        outline: none;
    }
    .field-input:focus {
        border-color: #ea580c;
        box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.08);
        background: white;
    }
    textarea.field-input { resize: vertical; min-height: 90px; line-height: 1.55; }

    /* Item row */
    .item-row {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 16px;
        border-radius: 10px;
        margin-bottom: 12px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        position: relative;
    }
    .btn-remove {
        background: #ef4444; color: white; border: none;
        width: 28px; height: 28px; border-radius: 6px;
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: background 0.1s;
    }
    .btn-remove:hover { background: #dc2626; }
    
    .btn-add {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 8px 16px; border-radius: 8px;
        background: #f1f5f9; color: #475569;
        font-size: 12.5px; font-weight: 600;
        border: 1px solid #e2e8f0; cursor: pointer;
        transition: all 0.15s;
    }
    .btn-add:hover { background: #e2e8f0; color: #1e293b; }

    /* Toggle switch */
    .visibility-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 16px;
    }
    .visibility-card-top {
        height: 4px;
        background: linear-gradient(90deg, #ea580c, #f97316);
    }
    .visibility-body { padding: 20px 22px; }
    .visibility-row {
        display: flex; align-items: center; justify-content: space-between; gap: 12px;
    }
    .visibility-info h4 { font-size: 13px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .visibility-info p  { font-size: 11.5px; color: #94a3b8; margin: 0; }

    .toggle-wrap { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }
    .toggle-label { font-size: 12px; font-weight: 600; color: #64748b; min-width: 32px; text-align: right; }

    .switch { position: relative; display: inline-block; width: 48px; height: 26px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider {
        position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
        background: #e2e8f0; border-radius: 26px;
        transition: background 0.2s;
    }
    .slider::before {
        position: absolute; content: "";
        height: 20px; width: 20px; left: 3px; bottom: 3px;
        background: white; border-radius: 50%;
        transition: transform 0.2s;
        box-shadow: 0 1px 4px rgba(0,0,0,0.18);
    }
    .switch input:checked + .slider { background: #ea580c; }
    .switch input:checked + .slider::before { transform: translateX(22px); }

    .save-bar {
        background: white; border: 1px solid #e2e8f0; border-radius: 14px;
        padding: 18px 24px; display: flex; align-items: center; justify-content: space-between;
        margin-top: 20px;
    }
    .save-bar p { font-size: 12px; color: #94a3b8; margin: 0; }
    .btn-save {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 24px; border-radius: 9px;
        background: #ea580c; color: white;
        font-size: 13.5px; font-weight: 700;
        border: none; cursor: pointer;
        transition: filter 0.15s, transform 0.1s;
    }
    .btn-save:hover { filter: brightness(1.15); transform: translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-layer-group"></i></div>
    <div class="fph-text">
        <h2>Introducción & Barra de Ventajas</h2>
        <p>Cabecera y ventajas horizontales en la página de Productos</p>
    </div>
    <a href="{{ route('admin.pages.productos') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Productos
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.productos.intro.update') }}" method="POST">
@csrf

<div class="editor-layout">

    {{-- Columna principal --}}
    <div>
        {{-- Textos principales --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-font" style="color:#ea580c;font-size:13px"></i>
                <h3>Contenido textual</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input" value="{{ old('badge_text', $section->content('badge_text')) }}" required>
                    @error('badge_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Título de sección</label>
                    <span class="field-hint">Ej: "Échale un vistazo a &lt;span class=\"highlight\"&gt;nuestros productos&lt;/span&gt;..."</span>
                    <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}" required>
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input" required>{{ old('description', $section->content('description')) }}</textarea>
                    @error('description')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Ventajas Horizontales --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-list-ul" style="color:#ea580c;font-size:13px"></i>
                <h3>Ventajas horizontales (Barra de características)</h3>
            </div>
            <div class="form-card-body">
                <div id="features-list">
                    @foreach($items as $i => $item)
                    <div class="item-row" id="feat-row-{{ $i }}">
                        <div style="grid-column: span 2; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 6px; margin-bottom: 6px;">
                            <strong style="font-size:12px; color:#475569;">Característica #{{ $i + 1 }}</strong>
                            <button type="button" class="btn-remove" onclick="removeFeature({{ $i }})"><i class="fas fa-trash"></i></button>
                        </div>
                        
                        <div class="field-group">
                            <label class="field-label">Título destacado</label>
                            <input type="text" name="item_title[{{ $i }}]" class="field-input" value="{{ $item->data('title') }}" required>
                        </div>

                        <div class="field-group">
                            <label class="field-label">Clase de Icono FontAwesome y color</label>
                            <input type="text" name="item_icon[{{ $i }}]" class="field-input" value="{{ $item->data('icon') }}" placeholder="Ej: fas fa-puzzle-piece icon-blue" required>
                        </div>

                        <div class="field-group" style="grid-column: span 2;">
                            <label class="field-label">Texto ligero</label>
                            <input type="text" name="item_text[{{ $i }}]" class="field-input" value="{{ $item->data('text') }}" required>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn-add" onclick="addFeature()"><i class="fas fa-plus"></i> Agregar Característica</button>
            </div>
        </div>
    </div>

    {{-- Columna lateral --}}
    <div>
        <div class="visibility-card">
            <div class="visibility-card-top"></div>
            <div class="visibility-body">
                <div class="visibility-row">
                    <div class="visibility-info">
                        <h4>Visibilidad de la sección</h4>
                        <p>Controla si esta sección aparece en la página.</p>
                    </div>
                    <div class="toggle-wrap">
                        <span class="toggle-label" id="vis-label">{{ $section->is_visible ? 'Sí' : 'No' }}</span>
                        <label class="switch">
                            <input
                                type="checkbox"
                                name="is_visible"
                                id="is_visible"
                                {{ $section->is_visible ? 'checked' : '' }}
                                onchange="updateVisLabel(this)"
                            >
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#ea580c;margin-right:5px"></i> Los cambios se guardarán y aplicarán inmediatamente.</p>
    <button type="submit" class="btn-save">
        <i class="fas fa-save"></i> Guardar cambios
    </button>
</div>

</form>

<script>
    let featIdx = {{ count($items) }};

    function addFeature() {
        const div = document.createElement('div');
        div.className = 'item-row';
        div.id = `feat-row-${featIdx}`;
        div.innerHTML = `
            <div style="grid-column: span 2; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 6px; margin-bottom: 6px;">
                <strong style="font-size:12px; color:#475569;">Característica #${featIdx + 1}</strong>
                <button type="button" class="btn-remove" onclick="removeFeature(${featIdx})"><i class="fas fa-trash"></i></button>
            </div>
            <div class="field-group">
                <label class="field-label">Título destacado</label>
                <input type="text" name="item_title[${featIdx}]" class="field-input" required>
            </div>
            <div class="field-group">
                <label class="field-label">Clase de Icono FontAwesome y color</label>
                <input type="text" name="item_icon[${featIdx}]" class="field-input" placeholder="Ej: fas fa-puzzle-piece icon-blue" required>
            </div>
            <div class="field-group" style="grid-column: span 2;">
                <label class="field-label">Texto ligero</label>
                <input type="text" name="item_text[${featIdx}]" class="field-input" required>
            </div>
        `;
        document.getElementById('features-list').appendChild(div);
        featIdx++;
    }

    function removeFeature(idx) {
        const el = document.getElementById(`feat-row-${idx}`);
        if(el) el.remove();
    }

    function updateVisLabel(checkbox) {
        const label  = document.getElementById('vis-label');
        if (checkbox.checked) {
            label.textContent = 'Sí';
        } else {
            label.textContent = 'No';
        }
    }
</script>
@endsection
