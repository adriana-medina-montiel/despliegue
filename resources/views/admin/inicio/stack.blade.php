@extends('layouts.admin')
@section('title', 'Stack — Inicio')
@section('breadcrumb', 'Página principal › Stack / Productos')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#1d6fdb'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-boxes"></i></div>
    <div class="fph-text"><h2>Sección Stack / Productos</h2><p>Portafolio de productos en inicio</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.stack.update') }}" method="POST" enctype="multipart/form-data">
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
            <div class="form-card-header"><i class="fas fa-cube"></i><h3>Productos</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach($items as $idx => $item)
                <div class="item-row" style="grid-template-columns:1fr 1fr">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_name[]" class="field-input" value="{{ old('item_name.'.$idx, $item->data('name')) }}" placeholder="Nombre">
                    <input type="text" name="item_url[]" class="field-input" value="{{ old('item_url.'.$idx, $item->data('url')) }}" placeholder="URL">
                    <input type="text" name="item_description[]" class="field-input" value="{{ old('item_description.'.$idx, $item->data('description')) }}" placeholder="Descripción corta" style="grid-column:1/-1">
                    <input type="hidden" name="item_logo[]" value="{{ old('item_logo.'.$idx, $item->data('logo')) }}">
                    <div style="grid-column:1/-1;display:flex;align-items:center;gap:12px">
                        @if($item->data('logo'))<img src="{{ cms_asset($item->data('logo')) }}" style="height:32px" alt="">@endif
                        <input type="file" name="item_logo_new[{{ $idx }}]" accept="image/*" class="field-input">
                    </div>
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addProduct()"><i class="fas fa-plus"></i> Agregar producto</button></div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
let prodIdx={{ $items->count() }};
function addProduct(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.style.gridTemplateColumns='1fr 1fr';d.innerHTML=`<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_name[]" class="field-input" placeholder="Nombre"><input type="text" name="item_url[]" class="field-input" placeholder="URL"><input type="text" name="item_description[]" class="field-input" placeholder="Descripción" style="grid-column:1/-1"><input type="hidden" name="item_logo[]" value=""><input type="file" name="item_logo_new[${prodIdx}]" accept="image/*" class="field-input" style="grid-column:1/-1">`;w.appendChild(d);prodIdx++;}
</script>
@endsection
