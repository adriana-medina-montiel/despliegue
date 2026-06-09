@extends('layouts.admin')
@section('title', 'Blog')
@section('breadcrumb', 'Blog')
@section('content')
@include('admin.pages._placeholder', [
    'icon'        => 'fas fa-newspaper',
    'title'       => 'Blog',
    'route_label' => '/blog',
    'color'       => '#16a34a',
    'color_bg'    => '#f0fdf4',
    'sections'    => ['Posts publicados', 'Posts pendientes de aprobación', 'Crear nuevo post', 'Gestión de categorías'],
])
@endsection
