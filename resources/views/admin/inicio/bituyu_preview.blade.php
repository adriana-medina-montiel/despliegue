@extends('layouts.admin')
@section('title', 'Bituyú Preview — Inicio')
@section('breadcrumb', 'Página principal › Bituyú Preview')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#7c3aed'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-store"></i></div>
    <div class="fph-text"><h2>Sección Bituyú Preview</h2><p>Producto destacado, estadísticas y CTA</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.bituyu_preview.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea></div>
                <div class="field-group"><label class="field-label">CTA texto</label><input type="text" name="cta_text" class="field-input" value="{{ old('cta_text', $section->content('cta_text')) }}"></div>
                <div class="field-group"><label class="field-label">CTA URL</label><input type="text" name="cta_url" class="field-input" value="{{ old('cta_url', $section->content('cta_url')) }}"></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-chart-pie"></i><h3>Estadísticas</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach($items as $idx => $item)
                <div class="item-row" style="grid-template-columns:120px 1fr">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_value[]" class="field-input" value="{{ old('item_value.'.$idx, $item->data('value')) }}" placeholder="1,000+">
                    <input type="text" name="item_label[]" class="field-input" value="{{ old('item_label.'.$idx, $item->data('label')) }}" placeholder="Etiqueta">
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addStat()"><i class="fas fa-plus"></i> Agregar stat</button></div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-image"></i><h3>Diagrama</h3></div>
            <div class="form-card-body">
                <div class="upload-area" onclick="document.getElementById('img-up').click()">
                    <input type="file" id="img-up" name="diagram_image" accept="image/*" onchange="previewImg(event)">
                    <i class="fas fa-cloud-upload-alt"></i><p><strong>Clic para subir diagrama</strong></p>
                </div>
            </div>
        </div>
    </div>
    <div>
        @include('admin.inicio.partials.visibility')
        <div class="preview-card">
            <div class="preview-card-header"><i class="fas fa-eye"></i> Diagrama actual</div>
            <div class="preview-img-wrap"><img id="preview-pic" src="{{ cms_asset($section->content('diagram_image')) }}" alt=""></div>
        </div>
    </div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
function previewImg(e){const f=e.target.files[0];if(!f)return;const r=new FileReader();r.onload=x=>document.getElementById('preview-pic').src=x.target.result;r.readAsDataURL(f);}
function addStat(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.style.gridTemplateColumns='120px 1fr';d.innerHTML='<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_value[]" class="field-input" placeholder="1,000+"><input type="text" name="item_label[]" class="field-input" placeholder="Etiqueta">';w.appendChild(d);}
</script>
@endsection
