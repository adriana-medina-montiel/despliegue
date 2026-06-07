@extends('layouts.admin')
@section('title', 'Página principal')
@section('breadcrumb', 'Página principal')
@section('content')
@include('admin.pages._placeholder', [
    'icon'        => 'fas fa-home',
    'title'       => 'Página principal',
    'route_label' => '/',
    'color'       => '#1d6fdb',
    'color_bg'    => '#eff6ff',
    'sections'    => ['Hero / banner principal', 'Logos de clientes', 'Servicios destacados', 'Llamada a la acción'],
])
@endsection
