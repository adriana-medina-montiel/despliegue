@extends('layouts.admin')
@section('title', 'Banda de Cierre — Fábrica de software')
@section('breadcrumb', 'Fábrica de software › Banda de cierre')

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
        background: #f5f3ff; color: #7c3aed;
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
    }
    .form-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid #f1f5f9;
        display: flex; align-items: center; gap: 10px;
    }
    .form-card-header h3 { font-size: 14px; font-weight: 700; color: #0f172a; margin: 0; }
    .form-card-header span { font-size: 11px; color: #94a3b8; margin-left: auto; }
    .form-card-body { padding: 24px; }

    /* Fields */
    .field-group { margin-bottom: 22px; }
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
        border-color: #7c3aed;
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.08);
        background: white;
    }
    textarea.field-input { resize: vertical; min-height: 90px; line-height: 1.55; }
    .field-counter { font-size: 11px; color: #cbd5e1; text-align: right; margin-top: 4px; }

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
        background: linear-gradient(90deg, #7c3aed, #9f64f5);
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
    .switch input:checked + .slider { background: #7c3aed; }
    .switch input:checked + .slider::before { transform: translateX(22px); }

    /* File upload area */
    .upload-area {
        border: 2px dashed #d1d5db; border-radius: 10px; padding: 20px;
        text-align: center; cursor: pointer; transition: all 0.15s;
        background: #fafafa;
    }
    .upload-area:hover { border-color: #7c3aed; background: #fdfaff; }
    .upload-area input[type="file"] { display: none; }
    .upload-area i { font-size: 22px; color: #cbd5e1; margin-bottom: 8px; display: block; }
    .upload-area p { font-size: 12px; color: #94a3b8; margin: 0; }
    .upload-area .upload-hint { font-size: 11px; color: #cbd5e1; margin-top: 4px; }

    .save-bar {
        background: white; border: 1px solid #e2e8f0; border-radius: 14px;
        padding: 18px 24px; display: flex; align-items: center; justify-content: space-between;
        margin-top: 20px;
    }
    .save-bar p { font-size: 12px; color: #94a3b8; margin: 0; }
    .btn-save {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 24px; border-radius: 9px;
        background: #7c3aed; color: white;
        font-size: 13.5px; font-weight: 700;
        border: none; cursor: pointer;
        transition: filter 0.15s, transform 0.1s;
    }
    .btn-save:hover { filter: brightness(1.15); transform: translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-envelope"></i></div>
    <div class="fph-text">
        <h2>Banda de cierre / Llamada a la acción</h2>
        <p>Banda final de la página Fábrica de software</p>
    </div>
    <a href="{{ route('admin.pages.fabrica') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Fábrica
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.fabrica.band.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- Columna principal --}}
    <div>
        <div class="form-card" style="margin-bottom:18px">
            <div class="form-card-header">
                <i class="fas fa-font" style="color:#7c3aed;font-size:13px"></i>
                <h3>Contenido textual</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="title">Título destacado</label>
                    <span class="field-hint">Ej: "El software ha cambiado el mundo"</span>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="field-input"
                        value="{{ old('title', $section->content('title')) }}"
                        required
                    >
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="lead">Llamado (Subtítulo)</label>
                    <span class="field-hint">Ej: "Imagínate lo que hará por ti..." (Puedes usar HTML como &lt;strong&gt;)</span>
                    <textarea
                        id="lead"
                        name="lead"
                        class="field-input"
                        required
                    >{{ old('lead', $section->content('lead')) }}</textarea>
                    @error('lead')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="cta_text">Texto del Botón (CTA)</label>
                        <input
                            type="text"
                            id="cta_text"
                            name="cta_text"
                            class="field-input"
                            value="{{ old('cta_text', $section->content('cta_text')) }}"
                            required
                        >
                        @error('cta_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="cta_url">Enlace del Botón (CTA)</label>
                        <input
                            type="text"
                            id="cta_url"
                            name="cta_url"
                            class="field-input"
                            value="{{ old('cta_url', $section->content('cta_url')) }}"
                            required
                        >
                        @error('cta_url')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Imagen --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-image" style="color:#7c3aed;font-size:13px"></i>
                <h3>Imagen lateral</h3>
                <span>JPG, PNG, WEBP · Máx. 4 MB</span>
            </div>
            <div class="form-card-body">
                <div class="upload-area" onclick="document.getElementById('img-upload').click()">
                    <input type="file" id="img-upload" name="image" accept="image/*" onchange="previewImg(event)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p><strong>Clic para subir imagen</strong> o arrastrar aquí</p>
                    <div class="upload-hint">Si no subes una nueva imagen, se conserva la actual.</div>
                </div>
                @error('image')
                    <p style="color:#ef4444;font-size:12px;margin-top:8px">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Columna lateral --}}
    <div>
        {{-- Visibilidad --}}
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

        {{-- Preview lateral --}}
        <div class="form-card" style="padding: 16px; text-align: center;">
            <h4 style="font-size:12.5px; font-weight:700; margin: 0 0 10px; color:#475569;">Imagen actual</h4>
            @php
                $img = $section->content('image');
                $src = ($img && !str_starts_with($img, 'http')) ? asset('storage/' . $img) : $img;
            @endphp
            @if($src)
                <img id="preview-img" src="{{ $src }}" alt="Banda lateral" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
            @else
                <div id="preview-img-placeholder" style="height: 150px; background:#f1f5f9; display:flex; align-items:center; justify-content:center; border-radius:8px; color:#cbd5e1; border:1px dashed #cbd5e1;">
                    <i class="fas fa-image" style="font-size:32px;"></i>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#7c3aed;margin-right:5px"></i> Los cambios se aplicarán inmediatamente en el sitio.</p>
    <button type="submit" class="btn-save">
        <i class="fas fa-save"></i> Guardar cambios
    </button>
</div>

</form>

<script>
    function previewImg(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const preview = document.getElementById('preview-img');
            if (preview) {
                preview.src = e.target.result;
            } else {
                const placeholder = document.getElementById('preview-img-placeholder');
                if (placeholder) {
                    placeholder.outerHTML = `<img id="preview-img" src="${e.target.result}" alt="Banda lateral" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">`;
                }
            }
        };
        reader.readAsDataURL(file);
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
