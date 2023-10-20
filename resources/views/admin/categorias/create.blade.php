@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Crear una Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categorias.store']) !!}

            @include('admin.categorias.partials.form')


            {!! Form::submit('Crear Categoría', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
