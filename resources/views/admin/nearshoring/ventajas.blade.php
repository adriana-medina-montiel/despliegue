@extends('layouts.admin')
@section('title', 'Células y Onshoring — Nearshoring')
@section('breadcrumb', 'Nearshoring › Células y Onshoring')

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
        width: 100%; max-height: 120px; object-fit: cover;
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
    <div class="fph-icon"><i class="fas fa-certificate"></i></div>
    <div class="fph-text">
        <h2>Células y Onshoring</h2>
        <p>Sección de Células especializadas, REPSE y Onshoring fluido</p>
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

<form action="{{ route('admin.nearshoring.ventajas.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="editor-layout">

    {{-- Columna principal --}}
    <div>
        {{-- Bloque Células & REPSE --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-users-cog" style="color:#0891b2;font-size:13px"></i>
                <h3>Células Especializadas (STPS/REPSE)</h3>
            </div>
            <div class="form-card-body">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div class="field-group">
                        <label class="field-label" for="badge_text">Etiqueta superior</label>
                        <input type="text" id="badge_text" name="badge_text" class="field-input" value="{{ old('badge_text', $section->content('badge_text')) }}" required>
                    </div>

                    <div class="field-group">
                        <label class="field-label" for="title">Título de sección</label>
                        <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}" required>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="description">Descripción general</label>
                    <textarea id="description" name="description" class="field-input" required>{{ old('description', $section->content('description')) }}</textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" for="repse_text">Texto de Certificación REPSE</label>
                    <span class="field-hint">Puedes incluir &lt;strong&gt;&lt;/strong&gt; para resaltar texto.</span>
                    <textarea id="repse_text" name="repse_text" class="field-input" required>{{ old('repse_text', $section->content('repse_text')) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Bloque Onshoring Fluido --}}
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-layer-group" style="color:#0891b2;font-size:13px"></i>
                <h3>Sección Fluida ONSHORING</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="onshoring_title">Título Fluido</label>
                    <input type="text" id="onshoring_title" name="onshoring_title" class="field-input" value="{{ old('onshoring_title', $section->content('onshoring_title')) }}" required>
                </div>

                <div class="field-group">
                    <label class="field-label" for="onshoring_description">Descripción Fluida</label>
                    <textarea id="onshoring_description" name="onshoring_description" class="field-input" required style="min-height:140px;">{{ old('onshoring_description', $section->content('onshoring_description')) }}</textarea>
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
                {{-- Imagen 1 (Células lateral) --}}
                <div>
                    <label class="field-label">Imagen Células (Lateral)</label>
                    @php
                        $img = $section->content('image');
                        $src = ($img && !str_starts_with($img, 'http')) ? asset('storage/' . $img) : $img;
                    @endphp
                    @if($src)
                        <img id="img-prev-main" src="{{ $src }}" class="thumb-img" alt="Células lateral">
                    @endif
                    <input type="file" name="image" accept="image/*" onchange="previewImg(event, 'img-prev-main')">
                </div>

                {{-- Imagen Onshoring 1 --}}
                <div>
                    <label class="field-label">Imagen Fluida 1 (Mini izquierda)</label>
                    @php
                        $img1 = $section->content('onshoring_image1');
                        $src1 = ($img1 && !str_starts_with($img1, 'http')) ? asset('storage/' . $img1) : $img1;
                    @endphp
                    @if($src1)
                        <img id="img-prev-1" src="{{ $src1 }}" class="thumb-img" alt="Mini izquierda">
                    @endif
                    <input type="file" name="onshoring_image1" accept="image/*" onchange="previewImg(event, 'img-prev-1')">
                </div>

                {{-- Imagen Onshoring 2 --}}
                <div>
                    <label class="field-label">Imagen Fluida 2 (Mini derecha)</label>
                    @php
                        $img2 = $section->content('onshoring_image2');
                        $src2 = ($img2 && !str_starts_with($img2, 'http')) ? asset('storage/' . $img2) : $img2;
                    @endphp
                    @if($src2)
                        <img id="img-prev-2" src="{{ $src2 }}" class="thumb-img" alt="Mini derecha">
                    @endif
                    <input type="file" name="onshoring_image2" accept="image/*" onchange="previewImg(event, 'img-prev-2')">
                </div>

                {{-- Imagen Onshoring 3 --}}
                <div>
                    <label class="field-label">Imagen Fluida Principal (Fondo/Main)</label>
                    @php
                        $img3 = $section->content('onshoring_image3');
                        $src3 = ($img3 && !str_starts_with($img3, 'http')) ? asset('storage/' . $img3) : $img3;
                    @endphp
                    @if($src3)
                        <img id="img-prev-3" src="{{ $src3 }}" class="thumb-img" alt="Fondo/Main">
                    @endif
                    <input type="file" name="onshoring_image3" accept="image/*" onchange="previewImg(event, 'img-prev-3')">
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
