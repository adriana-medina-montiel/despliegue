@extends('layouts.admin')
@section('title', 'Por qué elegirnos — Conócenos')
@section('breadcrumb', 'Conócenos › Por qué elegirnos')

@section('content')
<style>
    .form-page-header {
        display: flex; align-items: center; gap: 14px;
        margin-bottom: 28px; padding-bottom: 20px; border-bottom: 1px solid #e2e8f0;
    }
    .fph-icon { width: 46px; height: 46px; border-radius: 12px; background: #f5f3ff; color: #7c3aed; display: flex; align-items: center; justify-content: center; font-size: 18px; }
    .fph-text h2 { font-size: 19px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .fph-text p  { font-size: 12px; color: #94a3b8; margin: 0; }
    .fph-back { margin-left: auto; display: inline-flex; align-items: center; gap: 7px; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #475569; background: #f1f5f9; border: 1px solid #e2e8f0; text-decoration: none; transition: all 0.15s; }
    .fph-back:hover { background: #e2e8f0; }

    .alert-success { display: flex; align-items: center; gap: 10px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 10px; padding: 13px 18px; margin-bottom: 22px; font-size: 13.5px; font-weight: 500; color: #15803d; }

    .editor-layout { display: grid; grid-template-columns: 1fr 320px; gap: 22px; align-items: start; }

    .form-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; margin-bottom: 18px; }
    .form-card:last-child { margin-bottom: 0; }
    .form-card-header { padding: 16px 22px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
    .form-card-header h3 { font-size: 14px; font-weight: 700; color: #0f172a; margin: 0; }
    .form-card-header span { font-size: 11px; color: #94a3b8; margin-left: auto; }
    .form-card-body { padding: 22px; }

    .field-group { margin-bottom: 20px; }
    .field-group:last-child { margin-bottom: 0; }
    .field-label { display: block; font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 5px; }
    .field-hint { font-size: 11px; color: #9ca3af; margin-bottom: 6px; display: block; }
    .field-input { width: 100%; padding: 10px 13px; border-radius: 8px; border: 1px solid #d1d5db; font-size: 13.5px; color: #1e293b; transition: border-color 0.15s, box-shadow 0.15s; background: #fafafa; outline: none; }
    .field-input:focus { border-color: #7c3aed; box-shadow: 0 0 0 3px rgba(124,58,237,0.08); background: white; }
    textarea.field-input { resize: vertical; min-height: 88px; line-height: 1.55; }
    .field-counter { font-size: 11px; color: #cbd5e1; text-align: right; margin-top: 3px; }

    /* Image upload pair */
    .img-upload-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .img-upload-slot { display: flex; flex-direction: column; gap: 10px; }
    .img-upload-slot label.field-label { margin-bottom: 0; }
    .upload-area { border: 2px dashed #d1d5db; border-radius: 10px; padding: 16px 12px; text-align: center; cursor: pointer; transition: all 0.15s; background: #fafafa; }
    .upload-area:hover { border-color: #7c3aed; background: #faf5ff; }
    .upload-area input[type="file"] { display: none; }
    .upload-area i { font-size: 20px; color: #cbd5e1; margin-bottom: 6px; display: block; }
    .upload-area p { font-size: 11.5px; color: #94a3b8; margin: 0; }
    .img-current { width: 100%; height: 90px; object-fit: contain; border-radius: 8px; border: 1px solid #f1f5f9; background: #f8fafc; padding: 6px; }

    /* Visibility */
    .visibility-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; margin-bottom: 16px; }
    .visibility-card-top { height: 4px; background: linear-gradient(90deg, #7c3aed, #9f64f5); }
    .visibility-body { padding: 18px 20px; }
    .visibility-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; }
    .visibility-info h4 { font-size: 13px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .visibility-info p  { font-size: 11.5px; color: #94a3b8; margin: 0; }
    .toggle-wrap { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }
    .toggle-label { font-size: 12px; font-weight: 600; color: #64748b; min-width: 24px; text-align: right; }
    .switch { position: relative; display: inline-block; width: 48px; height: 26px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background: #e2e8f0; border-radius: 26px; transition: background 0.2s; }
    .slider::before { position: absolute; content: ""; height: 20px; width: 20px; left: 3px; bottom: 3px; background: white; border-radius: 50%; transition: transform 0.2s; box-shadow: 0 1px 4px rgba(0,0,0,0.18); }
    .switch input:checked + .slider { background: #7c3aed; }
    .switch input:checked + .slider::before { transform: translateX(22px); }

    /* Preview card */
    .preview-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; }
    .preview-card-header { padding: 13px 18px; border-bottom: 1px solid #f1f5f9; font-size: 13px; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px; }
    .preview-card-header i { color: #7c3aed; font-size: 12px; }
    .preview-body-content { padding: 18px; }
    .prev-badge-text { font-size: 9px; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase; color: #7c3aed; margin-bottom: 4px; }
    .prev-main-title { font-size: 14px; font-weight: 800; color: #0f172a; line-height: 1.25; margin-bottom: 6px; }
    .prev-header-desc { font-size: 11px; color: #64748b; line-height: 1.5; margin-bottom: 12px; }
    .prev-images-row { display: flex; gap: 8px; margin-bottom: 10px; }
    .prev-images-row img { width: 50%; height: 70px; object-fit: contain; border-radius: 6px; background: #f8fafc; border: 1px solid #f1f5f9; padding: 4px; }
    .prev-body-text { font-size: 10.5px; color: #64748b; line-height: 1.5; }
    .prev-caption { font-size: 10px; color: #7c3aed; text-align: center; margin-top: 3px; }

    /* Save bar */
    .save-bar { background: white; border: 1px solid #e2e8f0; border-radius: 14px; padding: 18px 24px; display: flex; align-items: center; justify-content: space-between; margin-top: 20px; }
    .save-bar p { font-size: 12px; color: #94a3b8; margin: 0; }
    .btn-save { display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px; border-radius: 9px; background: #7c3aed; color: white; font-size: 13.5px; font-weight: 700; border: none; cursor: pointer; transition: filter 0.15s, transform 0.1s; }
    .btn-save:hover { filter: brightness(1.12); transform: translateY(-1px); }
    .btn-save:active { transform: translateY(0); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-star"></i></div>
    <div class="fph-text">
        <h2>Por qué elegirnos</h2>
        <p>Sección de diferenciadores de Softura Solutions</p>
    </div>
    <a href="{{ route('admin.pages.conocenos') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Conócenos
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.conocenos.differentiators.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>

        {{-- Textos del encabezado --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-heading" style="color:#7c3aed;font-size:13px"></i>
                <h3>Encabezado de sección</h3>
                <span>Título y texto introductorio</span>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <span class="field-hint">Texto pequeño en mayúsculas. Ej: "Por qué elegirnos"</span>
                    <input type="text" id="badge_text" name="badge_text" class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}"
                        maxlength="80" oninput="syncPreview()" placeholder="Por qué elegirnos">
                    <div class="field-counter"><span id="c-badge">{{ strlen($section->content('badge_text','')) }}</span>/80</div>
                    @error('badge_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
                <div class="field-group">
                    <label class="field-label" for="title">Título principal</label>
                    <input type="text" id="title" name="title" class="field-input"
                        value="{{ old('title', $section->content('title')) }}"
                        maxlength="200" oninput="syncPreview()" placeholder="¡Te brindamos más que los demás!">
                    <div class="field-counter"><span id="c-title">{{ strlen($section->content('title','')) }}</span>/200</div>
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
                <div class="field-group">
                    <label class="field-label" for="header_description">Descripción del encabezado</label>
                    <span class="field-hint">Texto corto que aparece debajo del título principal.</span>
                    <textarea id="header_description" name="header_description" class="field-input"
                        maxlength="400" oninput="syncPreview()"
                        placeholder="Complementamos el servicio de software...">{{ old('header_description', $section->content('header_description')) }}</textarea>
                    <div class="field-counter"><span id="c-hdesc">{{ strlen($section->content('header_description','')) }}</span>/400</div>
                    @error('header_description')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Contenido izquierdo --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-align-left" style="color:#7c3aed;font-size:13px"></i>
                <h3>Contenido izquierdo</h3>
                <span>Imagen medalla + párrafo</span>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Imagen (medalla / insignia)</label>
                    <span class="field-hint">Imagen decorativa del lado izquierdo. Actual:</span>
                    @php $medalImg = $section->content('medal_image',''); $medalSrc = ($medalImg && !str_starts_with($medalImg,'http')) ? asset('storage/'.$medalImg) : $medalImg; @endphp
                    @if($medalSrc)
                        <img id="prev-medal-img" src="{{ $medalSrc }}" class="img-current" style="margin-bottom:10px">
                    @endif
                    <div class="upload-area" onclick="document.getElementById('medal-upload').click()">
                        <input type="file" id="medal-upload" name="medal_image" accept="image/*" onchange="previewImg(event,'prev-medal-img','prev-medal-mini')">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p><strong>Clic para cambiar imagen</strong></p>
                    </div>
                    @error('medal_image')<p style="color:#ef4444;font-size:12px;margin-top:6px">{{ $message }}</p>@enderror
                </div>
                <div class="field-group">
                    <label class="field-label" for="body_text">Texto del cuerpo</label>
                    <span class="field-hint">Párrafo que aparece debajo de la imagen izquierda.</span>
                    <textarea id="body_text" name="body_text" class="field-input"
                        maxlength="600" oninput="syncPreview()"
                        placeholder="En Softura Solutions nos esforzamos...">{{ old('body_text', $section->content('body_text')) }}</textarea>
                    <div class="field-counter"><span id="c-body">{{ strlen($section->content('body_text','')) }}</span>/600</div>
                    @error('body_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Contenido derecho --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-circle-notch" style="color:#7c3aed;font-size:13px"></i>
                <h3>Diagrama / imagen derecha</h3>
                <span>Imagen circular de diferenciadores</span>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label">Imagen del diagrama</label>
                    <span class="field-hint">Imagen del diagrama circular. Actual:</span>
                    @php $diagImg = $section->content('diagram_image',''); $diagSrc = ($diagImg && !str_starts_with($diagImg,'http')) ? asset('storage/'.$diagImg) : $diagImg; @endphp
                    @if($diagSrc)
                        <img id="prev-diag-img" src="{{ $diagSrc }}" class="img-current" style="margin-bottom:10px">
                    @endif
                    <div class="upload-area" onclick="document.getElementById('diagram-upload').click()">
                        <input type="file" id="diagram-upload" name="diagram_image" accept="image/*" onchange="previewImg(event,'prev-diag-img','prev-diag-mini')">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p><strong>Clic para cambiar imagen</strong></p>
                    </div>
                    @error('diagram_image')<p style="color:#ef4444;font-size:12px;margin-top:6px">{{ $message }}</p>@enderror
                </div>
                <div class="field-group">
                    <label class="field-label" for="diagram_caption">Pie de imagen</label>
                    <span class="field-hint">Texto que aparece debajo del diagrama.</span>
                    <input type="text" id="diagram_caption" name="diagram_caption" class="field-input"
                        value="{{ old('diagram_caption', $section->content('diagram_caption')) }}"
                        maxlength="80" oninput="syncPreview()" placeholder="Los detalles de valor">
                    <div class="field-counter"><span id="c-caption">{{ strlen($section->content('diagram_caption','')) }}</span>/80</div>
                    @error('diagram_caption')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
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
                        <p>Muestra u oculta esta sección en el sitio.</p>
                    </div>
                    <div class="toggle-wrap">
                        <span class="toggle-label" id="vis-label">{{ $section->is_visible ? 'Sí' : 'No' }}</span>
                        <label class="switch">
                            <input type="checkbox" name="is_visible" id="is_visible"
                                {{ $section->is_visible ? 'checked' : '' }}
                                onchange="updateVisLabel(this)">
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

        {{-- Vista previa --}}
        <div class="preview-card">
            <div class="preview-card-header">
                <i class="fas fa-eye"></i> Vista previa
            </div>
            <div class="preview-body-content">
                <div class="prev-badge-text" id="prev-badge">{{ $section->content('badge_text') }}</div>
                <div class="prev-main-title" id="prev-title">{{ $section->content('title') }}</div>
                <div class="prev-header-desc" id="prev-hdesc">{{ $section->content('header_description') }}</div>
                <div class="prev-images-row">
                    <div style="text-align:center;width:50%">
                        <img id="prev-medal-mini" src="{{ $medalSrc }}" style="width:100%;height:60px;object-fit:contain">
                    </div>
                    <div style="text-align:center;width:50%">
                        <img id="prev-diag-mini" src="{{ $diagSrc }}" style="width:100%;height:60px;object-fit:contain">
                        <div class="prev-caption" id="prev-caption">{{ $section->content('diagram_caption') }}</div>
                    </div>
                </div>
                <div class="prev-body-text" id="prev-body">{{ $section->content('body_text') }}</div>
            </div>
        </div>

    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#7c3aed;margin-right:5px"></i> Los cambios se aplican inmediatamente en el sitio.</p>
    <button type="submit" class="btn-save">
        <i class="fas fa-save"></i> Guardar cambios
    </button>
</div>

</form>

<script>
    function syncPreview() {
        const fields = {
            'badge_text':         ['prev-badge',  'c-badge',  80],
            'title':              ['prev-title',  'c-title',  200],
            'header_description': ['prev-hdesc',  'c-hdesc',  400],
            'body_text':          ['prev-body',   'c-body',   600],
            'diagram_caption':    ['prev-caption','c-caption',80],
        };
        for (const [id, [previewId, countId]] of Object.entries(fields)) {
            const el = document.getElementById(id);
            if (!el) continue;
            const val = el.value;
            const prev = document.getElementById(previewId);
            const cnt  = document.getElementById(countId);
            if (prev) prev.textContent = val;
            if (cnt)  cnt.textContent  = val.length;
        }
    }

    function previewImg(event, mainId, miniId) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const main = document.getElementById(mainId);
            const mini = document.getElementById(miniId);
            if (main) main.src = e.target.result;
            if (mini) mini.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    function updateVisLabel(checkbox) {
        document.getElementById('vis-label').textContent      = checkbox.checked ? 'Sí' : 'No';
        document.getElementById('vis-status').style.color     = checkbox.checked ? '#16a34a' : '#94a3b8';
        document.getElementById('vis-status-text').textContent = checkbox.checked ? 'Visible en el sitio' : 'Oculto en el sitio';
    }
</script>
@endsection
