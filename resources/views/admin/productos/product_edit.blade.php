@extends('layouts.admin')
@section('title', 'Editar Producto — Productos')
@section('breadcrumb', 'Productos › Catálogo › Editar')

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
        background: #fff7ed; color: #ea580c;
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
        border-color: #ea580c;
        box-shadow: 0 0 0 3px rgba(234, 88, 12, 0.08);
        background: white;
    }
    textarea.field-input { resize: vertical; min-height: 90px; line-height: 1.55; }

    /* Dynamic list items */
    .item-row {
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
    .btn-remove {
        background: #ef4444; color: white; border: none;
        width: 28px; height: 28px; border-radius: 6px;
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

    /* Toggle switch */
    .visibility-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 16px;
    }
    .visibility-card-top {
        height: 4px;
        background: linear-gradient(90deg, #ea580c, #f97316);
    }
    .visibility-body { padding: 20px 22px; }
    .visibility-row {
        display: flex; align-items: center; justify-content: space-between; gap: 12px;
    }
    .visibility-info h4 { font-size: 13px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .visibility-info p  { font-size: 11.5px; color: #94a3b8; margin: 0; }

    .toggle-wrap { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }
    .toggle-label { font-size: 12px; font-weight: 600; color: #64748b; min-width: 32px; text-align: right; }

    .switch { position: relative; display: inline-block; width: 48px; height: 26px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider {
        position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0;
        background: #e2e8f0; border-radius: 26px;
        transition: background 0.2s;
    }
    .slider::before {
        position: absolute; content: "";
        height: 20px; width: 20px; left: 3px; bottom: 3px;
        background: white; border-radius: 50%;
        transition: transform 0.2s;
        box-shadow: 0 1px 4px rgba(0,0,0,0.18);
    }
    .switch input:checked + .slider { background: #ea580c; }
    .switch input:checked + .slider::before { transform: translateX(22px); }

    .thumb-img {
        width: 100%; max-height: 120px; object-fit: contain;
        border: 1px solid #e2e8f0; border-radius: 8px;
        margin-bottom: 8px; background: #f1f5f9;
        padding: 4px;
    }

    .save-bar {
        background: white; border: 1px solid #e2e8f0; border-radius: 14px;
        padding: 18px 24px; display: flex; align-items: center; justify-content: space-between;
        margin-top: 20px;
    }
    .save-bar p { font-size: 12px; color: #94a3b8; margin: 0; }
    .btn-save {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 10px 24px; border-radius: 9px;
        background: #ea580c; color: white;
        font-size: 13.5px; font-weight: 700;
        border: none; cursor: pointer;
        transition: filter 0.15s, transform 0.1s;
    }
    .btn-save:hover { filter: brightness(1.15); transform: translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-edit"></i></div>
    <div class="fph-text">
        <h2>Editar Producto Detalle</h2>
        <p>Clave: <strong>{{ strtoupper($key) }}</strong></p>
    </div>
    <a href="{{ route('admin.productos.servicios.edit') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a listado
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.productos.servicios.updateItem', $key) }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- Columna principal --}}
    <div>

        {{-- 1. BITUYÚ FORM --}}
        @if($key === 'bituyu')
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#ea580c;"></i>
                <h3>Textos Principales Bituyú</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="tagline">Lema / Tagline</label>
                    <textarea id="tagline" name="tagline" class="field-input" required>{{ old('tagline', $section->content('tagline')) }}</textarea>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="google_play_url">URL Google Play</label>
                        <input type="text" id="google_play_url" name="google_play_url" class="field-input" value="{{ old('google_play_url', $section->content('google_play_url')) }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="app_store_url">URL App Store</label>
                        <input type="text" id="app_store_url" name="app_store_url" class="field-input" value="{{ old('app_store_url', $section->content('app_store_url')) }}">
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label" for="bar_text">Texto de barra inferior</label>
                    <input type="text" id="bar_text" name="bar_text" class="field-input" value="{{ old('bar_text', $section->content('bar_text')) }}">
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="cta_text">Texto del Botón CTA</label>
                        <input type="text" id="cta_text" name="cta_text" class="field-input" value="{{ old('cta_text', $section->content('cta_text')) }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="cta_url">Enlace del Botón CTA</label>
                        <input type="text" id="cta_url" name="cta_url" class="field-input" value="{{ old('cta_url', $section->content('cta_url')) }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Bituyú Stats --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-chart-bar" style="color:#ea580c;"></i>
                <h3>Estadísticas de Ecosistema</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('stats', []) as $i => $stat)
                <div class="item-row" style="grid-template-columns: 1fr 1fr 1fr;">
                    <div style="grid-column: span 3; font-weight: 700; font-size:12px; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">Estadística #{{ $i + 1 }}</div>
                    <div class="field-group">
                        <label class="field-label">Valor</label>
                        <input type="text" name="stat_value[{{ $i }}]" class="field-input" value="{{ $stat['value'] ?? '' }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label">Etiqueta</label>
                        <input type="text" name="stat_label[{{ $i }}]" class="field-input" value="{{ $stat['label'] ?? '' }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label">Icono FontAwesome</label>
                        <input type="text" name="stat_icon[{{ $i }}]" class="field-input" value="{{ $stat['icon'] ?? '' }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Bituyú Features --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-list-ul" style="color:#ea580c;"></i>
                <h3>Características principales</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('features', []) as $i => $feat)
                <div class="item-row" style="grid-template-columns: 1fr 1fr;">
                    <div style="grid-column: span 2; font-weight: 700; font-size:12px; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">Característica #{{ $i + 1 }}</div>
                    <div class="field-group">
                        <label class="field-label">Título</label>
                        <input type="text" name="feature_title[{{ $i }}]" class="field-input" value="{{ $feat['title'] ?? '' }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label">Clase CSS de Icono (Fondo)</label>
                        <input type="text" name="feature_icon[{{ $i }}]" class="field-input" value="{{ $feat['icon'] ?? '' }}" placeholder="Ej: icon-store">
                    </div>
                    <div class="field-group">
                        <label class="field-label">Icono FontAwesome interno</label>
                        <input type="text" name="feature_inner_icon[{{ $i }}]" class="field-input" value="{{ $feat['inner_icon'] ?? '' }}" placeholder="Ej: fas fa-store">
                    </div>
                    <div class="field-group" style="grid-column: span 2;">
                        <label class="field-label">Descripción</label>
                        <textarea name="feature_desc[{{ $i }}]" class="field-input">{{ $feat['description'] ?? '' }}</textarea>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- 2. BINIBIAA FORM --}}
        @if($key === 'binibiaa')
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#ea580c;"></i>
                <h3>Textos Principales Binibiaa</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="subtitle">Subtítulo</label>
                        <input type="text" id="subtitle" name="subtitle" class="field-input" value="{{ old('subtitle', $section->content('subtitle')) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="title">Título</label>
                        <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="slogan">Eslogan</label>
                        <input type="text" id="slogan" name="slogan" class="field-input" value="{{ old('slogan', $section->content('slogan')) }}" required>
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input" required>{{ old('description', $section->content('description')) }}</textarea>
                </div>
                <div class="field-group">
                    <label class="field-label" for="marketplace_title">Título de barra Marketplace</label>
                    <input type="text" id="marketplace_title" name="marketplace_title" class="field-input" value="{{ old('marketplace_title', $section->content('marketplace_title')) }}" required>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="mlibre_url">Enlace Mercado Libre</label>
                        <input type="text" id="mlibre_url" name="mlibre_url" class="field-input" value="{{ old('mlibre_url', $section->content('mlibre_url')) }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="etsy_url">Enlace Etsy</label>
                        <input type="text" id="etsy_url" name="etsy_url" class="field-input" value="{{ old('etsy_url', $section->content('etsy_url')) }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- Binibiaa Showcase Items --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-th-large" style="color:#ea580c;"></i>
                <h3>Productos Destacados (Showcase)</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('items', []) as $i => $it)
                <div class="item-row" style="grid-template-columns: 1fr 1fr;">
                    <div style="grid-column: span 2; display:flex; justify-content:space-between; align-items:center; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">
                        <strong>Producto #{{ $i + 1 }}</strong>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Título</label>
                        <input type="text" name="item_title[{{ $i }}]" class="field-input" value="{{ $it['title'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Etiqueta/Badge</label>
                        <input type="text" name="item_badge[{{ $i }}]" class="field-input" value="{{ $it['badge'] ?? '' }}">
                    </div>
                    <div class="field-group" style="grid-column: span 2;">
                        <label class="field-label">Descripción corta</label>
                        <input type="text" name="item_desc[{{ $i }}]" class="field-input" value="{{ $it['description'] ?? '' }}" required>
                    </div>
                    <div class="field-group" style="grid-column: span 2;">
                        <label class="field-label">Subir Imagen del producto</label>
                        <div style="display:flex; align-items:center; gap:12px;">
                            @php
                                $itImg = $it['image'] ?? '';
                                $itSrc = ($itImg && !str_starts_with($itImg, 'http')) ? asset('storage/' . $itImg) : $itImg;
                            @endphp
                            @if($itSrc)
                                <img src="{{ $itSrc }}" alt="Showcase product" class="tech-logo-img" style="width:50px; height:50px; object-fit:cover;">
                            @endif
                            <input type="hidden" name="item_existing_image[{{ $i }}]" value="{{ $itImg }}">
                            <input type="file" name="item_image_new[{{ $i }}]" accept="image/*">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- 3. ACADEMIKA FORM --}}
        @if($key === 'academika')
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#ea580c;"></i>
                <h3>Textos Principales Academika</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="title">Título</label>
                    <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}" required>
                </div>
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input" required>{{ old('description', $section->content('description')) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Modules grid --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-cubes" style="color:#ea580c;"></i>
                <h3>Módulos del Sistema (6 Módulos)</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('modules', []) as $i => $mod)
                <div class="item-row" style="grid-template-columns: 1fr 1fr;">
                    <div style="grid-column: span 2; font-weight: 700; font-size:12px; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">Módulo #{{ $i + 1 }}</div>
                    <div class="field-group">
                        <label class="field-label">Título</label>
                        <input type="text" name="mod_title[{{ $i }}]" class="field-input" value="{{ $mod['title'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Descripción corta</label>
                        <input type="text" name="mod_desc[{{ $i }}]" class="field-input" value="{{ $mod['description'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Icono FontAwesome</label>
                        <input type="text" name="mod_icon[{{ $i }}]" class="field-input" value="{{ $mod['icon'] ?? '' }}" placeholder="Ej: fas fa-book icon-blue" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Clase de Color de Fondo</label>
                        <input type="text" name="mod_color[{{ $i }}]" class="field-input" value="{{ $mod['color'] ?? '' }}" placeholder="Ej: bg-blue-soft" required>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Features Bar --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-list-ul" style="color:#ea580c;"></i>
                <h3>Barra de Características inferiores (4 Ventajas)</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('features', []) as $i => $feat)
                <div class="item-row" style="grid-template-columns: 1fr 1fr;">
                    <div style="grid-column: span 2; font-weight: 700; font-size:12px; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">Ventaja #{{ $i + 1 }}</div>
                    <div class="field-group">
                        <label class="field-label">Icono FontAwesome</label>
                        <input type="text" name="feat_icon[{{ $i }}]" class="field-input" value="{{ $feat['icon'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Texto</label>
                        <input type="text" name="feat_text[{{ $i }}]" class="field-input" value="{{ $feat['text'] ?? '' }}" required>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- 4. SIGA FORM --}}
        @if($key === 'siga')
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#ea580c;"></i>
                <h3>Textos Principales SIGA</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="title">Título</label>
                        <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="subtitle">Subtítulo</label>
                        <input type="text" id="subtitle" name="subtitle" class="field-input" value="{{ old('subtitle', $section->content('subtitle')) }}" required>
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input" required>{{ old('description', $section->content('description')) }}</textarea>
                </div>
            </div>
        </div>

        {{-- SIGA Features --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-cubes" style="color:#ea580c;"></i>
                <h3>Características del Aprendizaje (6 Tarjetas)</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('features', []) as $i => $feat)
                <div class="item-row" style="grid-template-columns: 1fr 1fr;">
                    <div style="grid-column: span 2; font-weight: 700; font-size:12px; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">Característica #{{ $i + 1 }}</div>
                    <div class="field-group">
                        <label class="field-label">Título</label>
                        <input type="text" name="feat_title[{{ $i }}]" class="field-input" value="{{ $feat['title'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Icono FontAwesome</label>
                        <input type="text" name="feat_icon[{{ $i }}]" class="field-input" value="{{ $feat['icon'] ?? '' }}" required>
                    </div>
                    <div class="field-group" style="grid-column: span 2;">
                        <label class="field-label">Clase CSS de Color (Círculo)</label>
                        <input type="text" name="feat_color[{{ $i }}]" class="field-input" value="{{ $feat['color'] ?? '' }}" placeholder="Ej: ico-blue" required>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- 5. FENYX ADMIN FORM --}}
        @if($key === 'fenix_admin')
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#ea580c;"></i>
                <h3>Textos Principales Fenyx Admin</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="badge">Etiqueta superior</label>
                        <input type="text" id="badge" name="badge" class="field-input" value="{{ old('badge', $section->content('badge')) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="title">Título</label>
                        <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}" required>
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input" required>{{ old('description', $section->content('description')) }}</textarea>
                </div>
                <div class="field-group">
                    <label class="field-label" for="note_bubble_text">Mensaje en burbuja de personalización</label>
                    <textarea id="note_bubble_text" name="note_bubble_text" class="field-input" required>{{ old('note_bubble_text', $section->content('note_bubble_text')) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Fenyx Nodes --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-sync" style="color:#ea580c;"></i>
                <h3>Nodos Orbitando (6 Módulos)</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('nodes', []) as $i => $nd)
                <div class="item-row" style="grid-template-columns: 1fr 1fr;">
                    <div style="grid-column: span 2; font-weight: 700; font-size:12px; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">Nodo #{{ $i + 1 }}</div>
                    <div class="field-group">
                        <label class="field-label">Título</label>
                        <input type="text" name="node_title[{{ $i }}]" class="field-input" value="{{ $nd['title'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Descripción corta</label>
                        <input type="text" name="node_desc[{{ $i }}]" class="field-input" value="{{ $nd['description'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Icono FontAwesome</label>
                        <input type="text" name="node_icon[{{ $i }}]" class="field-input" value="{{ $nd['icon'] ?? '' }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Clase de Color Icono</label>
                        <input type="text" name="node_icon_class[{{ $i }}]" class="field-input" value="{{ $nd['icon_class'] ?? '' }}" placeholder="Ej: icon-blue" required>
                    </div>
                    <div class="field-group" style="grid-column: span 2;">
                        <label class="field-label">Clase CSS de Posicionamiento (Node)</label>
                        <input type="text" name="node_class[{{ $i }}]" class="field-input" value="{{ $nd['class'] ?? '' }}" placeholder="Ej: node-compras" required>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- 6. MI PBR FORM --}}
        @if($key === 'mipbr')
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#ea580c;"></i>
                <h3>Textos Principales MI PBR</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="badge_text">Etiqueta superior</label>
                        <input type="text" id="badge_text" name="badge_text" class="field-input" value="{{ old('badge_text', $section->content('badge_text')) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="main_heading">Título Principal</label>
                        <input type="text" id="main_heading" name="main_heading" class="field-input" value="{{ old('main_heading', $section->content('main_heading')) }}" required>
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label" for="subheading">Subtítulo / Lead</label>
                    <textarea id="subheading" name="subheading" class="field-input" required>{{ old('subheading', $section->content('subheading')) }}</textarea>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="objective_heading">Título Objetivo</label>
                        <input type="text" id="objective_heading" name="objective_heading" class="field-input" value="{{ old('objective_heading', $section->content('objective_heading')) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="widget_icon">SVG Path de Icono Widget</label>
                        <input type="text" id="widget_icon" name="widget_icon" class="field-input" value="{{ old('widget_icon', $section->content('widget_icon')) }}" required>
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label" for="objective_description">Descripción Objetivo</label>
                    <textarea id="objective_description" name="objective_description" class="field-input" required>{{ old('objective_description', $section->content('objective_description')) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Benefits list --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-check" style="color:#ea580c;"></i>
                <h3>Beneficios (6 Ventajas de Presupuesto)</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('benefits', []) as $i => $ben)
                <div class="field-group">
                    <label class="field-label">Beneficio #{{ $i + 1 }}</label>
                    <input type="text" name="benefit_text[{{ $i }}]" class="field-input" value="{{ $ben['text'] ?? '' }}" required>
                </div>
                @endforeach
            </div>
        </div>
        @endif


        {{-- 7. SSPIP FORM --}}
        @if($key === 'sspip')
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-info-circle" style="color:#ea580c;"></i>
                <h3>Textos Principales SSPIP</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="badge_text">Etiqueta superior</label>
                        <input type="text" id="badge_text" name="badge_text" class="field-input" value="{{ old('badge_text', $section->content('badge_text')) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="main_heading">Título Principal</label>
                        <input type="text" id="main_heading" name="main_heading" class="field-input" value="{{ old('main_heading', $section->content('main_heading')) }}" required>
                    </div>
                </div>
                <div class="field-group">
                    <label class="field-label" for="subheading">Subtítulo / Lead</label>
                    <textarea id="subheading" name="subheading" class="field-input" required>{{ old('subheading', $section->content('subheading')) }}</textarea>
                </div>
                <div class="field-group">
                    <label class="field-label" for="footer_text">Texto de Pie de página (Conacyt/PEI)</label>
                    <input type="text" id="footer_text" name="footer_text" class="field-input" value="{{ old('footer_text', $section->content('footer_text')) }}" required>
                </div>
            </div>
        </div>

        {{-- Timeline items --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-list-ol" style="color:#ea580c;"></i>
                <h3>Pasos de Línea de Tiempo (5 Puntos)</h3>
            </div>
            <div class="form-card-body">
                @foreach($section->content('timeline', []) as $i => $tl)
                <div class="item-row" style="grid-template-columns: 80px 1fr 1fr;">
                    <div style="grid-column: span 3; font-weight: 700; font-size:12px; border-bottom: 1px solid #f1f5f9; padding-bottom:4px;">Punto #{{ $i + 1 }}</div>
                    <div class="field-group">
                        <label class="field-label">Número</label>
                        <input type="text" name="tl_number[{{ $i }}]" class="field-input" value="{{ $tl['number'] ?? sprintf('%02d', $i+1) }}" required>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Icono FontAwesome</label>
                        <input type="text" name="tl_icon[{{ $i }}]" class="field-input" value="{{ $tl['icon'] ?? 'fas fa-chart-line' }}" required>
                    </div>
                    <div class="field-group" style="grid-column: span 3;">
                        <label class="field-label">Texto descriptivo</label>
                        <input type="text" name="tl_text[{{ $i }}]" class="field-input" value="{{ $tl['text'] ?? '' }}" required>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    {{-- Columna lateral --}}
    <div>
        {{-- Visibilidad --}}
        <div class="visibility-card">
            <div class="visibility-card-top"></div>
            <div class="visibility-body">
                <div class="visibility-row">
                    <div class="visibility-info">
                        <h4>Visibilidad</h4>
                        <p>Controla si aparece en la página.</p>
                    </div>
                    <div class="toggle-wrap">
                        <span class="toggle-label" id="vis-label">{{ $section->is_visible ? 'Sí' : 'No' }}</span>
                        <label class="switch">
                            <input
                                type="checkbox"
                                name="is_visible"
                                id="is_visible"
                                {{ $section->is_visible ? 'checked' : '' }}
                                onchange="updateVisLabel(this)"
                            >
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Imágenes específicas --}}
        @if($key === 'bituyu')
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-image"></i> Mascot Imagen (Celular)</div>
            <div class="form-card-body">
                @php
                    $img = $section->content('mascot_image');
                    $src = ($img && !str_starts_with($img, 'http')) ? asset('storage/' . $img) : $img;
                @endphp
                @if($src)
                    <img id="mascot-prev" src="{{ $src }}" class="thumb-img" alt="Mascota">
                @endif
                <input type="file" name="mascot_image" accept="image/*" onchange="previewImg(event, 'mascot-prev')">
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-project-diagram"></i> Diagrama de Ecosistema</div>
            <div class="form-card-body">
                @php
                    $img2 = $section->content('eco_diagram_image');
                    $src2 = ($img2 && !str_starts_with($img2, 'http')) ? asset('storage/' . $img2) : $img2;
                @endphp
                @if($src2)
                    <img id="eco-prev" src="{{ $src2 }}" class="thumb-img" alt="Ecosistema">
                @endif
                <input type="file" name="eco_diagram_image" accept="image/*" onchange="previewImg(event, 'eco-prev')">
            </div>
        </div>
        @endif

        @if($key === 'siga' || $key === 'fenix_admin')
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-laptop"></i> Computadora / Laptop</div>
            <div class="form-card-body">
                @php
                    $img = $section->content('laptop_image');
                    $src = ($img && !str_starts_with($img, 'http')) ? asset('storage/' . $img) : $img;
                @endphp
                @if($src)
                    <img id="laptop-prev" src="{{ $src }}" class="thumb-img" alt="Laptop">
                @endif
                <input type="file" name="laptop_image" accept="image/*" onchange="previewImg(event, 'laptop-prev')">
            </div>
        </div>
        @endif

        @if($key === 'mipbr')
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-image"></i> Imagen Corporativa</div>
            <div class="form-card-body">
                @php
                    $img = $section->content('image');
                    $src = ($img && !str_starts_with($img, 'http')) ? asset('storage/' . $img) : $img;
                @endphp
                @if($src)
                    <img id="image-prev" src="{{ $src }}" class="thumb-img" alt="Corporativo">
                @endif
                <input type="file" name="image" accept="image/*" onchange="previewImg(event, 'image-prev')">
            </div>
        </div>
        @endif

    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#ea580c;margin-right:5px"></i> Los cambios se guardarán y aplicarán inmediatamente.</p>
    <button type="submit" class="btn-save">
        <i class="fas fa-save"></i> Guardar cambios
    </button>
</div>

</form>

<script>
    function previewImg(event, id) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(id).src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    function updateVisLabel(checkbox) {
        const label  = document.getElementById('vis-label');
        if (checkbox.checked) {
            label.textContent = 'Sí';
        } else {
            label.textContent = 'No';
        }
    }
</script>
@endsection
