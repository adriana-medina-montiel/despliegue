@extends('layouts.admin')
@section('title', 'Nearshoring & Outsourcing')
@section('breadcrumb', 'Nearshoring & Outsourcing')
@section('content')
@include('admin.pages._placeholder', [
    'icon'        => 'fas fa-globe-americas',
    'title'       => 'Nearshoring & Outsourcing',
    'route_label' => '/nearshoring',
    'color'       => '#0891b2',
    'color_bg'    => '#ecfeff',
    'sections'    => ['Hero / titular', 'Propuesta de valor', 'Ventajas competitivas', 'Proceso de trabajo'],
])
@endsection
