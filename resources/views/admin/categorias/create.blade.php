@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Crear una Categoría</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('admin.categorias.store')}}">

            @csrf
            {{-- @include('admin.categorias.partials.form') --}}
            <div class="form-group">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <label class="text-primary">Nombre</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                        @error("title")
                            <small class="text-danger">
                                <small>{{$message}}</small>
                            </small>
                        @enderror
                    </div>
                    <div class="ml-2">
                        <label class="text-primary">Capítulo</label>
                        <select name="capitulo_id" class="form-control form-control" aria-label=".form-select-lg example">
                            <option value="" disabled>Seleccione un capitulo</option>
                            @foreach ($capitulos as $capitulo )
                                <option value="{{$capitulo->id}}">{{$capitulo->titulo}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="ml-2">
                        <label class="text-primary">Orden</label>
                        <input type="text" name="orden" value="{{ old('orden') }}" class="form-control @error('orden') is-invalid @enderror">
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
                            <option value="0">Borrador</option>
                            <option value="1">Publicado</option>
                        </select>
                    </div>


                </div>


            </div>





            <button type="submit" class="btn btn-primary mt-2">Crear Categoría</button>

            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
