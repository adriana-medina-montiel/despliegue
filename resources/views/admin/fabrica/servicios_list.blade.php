@extends('layouts.admin')
@section('title', 'Servicios Detallados — Fábrica de software')
@section('breadcrumb', 'Fábrica de software › Servicios detallados')

@section('content')
<style>
    /* Page header */
    .form-page-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .fph-icon {
        width: 46px; height: 46px; border-radius: 12px;
        background: #f5f3ff; color: #7c3aed;
        display: flex; align-items: center; justify-content: center; font-size: 18px;
    }
    .fph-text h2 { font-size: 19px; font-weight: 700; color: #0f172a; margin: 0 0 2px; }
    .fph-text p  { font-size: 12px; color: #94a3b8; margin: 0; }
    .fph-back {
        margin-left: auto; display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600;
        color: #475569; background: #f1f5f9; border: 1px solid #e2e8f0;
        text-decoration: none; transition: all 0.15s;
    }
    .fph-back:hover { background: #e2e8f0; }

    /* Services Table */
    .table-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
    }
    .table-card-header {
        padding: 18px 24px;
        border-bottom: 1px solid #f1f5f9;
        display: flex; align-items: center; gap: 10px;
    }
    .table-card-header h3 { font-size: 14px; font-weight: 700; color: #0f172a; margin: 0; }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    th {
        background: #f8fafc;
        padding: 14px 20px;
        font-size: 12px;
        font-weight: 700;
        color: #475569;
        border-bottom: 1px solid #e2e8f0;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    td {
        padding: 16px 20px;
        font-size: 13.5px;
        color: #334155;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }
    tr:last-child td {
        border-bottom: none;
    }
    .service-img {
        width: 60px;
        height: 40px;
        object-fit: cover;
        border-radius: 6px;
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
    }
    .service-title {
        font-weight: 700;
        color: #0f172a;
    }
    .service-desc {
        font-size: 12.5px;
        color: #64748b;
        max-width: 450px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .repse-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #fef3c7;
        color: #d97706;
        font-size: 10px;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 12px;
        text-transform: uppercase;
    }
    .edit-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        border-radius: 8px;
        font-size: 12.5px;
        font-weight: 600;
        color: white;
        background: #7c3aed;
        text-decoration: none;
        transition: filter 0.15s;
    }
    .edit-btn:hover {
        filter: brightness(1.15);
    }
</style>

<div class="form-page-header">
    <div class="fph-icon"><i class="fas fa-list"></i></div>
    <div class="fph-text">
        <h2>Servicios ofrecidos (Detallado)</h2>
        <p>Listado de los servicios detallados de Fábrica de software</p>
    </div>
    <a href="{{ route('admin.pages.fabrica') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Fábrica
    </a>
</div>

<div class="table-card">
    <div class="table-card-header">
        <h3>Lista de Servicios</h3>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">Imagen</th>
                    <th>Título del servicio</th>
                    <th>Descripción</th>
                    <th style="width: 120px;">REPSE / STPS</th>
                    <th style="width: 100px; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                @php
                    $img = $item->data('image');
                    $src = ($img && !str_starts_with($img, 'http')) ? asset('storage/' . $img) : $img;
                @endphp
                <tr>
                    <td>
                        @if($src)
                            <img src="{{ $src }}" alt="Service icon" class="service-img">
                        @else
                            <div class="service-img" style="display:flex;align-items:center;justify-content:center;color:#cbd5e1;"><i class="fas fa-image"></i></div>
                        @endif
                    </td>
                    <td>
                        <span class="service-title">{{ $item->data('title') }}</span>
                    </td>
                    <td>
                        <div class="service-desc" title="{{ $item->data('text') }}">{{ $item->data('text') }}</div>
                    </td>
                    <td>
                        @if($item->data('repse'))
                            <span class="repse-badge"><i class="fas fa-certificate"></i> Sí</span>
                        @else
                            <span style="font-size:11px;color:#94a3b8;">No aplica</span>
                        @endif
                    </td>
                    <td style="text-align: right;">
                        <a href="{{ route('admin.fabrica.servicios.editItem', $item->id) }}" class="edit-btn">
                            <i class="fas fa-pen"></i> Editar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
