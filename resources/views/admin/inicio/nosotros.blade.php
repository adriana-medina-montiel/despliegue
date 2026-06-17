@extends('layouts.admin')
@section('title', 'Nosotros — Inicio')
@section('breadcrumb', 'Página principal › Sección Nosotros')

@section('content')
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:#f5f3ff;color:#7c3aed;display:flex;align-items:center;justify-content:center;font-size:18px; }
    .fph-text h2 { font-size:19px;font-weight:700;color:#0f172a;margin:0 0 2px; }
    .fph-text p  { font-size:12px;color:#94a3b8;margin:0; }
    .fph-back { margin-left:auto;display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;color:#475569;background:#f1f5f9;border:1px solid #e2e8f0;text-decoration:none;transition:all .15s; }
    .fph-back:hover { background:#e2e8f0; }

    .alert-success { display:flex;align-items:center;gap:10px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:13px 18px;margin-bottom:22px;font-size:13.5px;font-weight:500;color:#15803d; }

    .editor-layout { display:grid;grid-template-columns:1fr 340px;gap:22px;align-items:start; }

    .form-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:18px; }
    .form-card-header { padding:16px 22px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:10px; }
    .form-card-header h3 { font-size:14px;font-weight:700;color:#0f172a;margin:0; }
    .form-card-body { padding:22px; }

    .field-group { margin-bottom:20px; }
    .field-label { display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:5px; }
    .field-hint  { font-size:11px;color:#9ca3af;margin-bottom:6px;display:block; }
    .field-input { width:100%;padding:10px 13px;border-radius:8px;border:1px solid #d1d5db;font-size:13.5px;color:#1e293b;transition:border-color .15s,box-shadow .15s;background:#fafafa;outline:none; }
    .field-input:focus { border-color:#7c3aed;box-shadow:0 0 0 3px rgba(124,58,237,.08);background:white; }
    textarea.field-input { resize:vertical;min-height:140px;line-height:1.55; }

    .upload-area { border: 2px dashed #d1d5db; border-radius: 10px; padding: 20px; text-align: center; cursor: pointer; transition: all 0.15s; background: #fafafa; }
    .upload-area:hover { border-color: #7c3aed; background: #f5f3ff; }
    .upload-area input[type="file"] { display: none; }
    .upload-area i { font-size: 22px; color: #cbd5e1; margin-bottom: 8px; display: block; }
    .upload-area p { font-size: 12px; color: #94a3b8; margin: 0; }

    .visibility-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .visibility-card-top { height:4px;background:linear-gradient(90deg,#7c3aed,#9f64f5); }
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
    .switch input:checked + .slider { background:#7c3aed; }
    .switch input:checked + .slider::before { transform:translateX(22px); }

    .preview-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden; }
    .preview-card-header { padding:13px 18px;border-bottom:1px solid #f1f5f9;font-size:13px;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:8px; }
    .preview-img-wrap { position:relative; height:200px; overflow:hidden; background:#f1f5f9; }
    .preview-img-wrap img { width:100%; height:100%; object-fit:cover; }

    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:#7c3aed;color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-info-circle"></i></div>
    <div class="fph-text">
        <h2>Sección Nosotros (Somos Diferentes)</h2>
        <p>Título, descripción e imagen para la sección corporativa de la página de inicio</p>
    </div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Inicio
    </a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.inicio.nosotros.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-font" style="color:#7c3aed;font-size:13px"></i>
                <h3>Textos de la Sección</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}" maxlength="100">
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Título de sección</label>
                    <input type="text" id="title" name="title" class="field-input"
                        value="{{ old('title', $section->content('title')) }}" maxlength="255">
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Descripción / Cuerpo de texto</label>
                    <span class="field-hint">Admite etiquetas HTML básicas como &lt;strong&gt; para resaltar texto.</span>
                    <textarea id="description" name="description" class="field-input"
                        maxlength="2000">{{ old('description', $section->content('description')) }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-image" style="color:#7c3aed;font-size:13px"></i>
                <h3>Imagen Lateral</h3>
            </div>
            <div class="form-card-body">
                <div class="upload-area" onclick="document.getElementById('image-upload').click()">
                    <input type="file" id="image-upload" name="image" accept="image/*" onchange="previewImg(event)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p><strong>Clic para subir imagen</strong> o arrastrar aquí</p>
                </div>
                <span class="field-hint">Tamaño máximo: 2MB (JPG, PNG o WebP).</span>
                <p id="image-size-error" style="display:none;color:#ef4444;font-size:12px;margin-top:8px"></p>
                @error('image')<p style="color:#ef4444;font-size:12px;margin-top:8px">{{ $message }}</p>@enderror
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
            <div class="preview-card-header"><i class="fas fa-eye"></i> Imagen actual</div>
            <div class="preview-img-wrap">
                @php $src = cms_asset($section->content('image')); @endphp
                <img id="preview-pic" src="{{ $src }}" alt="Preview">
            </div>
        </div>
    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#7c3aed;margin-right:5px"></i> Los cambios se aplican inmediatamente.</p>
    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
</div>

</form>

<script>
    const MAX_IMAGE_BYTES = 2 * 1024 * 1024;

    function previewImg(event) {
        const input = event.target;
        const file = input.files[0];
        const errorEl = document.getElementById('image-size-error');
        if (!file) return;

        if (file.size > MAX_IMAGE_BYTES) {
            errorEl.textContent = 'La imagen pesa ' + (file.size / 1024 / 1024).toFixed(1) + 'MB. El máximo permitido es 2MB, por favor comprime o redimensiona la imagen.';
            errorEl.style.display = 'block';
            input.value = '';
            return;
        }
        errorEl.style.display = 'none';

        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('preview-pic').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    function updateVisLabel(checkbox) {
        document.getElementById('vis-label').textContent = checkbox.checked ? 'Sí' : 'No';
    }
</script>
@endsection
