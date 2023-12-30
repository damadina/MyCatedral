@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Crear nuevo Rol</h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('admin.roles.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="" class="text-primary">Nombre del Rol:</label>
                    <input type="text" name="name"  class="form-control" placeholder="Nombre del Rol">
                    @error("name")
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <strong class="text-primary">Permisos</strong>
                @error("permissions")
                    <div>
                        <small class="text-danger">
                            <strong>{{$message}}</strong>
                        </small>
                    </div>
                @enderror

                <div class="form-group">
                    @foreach ($permissions as $permission )
                        <div class="d-flex">
                            <div class="form-check">
                                <input type="checkbox" class="form-checkbox" value="{{$permission->id}}" name="permissions[]">
                            </div>
                            <label for="{{$permission->name}}" class="form-checkbox ml-1">
                                {{$permission->name}}
                            </label>
                        </div>
                    @endforeach
                </div>




                <button type="submit" class="btn btn-primary mt-2">
                    Crear Rol
                </button>
            </form>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
