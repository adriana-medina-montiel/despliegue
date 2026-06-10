@extends('layouts.admin')
@section('title', 'Publicaciones — Blog')
@section('breadcrumb', 'Blog › Publicaciones')

@section('content')
@include('admin.inicio.partials.form-styles', ['accent' => '#16a34a'])

<div class="form-page-header">
    <div class="fph-icon" style="background:#f0fdf4;color:#16a34a"><i class="fas fa-newspaper"></i></div>
    <div class="fph-text">
        <h2>Publicaciones del Blog</h2>
        <p>Gestiona las tarjetas de artículos mostradas en /blog</p>
    </div>
    <a href="{{ route('admin.pages.blog') }}" class="fph-back"><i class="fas fa-arrow-left"></i> Volver a Blog</a>
</div>

@if(session('success'))
<div class="alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
@endif

<form action="{{ route('admin.blog.posts.update') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="editor-layout">
    <div>
        <div class="form-card">
            <div class="form-card-header">
                <h3>Artículos</h3>
                <span class="hcount">{{ $items->count() }} publicados</span>
            </div>
            <div class="form-card-body">
                <div id="items-list">
                @foreach($items as $i => $item)
                <div class="item-row" id="item-{{ $i }}" style="border:1px solid #e2e8f0;border-radius:10px;padding:16px;margin-bottom:12px;background:#fafafa;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:10px;">
                        <strong style="font-size:12px;color:#64748b;">Artículo #{{ $i + 1 }}</strong>
                        <button type="button" onclick="removeItem({{ $i }})" style="background:#fee2e2;color:#ef4444;border:none;border-radius:6px;padding:4px 10px;cursor:pointer;font-size:11px;">Eliminar</button>
                    </div>
                    <input type="hidden" name="item_existing_image[{{ $i }}]" value="{{ $item->data('image') }}">
                    <div class="field-group">
                        <label class="field-label">Título</label>
                        <input type="text" name="item_title[{{ $i }}]" class="field-input" value="{{ $item->data('title') }}">
                    </div>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
                        <div class="field-group">
                            <label class="field-label">Fecha</label>
                            <input type="text" name="item_date[{{ $i }}]" class="field-input" value="{{ $item->data('date') }}" placeholder="11/11/2020">
                        </div>
                        <div class="field-group">
                            <label class="field-label">Autor</label>
                            <input type="text" name="item_author[{{ $i }}]" class="field-input" value="{{ $item->data('author') }}">
                        </div>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Categorías (opcional)</label>
                        <input type="text" name="item_categories[{{ $i }}]" class="field-input" value="{{ $item->data('categories') }}">
                    </div>
                    <div class="field-group">
                        <label class="field-label">Extracto</label>
                        <textarea name="item_excerpt[{{ $i }}]" class="field-input" rows="3">{{ $item->data('excerpt') }}</textarea>
                    </div>
                    <div class="field-group">
                        <label class="field-label">Imagen</label>
                        @php $img = $item->data('image'); @endphp
                        @if($img)
                        <img src="{{ cms_asset($img) }}" alt="" style="max-height:80px;margin-bottom:8px;border-radius:6px;">
                        @endif
                        <input type="file" name="item_image_new[{{ $i }}]" accept="image/*" class="field-input">
                    </div>
                </div>
                @endforeach
                </div>
                <button type="button" onclick="addItem()" style="margin-top:8px;padding:8px 16px;background:#f0fdf4;color:#16a34a;border:1px dashed #86efac;border-radius:8px;cursor:pointer;font-weight:600;font-size:13px;">+ Agregar artículo</button>
            </div>
        </div>
    </div>
    <div>
        @include('admin.inicio.partials.visibility', ['section' => $section, 'color' => '#16a34a'])
    </div>
</div>
<div class="save-bar">
    <p>Los artículos se muestran en orden en la página pública.</p>
    <button type="submit" class="btn-save" style="background:#16a34a"><i class="fas fa-save"></i> Guardar cambios</button>
</div>
</form>

<script>
let idx = {{ $items->count() }};
function addItem() {
    const d = document.createElement('div');
    d.className = 'item-row';
    d.id = 'item-' + idx;
    d.style.cssText = 'border:1px solid #e2e8f0;border-radius:10px;padding:16px;margin-bottom:12px;background:#fafafa;';
    d.innerHTML = `
        <div style="display:flex;justify-content:space-between;margin-bottom:10px;">
            <strong style="font-size:12px;color:#64748b;">Artículo nuevo</strong>
            <button type="button" onclick="removeItem(${idx})" style="background:#fee2e2;color:#ef4444;border:none;border-radius:6px;padding:4px 10px;cursor:pointer;font-size:11px;">Eliminar</button>
        </div>
        <input type="hidden" name="item_existing_image[${idx}]" value="">
        <div class="field-group"><label class="field-label">Título</label><input type="text" name="item_title[${idx}]" class="field-input"></div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
            <div class="field-group"><label class="field-label">Fecha</label><input type="text" name="item_date[${idx}]" class="field-input"></div>
            <div class="field-group"><label class="field-label">Autor</label><input type="text" name="item_author[${idx}]" class="field-input"></div>
        </div>
        <div class="field-group"><label class="field-label">Categorías</label><input type="text" name="item_categories[${idx}]" class="field-input"></div>
        <div class="field-group"><label class="field-label">Extracto</label><textarea name="item_excerpt[${idx}]" class="field-input" rows="3"></textarea></div>
        <div class="field-group"><label class="field-label">Imagen</label><input type="file" name="item_image_new[${idx}]" accept="image/*" class="field-input"></div>`;
    document.getElementById('items-list').appendChild(d);
    idx++;
}
function removeItem(i) { document.getElementById('item-' + i)?.remove(); }
</script>
@endsection
