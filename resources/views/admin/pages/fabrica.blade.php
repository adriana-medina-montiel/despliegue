@extends('layouts.admin')
@section('title', 'Fábrica de software')
@section('breadcrumb', 'Fábrica de software')
@section('content')
@include('admin.pages._placeholder', [
    'icon'        => 'fas fa-code',
    'title'       => 'Fábrica de software',
    'route_label' => '/fabrica',
    'color'       => '#7c3aed',
    'color_bg'    => '#f5f3ff',
    'sections'    => ['Hero / titular', 'Servicios ofrecidos', 'Metodología', 'Casos de uso'],
])
@endsection
