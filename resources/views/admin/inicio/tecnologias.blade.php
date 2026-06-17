@extends('layouts.admin')
@section('title', 'Tecnologías — Inicio')
@section('breadcrumb', 'Página principal › Stack Tecnológico')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#7c3aed'])
<style>
    .tech-list { display:flex;flex-direction:column;gap:8px; }
    .tech-row {
        display:flex;align-items:center;gap:10px;
        background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:10px 12px;
        transition:border-color .15s;
    }
    .tech-row:hover { border-color:#c4b5fd; }
    .tech-preview {
        width:40px;height:40px;flex-shrink:0;border-radius:8px;
        background:white;border:1px solid #e2e8f0;
        display:flex;align-items:center;justify-content:center;overflow:hidden;
    }
    .tech-preview img { width:28px;height:28px;object-fit:contain; }
    .tech-fields { flex:1;display:flex;gap:8px;align-items:center;min-width:0; }
    .tech-name { width:160px;flex-shrink:0; }
    .tech-logo-wrap { flex:1;display:flex;gap:6px;align-items:center;min-width:0; }
    .tech-logo-url { flex:1;font-size:12px; }
    .tech-upload-label {
        flex-shrink:0;display:inline-flex;align-items:center;justify-content:center;
        width:32px;height:36px;border-radius:7px;border:1px solid #d1d5db;
        background:white;cursor:pointer;color:#64748b;transition:border-color .15s,color .15s;
        font-size:12px;
    }
    .tech-upload-label:hover { border-color:#7c3aed;color:#7c3aed; }
    .tech-remove {
        flex-shrink:0;width:30px;height:30px;border-radius:7px;border:none;
        background:#fef2f2;color:#ef4444;cursor:pointer;display:flex;align-items:center;justify-content:center;
        font-size:12px;transition:background .15s;
    }
    .tech-remove:hover { background:#fee2e2; }

    .tech-counter { font-size:12px;font-weight:600;color:#7c3aed;margin-left:auto; }
    .tech-counter.warn { color:#ef4444; }

    .btn-add-tech {
        display:inline-flex;align-items:center;gap:7px;padding:9px 18px;
        border-radius:8px;border:1.5px dashed #c4b5fd;background:transparent;
        color:#7c3aed;font-size:13px;font-weight:600;cursor:pointer;
        transition:background .15s,border-color .15s;margin-top:10px;width:100%;justify-content:center;
    }
    .btn-add-tech:hover { background:#f5f3ff;border-color:#7c3aed; }
</style>

<div class="form-page-header">
    <div class="fph-icon" style="background:#f5f3ff;color:#7c3aed"><i class="fas fa-microchip"></i></div>
    <div class="fph-text"><h2>Stack Tecnológico</h2><p>Textos, cita y lista de tecnologías (hasta 50)</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.tecnologias.update') }}" method="POST" enctype="multipart/form-data" id="tech-form">
@csrf
<div class="editor-layout">
    <div>
        {{-- Textos --}}
        <div class="form-card">
            <div class="form-card-header" style="color:#7c3aed"><i class="fas fa-font" style="color:#7c3aed;font-size:13px"></i><h3>Textos de la sección</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker', 'Stack tecnológico')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title', 'Somos especialistas')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description', 'Nuestro equipo trabaja con las tecnologías más relevantes del mercado, manteniéndose en constante actualización.')) }}</textarea></div>
                <div class="field-group"><label class="field-label">Cita (quote)</label><input type="text" name="quote" class="field-input" value="{{ old('quote', $section->content('quote')) }}" placeholder="Ej: "Siempre aprendiendo, siempre evolucionando.""></div>
            </div>
        </div>

        {{-- Tecnologías --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-layer-group" style="color:#7c3aed;font-size:13px"></i>
                <h3>Tecnologías</h3>
                <span class="tech-counter" id="tech-counter">{{ $items->count() }}/50</span>
            </div>
            <div class="form-card-body">
                <div class="field-hint" style="margin-bottom:14px">
                    Cada tecnología tiene un nombre y un logo. Puedes usar una URL del logo (CDN SimpleIcons u otro) o subir una imagen propia.
                    Para SimpleIcons: <code style="font-size:11px;background:#f1f5f9;padding:1px 5px;border-radius:4px">https://cdn.simpleicons.org/SLUG</code>
                </div>

                <div class="tech-list" id="tech-list">
                    @foreach($items as $idx => $item)
                    @php $logo = $item->data('logo', ''); @endphp
                    <div class="tech-row">
                        <div class="tech-preview">
                            <img src="{{ str_starts_with($logo, 'http') ? $logo : cms_asset($logo) }}"
                                 alt="" onerror="this.style.opacity=0.15" loading="lazy">
                        </div>
                        <div class="tech-fields">
                            <input type="text" name="tech_name[]" class="field-input tech-name"
                                value="{{ $item->data('name') }}" placeholder="Nombre" maxlength="80">
                            <div class="tech-logo-wrap">
                                <input type="text" name="tech_logo[]" class="field-input tech-logo-url"
                                    value="{{ $logo }}" placeholder="https://cdn.simpleicons.org/slug"
                                    oninput="updatePreview(this)">
                                <label class="tech-upload-label" title="Subir imagen propia">
                                    <i class="fas fa-upload"></i>
                                    <input type="file" name="tech_file[]" accept="image/*" style="display:none" onchange="handleUpload(this)">
                                </label>
                            </div>
                        </div>
                        <button type="button" class="tech-remove" onclick="removeTech(this)" title="Eliminar">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>

                <button type="button" class="btn-add-tech" id="add-tech-btn" onclick="addTech()">
                    <i class="fas fa-plus"></i> Agregar tecnología
                </button>
            </div>
        </div>
    </div>

    <div>@include('admin.inicio.partials.visibility')</div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#7c3aed;margin-right:5px"></i> Los cambios se aplican inmediatamente.</p>
    <button type="submit" class="btn-save" style="background:#7c3aed"><i class="fas fa-save"></i> Guardar cambios</button>
</div>
</form>

<script>
const MAX = 50;

function updateCounter() {
    const rows = document.querySelectorAll('#tech-list .tech-row');
    const counter = document.getElementById('tech-counter');
    counter.textContent = rows.length + '/' + MAX;
    counter.classList.toggle('warn', rows.length >= MAX);
    document.getElementById('add-tech-btn').disabled = rows.length >= MAX;
}

function updatePreview(input) {
    const row = input.closest('.tech-row');
    const img = row.querySelector('.tech-preview img');
    const url = input.value.trim();
    img.src = url || '';
    img.style.opacity = url ? '1' : '0.15';
}

function handleUpload(input) {
    if (!input.files || !input.files[0]) return;
    const row = input.closest('.tech-row');
    const img = row.querySelector('.tech-preview img');
    const urlInput = row.querySelector('.tech-logo-url');
    const reader = new FileReader();
    reader.onload = e => {
        img.src = e.target.result;
        img.style.opacity = '1';
        urlInput.value = '';
        urlInput.placeholder = '(imagen subida)';
    };
    reader.readAsDataURL(input.files[0]);
}

function removeTech(btn) {
    btn.closest('.tech-row').remove();
    updateCounter();
}

function addTech() {
    const list = document.getElementById('tech-list');
    if (list.querySelectorAll('.tech-row').length >= MAX) return;

    const row = document.createElement('div');
    row.className = 'tech-row';
    row.innerHTML = `
        <div class="tech-preview">
            <img src="" alt="" style="opacity:0.15" width="28" height="28">
        </div>
        <div class="tech-fields">
            <input type="text" name="tech_name[]" class="field-input tech-name" placeholder="Nombre" maxlength="80">
            <div class="tech-logo-wrap">
                <input type="text" name="tech_logo[]" class="field-input tech-logo-url"
                    placeholder="https://cdn.simpleicons.org/slug" oninput="updatePreview(this)">
                <label class="tech-upload-label" title="Subir imagen propia">
                    <i class="fas fa-upload"></i>
                    <input type="file" name="tech_file[]" accept="image/*" style="display:none" onchange="handleUpload(this)">
                </label>
            </div>
        </div>
        <button type="button" class="tech-remove" onclick="removeTech(this)" title="Eliminar">
            <i class="fas fa-times"></i>
        </button>`;
    list.appendChild(row);
    row.querySelector('input[name="tech_name[]"]').focus();
    updateCounter();
}

updateCounter();
</script>
@endsection
