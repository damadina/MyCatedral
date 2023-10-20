@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
   @livewire('Admin.Users')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
