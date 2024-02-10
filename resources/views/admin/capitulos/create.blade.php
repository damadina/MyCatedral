@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Crear un capítulo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('admin.capitulos.store')}}">
                @csrf
                {{-- @include('admin.categorias.partials.form') --}}
                <div class="form-group">
                    <div class="d-flex">
                        <div class="">
                            <label class="text-primary">Nombre</label>
                            <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control @error('titulo') is-invalid @enderror">
                            @error("titulo")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>

                        <div class="ml-2 flex-grow-1 ">
                            <label class="text-primary">Literal</label>
                            <input type="text" name="literal" value="{{ old('literal') }}" class="form-control @error('literal') is-invalid @enderror">
                            @error("literal")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
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
                <button type="submit" class="btn btn-primary mt-2">Crear Capítulo</button>

            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
