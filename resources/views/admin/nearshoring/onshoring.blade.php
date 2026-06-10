@extends('layouts.admin')
@section('title', 'Onshoring — Nearshoring')
@section('breadcrumb', 'Nearshoring › Onshoring')

@section('content')
<style>
    /* Usamos los mismos estilos que ya definiste en hero */
    .form-page-header { display: flex; align-items: center; gap: 14px; margin-bottom: 28px; padding-bottom: 20px; border-bottom: 1px solid #e2e8f0; }
    .fph-icon { width: 46px; height: 46px; border-radius: 12px; background: #fffbeb; color: #ca8a04; display: flex; align-items: center; justify-content: center; font-size: 18px; }
    .editor-layout { display: grid; grid-template-columns: 1fr; gap: 22px; }
    .form-card { background: white; border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden; }
    .form-card-header { padding: 18px 24px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
    .form-card-body { padding: 24px; }
    .field-group { margin-bottom: 22px; }
    .field-label { display: block; font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .field-input { width: 100%; padding: 10px 13px; border-radius: 8px; border: 1px solid #d1d5db; font-size: 13.5px; background: #fafafa; outline: none; }
    .save-bar { background: white; border: 1px solid #e2e8f0; border-radius: 14px; padding: 18px 24px; margin-top: 20px; text-align: right; }
    .btn-save { padding: 10px 24px; border-radius: 9px; background: #ca8a04; color: white; font-weight: 700; border: none; cursor: pointer; }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-layer-group"></i></div>
    <div class="fph-text">
        <h2>Onshoring</h2>
        <p>Configuración de la sección de Onshoring</p>
    </div>
    <a href="{{ route('admin.pages.nearshoring') }}" style="margin-left:auto; color:#64748b; font-size:13px; font-weight:600; text-decoration:none;">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
</div>

@if(session('success'))
<div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:10px; padding:13px 18px; margin-bottom:22px; color:#15803d; font-size:13.5px;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<form  method="POST">
    @csrf
    <div class="editor-layout">
        <div class="form-card">
            <div class="form-card-header">
                <i class="fas fa-font" style="color:#ca8a04;font-size:13px"></i>
                <h3>Contenido Onshoring</h3>
            </div>
            <div class="form-card-body">
                <div class="field-group">
                    <label class="field-label" for="title">Título</label>
                    <input type="text" id="title" name="title" class="field-input" value="{{ old('title', $section->content['title'] ?? '') }}" required>
                </div>
                <div class="field-group">
                    <label class="field-label" for="description">Descripción</label>
                    <textarea id="description" name="description" class="field-input" rows="4" required>{{ old('description', $section->content['description'] ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="save-bar">
        <button type="submit" class="btn-save"><i class="fas fa-save"></i> Guardar cambios</button>
    </div>
</form>
@endsection