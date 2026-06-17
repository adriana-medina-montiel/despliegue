@extends('layouts.admin')
@section('title', 'Portafolio — Inicio')
@section('breadcrumb', 'Página principal › Portafolio')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#1d6fdb'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-boxes"></i></div>
    <div class="fph-text"><h2>Sección Portafolio</h2><p>Producto destacado (Bituyú) que se muestra en el home</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.stack.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Encabezado de la sección</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Texto del botón "Ver todos"</label><input type="text" name="cta_text" class="field-input" value="{{ old('cta_text', $section->content('cta_text')) }}"></div>
                <div class="field-group"><label class="field-label">URL del botón "Ver todos"</label><input type="text" name="cta_url" class="field-input" value="{{ old('cta_url', $section->content('cta_url')) }}"></div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-star"></i><h3>Producto destacado</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Nombre del producto</label><input type="text" name="brand_name" class="field-input" value="{{ old('brand_name', $section->content('brand_name')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea></div>

                <div class="field-group">
                    <label class="field-label">Icono / logo pequeño</label>
                    @if($section->content('brand_logo'))<div style="margin-bottom:8px"><img src="{{ cms_asset($section->content('brand_logo')) }}" style="height:40px" alt=""></div>@endif
                    <input type="file" name="brand_logo" accept="image/*" class="field-input">
                </div>

                <div class="field-group">
                    <label class="field-label">Imagen / captura del producto</label>
                    @if($section->content('product_image'))<div style="margin-bottom:8px"><img src="{{ cms_asset($section->content('product_image')) }}" style="max-width:220px;border-radius:8px" alt=""></div>@endif
                    <input type="file" name="product_image" accept="image/*" class="field-input">
                </div>

                <div class="field-group"><label class="field-label">Texto del enlace</label><input type="text" name="link_text" class="field-input" value="{{ old('link_text', $section->content('link_text')) }}" placeholder="Conoce Bituyú →"></div>
                <div class="field-group"><label class="field-label">URL del enlace</label><input type="text" name="link_url" class="field-input" value="{{ old('link_url', $section->content('link_url')) }}"></div>

                <div class="field-group">
                    <label class="field-label">Texto del sitio web (opcional)</label>
                    <span class="field-hint">Si lo dejas vacío, no se muestra ningún enlace al sitio web.</span>
                    <input type="text" name="website_text" class="field-input" value="{{ old('website_text', $section->content('website_text')) }}" placeholder="Visitar sitio web">
                </div>
                <div class="field-group"><label class="field-label">URL del sitio web (opcional)</label><input type="text" name="website_url" class="field-input" value="{{ old('website_url', $section->content('website_url')) }}" placeholder="https://bituyu.com.mx"></div>
            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-list-check"></i><h3>Puntos destacados</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach($items as $idx => $item)
                <div class="item-row">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_text[]" class="field-input" value="{{ old('item_text.'.$idx, $item->data('text')) }}" placeholder="Ej: Facturación electrónica CFDI">
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addPoint()"><i class="fas fa-plus"></i> Agregar punto</button></div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
function addPoint(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.innerHTML='<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_text[]" class="field-input" placeholder="Ej: Facturación electrónica CFDI">';w.appendChild(d);}
</script>
@endsection
