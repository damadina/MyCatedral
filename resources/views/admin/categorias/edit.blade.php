@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('admin.categorias.update',$categoria)}}">

            @csrf
            @method('PUT')

            {{-- @include('admin.categorias.partials.form') --}}
            <div class="form-group">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <label class="text-primary">Nombre</label>
                        <input type="text" value="{{$categoria->title}}" name="title" class="form-control @error('title') is-invalid @enderror">
                        @error("title")
                            <small class="text-danger">
                                <small>{{$message}}</small>
                            </small>
                        @enderror
                    </div>
                    <div class="ml-2">
                        <label class="text-primary">Orden</label>
                        <input type="text" value="{{$categoria->orden}}" name="orden" class="form-control @error('orden') is-invalid @enderror">
                        @error("orden")
                            <small class="text-danger">
                                <small>{{$message}}</small>
                            </small>
                        @enderror
                    </div>
                    <div class="ml-2">

                        <label class="text-primary">Estado</label>
                        <select name="isPublic" class="form-control form-control" aria-label=".form-select-lg example">
                            <option value="" disabled>Seleccione un estado</option>
                            <option value="0" {{ $categoria->isPublic == 0 ? 'selected' : '' }}>Borrador</option>
                            <option value="1" {{ $categoria->isPublic == 1 ? 'selected' : '' }}>Publicado</option>
                        </select>
                    </div>


                </div>


            </div>


            <button type="submit" class="btn btn-primary mt-2">Actualizar Categoría</button>

        </form>



       {{--  {!! Form::model($categoria,['route' => ['admin.categorias.update',$categoria],'method' => 'put']) !!}

        @include('admin.categorias.partials.form') --}}


        {{-- {!! Form::submit('Actualizar Categorias', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!} --}}
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
