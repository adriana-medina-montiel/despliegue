@extends('layouts.admin')
@section('title', 'Editar servicio — Fábrica de software')
@section('breadcrumb', 'Fábrica de software › Servicios detallados › Editar')

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
        margin-bottom: 18px;
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
        border-color: #7c3aed;
        box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.08);
        background: white;
    }
    textarea.field-input { resize: vertical; min-height: 90px; line-height: 1.55; }
    .field-counter { font-size: 11px; color: #cbd5e1; text-align: right; margin-top: 4px; }

    /* Items rows */
    .item-row {
        display: flex;
        gap: 10px;
        align-items: center;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 10px 14px;
        border-radius: 8px;
        margin-bottom: 10px;
    }
    .btn-remove {
        background: #ef4444; color: white; border: none;
        width: 32px; height: 32px; border-radius: 6px;
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

    /* Tech logos upload */
    .tech-logo-row {
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

    .tech-logo-img {
        width: 40px; height: 40px; object-fit: contain;
        background: white; border: 1px solid #e2e8f0; border-radius: 6px;
        padding: 4px; display: inline-block; vertical-align: middle;
    }

    /* Save button */
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

    /* Toggle switch */
    .switch-card {
        background: white; border: 1px solid #e2e8f0; border-radius: 14px;
        padding: 20px 22px; margin-bottom: 16px;
    }
    .switch-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; }
    .switch { position: relative; display: inline-block; width: 48px; height: 26px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider {
        position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
        background: #e2e8f0; border-radius: 26px;
        transition: background 0.2s;
    }
    .slider::before {
        position: absolute; content: ""; height: 20px; width: 20px; left: 3px; bottom: 3px;
        background: white; border-radius: 50%; transition: transform 0.2s;
        box-shadow: 0 1px 4px rgba(0,0,0,0.18);
    }
    .switch input:checked + .slider { background: #7c3aed; }
    .switch input:checked + .slider::before { transform: translateX(22px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-edit"></i></div>
    <div class="fph-text">
        <h2>Editar Servicio</h2>
        <p>Servicio: <strong>{{ $item->data('title') }}</strong></p>
    </div>
    <a href="{{ route('admin.fabrica.servicios.edit') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a listado
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="alert-success" style="background:#fef2f2;border-color:#fecaca;color:#b91c1c;">
    <i class="fas fa-times-circle"></i>
    Por favor corrige los errores del formulario.
</div>
@endif

<form action="{{ route('admin.fabrica.servicios.updateItem', $item->id) }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- Columna principal --}}
    <div>
        {{-- Textos principales --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#7c3aed;font-size:13px"></i>
                <h3>Información General</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="title">Título del servicio</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="field-input"
                        value="{{ old('title', $item->data('title')) }}"
                        required
                    >
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>

                <div class="field-group">
                    <label class="field-label" for="text">Descripción / Contenido</label>
                    <textarea
                        id="text"
                        name="text"
                        class="field-input"
                        required
                    >{{ old('text', $item->data('text')) }}</textarea>
                    @error('text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Bullets (Viñetas opcionales) --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-list-ul" style="color:#7c3aed;font-size:13px"></i>
                <h3>Viñetas / Características (Opcional)</h3>
                <span>Lista de puntos clave</span>
            </div>
            <div class="form-card-body">
                <div id="bullets-list">
                    @foreach($item->data('bullets', []) as $i => $bullet)
                    <div class="item-row" id="bullet-row-{{ $i }}">
                        <input type="text" name="bullets[]" class="field-input" value="{{ $bullet }}">
                        <button type="button" class="btn-remove" onclick="removeBullet({{ $i }})"><i class="fas fa-times"></i></button>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn-add" onclick="addBullet()"><i class="fas fa-plus"></i> Agregar viñeta</button>
            </div>
        </div>

        {{-- Tecnologías / Logos --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-laptop-code" style="color:#7c3aed;font-size:13px"></i>
                <h3>Logos de Tecnologías</h3>
                <span>Logos que se muestran al pie de la tarjeta</span>
            </div>
            <div class="form-card-body">
                <div id="tech-list">
                    @foreach($item->data('logos', []) as $i => $logo)
                    <div class="tech-logo-row" id="tech-row-{{ $i }}">
                        <div style="grid-column: span 2; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px; margin-bottom: 8px;">
                            <strong>Tecnología #{{ $i + 1 }}</strong>
                            <button type="button" class="btn-remove" onclick="removeTech({{ $i }})"><i class="fas fa-trash"></i></button>
                        </div>
                        
                        <div class="field-group">
                            <label class="field-label">Nombre</label>
                            <input type="text" name="logo_name[{{ $i }}]" class="field-input" value="{{ $logo['name'] ?? '' }}">
                        </div>

                        <div class="field-group">
                            <label class="field-label">CDN / URL del Logo (Opcional)</label>
                            <input type="text" name="logo_cdn[{{ $i }}]" class="field-input" value="{{ $logo['cdn'] ?? '' }}">
                        </div>

                        <div class="field-group" style="grid-column: span 2;">
                            <label class="field-label">Subir Logo local (Reemplaza el actual)</label>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                @php
                                    $lf = $logo['file'] ?? '';
                                    $lSrc = ($lf && !str_starts_with($lf, 'http')) ? asset('storage/' . $lf) : $lf;
                                @endphp
                                @if($lSrc)
                                    <img src="{{ $lSrc }}" alt="Tech logo" class="tech-logo-img" id="tech-img-{{ $i }}">
                                @endif
                                <input type="hidden" name="logo_existing[{{ $i }}]" value="{{ $lf }}">
                                <input type="file" name="logo_file_new[{{ $i }}]" accept="image/*">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn-add" onclick="addTech()"><i class="fas fa-plus"></i> Agregar tecnología</button>
            </div>
        </div>

        {{-- Proveedores Cloud (Solo si corresponde a Soluciones Cloud) --}}
        @if($item->data('cloud_servicios') !== null || str_contains(strtolower($item->data('title')), 'cloud'))
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-cloud" style="color:#7c3aed;font-size:13px"></i>
                <h3>Proveedores Cloud (Especificaciones)</h3>
                <span>Servicios de Google Cloud, Azure, AWS, Oracle</span>
            </div>
            <div class="form-card-body">
                <div id="cloud-list">
                    @foreach($item->data('cloud_servicios', []) as $i => $cloud)
                    <div class="tech-logo-row" id="cloud-row-{{ $i }}" style="grid-template-columns: 1fr;">
                        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px; margin-bottom: 8px;">
                            <strong>Proveedor Cloud #{{ $i + 1 }}</strong>
                            <button type="button" class="btn-remove" onclick="removeCloud({{ $i }})"><i class="fas fa-trash"></i></button>
                        </div>
                        
                        <div class="field-group">
                            <label class="field-label">Nombre del proveedor</label>
                            <input type="text" name="cloud_name[{{ $i }}]" class="field-input" value="{{ $cloud['nombre'] ?? '' }}">
                        </div>

                        <div class="field-group">
                            <label class="field-label">Lista de servicios (separados por coma)</label>
                            <input type="text" name="cloud_items[{{ $i }}]" class="field-input" value="{{ implode(', ', $cloud['items'] ?? []) }}" placeholder="Ej: Virtual Machine, SQL, DNS">
                        </div>

                        <div class="field-group">
                            <label class="field-label">Logo del proveedor</label>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                @php
                                    $cl = $cloud['logo'] ?? '';
                                    $clSrc = ($cl && !str_starts_with($cl, 'http')) ? asset('storage/' . $cl) : $cl;
                                @endphp
                                @if($clSrc)
                                    <img src="{{ $clSrc }}" alt="Cloud logo" class="tech-logo-img" id="cloud-img-{{ $i }}">
                                @endif
                                <input type="hidden" name="cloud_logo_existing[{{ $i }}]" value="{{ $cl }}">
                                <input type="file" name="cloud_logo_new[{{ $i }}]" accept="image/*">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button type="button" class="btn-add" onclick="addCloud()"><i class="fas fa-plus"></i> Agregar proveedor cloud</button>
            </div>
        </div>
        @endif
    </div>

    {{-- Columna lateral --}}
    <div>
        {{-- Imagen principal del servicio --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-image" style="color:#7c3aed;font-size:13px"></i>
                <h3>Imagen del servicio</h3>
            </div>
            <div class="form-card-body">
                <div style="margin-bottom:15px; text-align:center;">
                    @php
                        $mainImg = $item->data('image');
                        $mainSrc = ($mainImg && !str_starts_with($mainImg, 'http')) ? asset('storage/' . $mainImg) : $mainImg;
                    @endphp
                    @if($mainSrc)
                        <img src="{{ $mainSrc }}" alt="Servicio" style="width:100%; max-height:150px; object-fit:cover; border-radius:8px; border:1px solid #e2e8f0;" id="main-preview">
                    @else
                        <div style="height:150px; background:#f1f5f9; display:flex; align-items:center; justify-content:center; border-radius:8px; color:#cbd5e1; border:1px dashed #cbd5e1;" id="main-preview-placeholder">
                            <i class="fas fa-image" style="font-size:32px;"></i>
                        </div>
                    @endif
                </div>
                
                <input type="file" name="image" class="field-input" accept="image/*" onchange="previewMain(event)">
                @error('image')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Certificación STPS/REPSE --}}
        <div class="switch-card">
            <div class="switch-row">
                <div>
                    <h4 style="font-size: 13px; font-weight: 700; color: #0f172a; margin: 0 0 2px;">Servicio REPSE</h4>
                    <p style="font-size: 11.5px; color: #94a3b8; margin: 0;">¿Requiere regulación STPS especializada?</p>
                </div>
                <label class="switch">
                    <input
                        type="checkbox"
                        name="repse"
                        id="repse"
                        value="1"
                        {{ $item->data('repse') ? 'checked' : '' }}
                    >
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#7c3aed;margin-right:5px"></i> Los cambios se guardarán y aplicarán inmediatamente.</p>
    <button type="submit" class="btn-save">
        <i class="fas fa-save"></i> Guardar cambios
    </button>
</div>

</form>

<script>
    let bulletIdx = {{ count($item->data('bullets', [])) }};
    let techIdx = {{ count($item->data('logos', [])) }};
    let cloudIdx = {{ count($item->data('cloud_servicios', [])) }};

    function addBullet() {
        const div = document.createElement('div');
        div.className = 'item-row';
        div.id = `bullet-row-${bulletIdx}`;
        div.innerHTML = `
            <input type="text" name="bullets[]" class="field-input" value="">
            <button type="button" class="btn-remove" onclick="removeBullet(${bulletIdx})"><i class="fas fa-times"></i></button>
        `;
        document.getElementById('bullets-list').appendChild(div);
        bulletIdx++;
    }

    function removeBullet(idx) {
        const el = document.getElementById(`bullet-row-${idx}`);
        if(el) el.remove();
    }

    function addTech() {
        const div = document.createElement('div');
        div.className = 'tech-logo-row';
        div.id = `tech-row-${techIdx}`;
        div.innerHTML = `
            <div style="grid-column: span 2; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px; margin-bottom: 8px;">
                <strong>Tecnología #${techIdx + 1}</strong>
                <button type="button" class="btn-remove" onclick="removeTech(${techIdx})"><i class="fas fa-trash"></i></button>
            </div>
            <div class="field-group">
                <label class="field-label">Nombre</label>
                <input type="text" name="logo_name[${techIdx}]" class="field-input">
            </div>
            <div class="field-group">
                <label class="field-label">CDN / URL del Logo (Opcional)</label>
                <input type="text" name="logo_cdn[${techIdx}]" class="field-input">
            </div>
            <div class="field-group" style="grid-column: span 2;">
                <label class="field-label">Subir Logo local</label>
                <input type="file" name="logo_file_new[${techIdx}]" accept="image/*">
            </div>
        `;
        document.getElementById('tech-list').appendChild(div);
        techIdx++;
    }

    function removeTech(idx) {
        const el = document.getElementById(`tech-row-${idx}`);
        if(el) el.remove();
    }

    function addCloud() {
        const div = document.createElement('div');
        div.className = 'tech-logo-row';
        div.id = `cloud-row-${cloudIdx}`;
        div.style.gridTemplateColumns = '1fr';
        div.innerHTML = `
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px; margin-bottom: 8px;">
                <strong>Proveedor Cloud #${cloudIdx + 1}</strong>
                <button type="button" class="btn-remove" onclick="removeCloud(${cloudIdx})"><i class="fas fa-trash"></i></button>
            </div>
            <div class="field-group">
                <label class="field-label">Nombre del proveedor</label>
                <input type="text" name="cloud_name[${cloudIdx}]" class="field-input">
            </div>
            <div class="field-group">
                <label class="field-label">Lista de servicios (separados por coma)</label>
                <input type="text" name="cloud_items[${cloudIdx}]" class="field-input" placeholder="Ej: Virtual Machine, SQL, DNS">
            </div>
            <div class="field-group">
                <label class="field-label">Logo del proveedor</label>
                <input type="file" name="cloud_logo_new[${cloudIdx}]" accept="image/*">
            </div>
        `;
        document.getElementById('cloud-list').appendChild(div);
        cloudIdx++;
    }

    function removeCloud(idx) {
        const el = document.getElementById(`cloud-row-${idx}`);
        if(el) el.remove();
    }

    function previewMain(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const preview = document.getElementById('main-preview');
            if (preview) {
                preview.src = e.target.result;
            } else {
                const holder = document.getElementById('main-preview-placeholder');
                if (holder) {
                    holder.outerHTML = `<img src="${e.target.result}" alt="Servicio" style="width:100%; max-height:150px; object-fit:cover; border-radius:8px; border:1px solid #e2e8f0;" id="main-preview">`;
                }
            }
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection
