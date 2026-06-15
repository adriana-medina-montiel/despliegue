@extends('layouts.admin')
@section('title', 'DevOps — Inicio')
@section('breadcrumb', 'Página principal › DevOps')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#0f172a'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-code-branch"></i></div>
    <div class="fph-text">
        <h2>Sección DevOps</h2>
        <p>Entrega continua, bullets e imagen lateral</p>
    </div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.devops.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font" style="color:#0f172a"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}" maxlength="100"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}" maxlength="255"></div>
                <div class="field-group"><label class="field-label">Lead</label><textarea name="lead" class="field-input" maxlength="2000">{{ old('lead', $section->content('lead')) }}</textarea></div>
            </div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-list" style="color:#0f172a"></i><h3>Bullets</h3></div>
            <div class="form-card-body" id="items-wrap">
                @foreach(old('item_text', $items->map(fn($i) => $i->data('text'))->toArray()) as $text)
                <div class="item-row">
                    <button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
                    <input type="text" name="item_text[]" class="field-input" value="{{ $text }}" placeholder="Texto del bullet">
                </div>
                @endforeach
            </div>
            <div style="padding:0 22px 22px"><button type="button" class="btn-add-item" onclick="addBullet()"><i class="fas fa-plus"></i> Agregar bullet</button></div>
        </div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-image" style="color:#0f172a"></i><h3>Imagen</h3></div>
            <div class="form-card-body">
                <div class="upload-area" onclick="document.getElementById('img-up').click()">
                    <input type="file" id="img-up" name="image" accept="image/*" onchange="previewImg(event,'preview-pic')">
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
<div class="save-bar"><p><i class="fas fa-shield-alt" style="margin-right:5px"></i> Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
<script>
function previewImg(e,id){const f=e.target.files[0];if(!f)return;const r=new FileReader();r.onload=x=>document.getElementById(id).src=x.target.result;r.readAsDataURL(f);}
function addBullet(){const w=document.getElementById('items-wrap');const d=document.createElement('div');d.className='item-row';d.innerHTML='<button type="button" class="item-row-remove" onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button><input type="text" name="item_text[]" class="field-input" placeholder="Texto del bullet">';w.appendChild(d);}
</script>
@endsection
