@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre:</h1>
            <p class="form-control">{{$user->name}}</p>
            <h1 class="h5">Lista de roles</h1>
            <form action="{{route('admin.users.update',$user)}}" method="POST">
                @csrf
                @method('put')
                {{-- {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!} --}}
                @foreach ($roles as $role )
                    <div class="d-flex">
                        <div class="form-check">
                            <input type="checkbox" class="form-checkbox" value="{{$role->id}}" name="roles[]"
                            @checked($user->roles->contains($role->id))
                            >
                        </div>
                        <label for="{{$role->name}}" class="form-checkbox ml-1">
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary mt-2">
                    Actualizar Rol
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
