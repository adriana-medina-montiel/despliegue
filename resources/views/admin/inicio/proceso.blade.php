@extends('layouts.admin')
@section('title', 'Proceso — Inicio')
@section('breadcrumb', 'Página principal › Proceso')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#1d6fdb'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-project-diagram"></i></div>
    <div class="fph-text"><h2>Sección Proceso / Externalización</h2><p>Tarjetas Onshoring / Nearshoring y pie</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.proceso.update') }}" method="POST">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Encabezado y pie</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Título</label><span class="field-hint">Admite &lt;br&gt; y &lt;strong&gt;.</span><textarea name="title" class="field-input">{{ old('title', $section->content('title')) }}</textarea></div>
                <div class="field-group"><label class="field-label">Texto pie (footer)</label><textarea name="footer_text" class="field-input">{{ old('footer_text', $section->content('footer_text')) }}</textarea></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-clone"></i><h3>Tarjetas</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach($items as $idx => $item)
                <div class="item-row">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_title[]" class="field-input" value="{{ old('item_title.'.$idx, $item->data('title')) }}" placeholder="Título tarjeta">
                    <textarea name="item_description[]" class="field-input" placeholder="Descripción">{{ old('item_description.'.$idx, $item->data('description')) }}</textarea>
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addCard()"><i class="fas fa-plus"></i> Agregar tarjeta</button></div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
function addCard(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.innerHTML='<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_title[]" class="field-input" placeholder="Título"><textarea name="item_description[]" class="field-input" placeholder="Descripción"></textarea>';w.appendChild(d);}
</script>
@endsection
