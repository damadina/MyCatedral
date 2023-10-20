@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Fotos</h1>
@stop

@section('content')
   @livewire('admin.fotos')
@stop

@section('css')

@stop

@section('js')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
