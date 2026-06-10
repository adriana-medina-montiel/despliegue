@extends('layouts.admin')
@section('title', 'Capacitación — Inicio')
@section('breadcrumb', 'Página principal › Capacitación')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#16a34a'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-graduation-cap"></i></div>
    <div class="fph-text"><h2>Sección Capacitación</h2><p>Métricas, cita e imagen</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.capacitacion.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Cita</label><input type="text" name="quote" class="field-input" value="{{ old('quote', $section->content('quote')) }}"></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-chart-bar"></i><h3>Métricas</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach($items as $idx => $item)
                <div class="item-row" style="grid-template-columns:120px 1fr">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_value[]" class="field-input" value="{{ old('item_value.'.$idx, $item->data('value')) }}" placeholder="100%">
                    <input type="text" name="item_text[]" class="field-input" value="{{ old('item_text.'.$idx, $item->data('text')) }}" placeholder="Descripción">
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addMetric()"><i class="fas fa-plus"></i> Agregar métrica</button></div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-image"></i><h3>Imagen decorativa</h3></div>
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
<script>
function previewImg(e){const f=e.target.files[0];if(!f)return;const r=new FileReader();r.onload=x=>document.getElementById('preview-pic').src=x.target.result;r.readAsDataURL(f);}
function addMetric(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.style.gridTemplateColumns='120px 1fr';d.innerHTML='<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_value[]" class="field-input" placeholder="100%"><input type="text" name="item_text[]" class="field-input" placeholder="Descripción">';w.appendChild(d);}
</script>
@endsection
