@extends('layouts.admin')
@section('title', 'Pilares — Conócenos')
@section('breadcrumb', 'Conócenos › Pilares')

@section('content')
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:#ecfeff;color:#0891b2;display:flex;align-items:center;justify-content:center;font-size:18px; }
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
    .field-input:focus { border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.08);background:white; }
    textarea.field-input { resize:vertical;min-height:80px;line-height:1.55; }
    .field-counter { font-size:11px;color:#cbd5e1;text-align:right;margin-top:3px; }

    /* ── Cards dinámicas ── */
    .cards-header { display:flex;align-items:center;justify-content:space-between;margin-bottom:16px; }
    .cards-counter { font-size:12px;color:#94a3b8;font-weight:600; }
    .cards-counter span { color:#0891b2;font-weight:800; }

    .pillar-cards-grid { display:grid;grid-template-columns:repeat(2,1fr);gap:14px;margin-bottom:16px; }

    .pillar-card {
        background:#f8fafc;
        border:1px solid #e2e8f0;
        border-radius:12px;
        overflow:hidden;
        position:relative;
        transition:box-shadow .15s;
    }
    .pillar-card:hover { box-shadow:0 4px 16px rgba(15,23,42,.07); }

    .pillar-card-top { height:3px;background:linear-gradient(90deg,#0891b2,#22c4e8); }

    .pillar-card-body { padding:14px; }

    .pillar-card-img-wrap {
        width:100%;height:90px;border-radius:8px;
        border:1px dashed #d1d5db;background:white;
        display:flex;align-items:center;justify-content:center;
        overflow:hidden;cursor:pointer;position:relative;
        margin-bottom:10px;transition:border-color .15s;
    }
    .pillar-card-img-wrap:hover { border-color:#0891b2; }
    .pillar-card-img-wrap img { max-width:100%;max-height:100%;object-fit:contain;padding:6px; }
    .pillar-card-img-wrap .upload-hint-overlay {
        position:absolute;inset:0;display:flex;flex-direction:column;
        align-items:center;justify-content:center;
        background:rgba(8,145,178,.08);opacity:0;transition:opacity .15s;
        font-size:11px;color:#0891b2;font-weight:600;gap:4px;
    }
    .pillar-card-img-wrap:hover .upload-hint-overlay { opacity:1; }
    .pillar-card-img-wrap input[type="file"] { display:none; }

    .pillar-card-label-input {
        width:100%;padding:8px 10px;border-radius:7px;
        border:1px solid #e2e8f0;font-size:13px;font-weight:600;
        color:#0f172a;background:white;outline:none;
        transition:border-color .15s;text-align:center;
    }
    .pillar-card-label-input:focus { border-color:#0891b2;box-shadow:0 0 0 2px rgba(8,145,178,.08); }

    .pillar-card-remove {
        position:absolute;top:10px;right:10px;
        width:22px;height:22px;border-radius:50%;
        background:#fee2e2;color:#ef4444;border:none;
        cursor:pointer;display:flex;align-items:center;justify-content:center;
        font-size:10px;transition:background .15s;
    }
    .pillar-card-remove:hover { background:#fca5a5; }

    .btn-add-card {
        width:100%;padding:11px;border-radius:10px;
        border:2px dashed #d1d5db;background:#f8fafc;
        font-size:13px;font-weight:600;color:#94a3b8;
        cursor:pointer;transition:all .15s;
        display:flex;align-items:center;justify-content:center;gap:8px;
    }
    .btn-add-card:hover:not(:disabled) { border-color:#0891b2;color:#0891b2;background:#f0fdff; }
    .btn-add-card:disabled { opacity:.45;cursor:not-allowed; }

    /* Visibility */
    .visibility-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .visibility-card-top { height:4px;background:linear-gradient(90deg,#0891b2,#22c4e8); }
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
    .switch input:checked + .slider { background:#0891b2; }
    .switch input:checked + .slider::before { transform:translateX(22px); }

    /* Preview */
    .preview-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden; }
    .preview-card-header { padding:13px 18px;border-bottom:1px solid #f1f5f9;font-size:13px;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:8px; }
    .preview-card-header i { color:#0891b2;font-size:12px; }
    .prev-body { padding:16px 18px;background:#0c1a2e;border-radius:0 0 14px 14px; }
    .prev-title-dark { font-size:13px;font-weight:800;color:white;margin-bottom:5px;line-height:1.3; }
    .prev-desc-dark { font-size:10px;color:#8aa3be;line-height:1.5;margin-bottom:12px; }
    .prev-pillars-grid { display:grid;grid-template-columns:repeat(2,1fr);gap:6px; }
    .prev-pillar-item { background:#1a3352;border-radius:8px;padding:8px 6px;text-align:center; }
    .prev-pillar-item img { width:32px;height:32px;object-fit:contain;margin-bottom:4px; }
    .prev-pillar-item span { display:block;font-size:9px;color:#c8dff5;font-weight:600; }
    .prev-empty { color:#3d5a78;font-size:11px;text-align:center;padding:10px 0; }

    /* Save bar */
    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:#0891b2;color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-chart-line"></i></div>
    <div class="fph-text">
        <h2>Ayudarte a mejorar es nuestra motivación</h2>
        <p>Título, descripción y hasta 4 tarjetas de pilares</p>
    </div>
    <a href="{{ route('admin.pages.conocenos') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Conócenos
    </a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.conocenos.pillars.update') }}" method="POST" enctype="multipart/form-data" id="pillars-form">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>

        {{-- Textos --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-heading" style="color:#0891b2;font-size:13px"></i>
                <h3>Encabezado de sección</h3>
            </div>
            <div class="form-card-body">
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

        {{-- Cards de pilares --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-th-large" style="color:#0891b2;font-size:13px"></i>
                <h3>Tarjetas de pilares</h3>
                <span id="card-counter-label"><span id="card-count">{{ $items->count() }}</span>/4 tarjetas</span>
            </div>
            <div class="form-card-body">
                <div class="pillar-cards-grid" id="cards-grid">
                    @foreach($items as $i => $item)
                    @php
                        $imgVal = $item->data('image','');
                        $imgSrc = ($imgVal && !str_starts_with($imgVal,'http')) ? asset('storage/'.$imgVal) : $imgVal;
                    @endphp
                    <div class="pillar-card" id="card-{{ $i }}" data-index="{{ $i }}">
                        <div class="pillar-card-top"></div>
                        <div class="pillar-card-body">
                            <input type="hidden" name="item_existing_image[]" class="existing-img-input" value="{{ $imgVal }}">
                            <div class="pillar-card-img-wrap" onclick="triggerUpload({{ $i }})">
                                <img src="{{ $imgSrc }}" id="card-img-{{ $i }}" alt="">
                                <div class="upload-hint-overlay">
                                    <i class="fas fa-camera"></i> Cambiar imagen
                                </div>
                                <input type="file" id="file-{{ $i }}" name="item_image_new[]"
                                    accept="image/*" onchange="onImgChange(event, {{ $i }})">
                            </div>
                            <input type="text" name="item_label[]" class="pillar-card-label-input"
                                value="{{ $item->data('label') }}" placeholder="Nombre del pilar"
                                maxlength="60" oninput="syncPreviewCards()">
                        </div>
                        <button type="button" class="pillar-card-remove" onclick="removeCard({{ $i }})" title="Eliminar">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforeach
                </div>

                <button type="button" class="btn-add-card" id="btn-add"
                    onclick="addCard()" {{ $items->count() >= 4 ? 'disabled' : '' }}>
                    <i class="fas fa-plus"></i> Agregar tarjeta
                    <span style="font-size:11px;opacity:.7">(máx. 4)</span>
                </button>
                @error('item_label.*')<p style="color:#ef4444;font-size:12px;margin-top:8px">{{ $message }}</p>@enderror
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
                <div class="prev-title-dark" id="prev-title">{{ $section->content('title') }}</div>
                <div class="prev-desc-dark" id="prev-desc">{{ $section->content('description') }}</div>
                <div class="prev-pillars-grid" id="prev-pillars">
                    {{-- Rendered by JS --}}
                </div>
            </div>
        </div>

    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#0891b2;margin-right:5px"></i> Los cambios se aplican inmediatamente.</p>
    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
</div>

</form>

<script>
// ── State ──────────────────────────────────────────────────────────────────
let cardCount = {{ $items->count() }};
const MAX_CARDS = 4;

// ── Sync preview ───────────────────────────────────────────────────────────
function syncTitle(el) {
    document.getElementById('prev-title').textContent = el.value;
    document.getElementById('c-title').textContent = el.value.length;
}
function syncDesc(el) {
    document.getElementById('prev-desc').textContent = el.value;
    document.getElementById('c-desc').textContent = el.value.length;
}

function syncPreviewCards() {
    const grid    = document.getElementById('prev-pillars');
    const cards   = document.querySelectorAll('.pillar-card');
    grid.innerHTML = '';

    if (cards.length === 0) {
        grid.innerHTML = '<div class="prev-empty" style="grid-column:span 2">Sin tarjetas</div>';
        return;
    }

    cards.forEach((card, i) => {
        const label  = card.querySelector('input[name="item_label[]"]').value || '—';
        const imgEl  = card.querySelector('.pillar-card-img-wrap img');
        const imgSrc = imgEl ? imgEl.src : '';

        const div = document.createElement('div');
        div.className = 'prev-pillar-item';
        div.innerHTML = imgSrc
            ? `<img src="${imgSrc}"><span>${label}</span>`
            : `<span>${label}</span>`;
        grid.appendChild(div);
    });
}

// ── Image upload ───────────────────────────────────────────────────────────
function triggerUpload(index) {
    document.getElementById('file-' + index).click();
}

function onImgChange(event, index) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('card-img-' + index).src = e.target.result;
        syncPreviewCards();
    };
    reader.readAsDataURL(file);
}

// ── Add card ───────────────────────────────────────────────────────────────
function addCard() {
    if (cardCount >= MAX_CARDS) return;

    const idx  = cardCount;
    const grid = document.getElementById('cards-grid');

    const div = document.createElement('div');
    div.className = 'pillar-card';
    div.id        = 'card-' + idx;
    div.dataset.index = idx;
    div.innerHTML = `
        <div class="pillar-card-top"></div>
        <div class="pillar-card-body">
            <input type="hidden" name="item_existing_image[]" class="existing-img-input" value="">
            <div class="pillar-card-img-wrap" onclick="triggerUpload(${idx})">
                <img src="" id="card-img-${idx}" alt=""
                     style="display:none;max-width:100%;max-height:100%;object-fit:contain;padding:6px">
                <div style="display:flex;flex-direction:column;align-items:center;gap:5px;color:#cbd5e1" id="upload-placeholder-${idx}">
                    <i class="fas fa-cloud-upload-alt" style="font-size:22px"></i>
                    <span style="font-size:11px">Subir imagen</span>
                </div>
                <div class="upload-hint-overlay"><i class="fas fa-camera"></i> Cambiar imagen</div>
                <input type="file" id="file-${idx}" name="item_image_new[]"
                       accept="image/*" onchange="onImgChange(event, ${idx}); showImg(${idx})">
            </div>
            <input type="text" name="item_label[]" class="pillar-card-label-input"
                   value="" placeholder="Nombre del pilar" maxlength="60" oninput="syncPreviewCards()">
        </div>
        <button type="button" class="pillar-card-remove" onclick="removeCard(${idx})" title="Eliminar">
            <i class="fas fa-times"></i>
        </button>`;

    grid.appendChild(div);
    cardCount++;
    updateAddButton();
    syncPreviewCards();
}

function showImg(idx) {
    const img = document.getElementById('card-img-' + idx);
    const placeholder = document.getElementById('upload-placeholder-' + idx);
    if (img) img.style.display = '';
    if (placeholder) placeholder.style.display = 'none';
}

// ── Remove card ────────────────────────────────────────────────────────────
function removeCard(idx) {
    const card = document.getElementById('card-' + idx);
    if (card) card.remove();
    cardCount--;
    reindexCards();
    updateAddButton();
    syncPreviewCards();
}

function reindexCards() {
    document.querySelectorAll('.pillar-card').forEach((card, i) => {
        card.id = 'card-' + i;
        card.dataset.index = i;

        const img      = card.querySelector('.pillar-card-img-wrap img');
        const wrap     = card.querySelector('.pillar-card-img-wrap');
        const fileInput = card.querySelector('input[type="file"]');
        const placeholder = card.querySelector('[id^="upload-placeholder-"]');
        const removeBtn   = card.querySelector('.pillar-card-remove');

        if (img)      img.id       = 'card-img-' + i;
        if (wrap)     wrap.setAttribute('onclick', `triggerUpload(${i})`);
        if (fileInput){ fileInput.id = 'file-' + i; fileInput.setAttribute('onchange', `onImgChange(event, ${i}); showImg(${i})`); }
        if (placeholder) placeholder.id = 'upload-placeholder-' + i;
        if (removeBtn)   removeBtn.setAttribute('onclick', `removeCard(${i})`);
    });
}

function updateAddButton() {
    const btn = document.getElementById('btn-add');
    const counter = document.getElementById('card-count');
    if (counter) counter.textContent = cardCount;
    btn.disabled = cardCount >= MAX_CARDS;
}

// ── Visibility toggle ──────────────────────────────────────────────────────
function updateVisLabel(checkbox) {
    document.getElementById('vis-label').textContent       = checkbox.checked ? 'Sí' : 'No';
    document.getElementById('vis-status').style.color      = checkbox.checked ? '#16a34a' : '#94a3b8';
    document.getElementById('vis-status-text').textContent = checkbox.checked ? 'Visible en el sitio' : 'Oculto en el sitio';
}

// ── Init ───────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => syncPreviewCards());
</script>
@endsection
