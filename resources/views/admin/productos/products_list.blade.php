@extends('layouts.admin')
@section('title', 'Catálogo de Productos — Productos')
@section('breadcrumb', 'Productos › Catálogo')

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
        background: #fff7ed; color: #ea580c;
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

    /* Products Table */
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
    .product-title {
        font-weight: 700;
        color: #0f172a;
    }
    .product-desc {
        font-size: 12.5px;
        color: #64748b;
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
        background: #ea580c;
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
        <h2>Catálogo de productos (Detallado)</h2>
        <p>Listado de los productos detallados del portafolio Softura</p>
    </div>
    <a href="{{ route('admin.pages.productos') }}" class="fph-back">
        <i class="fas fa-arrow-left"></i> Volver a Productos
    </a>
</div>

<div class="table-card">
    <div class="table-card-header">
        <h3>Lista de Productos</h3>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 200px;">Nombre del producto</th>
                    <th>Descripción breve</th>
                    <th style="width: 100px; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $k => $item)
                <tr>
                    <td>
                        <span class="product-title">{{ $item['name'] }}</span>
                    </td>
                    <td>
                        <div class="product-desc">{{ $item['desc'] }}</div>
                    </td>
                    <td style="text-align: right;">
                        <a href="{{ route('admin.productos.servicios.editItem', $k) }}" class="edit-btn">
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
