@extends('layouts.admin')
@section('title', 'Servicios — Inicio')
@section('breadcrumb', 'Página principal › Servicios Destacados')

@section('content')
<style>
    .form-page-header { display:flex;align-items:center;gap:14px;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #e2e8f0; }
    .fph-icon { width:46px;height:46px;border-radius:12px;background:#ecfeff;color:#0891b2;display:flex;align-items:center;justify-content:center;font-size:18px; }
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
    .field-input:focus { border-color:#0891b2;box-shadow:0 0 0 3px rgba(8,145,178,.08);background:white; }
    textarea.field-input { resize:vertical;min-height:100px;line-height:1.55; }

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

    .save-bar { background:white;border:1px solid #e2e8f0;border-radius:14px;padding:18px 24px;display:flex;align-items:center;justify-content:space-between;margin-top:20px; }
    .save-bar p { font-size:12px;color:#94a3b8;margin:0; }
    .btn-save { display:inline-flex;align-items:center;gap:8px;padding:10px 24px;border-radius:9px;background:#0891b2;color:white;font-size:13.5px;font-weight:700;border:none;cursor:pointer;transition:filter .15s,transform .1s; }
    .btn-save:hover { filter:brightness(1.1);transform:translateY(-1px); }

    .card-group { border:1px solid #e2e8f0;border-radius:10px;padding:18px;margin-bottom:14px;background:#fafafa; }
    .card-group-header { display:flex;align-items:center;gap:8px;margin-bottom:14px;padding-bottom:10px;border-bottom:1px solid #f1f5f9; }
    .card-group-num { width:24px;height:24px;border-radius:50%;background:#0891b2;color:white;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0; }
    .card-group-header h4 { font-size:13px;font-weight:700;color:#0f172a;margin:0; }

    .icon-picker { display:grid;grid-template-columns:repeat(6,1fr);gap:6px;margin-top:6px; }
    .icon-picker input[type=radio] { display:none; }
    .icon-picker label { display:flex;align-items:center;justify-content:center;width:100%;aspect-ratio:1;border:2px solid #e2e8f0;border-radius:8px;cursor:pointer;background:white;transition:border-color .15s,background .15s;color:#64748b; }
    .icon-picker label:hover { border-color:#0891b2;color:#0891b2; }
    .icon-picker input[type=radio]:checked + label { border-color:#0891b2;background:#ecfeff;color:#0891b2; }
    .icon-picker label svg { width:18px;height:18px; }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-layer-group"></i></div>
    <div class="fph-text">
        <h2>Servicios Destacados (Cabecera)</h2>
        <p>Textos para el título y descripción que introduce el bloque de servicios</p>
    </div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Inicio
    </a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.inicio.services_intro.update') }}" method="POST">
@csrf

<div class="editor-layout">

    {{-- ══ Columna principal ══ --}}
    <div>
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-font" style="color:#0891b2;font-size:13px"></i>
                <h3>Textos de Cabecera</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}" maxlength="100">
                </div>

                <div class="field-group">
                    <label class="field-label" for="title">Título de sección</label>
                    <span class="field-hint">Puedes incluir &lt;span&gt;...&lt;/span&gt; para resaltar palabras en color.</span>
                    <input type="text" id="title" name="title" class="field-input"
                        value="{{ old('title', $section->content('title')) }}" maxlength="255">
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Descripción / Lead</label>
                    <textarea id="description" name="description" class="field-input"
                        maxlength="1000">{{ old('description', $section->content('description')) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Cards --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-th-large" style="color:#0891b2;font-size:13px"></i>
                <h3>Tarjetas de servicios (3 cards)</h3>
            </div>
            <div class="form-card-body">

            @php
            $cardDefaults = [
                1 => [
                    'title' => 'Software a la medida',
                    'desc'  => 'Ayudamos a las empresas a crecer y consolidarse mediante soluciones de software a la medida, respaldadas por consultoría especializada que garantiza que cada desarrollo responda realmente a las necesidades y objetivos del negocio.',
                    'icon'  => '0',
                ],
                2 => [
                    'title' => 'Desarrollo de aplicaciones móviles',
                    'desc'  => 'Convierte tu idea en una aplicación móvil real. Nuestro equipo de especialistas en iOS y Android te acompaña desde el concepto hasta el lanzamiento, desarrollando apps innovadoras que generan valor para tu negocio.',
                    'icon'  => '1',
                ],
                3 => [
                    'title' => 'Maquila de software',
                    'desc'  => 'Amplía la capacidad de desarrollo de tu empresa sin aumentar tu estructura interna. Nuestro equipo de profesionales en ingeniería de software te permite responder rápidamente a picos de demanda, evitando costos y tiempos asociados al reclutamiento y capacitación.',
                    'icon'  => '2',
                ],
            ];
            $iconSvgs = [
                0 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
                1 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><circle cx="12" cy="17" r="1" fill="currentColor" stroke="none"/></svg>',
                2 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
                3 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>',
                4 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>',
                5 => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/></svg>',
            ];
            $iconLabels = ['Código', 'Móvil', 'Equipo', 'Monitor', 'Paquete', 'Config'];
            @endphp

            @for($ci = 1; $ci <= 3; $ci++)
            @php $d = $cardDefaults[$ci]; @endphp
            <div class="card-group">
                <div class="card-group-header">
                    <div class="card-group-num">{{ $ci }}</div>
                    <h4>Tarjeta {{ $ci }}</h4>
                </div>

                <div class="field-group">
                    <label class="field-label">Icono</label>
                    <div class="icon-picker">
                        @foreach($iconSvgs as $idx => $svg)
                        <input type="radio" name="card{{ $ci }}_icon" id="card{{ $ci }}_icon_{{ $idx }}"
                            value="{{ $idx }}"
                            {{ old("card{$ci}_icon", $section->content("card{$ci}_icon", $d['icon'])) == $idx ? 'checked' : '' }}>
                        <label for="card{{ $ci }}_icon_{{ $idx }}" title="{{ $iconLabels[$idx] }}">{!! $svg !!}</label>
                        @endforeach
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="card{{ $ci }}_title">Título</label>
                    <input type="text" id="card{{ $ci }}_title" name="card{{ $ci }}_title" class="field-input"
                        value="{{ old("card{$ci}_title", $section->content("card{$ci}_title", $d['title'])) }}" maxlength="120">
                </div>

                <div class="field-group" style="margin-bottom:0">
                    <label class="field-label" for="card{{ $ci }}_desc">Descripción</label>
                    <textarea id="card{{ $ci }}_desc" name="card{{ $ci }}_desc" class="field-input" style="min-height:80px"
                        maxlength="500">{{ old("card{$ci}_desc", $section->content("card{$ci}_desc", $d['desc'])) }}</textarea>
                </div>
            </div>
            @endfor

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
    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#0891b2;margin-right:5px"></i> Los cambios se aplican inmediatamente.</p>
    <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
</div>

</form>

<script>
    function updateVisLabel(checkbox) {
        document.getElementById('vis-label').textContent = checkbox.checked ? 'Sí' : 'No';
    }
</script>
@endsection
