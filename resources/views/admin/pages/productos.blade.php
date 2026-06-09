@extends('layouts.admin')
@section('title', 'Productos')
@section('breadcrumb', 'Productos')
@section('content')
@include('admin.pages._placeholder', [
    'icon'        => 'fas fa-box-open',
    'title'       => 'Productos',
    'route_label' => '/productos',
    'color'       => '#ea580c',
    'color_bg'    => '#fff7ed',
    'sections'    => ['Grid de productos', 'Detalle de cada producto', 'Características y módulos', 'Marketplaces'],
])
@endsection
