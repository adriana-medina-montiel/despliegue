@extends('layouts.admin')
@section('title', 'Testimonios — Inicio')
@section('breadcrumb', 'Página principal › Testimonios')

@section('content')
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:#fefce8;color:#ca8a04;display:flex;align-items:center;justify-content:center;font-size:18px; }
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
    .form-card-header .hcount { font-size:11px;color:#94a3b8;margin-left:auto; }
    .form-card-body { padding:22px; }

    .field-group { margin-bottom:20px; }
    .field-group:last-child { margin-bottom:0; }
    .field-label { display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:5px; }
    .field-input { width:100%;padding:10px 13px;border-radius:8px;border:1px solid #d1d5db;font-size:13.5px;color:#1e293b;background:#fafafa;outline:none;transition:border-color .15s,box-shadow .15s; }
    .field-input:focus { border-color:#ca8a04;box-shadow:0 0 0 3px rgba(202,138,4,.08);background:white; }
    textarea.field-input { resize:vertical;min-height:70px;line-height:1.55; }
    .field-counter { font-size:11px;color:#cbd5e1;text-align:right;margin-top:3px; }

    /* ── Testimonial cards ── */
    .testimonial-list { display:flex;flex-direction:column;gap:16px;margin-bottom:16px; }

    .testimonial-card {
        border:1.5px solid #e2e8f0;border-radius:12px;background:#fafafa;
        overflow:hidden;transition:box-shadow .15s;position:relative;
    }
    .testimonial-card:hover { box-shadow:0 4px 16px rgba(15,23,42,.07); }

    .t-card-top {
        display:flex;align-items:center;justify-content:space-between;
        padding:12px 16px;background:white;border-bottom:1px solid #f1f5f9;
        gap:12px;
    }
    .t-card-num {
        width:26px;height:26px;border-radius:50%;background:#fef9c3;color:#ca8a04;
        font-size:11px;font-weight:800;display:flex;align-items:center;justify-content:center;
        flex-shrink:0;
    }
    .t-card-logo-area {
        flex:1;display:flex;align-items:center;gap:12px;
    }
    .t-logo-preview-wrap {
        width:90px;height:44px;border:1.5px dashed #e2e8f0;border-radius:8px;
        display:flex;align-items:center;justify-content:center;
        cursor:pointer;background:#f8fafc;overflow:hidden;position:relative;
        flex-shrink:0;transition:border-color .15s;
    }
    .t-logo-preview-wrap:hover { border-color:#ca8a04;background:#fefce8; }
    .t-logo-preview-wrap img { max-width:84px;max-height:40px;object-fit:contain; }
    .t-logo-placeholder { display:flex;flex-direction:column;align-items:center;gap:2px;color:#cbd5e1; }
    .t-logo-placeholder i { font-size:14px; }
    .t-logo-placeholder span { font-size:9px;font-weight:600; }
    .t-logo-overlay {
        position:absolute;inset:0;background:rgba(202,138,4,.7);display:none;
        align-items:center;justify-content:center;color:white;font-size:9px;font-weight:700;
        border-radius:6px;gap:3px;
    }
    .t-logo-preview-wrap:hover .t-logo-overlay { display:flex; }

    .t-author-quick { flex:1; }
    .t-author-quick input {
        width:100%;padding:7px 10px;border-radius:7px;border:1px solid #e2e8f0;
        font-size:12.5px;font-weight:700;color:#0f172a;background:#fafafa;outline:none;
        transition:border-color .15s;
    }
    .t-author-quick input:focus { border-color:#ca8a04;background:white; }

    .t-remove-btn {
        width:28px;height:28px;border-radius:8px;background:#fee2e2;color:#ef4444;
        border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;
        font-size:11px;flex-shrink:0;transition:background .15s;
    }
    .t-remove-btn:hover { background:#fca5a5; }

    .t-card-body { padding:14px 16px;display:flex;flex-direction:column;gap:10px; }

    .t-quote-wrap { position:relative; }
    .t-quote-mark {
        position:absolute;top:-4px;left:4px;font-size:36px;line-height:1;
        color:#fde68a;font-family:Georgia,serif;pointer-events:none;z-index:0;
    }
    .t-quote-textarea {
        width:100%;padding:10px 12px 10px 28px;border-radius:8px;border:1px solid #e2e8f0;
        font-size:13px;color:#374151;background:white;outline:none;resize:vertical;min-height:100px;
        line-height:1.6;transition:border-color .15s;position:relative;z-index:1;
    }
    .t-quote-textarea:focus { border-color:#ca8a04;box-shadow:0 0 0 2px rgba(202,138,4,.08); }

    .t-role-input {
        width:100%;padding:7px 10px;border-radius:7px;border:1px solid #e2e8f0;
        font-size:12px;color:#64748b;background:white;outline:none;transition:border-color .15s;
    }
    .t-role-input:focus { border-color:#ca8a04; }

    .btn-add-t {
        width:100%;padding:12px;border-radius:10px;border:2px dashed #d1d5db;background:#f8fafc;
        font-size:13px;font-weight:600;color:#94a3b8;cursor:pointer;transition:all .15s;
        display:flex;align-items:center;justify-content:center;gap:8px;
    }
    .btn-add-t:hover:not(:disabled) { border-color:#ca8a04;color:#ca8a04;background:#fefce8; }
    .btn-add-t:disabled { opacity:.4;cursor:not-allowed; }

    /* Visibility */
    .visibility-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .visibility-card-top { height:4px;background:linear-gradient(90deg,#ca8a04,#fbbf24); }
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
    .switch input:checked + .slider { background:#ca8a04; }
    .switch input:checked + .slider::before { transform:translateX(22px); }

    /* Preview */
    .preview-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden; }
    .preview-card-header { padding:13px 18px;border-bottom:1px solid #f1f5f9;font-size:13px;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:8px; }
    .preview-card-header i { color:#ca8a04;font-size:12px; }
    .prev-body { padding:16px 18px; }
    .prev-badge { font-size:9px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#ca8a04;margin-bottom:4px; }
    .prev-title { font-size:13px;font-weight:800;color:#0f172a;margin-bottom:12px;line-height:1.3; }
    .prev-testimonials { display:flex;flex-direction:column;gap:8px; }
    .prev-t-item { padding:8px 10px;background:#fefce8;border-radius:7px;border-left:3px solid #fbbf24; }
    .prev-t-name { font-size:11px;font-weight:700;color:#0f172a; }
    .prev-t-role { font-size:10px;color:#94a3b8; }
    .prev-t-empty { font-size:11px;color:#cbd5e1;text-align:center;padding:10px 0; }

    /* Save bar */
    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:#ca8a04;color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-quote-left"></i></div>
    <div class="fph-text">
        <h2>Testimonios</h2>
        <p>Lo que dicen los clientes (máx. 10 · se muestran como carrusel)</p>
    </div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Inicio
    </a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.inicio.testimonials.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>

        {{-- Encabezado --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-heading" style="color:#ca8a04;font-size:13px"></i>
                <h3>Encabezado de sección</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}"
                        maxlength="80" oninput="syncBadge(this.value)">
                    <div class="field-counter"><span id="c-badge">{{ strlen($section->content('badge_text','')) }}</span>/80</div>
                    @error('badge_text')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
                <div class="field-group">
                    <label class="field-label" for="title">Título</label>
                    <input type="text" id="title" name="title" class="field-input"
                        value="{{ old('title', $section->content('title')) }}"
                        maxlength="200" oninput="syncTitle(this.value)">
                    <div class="field-counter"><span id="c-title">{{ strlen($section->content('title','')) }}</span>/200</div>
                    @error('title')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Testimonials --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-comments" style="color:#ca8a04;font-size:13px"></i>
                <h3>Testimonios</h3>
                <span class="hcount"><strong id="t-count">{{ $items->count() }}</strong>/10</span>
            </div>
            <div class="form-card-body">

                <div class="testimonial-list" id="testimonial-list">

                    @foreach($items as $item)
                    @php
                        $logo = $item->data('logo_image','');
                        $logoSrc = cms_asset($logo);
                        $idx = $item->sort_order;
                    @endphp
                    <div class="testimonial-card" id="t-card-{{ $idx }}">

                        {{-- Top bar: nº + logo + author name + remove --}}
                        <div class="t-card-top">
                            <div class="t-card-num" id="t-num-{{ $idx }}">{{ $loop->iteration }}</div>

                            <div class="t-card-logo-area">
                                <div class="t-logo-preview-wrap" onclick="document.getElementById('t-file-{{ $idx }}').click()" title="Cambiar logo">
                                    @if($logoSrc)
                                        <img src="{{ $logoSrc }}" alt="" id="t-prev-{{ $idx }}">
                                    @else
                                        <div class="t-logo-placeholder" id="t-ph-{{ $idx }}">
                                            <i class="fas fa-image"></i><span>Logo</span>
                                        </div>
                                    @endif
                                    <div class="t-logo-overlay"><i class="fas fa-camera"></i> Cambiar</div>
                                </div>
                                <input type="file" id="t-file-{{ $idx }}" name="item_logo_new[{{ $idx }}]"
                                    accept="image/*" style="display:none"
                                    onchange="previewLogo({{ $idx }}, this)">
                                <input type="hidden" name="item_logo_existing[{{ $idx }}]" value="{{ $logo }}" id="t-existing-{{ $idx }}">

                                <div class="t-author-quick">
                                    <input type="text" name="item_author_name[{{ $idx }}]"
                                        value="{{ $item->data('author_name') }}"
                                        placeholder="Nombre del autor" maxlength="100"
                                        oninput="syncAuthorPreview({{ $idx }}, this.value)">
                                </div>
                            </div>

                            <button type="button" class="t-remove-btn" onclick="removeTestimonial({{ $idx }})" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>

                        {{-- Body: quote + role --}}
                        <div class="t-card-body">
                            <div class="t-quote-wrap">
                                <span class="t-quote-mark">"</span>
                                <textarea name="item_quote[{{ $idx }}]" class="t-quote-textarea"
                                    maxlength="1000" placeholder="Testimonio del cliente..."
                                    oninput="this.style.height='auto';this.style.height=this.scrollHeight+'px'">{{ $item->data('quote') }}</textarea>
                            </div>
                            <input type="text" name="item_author_role[{{ $idx }}]" class="t-role-input"
                                value="{{ $item->data('author_role') }}"
                                placeholder="Cargo y empresa (ej. Director de operaciones · Abril-2020)" maxlength="200">
                        </div>

                    </div>
                    @endforeach

                </div>

                <button type="button" class="btn-add-t" id="btn-add-t"
                    onclick="addTestimonial()" {{ $items->count() >= 10 ? 'disabled' : '' }}>
                    <i class="fas fa-plus"></i> Agregar testimonio
                    <span style="font-size:11px;opacity:.6">(máx. 10)</span>
                </button>

                @error('item_quote.*')<p style="color:#ef4444;font-size:12px;margin-top:8px">{{ $message }}</p>@enderror
                @error('item_author_name.*')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
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
                <div class="prev-testimonials" id="prev-list">
                    @foreach($items as $item)
                    <div class="prev-t-item" id="prev-item-{{ $item->sort_order }}">
                        <div class="prev-t-name" id="prev-name-{{ $item->sort_order }}">{{ $item->data('author_name') }}</div>
                        <div class="prev-t-role" id="prev-role-{{ $item->sort_order }}">{{ $item->data('author_role') }}</div>
                    </div>
                    @endforeach
                    @if($items->isEmpty())
                    <div class="prev-t-empty" id="prev-empty">Sin testimonios aún</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Info --}}
        <div style="margin-top:14px;padding:14px 16px;background:#fefce8;border:1px solid #fde68a;border-radius:10px;">
            <p style="font-size:11.5px;color:#92400e;margin:0;line-height:1.6;">
                <i class="fas fa-info-circle" style="margin-right:5px;color:#ca8a04"></i>
                <strong>Carrusel automático:</strong><br>
                Si hay más de 2 testimonios el sitio los muestra como carrusel con puntos de navegación.
            </p>
        </div>

    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#ca8a04;margin-right:5px"></i> Los cambios se aplican inmediatamente en el sitio.</p>
    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
</div>

</form>

<script>
const MAX_T = 10;
let tCount    = {{ $items->count() }};
let globalIdx = {{ $items->count() + 100 }};

// ── Text sync ──────────────────────────────────────────────────────────────
function syncBadge(v) { document.getElementById('prev-badge').textContent = v; document.getElementById('c-badge').textContent = v.length; }
function syncTitle(v) { document.getElementById('prev-title').textContent = v; document.getElementById('c-title').textContent = v.length; }

// ── Author preview sync ────────────────────────────────────────────────────
function syncAuthorPreview(idx, v) {
    const el = document.getElementById('prev-name-' + idx);
    if (el) el.textContent = v || '—';
}

// ── Logo preview ───────────────────────────────────────────────────────────
function previewLogo(idx, input) {
    const file = input.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        let img = document.getElementById('t-prev-' + idx);
        const ph  = document.getElementById('t-ph-' + idx);
        const wrap = input.closest('.t-card-top').querySelector('.t-logo-preview-wrap');

        if (!img) {
            img = document.createElement('img');
            img.id  = 't-prev-' + idx;
            img.style.cssText = 'max-width:84px;max-height:40px;object-fit:contain;';
            if (ph) ph.style.display = 'none';
            wrap.insertBefore(img, wrap.querySelector('.t-logo-overlay'));
        }
        img.src = e.target.result;
        if (ph) ph.style.display = 'none';
    };
    reader.readAsDataURL(file);
}

// ── Add testimonial ────────────────────────────────────────────────────────
function addTestimonial() {
    if (tCount >= MAX_T) return;
    const idx  = globalIdx++;
    const list = document.getElementById('testimonial-list');
    tCount++;

    const card = document.createElement('div');
    card.className = 'testimonial-card';
    card.id = 't-card-' + idx;
    card.innerHTML = `
        <div class="t-card-top">
            <div class="t-card-num" id="t-num-${idx}">${tCount}</div>
            <div class="t-card-logo-area">
                <div class="t-logo-preview-wrap" onclick="document.getElementById('t-file-${idx}').click()" title="Cargar logo">
                    <div class="t-logo-placeholder" id="t-ph-${idx}">
                        <i class="fas fa-image"></i><span>Logo</span>
                    </div>
                    <div class="t-logo-overlay"><i class="fas fa-camera"></i> Cargar</div>
                </div>
                <input type="file" id="t-file-${idx}" name="item_logo_new[${idx}]"
                    accept="image/*" style="display:none"
                    onchange="previewLogo(${idx}, this)">
                <input type="hidden" name="item_logo_existing[${idx}]" value="" id="t-existing-${idx}">
                <div class="t-author-quick">
                    <input type="text" name="item_author_name[${idx}]"
                        value="" placeholder="Nombre del autor" maxlength="100"
                        oninput="syncNewAuthorPreview(${idx}, this.value)">
                </div>
            </div>
            <button type="button" class="t-remove-btn" onclick="removeTestimonial(${idx})" title="Eliminar">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <div class="t-card-body">
            <div class="t-quote-wrap">
                <span class="t-quote-mark">"</span>
                <textarea name="item_quote[${idx}]" class="t-quote-textarea"
                    maxlength="1000" placeholder="Testimonio del cliente..."
                    oninput="this.style.height='auto';this.style.height=this.scrollHeight+'px'"></textarea>
            </div>
            <input type="text" name="item_author_role[${idx}]" class="t-role-input"
                value="" placeholder="Cargo y empresa (ej. Director de operaciones · Abril-2020)" maxlength="200">
        </div>`;

    // Add preview item
    const prevList = document.getElementById('prev-list');
    const prevEmpty = document.getElementById('prev-empty');
    if (prevEmpty) prevEmpty.remove();

    const prevItem = document.createElement('div');
    prevItem.className = 'prev-t-item';
    prevItem.id = 'prev-item-' + idx;
    prevItem.innerHTML = `
        <div class="prev-t-name" id="prev-name-${idx}">Nuevo testimonio</div>
        <div class="prev-t-role" id="prev-role-${idx}"></div>`;
    prevList.appendChild(prevItem);

    list.appendChild(card);
    updateTCount();
}

function syncNewAuthorPreview(idx, v) {
    const el = document.getElementById('prev-name-' + idx);
    if (el) el.textContent = v || 'Nuevo testimonio';
}

// ── Remove testimonial ─────────────────────────────────────────────────────
function removeTestimonial(idx) {
    const card = document.getElementById('t-card-' + idx);
    const prev = document.getElementById('prev-item-' + idx);
    if (card) card.remove();
    if (prev) prev.remove();
    tCount--;
    reindexNumbers();
    updateTCount();

    if (tCount === 0) {
        const prevList = document.getElementById('prev-list');
        const empty = document.createElement('div');
        empty.className = 'prev-t-empty';
        empty.id = 'prev-empty';
        empty.textContent = 'Sin testimonios aún';
        prevList.appendChild(empty);
    }
}

function reindexNumbers() {
    document.querySelectorAll('.testimonial-card').forEach((card, i) => {
        const numEl = card.querySelector('[id^="t-num-"]');
        if (numEl) numEl.textContent = i + 1;
    });
}

function updateTCount() {
    document.getElementById('t-count').textContent = tCount;
    document.getElementById('btn-add-t').disabled = tCount >= MAX_T;
}

// ── Visibility ─────────────────────────────────────────────────────────────
function updateVisLabel(checkbox) {
    document.getElementById('vis-label').textContent       = checkbox.checked ? 'Sí' : 'No';
    document.getElementById('vis-status').style.color      = checkbox.checked ? '#16a34a' : '#94a3b8';
    document.getElementById('vis-status-text').textContent = checkbox.checked ? 'Visible en el sitio' : 'Oculto en el sitio';
}

// Auto-resize existing textareas on load
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.t-quote-textarea').forEach(ta => {
        ta.style.height = 'auto';
        ta.style.height = ta.scrollHeight + 'px';
    });
});
</script>
@endsection
