@extends('layouts.admin')
@section('title', 'Cabecera — Blog')
@section('breadcrumb', 'Blog › Cabecera')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#16a34a'])

<div class="form-page-header">
    <div class="fph-icon" style="background:#f0fdf4;color:#16a34a"><i class="fas fa-heading"></i></div>
    <div class="fph-text">
        <h2>Cabecera del Blog</h2>
        <p>Etiqueta y título principal de la página /blog</p>
    </div>
    <a href="{{ route('admin.pages.blog') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Blog</a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.blog.header.update') }}" method="POST">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header"><h3>Textos</h3></div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="badge_text">Etiqueta superior</label>
                    <input type="text" id="badge_text" name="badge_text" class="field-input"
                        value="{{ old('badge_text', $section->content('badge_text')) }}">
                </div>
                <div class="field-group">
                    <label class="field-label" for="title">Título</label>
                    <input type="text" id="title" name="title" class="field-input"
                        value="{{ old('title', $section->content('title')) }}">
                </div>
            </div>
        </div>
    </div>
    <div>
        @include('admin.inicio.partials.visibility', ['section' => $section, 'color' => '#16a34a'])
    </div>
</div>
<div class="save-bar">
    <p>Los cambios se reflejan en la página pública del blog.</p>
    <button type="submit" class="btn-save" style="background:#16a34a"><i class="fas fa-save"></i> Guardar cambios</button>
</div>
</form>
@endsection
