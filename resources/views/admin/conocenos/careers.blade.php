@extends('layouts.admin')
@section('title', 'Carreras — Conócenos')
@section('breadcrumb', 'Conócenos › Carreras')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#db2777'])

<div class="form-page-header">
    <div class="fph-icon" style="background:#fdf2f8;color:#db2777"><i class="fas fa-briefcase"></i></div>
    <div class="fph-text">
        <h2>Carreras — Buscamos talento</h2>
        <p>Textos del formulario de contacto para candidatos</p>
    </div>
    <a href="{{ route('admin.pages.conocenos') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Conócenos</a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.conocenos.careers.update') }}" method="POST">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input" value="{{ old('badge_text', $section->content('badge_text')) }}">
                </div>
                <div class="field-group">
                    <label class="field-label" for="title">Título</label>
                    <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}">
                </div>
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea>
                </div>
                <div class="field-group">
                    <label class="field-label" for="email">Correo de contacto</label>
                    <input type="email" id="email" name="email" class="field-input" value="{{ old('email', $section->content('email')) }}">
                </div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><h3>Beneficios / viñetas</h3></div>
            <div class="form-card-body">
                <div id="items-list">
                @foreach($items as $i => $item)
                <div class="field-group item-row" id="item-{{ $i }}" style="display:flex;gap:8px;align-items:center;">
                    <input type="text" name="item_label[{{ $i }}]" class="field-input" value="{{ $item->data('label') }}">
                    <button type="button" onclick="removeItem({{ $i }})" style="background:#fee2e2;color:#ef4444;border:none;border-radius:6px;padding:8px 12px;cursor:pointer;">X</button>
                </div>
                @endforeach
                </div>
                <button type="button" onclick="addItem()" class="btn-add" style="margin-top:8px;padding:8px 16px;background:#fdf2f8;color:#db2777;border:1px dashed #f9a8d4;border-radius:8px;cursor:pointer;font-weight:600;">+ Agregar</button>
            </div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility', ['section' => $section])</div>
</div>
<div class="save-bar">
    <p>El formulario de envío se mantiene en la vista pública.</p>
    <button type="submit" class="btn-save" style="background:#db2777"><i class="fas fa-save"></i> Guardar cambios</button>
</div>
</form>
<script>
let idx = {{ $items->count() }};
function addItem() {
    const d = document.createElement('div');
    d.className = 'field-group item-row';
    d.id = 'item-' + idx;
    d.style.cssText = 'display:flex;gap:8px;align-items:center;';
    d.innerHTML = `<input type="text" name="item_label[${idx}]" class="field-input" placeholder="Beneficio"><button type="button" onclick="removeItem(${idx})" style="background:#fee2e2;color:#ef4444;border:none;border-radius:6px;padding:8px 12px;cursor:pointer;">X</button>`;
    document.getElementById('items-list').appendChild(d);
    idx++;
}
function removeItem(i) { document.getElementById('item-' + i)?.remove(); }
</script>
@endsection
