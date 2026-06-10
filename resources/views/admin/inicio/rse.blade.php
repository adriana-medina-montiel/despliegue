@extends('layouts.admin')
@section('title', 'RSE — Inicio')
@section('breadcrumb', 'Página principal › RSE')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#ca8a04'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-heart"></i></div>
    <div class="fph-text"><h2>Sección RSE</h2><p>Responsabilidad social, puntos e logos IES</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.rse.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-list-ul"></i><h3>Puntos RSE</h3></div>
            <div class="form-card-body" id="points-wrap">
                @foreach($points as $idx => $item)
                <div class="item-row" style="grid-template-columns:140px 1fr">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="point_icon[]" class="field-input" value="{{ old('point_icon.'.$idx, $item->data('icon')) }}" placeholder="Icono FA (ej. handshake)">
                    <textarea name="point_text[]" class="field-input" placeholder="Texto (HTML permitido)">{{ old('point_text.'.$idx, $item->data('text')) }}</textarea>
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addPoint()"><i class="fas fa-plus"></i> Agregar punto</button></div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-university"></i><h3>Logos IES</h3></div>
            <div class="form-card-body" id="logos-wrap">
                @foreach($logos as $idx => $item)
                <div class="item-row">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="logo_alt[]" class="field-input" value="{{ old('logo_alt.'.$idx, $item->data('alt')) }}" placeholder="Alt">
                    <input type="hidden" name="logo_file[]" value="{{ old('logo_file.'.$idx, $item->data('file')) }}">
                    <input type="text" name="logo_cdn[]" class="field-input" value="{{ old('logo_cdn.'.$idx, $item->data('cdn')) }}" placeholder="CDN (opcional)">
                    <div style="display:flex;align-items:center;gap:12px">
                        @if($item->data('file'))<img src="{{ cms_asset($item->data('file')) }}" style="height:36px" alt="">@endif
                        <input type="file" name="logo_image_new[{{ $idx }}]" accept="image/*" class="field-input">
                    </div>
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addLogo()"><i class="fas fa-plus"></i> Agregar logo</button></div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
let logoIdx={{ $logos->count() }};
function addPoint(){const w=document.getElementById('points-wrap');const d=document.createElement('div');d.className='item-row';d.style.gridTemplateColumns='140px 1fr';d.innerHTML='<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="point_icon[]" class="field-input" placeholder="Icono FA"><textarea name="point_text[]" class="field-input" placeholder="Texto"></textarea>';w.appendChild(d);}
function addLogo(){const w=document.getElementById('logos-wrap');const d=document.createElement('div');d.className='item-row';d.innerHTML=`<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="logo_alt[]" class="field-input" placeholder="Alt"><input type="hidden" name="logo_file[]" value=""><input type="text" name="logo_cdn[]" class="field-input" placeholder="CDN"><input type="file" name="logo_image_new[${logoIdx}]" accept="image/*" class="field-input">`;w.appendChild(d);logoIdx++;}
</script>
@endsection
