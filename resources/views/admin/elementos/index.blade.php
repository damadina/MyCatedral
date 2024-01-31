@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Elementos de la Catedral</h1>
@stop

@section('content')
    @livewire('Admin.Elementos')
@stop

@section('css')

@stop

@section('js')
    <script>
        window.addEventListener('show-formElementoCreate', event =>{
            $('#formElementoCreate').modal('show');
        })
        window.addEventListener('hide-formElementoCreate', event =>{
            $('#formElementoCreate').modal('hide');
        })
        window.addEventListener('show-formElementoEdit', event =>{
            $('#formElementoEdit').modal('show');
        })
        window.addEventListener('hide-formElementoEdit', event =>{
            $('#formElementoEdit').modal('hide');
        })
    </script>
@stop
