@extends('layouts.admin')
@section('title', 'Hero — Inicio')
@section('breadcrumb', 'Página principal › Hero / Banner')

@section('content')
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:#eff6ff;color:#1d6fdb;display:flex;align-items:center;justify-content:center;font-size:18px; }
    .fph-text h2 { font-size:19px;font-weight:700;color:#0f172a;margin:0 0 2px; }
    .fph-text p  { font-size:12px;color:#94a3b8;margin:0; }
    .fph-back { margin-left:auto;display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;color:#475569;background:#f1f5f9;border:1px solid #e2e8f0;text-decoration:none;transition:all .15s; }
    .fph-back:hover { background:#e2e8f0; }

    .alert-success { display:flex;align-items:center;gap:10px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:13px 18px;margin-bottom:22px;font-size:13.5px;font-weight:500;color:#15803d; }

    .editor-layout { display:grid;grid-template-columns:1fr 340px;gap:22px;align-items:start; }

    .form-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:18px; }
    .form-card:last-child { margin-bottom:0; }
    .form-card-header { padding:16px 22px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:10px; }
    .form-card-header h3 { font-size:14px;font-weight:700;color:#0f172a;margin:0; }
    .form-card-header span { font-size:11px;color:#94a3b8;margin-left:auto; }
    .form-card-body { padding:22px; }

    .field-group { margin-bottom:20px; }
    .field-group:last-child { margin-bottom:0; }
    .field-label { display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:5px; }
    .field-hint  { font-size:11px;color:#9ca3af;margin-bottom:6px;display:block; }
    .field-input { width:100%;padding:10px 13px;border-radius:8px;border:1px solid #d1d5db;font-size:13.5px;color:#1e293b;transition:border-color .15s,box-shadow .15s;background:#fafafa;outline:none; }
    .field-input:focus { border-color:#1d6fdb;box-shadow:0 0 0 3px rgba(29,111,219,.08);background:white; }
    textarea.field-input { resize:vertical;min-height:80px;line-height:1.55; }
    .field-counter { font-size:11px;color:#cbd5e1;text-align:right;margin-top:3px; }

    /* ── Stats grid ── */
    .stat-row-item {
        background:#f8fafc; border:1px solid #e2e8f0; border-radius:10px;
        padding:16px; margin-bottom:12px; position:relative;
        display:grid; grid-template-columns:100px 1fr 1fr 100px; gap:12px; align-items:center;
    }
    .stat-row-item:last-child { margin-bottom:0; }
    .stat-remove {
        position:absolute; top:8px; right:8px;
        background:none; border:none; color:#ef4444; cursor:pointer; font-size:12px;
    }

    /* Upload area */
    .upload-area { border: 2px dashed #d1d5db; border-radius: 10px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.15s; background: #fafafa; }
    .upload-area:hover { border-color: #1d6fdb; background: #f5f8ff; }
    .upload-area input[type="file"] { display: none; }
    .upload-area i { font-size: 22px; color: #cbd5e1; margin-bottom: 8px; display: block; }
    .upload-area p { font-size: 12px; color: #94a3b8; margin: 0; }

    /* Visibility */
    .visibility-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .visibility-card-top { height:4px;background:linear-gradient(90deg,#1d6fdb,#2d82f0); }
    .visibility-body { padding:18px 20px; }
    .visibility-row { display:flex;align-items:center;justify-content:space-between;gap:12px; }
    .visibility-info h4 { font-size:13px;font-weight:700;color:#0f172a;margin:0 0 2px; }
    .visibility-info p  { font-size:11.5px;color:#94a3b8;margin:0; }
    .toggle-wrap { display:flex;align-items:center;gap:8px;flex-shrink:0; }
    .toggle-label { font-size:12px;font-weight:600;color:#64748b;min-width:24px;text-align:right; }
    .switch { position:relative;display:inline-block;width:48px;height:26px; }
    .switch input { opacity:0;width:0;height:0; }
    .slider { position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background:#e2e8f0;border-radius:26px;transition:background .2s; }
    .slider::before { position:absolute;content:"";height:20px;width:20px;left:3px;bottom:3px;background:white;border-radius:50%;transition:transform .2s;box-shadow:0 1px 4px rgba(0,0,0,.18); }
    .switch input:checked + .slider { background:#1d6fdb; }
    .switch input:checked + .slider::before { transform:translateX(22px); }

    /* Preview */
    .preview-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden; }
    .preview-card-header { padding:13px 18px;border-bottom:1px solid #f1f5f9;font-size:13px;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:8px; }
    .preview-card-header i { color:#1d6fdb;font-size:12px; }
    .preview-img-wrap { position:relative; height:180px; overflow:hidden; background:#0c1a2e; }
    .preview-img-wrap img { width:100%; height:100%; object-fit:cover; opacity:0.4; }
    .preview-overlay { position:absolute; inset:0; display:flex; flex-direction:column; align-items:flex-start; justify-content:center; padding:16px; }
    .preview-badge { font-size:9px; font-weight:700; color:#2d82f0; text-transform:uppercase; margin-bottom:4px; }
    .preview-title { font-size:14px; font-weight:800; color:white; line-height:1.2; margin-bottom:4px; }
    .preview-desc { font-size:10px; color:#cbd5e1; line-height:1.45; }

    /* Save bar */
    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:#1d6fdb;color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-image"></i></div>
    <div class="fph-text">
        <h2>Hero / Banner Principal & Estadísticas</h2>
        <p>Portada y cifras clave de la página principal del sitio</p>
    </div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Inicio
    </a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.inicio.hero.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>

        {{-- Textos hero --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-font" style="color:#1d6fdb;font-size:13px"></i>
                <h3>Contenido del Banner</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}"
                        maxlength="100" oninput="updatePreview()">
                    @error('badge_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Título principal</label>
                    <input type="text" id="title" name="title" class="field-input"
                        value="{{ old('title', $section->content('title')) }}"
                        maxlength="255" oninput="updatePreview()">
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input"
                        maxlength="1000" oninput="updatePreview()">{{ old('description', $section->content('description')) }}</textarea>
                    @error('description')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px">
                    <div class="field-group">
                        <label class="field-label" for="cta1_text">Texto botón 1</label>
                        <input type="text" id="cta1_text" name="cta1_text" class="field-input" value="{{ old('cta1_text', $section->content('cta1_text')) }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="cta1_url">Enlace botón 1</label>
                        <input type="text" id="cta1_url" name="cta1_url" class="field-input" value="{{ old('cta1_url', $section->content('cta1_url')) }}">
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px">
                    <div class="field-group">
                        <label class="field-label" for="cta2_text">Texto botón 2</label>
                        <input type="text" id="cta2_text" name="cta2_text" class="field-input" value="{{ old('cta2_text', $section->content('cta2_text')) }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="cta2_url">Enlace botón 2</label>
                        <input type="text" id="cta2_url" name="cta2_url" class="field-input" value="{{ old('cta2_url', $section->content('cta2_url')) }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Imagen hero --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-image" style="color:#1d6fdb;font-size:13px"></i>
                <h3>Imagen de fondo</h3>
            </div>
            <div class="form-card-body">
                <div class="upload-area" onclick="document.getElementById('bg-upload').click()">
                    <input type="file" id="bg-upload" name="background_image" accept="image/*" onchange="previewBg(event)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p><strong>Clic para subir imagen</strong> o arrastrar aquí</p>
                </div>
                @error('background_image')<p style="color:#ef4444;font-size:12px;margin-top:8px">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Estadísticas --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-chart-bar" style="color:#1d6fdb;font-size:13px"></i>
                <h3>Valores Estadísticos</h3>
                <button type="button" class="btn-save" style="padding:4px 10px;font-size:11px" onclick="addStatRow()">+ Agregar</button>
            </div>
            <div class="form-card-body">
                <div id="stats-container">
                    @foreach($items as $i => $item)
                    <div class="stat-row-item" id="stat-row-{{ $i }}">
                        <div>
                            <label class="field-label" style="font-size:10px">Valor</label>
                            <input type="text" name="item_value[]" class="field-input" style="padding:6px 10px" value="{{ $item->data('value') }}" placeholder="Ej: 20+">
                        </div>
                        <div>
                            <label class="field-label" style="font-size:10px">Etiqueta</label>
                            <input type="text" name="item_label[]" class="field-input" style="padding:6px 10px" value="{{ $item->data('label') }}" placeholder="Ej: Años de experiencia">
                        </div>
                        <div>
                            <label class="field-label" style="font-size:10px">Icono FontAwesome</label>
                            <input type="text" name="item_icon[]" class="field-input" style="padding:6px 10px" value="{{ $item->data('icon') }}" placeholder="Ej: calendar-alt">
                        </div>
                        <div>
                            <label class="field-label" style="font-size:10px">Color de fondo</label>
                            <select name="item_color[]" class="field-input" style="padding:6px 10px;height:34px">
                                <option value="blue" {{ $item->data('color') == 'blue' ? 'selected' : '' }}>Azul</option>
                                <option value="green" {{ $item->data('color') == 'green' ? 'selected' : '' }}>Verde</option>
                                <option value="orange" {{ $item->data('color') == 'orange' ? 'selected' : '' }}>Naranja</option>
                                <option value="purple" {{ $item->data('color') == 'purple' ? 'selected' : '' }}>Morado</option>
                                <option value="teal" {{ $item->data('color') == 'teal' ? 'selected' : '' }}>Cian</option>
                            </select>
                        </div>
                        <button type="button" class="stat-remove" onclick="removeStatRow({{ $i }})"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    @endforeach
                </div>
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
            </div>
        </div>

        {{-- Vista previa --}}
        <div class="preview-card">
            <div class="preview-card-header"><i class="fas fa-eye"></i> Vista previa</div>
            <div class="preview-img-wrap">
                @php
                    $bgImg = $section->content('background_image', '');
                    $bgSrc = ($bgImg && !str_starts_with($bgImg, 'http')) ? asset('storage/' . $bgImg) : $bgImg;
                @endphp
                <img id="preview-bg" src="{{ $bgSrc }}" alt="Preview">
                <div class="preview-overlay">
                    <div class="preview-badge" id="prev-badge">{{ $section->content('badge_text') }}</div>
                    <div class="preview-title" id="prev-title">{!! $section->content('title') !!}</div>
                    <div class="preview-desc" id="prev-desc">{{ $section->content('description') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#1d6fdb;margin-right:5px"></i> Los cambios se aplican inmediatamente.</p>
    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
</div>

</form>

<script>
    let statIndex = {{ $items->count() }};

    function updatePreview() {
        document.getElementById('prev-badge').textContent = document.getElementById('badge_text').value;
        document.getElementById('prev-title').innerHTML = document.getElementById('title').value;
        document.getElementById('prev-desc').textContent = document.getElementById('description').value;
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
        document.getElementById('vis-label').textContent = checkbox.checked ? 'Sí' : 'No';
    }

    function removeStatRow(index) {
        document.getElementById('stat-row-' + index).remove();
    }

    function addStatRow() {
        const container = document.getElementById('stats-container');
        const div = document.createElement('div');
        div.className = 'stat-row-item';
        div.id = 'stat-row-' + statIndex;
        div.innerHTML = `
            <div>
                <label class="field-label" style="font-size:10px">Valor</label>
                <input type="text" name="item_value[]" class="field-input" style="padding:6px 10px" placeholder="Ej: 20+">
            </div>
            <div>
                <label class="field-label" style="font-size:10px">Etiqueta</label>
                <input type="text" name="item_label[]" class="field-input" style="padding:6px 10px" placeholder="Ej: Años de experiencia">
            </div>
            <div>
                <label class="field-label" style="font-size:10px">Icono FontAwesome</label>
                <input type="text" name="item_icon[]" class="field-input" style="padding:6px 10px" placeholder="Ej: calendar-alt">
            </div>
            <div>
                <label class="field-label" style="font-size:10px">Color de fondo</label>
                <select name="item_color[]" class="field-input" style="padding:6px 10px;height:34px">
                    <option value="blue">Azul</option>
                    <option value="green">Verde</option>
                    <option value="orange">Naranja</option>
                    <option value="purple">Morado</option>
                    <option value="teal">Cian</option>
                </select>
            </div>
            <button type="button" class="stat-remove" onclick="removeStatRow(${statIndex})"><i class="fas fa-trash-alt"></i></button>
        `;
        container.appendChild(div);
        statIndex++;
    }
</script>
@endsection
