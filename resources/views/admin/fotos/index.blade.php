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
    <script>
         window.addEventListener('show-formCreateFoto', event =>{
            $('#formCreateFoto').modal('show');
        })
        window.addEventListener('hide-formCreateFoto', event =>{
            $('#formCreateFoto').modal('hide');
        })
        window.addEventListener('show-formEditFoto', event =>{
            $('#formEditFoto').modal('show');
        })
        window.addEventListener('hide-formEditFoto', event =>{
            $('#formEditFoto').modal('hide');
        })
    </script>
@stop
