@extends('layouts.admin')
@section('title', 'Proceso y Soporte — Nearshoring')
@section('breadcrumb', 'Nearshoring › Proceso y Soporte')

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
        background: #ecfeff; color: #0891b2;
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
        border-color: #0891b2;
        box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.08);
        background: white;
    }
    textarea.field-input { resize: vertical; min-height: 90px; line-height: 1.55; }

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
        background: linear-gradient(90deg, #0891b2, #22c4e8);
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
    .switch input:checked + .slider { background: #0891b2; }
    .switch input:checked + .slider::before { transform: translateX(22px); }

    /* Thumbnails */
    .thumb-img {
        width: 100%; max-height: 140px; object-fit: cover;
        border: 1px solid #e2e8f0; border-radius: 8px;
        margin-bottom: 8px; background: #f1f5f9;
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
        background: #0891b2; color: white;
        font-size: 13.5px; font-weight: 700;
        border: none; cursor: pointer;
        transition: filter 0.15s, transform 0.1s;
    }
    .btn-save:hover { filter: brightness(1.15); transform: translateY(-1px); }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-route"></i></div>
    <div class="fph-text">
        <h2>Proceso y Soporte</h2>
        <p>Sección de Nearshoring fluido, viñetas de servicios y soporte de acompañamiento</p>
    </div>
    <a href="{{ route('admin.pages.nearshoring') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Nearshoring
    </a>
</div>

@if(session('success'))
<div class="alert-success">
    <i class="fas fa-check-circle"></i>
    {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.nearshoring.proceso.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- Columna principal --}}
    <div>
        {{-- Bloque Nearshoring fluido --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-globe" style="color:#0891b2;font-size:13px"></i>
                <h3>Sección Fluida NEARSHORING</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="nearshoring_title">Título Fluido</label>
                    <input type="text" id="nearshoring_title" name="nearshoring_title" class="field-input" value="{{ old('nearshoring_title', $section->content('nearshoring_title')) }}" required>
                </div>

                <div class="field-group">
                    <label class="field-label" for="nearshoring_description">Descripción Fluida</label>
                    <textarea id="nearshoring_description" name="nearshoring_description" class="field-input" required style="min-height:120px;">{{ old('nearshoring_description', $section->content('nearshoring_description')) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Viñetas de Servicios --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-list-ul" style="color:#0891b2;font-size:13px"></i>
                <h3>Servicios de Externalización (Viñetas)</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <div class="field-group">
                            <label class="field-label" for="staffing_title">Título de Servicios 1</label>
                            <input type="text" id="staffing_title" name="staffing_title" class="field-input" value="{{ old('staffing_title', $section->content('staffing_title')) }}" required>
                        </div>
                        <div class="field-group">
                            <label class="field-label" for="staffing_bullets">Viñetas 1 (Una por línea)</label>
                            <textarea id="staffing_bullets" name="staffing_bullets" class="field-input" required style="min-height:130px; font-family:monospace; font-size:12px;">{{ old('staffing_bullets', $section->content('staffing_bullets')) }}</textarea>
                        </div>
                    </div>

                    <div>
                        <div class="field-group">
                            <label class="field-label" for="outsourcing_title">Título de Servicios 2</label>
                            <input type="text" id="outsourcing_title" name="outsourcing_title" class="field-input" value="{{ old('outsourcing_title', $section->content('outsourcing_title')) }}" required>
                        </div>
                        <div class="field-group">
                            <label class="field-label" for="outsourcing_bullets">Viñetas 2 (Una por línea)</label>
                            <textarea id="outsourcing_bullets" name="outsourcing_bullets" class="field-input" required style="min-height:130px; font-family:monospace; font-size:12px;">{{ old('outsourcing_bullets', $section->content('outsourcing_bullets')) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Soporte / Acompañamiento --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-headset" style="color:#0891b2;font-size:13px"></i>
                <h3>Acompañamiento & Soporte Técnico</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="support_title">Título de sección</label>
                        <input type="text" id="support_title" name="support_title" class="field-input" value="{{ old('support_title', $section->content('support_title')) }}" required>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="support_lead">Frase destacada</label>
                        <input type="text" id="support_lead" name="support_lead" class="field-input" value="{{ old('support_lead', $section->content('support_lead')) }}" required>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="support_description">Descripción larga</label>
                    <textarea id="support_description" name="support_description" class="field-input" required style="min-height:110px;">{{ old('support_description', $section->content('support_description')) }}</textarea>
                </div>
            </div>
        </div>
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

        {{-- Imágenes --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-images"></i> Imágenes de la sección
            </div>
            <div class="form-card-body" style="display:flex; flex-direction:column; gap:18px;">
                {{-- Imagen Nearshoring --}}
                <div>
                    <label class="field-label">Imagen Nearshoring (Conectividad)</label>
                    @php
                        $img1 = $section->content('nearshoring_image');
                        $src1 = ($img1 && !str_starts_with($img1, 'http')) ? asset('storage/' . $img1) : $img1;
                    @endphp
                    @if($src1)
                        <img id="img-prev-1" src="{{ $src1 }}" class="thumb-img" alt="Nearshoring">
                    @endif
                    <input type="file" name="nearshoring_image" accept="image/*" onchange="previewImg(event, 'img-prev-1')">
                </div>

                {{-- Imagen Soporte --}}
                <div>
                    <label class="field-label">Imagen Soporte (Acompañamiento)</label>
                    @php
                        $img2 = $section->content('support_image');
                        $src2 = ($img2 && !str_starts_with($img2, 'http')) ? asset('storage/' . $img2) : $img2;
                    @endphp
                    @if($src2)
                        <img id="img-prev-2" src="{{ $src2 }}" class="thumb-img" alt="Acompañamiento">
                    @endif
                    <input type="file" name="support_image" accept="image/*" onchange="previewImg(event, 'img-prev-2')">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="save-bar">
    <p><i class="fas fa-shield-alt" style="color:#0891b2;margin-right:5px"></i> Los cambios se guardarán y aplicarán inmediatamente.</p>
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
