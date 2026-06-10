@extends('layouts.admin')
@section('title', 'Tecnologías — Inicio')
@section('breadcrumb', 'Página principal › Tecnologías')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#7c3aed'])

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-microchip"></i></div>
    <div class="fph-text"><h2>Sección Tecnologías</h2><p>Textos y cita (logos desde partial deck-tech-logos)</p></div>
    <a href="{{ route('admin.pages.inicio') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Inicio</a>
</div>

@if(session('success'))<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>@endif

<form action="{{ route('admin.inicio.tecnologias.update') }}" method="POST">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><i class="fas fa-font"></i><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group"><label class="field-label">Kicker</label><input type="text" name="kicker" class="field-input" value="{{ old('kicker', $section->content('kicker')) }}"></div>
                <div class="field-group"><label class="field-label">Título</label><input type="text" name="title" class="field-input" value="{{ old('title', $section->content('title')) }}"></div>
                <div class="field-group"><label class="field-label">Descripción</label><textarea name="description" class="field-input">{{ old('description', $section->content('description')) }}</textarea></div>
                <div class="field-group"><label class="field-label">Cita (quote)</label><input type="text" name="quote" class="field-input" value="{{ old('quote', $section->content('quote')) }}"></div>
            </div>
        </div>
    </div>
    <div>@include('admin.inicio.partials.visibility')</div>
</div>
<div class="save-bar"><p>Los cambios se aplican inmediatamente.</p><button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button></div>
</form>
@endsection
