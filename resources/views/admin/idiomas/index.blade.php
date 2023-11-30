@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Idiomas</h1>
@stop

@section('content')
    @livewire('Admin.Idiomas')
@stop

@section('css')

@stop

@section('js')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@stop
