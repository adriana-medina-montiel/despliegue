@extends('layouts.admin')
@section('title', 'Calidad — Inicio')
@section('breadcrumb', 'Página principal › Calidad')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#ca8a04'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-award"></i></div>
    <div class="fph-text"><h2>Sección Calidad</h2><p>Certificaciones y logos</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.calidad.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-certificate"></i><h3>Certificaciones</h3></div>
            <div class="form-card-body" id="items-wrap">
                @php $oldItems = old('item_name') ? collect(old('item_name'))->keys() : $items->keys(); @endphp
                @foreach($items as $item)
                <div class="item-row" style="grid-template-columns:1fr 1fr">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_name[]" class="field-input" value="{{ old('item_name.'.$loop->index, $item->data('name')) }}" placeholder="Nombre">
                    <input type="hidden" name="item_file[]" value="{{ old('item_file.'.$loop->index, $item->data('file')) }}">
                    <input type="text" name="item_cdn[]" class="field-input" value="{{ old('item_cdn.'.$loop->index, $item->data('cdn')) }}" placeholder="CDN URL (opcional)">
                    <div style="grid-column:1/-1;display:flex;align-items:center;gap:12px">
                        @if($item->data('file'))<img src="{{ cms_asset($item->data('file')) }}" style="height:40px;object-fit:contain" alt="">@endif
                        <input type="file" name="item_logo_new[{{ $loop->index }}]" accept="image/*" class="field-input">
                    </div>
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addCert()"><i class="fas fa-plus"></i> Agregar certificación</button></div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
let certIdx={{ $items->count() }};
function addCert(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.style.gridTemplateColumns='1fr 1fr';d.innerHTML=`<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_name[]" class="field-input" placeholder="Nombre"><input type="hidden" name="item_file[]" value=""><input type="text" name="item_cdn[]" class="field-input" placeholder="CDN URL (opcional)"><div style="grid-column:1/-1"><input type="file" name="item_logo_new[${certIdx}]" accept="image/*" class="field-input"></div>`;w.appendChild(d);certIdx++;}
</script>
@endsection
