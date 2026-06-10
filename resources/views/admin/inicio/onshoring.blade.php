@extends('layouts.admin')
@section('title', 'Onshoring — Inicio')
@section('breadcrumb', 'Página principal › Onshoring')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#0f172a'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-map-marker-alt"></i></div>
    <div class="fph-text"><h2>Sección Onshoring</h2><p>Modalidad onshoring, REPSE e imagen</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.onshoring.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea></div>
                <div class="field-group"><label class="field-label">Texto REPSE</label><span class="field-hint">Se muestra con icono de certificado.</span><textarea name="repse_text" class="field-input">{{ old('repse_text', $section->content('repse_text')) }}</textarea></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-image"></i><h3>Imagen</h3></div>
            <div class="form-card-body">
                <div class="upload-area" onclick="document.getElementById('img-up').click()">
                    <input type="file" id="img-up" name="image" accept="image/*" onchange="previewImg(event)">
                    <i class="fas fa-cloud-upload-alt"></i><p><strong>Clic para subir imagen</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div>
        @include('admin.inicio.partials.visibility')
        <div class="preview-card">
            <div class="preview-card-header"><i class="fas fa-eye"></i> Imagen actual</div>
            <div class="preview-img-wrap"><img id="preview-pic" src="{{ cms_asset($section->content('image')) }}" alt=""></div>
        </div>
    </div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>function previewImg(e){const f=e.target.files[0];if(!f)return;const r=new FileReader();r.onload=x=>document.getElementById('preview-pic').src=x.target.result;r.readAsDataURL(f);}</script>
@endsection
