@extends('layouts.admin')
@section('title', 'Hero — Conócenos')
@section('breadcrumb', 'Conócenos › Banner / Hero')

@section('content')
<style>
    /* ── Page header ── */
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
        background: #eff6ff; color: #1e3a8a;
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

    /* ── Success alert ── */
    .alert-success {
        display: flex; align-items: center; gap: 10px;
        background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 10px;
        padding: 13px 18px; margin-bottom: 22px;
        font-size: 13.5px; font-weight: 500; color: #15803d;
    }

    /* ── Layout ── */
    .editor-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 22px;
        align-items: start;
    }

    /* ── Form card ── */
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

    /* ── Fields ── */
    .field-group { margin-bottom: 22px; }
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
        border-color: #1e3a8a;
        box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.08);
        background: white;
    }
    textarea.field-input { resize: vertical; min-height: 90px; line-height: 1.55; }
    .field-counter { font-size: 11px; color: #cbd5e1; text-align: right; margin-top: 4px; }

    /* ── Toggle switch ── */
    .visibility-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 16px;
    }
    .visibility-card-top {
        height: 4px;
        background: linear-gradient(90deg, #1e3a8a, #2d55c7);
    }
    .visibility-body { padding: 20px 22px; }
    .visibility-row {
        display: flex; align-items: center; justify-content: space-between; gap: 12px;
    }
    .visibility-info h4 { font-size: 13px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .visibility-info p  { font-size: 11.5px; color: #94a3b8; margin: 0; }

    .toggle-wrap { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }
    .toggle-label { font-size: 12px; font-weight: 600; color: #64748b; min-width: 32px; text-align: right; }

    /* The actual toggle */
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
    .switch input:checked + .slider { background: #1e3a8a; }
    .switch input:checked + .slider::before { transform: translateX(22px); }

    /* ── Image preview card ── */
    .preview-card {
        background: white; border: 1px solid #e2e8f0;
        border-radius: 14px; overflow: hidden;
    }
    .preview-card-header {
        padding: 14px 18px; border-bottom: 1px solid #f1f5f9;
        font-size: 13px; font-weight: 700; color: #0f172a;
        display: flex; align-items: center; gap: 8px;
    }
    .preview-card-header i { color: #1e3a8a; font-size: 12px; }
    .preview-img-wrap {
        position: relative; height: 170px; overflow: hidden;
        background: #0c1a2e;
    }
    .preview-img-wrap img {
        width: 100%; height: 100%; object-fit: cover; opacity: 0.6;
    }
    .preview-overlay {
        position: absolute; inset: 0; display: flex; flex-direction: column;
        align-items: flex-start; justify-content: center;
        padding: 18px;
    }
    .preview-badge {
        font-size: 9px; font-weight: 700; letter-spacing: 0.1em;
        color: #60a5fa; text-transform: uppercase; margin-bottom: 4px;
    }
    .preview-title { font-size: 15px; font-weight: 800; color: white; line-height: 1.2; margin-bottom: 4px; }
    .preview-desc { font-size: 10px; color: #cbd5e1; line-height: 1.4; max-width: 90%; }
    .preview-body { padding: 16px 18px; }

    /* File upload area */
    .upload-area {
        border: 2px dashed #d1d5db; border-radius: 10px; padding: 20px;
        text-align: center; cursor: pointer; transition: all 0.15s;
        background: #fafafa;
    }
    .upload-area:hover { border-color: #1e3a8a; background: #f5f8ff; }
    .upload-area input[type="file"] { display: none; }
    .upload-area i { font-size: 22px; color: #cbd5e1; margin-bottom: 8px; display: block; }
    .upload-area p { font-size: 12px; color: #94a3b8; margin: 0; }
    .upload-area .upload-hint { font-size: 11px; color: #cbd5e1; margin-top: 4px; }

    /* ── Save button ── */
    .save-bar {
        background: white; border: 1px solid #e2e8f0; border-radius: 14px;
        padding: 18px 24px; display: flex; align-items: center; justify-content: space-between;
        margin-top: 20px;
    }
    .save-bar p { font-size: 12px; color: #94a3b8; margin: 0; }
    .btn-save {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 24px; border-radius: 9px;
        background: #1e3a8a; color: white;
        font-size: 13.5px; font-weight: 700;
        border: none; cursor: pointer;
        transition: filter 0.15s, transform 0.1s;
    }
    .btn-save:hover { filter: brightness(1.15); transform: translateY(-1px); }
    .btn-save:active { transform: translateY(0); }
</style>

{{-- Header --}}
<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-image"></i></div>
    <div class="fph-text">
        <h2>Banner / Hero</h2>
        <p>Sección de portada de la página Conócenos</p>
    </div>
    <a href="{{ route('admin.pages.conocenos') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Conócenos
    </a>
</div>

{{-- Success --}}
@if(session('success'))
<div class="alert-success">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.conocenos.hero.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>

        {{-- Textos --}}
        <div class="form-card" style="margin-bottom:18px">
            <div class="form-card-header">
                <i class="fas fa-font" style="color:#1e3a8a;font-size:13px"></i>
                <h3>Contenido textual</h3>
                <span>Campos visibles en el banner</span>
            </div>
            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior <span style="color:#94a3b8;font-weight:400">(texto pequeño)</span></label>
                    <span class="field-hint">Aparece en mayúsculas sobre el título principal. Ej: "Quiénes somos"</span>
                    <input
                        type="text"
                        id="badge_text"
                        name="badge_text"
                        class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}"
                        maxlength="80"
                        oninput="updatePreview()"
                        placeholder="Quiénes somos"
                    >
                    <div class="field-counter"><span id="badge-count">{{ strlen($section->content('badge_text', '')) }}</span>/80</div>
                    @error('badge_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Título principal</label>
                    <span class="field-hint">Texto grande y llamativo del hero.</span>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="field-input"
                        value="{{ old('title', $section->content('title')) }}"
                        maxlength="200"
                        oninput="updatePreview()"
                        placeholder="Queremos ser tu aliado de negocio"
                    >
                    <div class="field-counter"><span id="title-count">{{ strlen($section->content('title', '')) }}</span>/200</div>
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <span class="field-hint">Párrafo breve debajo del título.</span>
                    <textarea
                        id="description"
                        name="description"
                        class="field-input"
                        maxlength="500"
                        oninput="updatePreview()"
                        placeholder="Soluciones de software a la medida..."
                    >{{ old('description', $section->content('description')) }}</textarea>
                    <div class="field-counter"><span id="desc-count">{{ strlen($section->content('description', '')) }}</span>/500</div>
                    @error('description')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

            </div>
        </div>

        {{-- Imagen de fondo --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-image" style="color:#1e3a8a;font-size:13px"></i>
                <h3>Imagen de fondo</h3>
                <span>JPG, PNG, WEBP · Máx. 4 MB</span>
            </div>
            <div class="form-card-body">
                <div class="upload-area" onclick="document.getElementById('bg-upload').click()">
                    <input type="file" id="bg-upload" name="background_image" accept="image/*" onchange="previewBg(event)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p><strong>Clic para subir imagen</strong> o arrastrar aquí</p>
                    <div class="upload-hint">Si no subes una nueva imagen, se conserva la actual.</div>
                </div>
                @error('background_image')
                    <p style="color:#ef4444;font-size:12px;margin-top:8px">{{ $message }}</p>
                @enderror
            </div>
        </div>

    </div>

    {{-- ══ Columna lateral ══ --}}
    <div>

        {{-- Visibilidad --}}
        <div class="visibility-card">
            <div class="visibility-card-top"></div>
            <div class="visibility-body">
                <div class="visibility-row">
                    <div class="visibility-info">
                        <h4>Visibilidad de la sección</h4>
                        <p>Controla si este banner aparece en el sitio.</p>
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
                <div style="margin-top:14px;padding-top:12px;border-top:1px solid #f1f5f9">
                    <div id="vis-status" style="display:flex;align-items:center;gap:6px;font-size:12px;font-weight:600;{{ $section->is_visible ? 'color:#16a34a' : 'color:#94a3b8' }}">
                        <span style="width:7px;height:7px;border-radius:50%;background:currentColor;display:inline-block"></span>
                        <span id="vis-status-text">{{ $section->is_visible ? 'Visible en el sitio' : 'Oculto en el sitio' }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Preview live --}}
        <div class="preview-card">
            <div class="preview-card-header">
                <i class="fas fa-eye"></i> Vista previa
            </div>
            <div class="preview-img-wrap">
                @php
                    $bgImg = $section->content('background_image', '');
                    $bgSrc = ($bgImg && !str_starts_with($bgImg, 'http')) ? asset('storage/' . $bgImg) : $bgImg;
                @endphp
                <img id="preview-bg" src="{{ $bgSrc }}" alt="Preview">
                <div class="preview-overlay">
                    <div class="preview-badge" id="prev-badge">{{ $section->content('badge_text') }}</div>
                    <div class="preview-title" id="prev-title">{{ $section->content('title') }}</div>
                    <div class="preview-desc" id="prev-desc">{{ $section->content('description') }}</div>
                </div>
            </div>
            <div class="preview-body">
                <p style="font-size:11px;color:#94a3b8;margin:0;text-align:center">
                    <i class="fas fa-info-circle"></i> Vista previa aproximada del hero
                </p>
            </div>
        </div>

    </div>
</div>

{{-- Save bar --}}
<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#1e3a8a;margin-right:5px"></i> Los cambios se aplicarán inmediatamente en el sitio.</p>
    <button type="submit" class="btn-save">
        <i class="fas fa-save"></i> Guardar cambios
    </button>
</div>

</form>

<script>
    function updatePreview() {
        const badge = document.getElementById('badge_text').value;
        const title = document.getElementById('title').value;
        const desc  = document.getElementById('description').value;

        document.getElementById('prev-badge').textContent = badge;
        document.getElementById('prev-title').textContent = title;
        document.getElementById('prev-desc').textContent  = desc;

        document.getElementById('badge-count').textContent = badge.length;
        document.getElementById('title-count').textContent = title.length;
        document.getElementById('desc-count').textContent  = desc.length;
    }

    function previewBg(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('preview-bg').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    function updateVisLabel(checkbox) {
        const label  = document.getElementById('vis-label');
        const status = document.getElementById('vis-status');
        const text   = document.getElementById('vis-status-text');
        if (checkbox.checked) {
            label.textContent  = 'Sí';
            status.style.color = '#16a34a';
            text.textContent   = 'Visible en el sitio';
        } else {
            label.textContent  = 'No';
            status.style.color = '#94a3b8';
            text.textContent   = 'Oculto en el sitio';
        }
    }
</script>
@endsection
