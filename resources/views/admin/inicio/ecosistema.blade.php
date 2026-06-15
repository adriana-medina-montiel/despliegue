@extends('layouts.admin')
@section('title', 'Ecosistema — Inicio')
@section('breadcrumb', 'Página principal › Ecosistema')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#ca8a04'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-network-wired"></i></div>
    <div class="fph-text"><h2>Sección Ecosistema / Respaldo</h2><p>Aliados, highlight y CTA</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.ecosistema.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea></div>
                <div class="field-group"><label class="field-label">Texto destacado (highlight)</label><textarea name="highlight_text" class="field-input">{{ old('highlight_text', $section->content('highlight_text')) }}</textarea></div>
                <div class="field-group"><label class="field-label">CTA texto</label><input type="text" name="cta_text" class="field-input" value="{{ old('cta_text', $section->content('cta_text')) }}"></div>
                <div class="field-group"><label class="field-label">CTA URL</label><input type="text" name="cta_url" class="field-input" value="{{ old('cta_url', $section->content('cta_url')) }}"></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-handshake"></i><h3>Tarjetas de aliados</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach($items as $idx => $item)
                <div class="item-row">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_alt[]" class="field-input" value="{{ old('item_alt.'.$idx, $item->data('alt')) }}" placeholder="Alt del logo">
                    <input type="hidden" name="item_file[]" value="{{ old('item_file.'.$idx, $item->data('file')) }}">
                    <input type="text" name="item_cdn[]" class="field-input" value="{{ old('item_cdn.'.$idx, $item->data('cdn')) }}" placeholder="CDN (opcional)">
                    <textarea name="item_text[]" class="field-input" placeholder="Texto">{{ old('item_text.'.$idx, $item->data('text')) }}</textarea>
                    <div style="display:flex;align-items:center;gap:12px">
                        @if($item->data('file'))<img src="{{ cms_asset($item->data('file')) }}" style="height:36px" alt="">@endif
                        <input type="file" name="item_logo_new[{{ $idx }}]" accept="image/*" class="field-input">
                    </div>
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addEco()"><i class="fas fa-plus"></i> Agregar aliado</button></div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
let ecoIdx={{ $items->count() }};
function addEco(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.innerHTML=`<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_alt[]" class="field-input" placeholder="Alt"><input type="hidden" name="item_file[]" value=""><input type="text" name="item_cdn[]" class="field-input" placeholder="CDN"><textarea name="item_text[]" class="field-input" placeholder="Texto"></textarea><input type="file" name="item_logo_new[${ecoIdx}]" accept="image/*" class="field-input">`;w.appendChild(d);ecoIdx++;}
</script>
@endsection
