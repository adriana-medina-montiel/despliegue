@extends('layouts.admin')
@section('title', 'Soporte 360° — Conócenos')
@section('breadcrumb', 'Conócenos › Soporte 360°')

@section('content')
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:#fff7ed;color:#ea580c;display:flex;align-items:center;justify-content:center;font-size:18px; }
    .fph-text h2 { font-size:19px;font-weight:700;color:#0f172a;margin:0 0 2px; }
    .fph-text p  { font-size:12px;color:#94a3b8;margin:0; }
    .fph-back { margin-left:auto;display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;color:#475569;background:#f1f5f9;border:1px solid #e2e8f0;text-decoration:none;transition:all .15s; }
    .fph-back:hover { background:#e2e8f0; }

    .alert-success { display:flex;align-items:center;gap:10px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:13px 18px;margin-bottom:22px;font-size:13.5px;font-weight:500;color:#15803d; }

    .editor-layout { display:grid;grid-template-columns:1fr 300px;gap:22px;align-items:start; }

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
    .field-input:focus { border-color:#ea580c;box-shadow:0 0 0 3px rgba(234,88,12,.08);background:white; }
    textarea.field-input { resize:vertical;min-height:78px;line-height:1.55; }
    .field-counter { font-size:11px;color:#cbd5e1;text-align:right;margin-top:3px; }

    .upload-area { border:2px dashed #d1d5db;border-radius:10px;padding:16px 12px;text-align:center;cursor:pointer;transition:all .15s;background:#fafafa; }
    .upload-area:hover { border-color:#ea580c;background:#fff7ed; }
    .upload-area input[type="file"] { display:none; }
    .upload-area i { font-size:20px;color:#cbd5e1;margin-bottom:6px;display:block; }
    .upload-area p { font-size:11.5px;color:#94a3b8;margin:0; }
    .img-current { width:100%;height:110px;object-fit:cover;border-radius:8px;border:1px solid #f1f5f9;margin-bottom:10px; }

    /* ── Timeline items ── */
    .timeline-header { display:flex;align-items:center;justify-content:space-between;margin-bottom:14px; }
    .timeline-counter { font-size:12px;color:#94a3b8;font-weight:600; }
    .timeline-counter span { color:#ea580c;font-weight:800; }

    .timeline-list { display:flex;flex-direction:column;gap:10px;margin-bottom:14px; }

    .step-row {
        display:flex;align-items:flex-start;gap:12px;
        background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;
        padding:14px;position:relative;
        transition:box-shadow .15s;
    }
    .step-row:hover { box-shadow:0 3px 12px rgba(15,23,42,.06); }

    .step-dot-col { display:flex;flex-direction:column;align-items:center;gap:4px;padding-top:2px;flex-shrink:0; }
    .step-dot { width:14px;height:14px;border-radius:50%;background:#ea580c;flex-shrink:0; }
    .step-num { font-size:9px;font-weight:800;color:#ea580c; }

    .step-inputs { flex:1;display:flex;flex-direction:column;gap:8px; }
    .step-input-title {
        width:100%;padding:8px 11px;border-radius:7px;
        border:1px solid #e2e8f0;font-size:13px;font-weight:700;
        color:#0f172a;background:white;outline:none;transition:border-color .15s;
    }
    .step-input-title:focus { border-color:#ea580c;box-shadow:0 0 0 2px rgba(234,88,12,.08); }
    .step-input-desc {
        width:100%;padding:7px 11px;border-radius:7px;
        border:1px solid #e2e8f0;font-size:12px;
        color:#475569;background:white;outline:none;transition:border-color .15s;
        resize:none;min-height:52px;line-height:1.5;
    }
    .step-input-desc:focus { border-color:#ea580c;box-shadow:0 0 0 2px rgba(234,88,12,.08); }

    .step-remove {
        width:22px;height:22px;border-radius:50%;background:#fee2e2;color:#ef4444;
        border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;
        font-size:10px;flex-shrink:0;margin-top:2px;transition:background .15s;
    }
    .step-remove:hover { background:#fca5a5; }

    .btn-add-step {
        width:100%;padding:10px;border-radius:9px;border:2px dashed #d1d5db;background:#f8fafc;
        font-size:13px;font-weight:600;color:#94a3b8;cursor:pointer;transition:all .15s;
        display:flex;align-items:center;justify-content:center;gap:8px;
    }
    .btn-add-step:hover:not(:disabled) { border-color:#ea580c;color:#ea580c;background:#fff7ed; }
    .btn-add-step:disabled { opacity:.4;cursor:not-allowed; }

    /* Visibility */
    .visibility-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .visibility-card-top { height:4px;background:linear-gradient(90deg,#ea580c,#fb923c); }
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
    .switch input:checked + .slider { background:#ea580c; }
    .switch input:checked + .slider::before { transform:translateX(22px); }

    /* Preview */
    .preview-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden; }
    .preview-card-header { padding:13px 18px;border-bottom:1px solid #f1f5f9;font-size:13px;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:8px; }
    .preview-card-header i { color:#ea580c;font-size:12px; }
    .prev-body { padding:16px 18px; }
    .prev-badge { font-size:9px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#ea580c;margin-bottom:4px; }
    .prev-title { font-size:13px;font-weight:800;color:#0f172a;margin-bottom:5px;line-height:1.3; }
    .prev-desc  { font-size:10px;color:#64748b;line-height:1.5;margin-bottom:12px; }
    .prev-img-wrap { width:100%;height:80px;border-radius:8px;overflow:hidden;margin-bottom:12px;background:#f1f5f9; }
    .prev-img-wrap img { width:100%;height:100%;object-fit:cover; }
    .prev-steps { display:flex;flex-direction:column;gap:6px; }
    .prev-step { display:flex;align-items:flex-start;gap:7px; }
    .prev-step-dot { width:8px;height:8px;border-radius:50%;background:#ea580c;flex-shrink:0;margin-top:3px; }
    .prev-step-text strong { display:block;font-size:10px;font-weight:700;color:#1e293b; }
    .prev-step-text span   { font-size:9px;color:#94a3b8; }

    /* Save bar */
    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:#ea580c;color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-headset"></i></div>
    <div class="fph-text">
        <h2>Soporte 360°</h2>
        <p>Textos, imagen lateral y línea de tiempo (máx. 5 pasos)</p>
    </div>
    <a href="{{ route('admin.pages.conocenos') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Conócenos
    </a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.conocenos.support.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>

        {{-- Textos --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-heading" style="color:#ea580c;font-size:13px"></i>
                <h3>Encabezado de sección</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}"
                        maxlength="80" oninput="syncBadge(this)">
                    <div class="field-counter"><span id="c-badge">{{ strlen($section->content('badge_text','')) }}</span>/80</div>
                    @error('badge_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
                <div class="field-group">
                    <label class="field-label" for="title">Título</label>
                    <input type="text" id="title" name="title" class="field-input"
                        value="{{ old('title', $section->content('title')) }}"
                        maxlength="200" oninput="syncTitle(this)">
                    <div class="field-counter"><span id="c-title">{{ strlen($section->content('title','')) }}</span>/200</div>
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input"
                        maxlength="500" oninput="syncDesc(this)">{{ old('description', $section->content('description')) }}</textarea>
                    <div class="field-counter"><span id="c-desc">{{ strlen($section->content('description','')) }}</span>/500</div>
                    @error('description')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Imagen lateral --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-image" style="color:#ea580c;font-size:13px"></i>
                <h3>Imagen lateral</h3>
                <span>Foto del lado derecho · máx. 4 MB</span>
            </div>
            <div class="form-card-body">
                @php $sImg = $section->content('side_image',''); $sSrc = ($sImg && !str_starts_with($sImg,'http')) ? asset('storage/'.$sImg) : $sImg; @endphp
                @if($sSrc)
                    <img id="side-img-preview" src="{{ $sSrc }}" class="img-current">
                @endif
                <div class="upload-area" onclick="document.getElementById('side-upload').click()">
                    <input type="file" id="side-upload" name="side_image" accept="image/*" onchange="previewSide(event)">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p><strong>Clic para cambiar imagen</strong></p>
                </div>
                @error('side_image')<p style="color:#ef4444;font-size:12px;margin-top:6px">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- Línea de tiempo --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-stream" style="color:#ea580c;font-size:13px"></i>
                <h3>Línea de tiempo</h3>
                <span id="step-counter-label"><span id="step-count">{{ $items->count() }}</span>/5 pasos</span>
            </div>
            <div class="form-card-body">
                <div class="timeline-list" id="steps-list">
                    @foreach($items as $i => $item)
                    <div class="step-row" id="step-{{ $i }}" data-index="{{ $i }}">
                        <div class="step-dot-col">
                            <div class="step-dot"></div>
                            <span class="step-num">{{ $i + 1 }}</span>
                        </div>
                        <div class="step-inputs">
                            <input type="text" name="item_phase_title[]" class="step-input-title"
                                value="{{ $item->data('phase_title') }}"
                                placeholder="Título del paso" maxlength="100"
                                oninput="syncPreviewSteps()">
                            <textarea name="item_phase_description[]" class="step-input-desc"
                                placeholder="Descripción breve" maxlength="200"
                                oninput="syncPreviewSteps()">{{ $item->data('phase_description') }}</textarea>
                        </div>
                        <button type="button" class="step-remove" onclick="removeStep({{ $i }})" title="Eliminar">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>

                <button type="button" class="btn-add-step" id="btn-add-step"
                    onclick="addStep()" {{ $items->count() >= 5 ? 'disabled' : '' }}>
                    <i class="fas fa-plus"></i> Agregar paso
                    <span style="font-size:11px;opacity:.7">(máx. 5)</span>
                </button>
                @error('item_phase_title.*')<p style="color:#ef4444;font-size:12px;margin-top:8px">{{ $message }}</p>@enderror
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
            <div class="preview-card-header"><i class="fas fa-eye"></i> Vista previa</div>
            <div class="prev-body">
                <div class="prev-badge" id="prev-badge">{{ $section->content('badge_text') }}</div>
                <div class="prev-title" id="prev-title">{{ $section->content('title') }}</div>
                <div class="prev-desc"  id="prev-desc">{{ $section->content('description') }}</div>
                <div class="prev-img-wrap">
                    <img id="prev-side-img" src="{{ $sSrc }}" alt="">
                </div>
                <div class="prev-steps" id="prev-steps"></div>
            </div>
        </div>

    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#ea580c;margin-right:5px"></i> Los cambios se aplican inmediatamente.</p>
    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
</div>

</form>

<script>
const MAX_STEPS = 5;
let stepCount = {{ $items->count() }};

// ── Text sync ──────────────────────────────────────────────────────────────
function syncBadge(el) { document.getElementById('prev-badge').textContent = el.value; document.getElementById('c-badge').textContent = el.value.length; }
function syncTitle(el) { document.getElementById('prev-title').textContent = el.value; document.getElementById('c-title').textContent = el.value.length; }
function syncDesc(el)  { document.getElementById('prev-desc').textContent  = el.value; document.getElementById('c-desc').textContent  = el.value.length; }

// ── Image preview ──────────────────────────────────────────────────────────
function previewSide(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        const el = document.getElementById('side-img-preview');
        const pv = document.getElementById('prev-side-img');
        if (el) el.src = e.target.result;
        if (pv) pv.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

// ── Steps preview ──────────────────────────────────────────────────────────
function syncPreviewSteps() {
    const container = document.getElementById('prev-steps');
    const rows = document.querySelectorAll('.step-row');
    container.innerHTML = '';

    rows.forEach(row => {
        const title = row.querySelector('.step-input-title').value || '—';
        const desc  = row.querySelector('.step-input-desc').value  || '';
        const div = document.createElement('div');
        div.className = 'prev-step';
        div.innerHTML = `
            <div class="prev-step-dot"></div>
            <div class="prev-step-text">
                <strong>${title}</strong>
                <span>${desc}</span>
            </div>`;
        container.appendChild(div);
    });
}

// ── Add step ───────────────────────────────────────────────────────────────
function addStep() {
    if (stepCount >= MAX_STEPS) return;
    const idx  = stepCount;
    const list = document.getElementById('steps-list');

    const div = document.createElement('div');
    div.className  = 'step-row';
    div.id         = 'step-' + idx;
    div.dataset.index = idx;
    div.innerHTML = `
        <div class="step-dot-col">
            <div class="step-dot"></div>
            <span class="step-num" id="step-num-${idx}">${idx + 1}</span>
        </div>
        <div class="step-inputs">
            <input type="text" name="item_phase_title[]" class="step-input-title"
                value="" placeholder="Título del paso" maxlength="100"
                oninput="syncPreviewSteps()">
            <textarea name="item_phase_description[]" class="step-input-desc"
                placeholder="Descripción breve" maxlength="200"
                oninput="syncPreviewSteps()"></textarea>
        </div>
        <button type="button" class="step-remove" onclick="removeStep(${idx})" title="Eliminar">
            <i class="fas fa-times"></i>
        </button>`;

    list.appendChild(div);
    stepCount++;
    updateStepButton();
    syncPreviewSteps();
}

// ── Remove step ────────────────────────────────────────────────────────────
function removeStep(idx) {
    const el = document.getElementById('step-' + idx);
    if (el) el.remove();
    stepCount--;
    reindexSteps();
    updateStepButton();
    syncPreviewSteps();
}

function reindexSteps() {
    document.querySelectorAll('.step-row').forEach((row, i) => {
        row.id = 'step-' + i;
        row.dataset.index = i;
        const num = row.querySelector('.step-num');
        const btn = row.querySelector('.step-remove');
        if (num) num.textContent = i + 1;
        if (btn) btn.setAttribute('onclick', `removeStep(${i})`);
    });
}

function updateStepButton() {
    document.getElementById('btn-add-step').disabled = stepCount >= MAX_STEPS;
    document.getElementById('step-count').textContent = stepCount;
}

// ── Visibility ─────────────────────────────────────────────────────────────
function updateVisLabel(checkbox) {
    document.getElementById('vis-label').textContent       = checkbox.checked ? 'Sí' : 'No';
    document.getElementById('vis-status').style.color      = checkbox.checked ? '#16a34a' : '#94a3b8';
    document.getElementById('vis-status-text').textContent = checkbox.checked ? 'Visible en el sitio' : 'Oculto en el sitio';
}

document.addEventListener('DOMContentLoaded', () => syncPreviewSteps());
</script>
@endsection
