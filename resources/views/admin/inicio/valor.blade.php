@extends('layouts.admin')
@section('title', 'Valor — Inicio')
@section('breadcrumb', 'Página principal › Valor')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#1d6fdb'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-star"></i></div>
    <div class="fph-text"><h2>Sección Valor / Experiencia</h2><p>Valores numerados de experiencia integral</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.valor.update') }}" method="POST">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><span class="field-hint">Admite &lt;span&gt; para resaltar.</span><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-th-list"></i><h3>Valores</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach($items as $idx => $item)
                <div class="item-row" style="grid-template-columns:80px 1fr">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_num[]" class="field-input" value="{{ old('item_num.'.$idx, $item->data('num')) }}" placeholder="01">
                    <input type="text" name="item_title[]" class="field-input" value="{{ old('item_title.'.$idx, $item->data('title')) }}" placeholder="Título" style="grid-column:1/-1">
                    <textarea name="item_text[]" class="field-input" placeholder="Texto" style="grid-column:1/-1">{{ old('item_text.'.$idx, $item->data('text')) }}</textarea>
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addValor()"><i class="fas fa-plus"></i> Agregar valor</button></div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
function addValor(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.style.gridTemplateColumns='80px 1fr';d.innerHTML='<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_num[]" class="field-input" placeholder="01"><input type="text" name="item_title[]" class="field-input" placeholder="Título" style="grid-column:1/-1"><textarea name="item_text[]" class="field-input" placeholder="Texto" style="grid-column:1/-1"></textarea>';w.appendChild(d);}
</script>
@endsection
