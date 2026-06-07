@extends('layouts.admin')
@section('title', 'Clientes — Conócenos')
@section('breadcrumb', 'Conócenos › Clientes')

@section('content')
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:#f0fdf4;color:#16a34a;display:flex;align-items:center;justify-content:center;font-size:18px; }
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
    .field-input { width:100%;padding:10px 13px;border-radius:8px;border:1px solid #d1d5db;font-size:13.5px;color:#1e293b;background:#fafafa;outline:none;transition:border-color .15s,box-shadow .15s; }
    .field-input:focus { border-color:#16a34a;box-shadow:0 0 0 3px rgba(22,163,74,.08);background:white; }
    textarea.field-input { resize:vertical;min-height:72px;line-height:1.55; }
    .field-counter { font-size:11px;color:#cbd5e1;text-align:right;margin-top:3px; }

    /* ── Sector config table ── */
    .sector-table { width:100%;border-collapse:collapse; }
    .sector-table th { font-size:11px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;padding:0 0 8px 0;text-align:left; }
    .sector-table td { padding:6px 8px 6px 0;vertical-align:middle; }
    .sector-table td:first-child { padding-left:0; }
    .sector-idx { width:24px;height:24px;border-radius:50%;background:#dcfce7;color:#16a34a;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;flex-shrink:0; }
    .sector-input { width:100%;padding:7px 10px;border-radius:7px;border:1px solid #e2e8f0;font-size:12.5px;color:#1e293b;background:#fafafa;outline:none;transition:border-color .15s; }
    .sector-input:focus { border-color:#16a34a;box-shadow:0 0 0 2px rgba(22,163,74,.08); }

    /* ── Logo tabs ── */
    .logo-tabs-bar { display:flex;gap:6px;margin-bottom:18px;flex-wrap:wrap; }
    .logo-tab-btn {
        display:inline-flex;align-items:center;gap:6px;
        padding:8px 14px;border-radius:8px;font-size:12.5px;font-weight:600;
        color:#64748b;background:#f8fafc;border:1.5px solid #e2e8f0;
        cursor:pointer;transition:all .15s;
    }
    .logo-tab-btn.active { background:#f0fdf4;border-color:#86efac;color:#16a34a; }
    .logo-tab-btn .tab-badge {
        width:18px;height:18px;border-radius:50%;background:#e2e8f0;color:#64748b;
        font-size:10px;font-weight:800;display:flex;align-items:center;justify-content:center;
    }
    .logo-tab-btn.active .tab-badge { background:#bbf7d0;color:#16a34a; }

    .logo-panel { display:none; }
    .logo-panel.active { display:block; }

    .logo-panel-header { display:flex;align-items:center;justify-content:space-between;margin-bottom:14px; }
    .logo-panel-header span { font-size:12px;color:#94a3b8; }
    .logo-panel-header strong { color:#16a34a; }

    /* ── Logo grid ── */
    .logo-grid { display:grid;grid-template-columns:repeat(auto-fill,minmax(130px,1fr));gap:12px;margin-bottom:14px; }

    .logo-card {
        position:relative;background:#f8fafc;border:1.5px solid #e2e8f0;
        border-radius:10px;overflow:hidden;transition:box-shadow .15s;
    }
    .logo-card:hover { box-shadow:0 4px 14px rgba(15,23,42,.08); }

    .logo-img-wrap {
        height:80px;display:flex;align-items:center;justify-content:center;
        cursor:pointer;background:#fff;border-bottom:1px solid #f1f5f9;
        overflow:hidden;position:relative;
    }
    .logo-img-wrap img { max-width:90%;max-height:68px;object-fit:contain;display:block; }
    .logo-img-placeholder {
        display:flex;flex-direction:column;align-items:center;justify-content:center;
        gap:4px;color:#cbd5e1;font-size:11px;width:100%;height:100%;
    }
    .logo-img-placeholder i { font-size:20px; }
    .logo-img-overlay {
        position:absolute;inset:0;background:rgba(0,0,0,.35);display:none;
        align-items:center;justify-content:center;color:white;font-size:11px;
        font-weight:600;gap:4px;cursor:pointer;border-radius:0;
    }
    .logo-img-wrap:hover .logo-img-overlay { display:flex; }

    .logo-card-body { padding:8px 9px; }
    .logo-alt-input {
        width:100%;padding:5px 7px;border-radius:6px;border:1px solid #e2e8f0;
        font-size:11.5px;color:#374151;background:white;outline:none;transition:border-color .15s;
    }
    .logo-alt-input:focus { border-color:#16a34a; }

    .logo-remove-btn {
        position:absolute;top:5px;right:5px;width:20px;height:20px;border-radius:50%;
        background:rgba(239,68,68,.9);color:white;border:none;cursor:pointer;
        display:flex;align-items:center;justify-content:center;font-size:9px;
        opacity:0;transition:opacity .15s;z-index:2;
    }
    .logo-card:hover .logo-remove-btn { opacity:1; }

    .btn-add-logo {
        width:100%;padding:10px;border-radius:9px;border:2px dashed #d1d5db;background:#f8fafc;
        font-size:13px;font-weight:600;color:#94a3b8;cursor:pointer;transition:all .15s;
        display:flex;align-items:center;justify-content:center;gap:8px;
    }
    .btn-add-logo:hover:not(:disabled) { border-color:#16a34a;color:#16a34a;background:#f0fdf4; }
    .btn-add-logo:disabled { opacity:.4;cursor:not-allowed; }

    /* Visibility */
    .visibility-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;margin-bottom:16px; }
    .visibility-card-top { height:4px;background:linear-gradient(90deg,#16a34a,#4ade80); }
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
    .switch input:checked + .slider { background:#16a34a; }
    .switch input:checked + .slider::before { transform:translateX(22px); }

    /* Preview */
    .preview-card { background:white;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden; }
    .preview-card-header { padding:13px 18px;border-bottom:1px solid #f1f5f9;font-size:13px;font-weight:700;color:#0f172a;display:flex;align-items:center;gap:8px; }
    .preview-card-header i { color:#16a34a;font-size:12px; }
    .prev-body { padding:16px 18px; }
    .prev-badge { font-size:9px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#16a34a;margin-bottom:4px; }
    .prev-title { font-size:13px;font-weight:800;color:#0f172a;margin-bottom:4px;line-height:1.3; }
    .prev-desc  { font-size:10px;color:#64748b;line-height:1.5;margin-bottom:12px; }
    .prev-tabs  { display:flex;gap:4px;flex-wrap:wrap;margin-bottom:10px; }
    .prev-tab   { font-size:9px;padding:3px 8px;border-radius:20px;background:#f1f5f9;color:#64748b;font-weight:600; }
    .prev-tab.active { background:#dcfce7;color:#16a34a; }
    .prev-logo-count { font-size:10px;color:#94a3b8;margin-top:8px; }

    /* Save bar */
    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:#16a34a;color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }
</style>

@php
$sectors = $section->content('sectors', [
    ['name' => 'Gobierno',  'tag' => 'Sector gobierno'],
    ['name' => 'Educativo', 'tag' => 'Sector educativo'],
    ['name' => "TIC's",     'tag' => "Sector TIC's"],
    ['name' => 'Privado',   'tag' => 'Iniciativa privada'],
]);
$totalItems = $items->count();
@endphp

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-building"></i></div>
    <div class="fph-text">
        <h2>Clientes — Quiénes nos avalan</h2>
        <p>Textos, sectores y logos (máx. 10 logos por sector)</p>
    </div>
    <a href="{{ route('admin.pages.conocenos') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Conócenos
    </a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.conocenos.clients.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>

        {{-- Textos del encabezado --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-heading" style="color:#16a34a;font-size:13px"></i>
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
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input"
                        maxlength="500" oninput="syncDesc(this.value)">{{ old('description', $section->content('description')) }}</textarea>
                    <div class="field-counter"><span id="c-desc">{{ strlen($section->content('description','')) }}</span>/500</div>
                    @error('description')<p style="color:#ef4444;font-size:12px;margin-top:4px">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Nombres de sectores --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-tags" style="color:#16a34a;font-size:13px"></i>
                <h3>Nombres de sectores</h3>
                <span>Los 4 tabs de la sección</span>
            </div>
            <div class="form-card-body">
                <table class="sector-table">
                    <thead>
                        <tr>
                            <th style="width:32px">#</th>
                            <th>Nombre del tab</th>
                            <th>Etiqueta del panel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sectors as $i => $sector)
                        <tr>
                            <td><div class="sector-idx">{{ $i + 1 }}</div></td>
                            <td>
                                <input type="text" name="sector_name[{{ $i }}]" class="sector-input"
                                    value="{{ old("sector_name.$i", $sector['name']) }}"
                                    maxlength="60" placeholder="Ej. Gobierno"
                                    oninput="syncSectorName({{ $i }}, this.value)">
                            </td>
                            <td>
                                <input type="text" name="sector_tag[{{ $i }}]" class="sector-input"
                                    value="{{ old("sector_tag.$i", $sector['tag']) }}"
                                    maxlength="80" placeholder="Ej. Sector gobierno">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Logos por sector --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-images" style="color:#16a34a;font-size:13px"></i>
                <h3>Logos de clientes</h3>
                <span>Máx. 10 logos por sector</span>
            </div>
            <div class="form-card-body">

                {{-- Tab bar --}}
                <div class="logo-tabs-bar" id="logo-tabs-bar">
                    @foreach($sectors as $i => $sector)
                    @php $count = ($itemsBySector[$i] ?? collect())->count(); @endphp
                    <button type="button" class="logo-tab-btn {{ $i === 0 ? 'active' : '' }}"
                        id="tab-btn-{{ $i }}" onclick="switchTab({{ $i }})">
                        {{ $sector['name'] }}
                        <span class="tab-badge" id="tab-count-{{ $i }}">{{ $count }}</span>
                    </button>
                    @endforeach
                </div>

                {{-- Tab panels --}}
                @foreach($sectors as $i => $sector)
                @php $sectorItems = $itemsBySector[$i] ?? collect(); $sCount = $sectorItems->count(); @endphp
                <div class="logo-panel {{ $i === 0 ? 'active' : '' }}" id="logo-panel-{{ $i }}">
                    <div class="logo-panel-header">
                        <span><strong id="panel-count-{{ $i }}">{{ $sCount }}</strong>/10 logos</span>
                    </div>
                    <div class="logo-grid" id="logo-grid-{{ $i }}">
                        @foreach($sectorItems as $item)
                        @php
                            $img = $item->data('image','');
                            $src = ($img && !str_starts_with($img,'http')) ? asset('storage/'.$img) : $img;
                            $globalLogoIdx = $loop->parent->index * 100 + $loop->index; // unique starting idx per seeded item
                        @endphp
                        <div class="logo-card" id="logo-card-{{ $item->id }}-{{ $i }}-{{ $loop->index }}"
                            data-idx="{{ $item->sort_order }}">
                            <input type="hidden" name="logo_sector[{{ $item->sort_order }}]" value="{{ $i }}">
                            <input type="hidden" name="logo_existing_image[{{ $item->sort_order }}]" value="{{ $img }}" id="existing-{{ $item->sort_order }}">

                            <div class="logo-img-wrap" onclick="document.getElementById('file-{{ $item->sort_order }}').click()">
                                @if($src)
                                    <img src="{{ $src }}" alt="{{ $item->data('alt') }}" id="prev-{{ $item->sort_order }}">
                                @else
                                    <div class="logo-img-placeholder" id="ph-{{ $item->sort_order }}">
                                        <i class="fas fa-image"></i><span>Sin imagen</span>
                                    </div>
                                @endif
                                <div class="logo-img-overlay"><i class="fas fa-camera"></i> Cambiar</div>
                            </div>
                            <input type="file" id="file-{{ $item->sort_order }}" name="logo_image_new[{{ $item->sort_order }}]"
                                accept="image/*" style="display:none"
                                onchange="previewLogo({{ $item->sort_order }}, this)">

                            <div class="logo-card-body">
                                <input type="text" name="logo_alt[{{ $item->sort_order }}]" class="logo-alt-input"
                                    value="{{ $item->data('alt') }}" placeholder="Nombre empresa" maxlength="100">
                            </div>
                            <button type="button" class="logo-remove-btn"
                                onclick="removeLogo(this, {{ $i }})" title="Eliminar">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn-add-logo" id="add-btn-{{ $i }}"
                        onclick="addLogo({{ $i }})" {{ $sCount >= 10 ? 'disabled' : '' }}>
                        <i class="fas fa-plus"></i> Agregar logo
                        <span style="font-size:11px;opacity:.6">(máx. 10)</span>
                    </button>
                </div>
                @endforeach

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
                <div class="prev-tabs" id="prev-tabs">
                    @foreach($sectors as $i => $sector)
                    <span class="prev-tab {{ $i === 0 ? 'active' : '' }}" id="prev-tab-{{ $i }}">{{ $sector['name'] }}</span>
                    @endforeach
                </div>
                <div class="prev-logo-count">
                    @foreach($sectors as $i => $sector)
                    <div id="prev-count-{{ $i }}" style="{{ $i !== 0 ? 'display:none' : '' }}">
                        <i class="fas fa-images" style="color:#16a34a"></i>
                        <strong id="prev-n-{{ $i }}">{{ ($itemsBySector[$i] ?? collect())->count() }}</strong> logos — {{ $sector['name'] }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Info --}}
        <div style="margin-top:14px;padding:14px 16px;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;">
            <p style="font-size:11.5px;color:#16a34a;margin:0;line-height:1.6;">
                <i class="fas fa-info-circle" style="margin-right:5px"></i>
                <strong>Total: <span id="total-logos">{{ $totalItems }}</span> logos</strong><br>
                Haz clic en la imagen del logo para cambiarla. Haz hover sobre la card para ver el botón de eliminar.
            </p>
        </div>

    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#16a34a;margin-right:5px"></i> Los cambios se aplican inmediatamente en el sitio.</p>
    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
</div>

</form>

<script>
const MAX_LOGOS = 10;

// ── Global index: start after all seeded sort_order values ─────────────────
// We use a counter that won't collide with existing sort_order keys
let globalIdx = {{ $totalItems + 100 }};

// Counts per sector
let sectorCounts = {
    @foreach($sectors as $i => $sector)
    {{ $i }}: {{ ($itemsBySector[$i] ?? collect())->count() }},
    @endforeach
};

let activeTab = 0;

// ── Text sync ──────────────────────────────────────────────────────────────
function syncBadge(v) { document.getElementById('prev-badge').textContent = v; document.getElementById('c-badge').textContent = v.length; }
function syncTitle(v) { document.getElementById('prev-title').textContent = v; document.getElementById('c-title').textContent = v.length; }
function syncDesc(v)  { document.getElementById('prev-desc').textContent  = v; document.getElementById('c-desc').textContent  = v.length; }
function syncSectorName(i, v) {
    document.getElementById('tab-btn-' + i).childNodes[0].textContent = v + ' ';
    const pt = document.getElementById('prev-tab-' + i);
    if (pt) pt.textContent = v;
    const pc = document.getElementById('prev-count-' + i);
    if (pc) pc.querySelector('strong:last-child') && (pc.lastChild.textContent = ' ' + v);
}

// ── Tab switching ──────────────────────────────────────────────────────────
function switchTab(i) {
    document.querySelectorAll('.logo-tab-btn').forEach((btn, idx) => btn.classList.toggle('active', idx === i));
    document.querySelectorAll('.logo-panel').forEach((panel, idx) => panel.classList.toggle('active', idx === i));
    // Update preview
    document.querySelectorAll('[id^="prev-tab-"]').forEach((t, idx) => t.classList.toggle('active', idx === i));
    document.querySelectorAll('[id^="prev-count-"]').forEach((c, idx) => c.style.display = idx === i ? 'block' : 'none');
    activeTab = i;
}

// ── Add logo ───────────────────────────────────────────────────────────────
function addLogo(sectorIdx) {
    if (sectorCounts[sectorIdx] >= MAX_LOGOS) return;

    const idx  = globalIdx++;
    const grid = document.getElementById('logo-grid-' + sectorIdx);

    const card = document.createElement('div');
    card.className = 'logo-card';
    card.id = 'logo-new-' + idx;
    card.innerHTML = `
        <input type="hidden" name="logo_sector[${idx}]" value="${sectorIdx}">
        <input type="hidden" name="logo_existing_image[${idx}]" value="" id="existing-${idx}">
        <div class="logo-img-wrap" onclick="document.getElementById('file-${idx}').click()">
            <div class="logo-img-placeholder" id="ph-${idx}">
                <i class="fas fa-plus"></i>
                <span>Cargar imagen</span>
            </div>
            <img src="" alt="" id="prev-${idx}" style="display:none;max-width:90%;max-height:68px;object-fit:contain;">
            <div class="logo-img-overlay"><i class="fas fa-camera"></i> Cambiar</div>
        </div>
        <input type="file" id="file-${idx}" name="logo_image_new[${idx}]"
            accept="image/*" style="display:none"
            onchange="previewLogo(${idx}, this)">
        <div class="logo-card-body">
            <input type="text" name="logo_alt[${idx}]" class="logo-alt-input"
                value="" placeholder="Nombre empresa" maxlength="100">
        </div>
        <button type="button" class="logo-remove-btn"
            onclick="removeLogo(this, ${sectorIdx})" title="Eliminar">
            <i class="fas fa-times"></i>
        </button>`;

    grid.appendChild(card);
    sectorCounts[sectorIdx]++;
    updateSectorUI(sectorIdx);
}

// ── Remove logo ────────────────────────────────────────────────────────────
function removeLogo(btn, sectorIdx) {
    const card = btn.closest('.logo-card');
    if (card) card.remove();
    sectorCounts[sectorIdx]--;
    updateSectorUI(sectorIdx);
}

function updateSectorUI(sectorIdx) {
    const count = sectorCounts[sectorIdx];
    const addBtn = document.getElementById('add-btn-' + sectorIdx);
    const tabBadge = document.getElementById('tab-count-' + sectorIdx);
    const panelCount = document.getElementById('panel-count-' + sectorIdx);
    const prevN = document.getElementById('prev-n-' + sectorIdx);

    if (addBtn)     addBtn.disabled     = count >= MAX_LOGOS;
    if (tabBadge)   tabBadge.textContent = count;
    if (panelCount) panelCount.textContent = count;
    if (prevN)      prevN.textContent   = count;

    // Update total
    let total = 0;
    Object.values(sectorCounts).forEach(c => total += c);
    const tot = document.getElementById('total-logos');
    if (tot) tot.textContent = total;
}

// ── Image preview ──────────────────────────────────────────────────────────
function previewLogo(idx, input) {
    const file = input.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        const img = document.getElementById('prev-' + idx);
        const ph  = document.getElementById('ph-'   + idx);
        if (img) { img.src = e.target.result; img.style.display = 'block'; }
        if (ph)  ph.style.display = 'none';
    };
    reader.readAsDataURL(file);
}

// ── Visibility ─────────────────────────────────────────────────────────────
function updateVisLabel(checkbox) {
    document.getElementById('vis-label').textContent       = checkbox.checked ? 'Sí' : 'No';
    document.getElementById('vis-status').style.color      = checkbox.checked ? '#16a34a' : '#94a3b8';
    document.getElementById('vis-status-text').textContent = checkbox.checked ? 'Visible en el sitio' : 'Oculto en el sitio';
}
</script>
@endsection
