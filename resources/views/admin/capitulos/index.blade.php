@extends('adminlte::page')
@section('title', 'Panel Administración')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Capitulos</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-header">
        <a href="{{route('admin.capitulos.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle mr-2"></i>Crear Capítulo</a>

        {{-- <a href="{{route('admin.categorias.create')}}">Crear Categoria</a> --}}
    </div>
    <div class="card-body">
        @if (session()->has('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>enhorabuena!</strong> {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de capítulo</th>
                    <th>Literal</th>
                    <th>Orden</th>
                    <th>Visible</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($capitulos as $capitulo )
                        <tr>
                            <td>{{$capitulo->id}}</td>
                            <td>{{$capitulo->titulo}}</td>
                            <td>{{$capitulo->literal}}</td>
                            <td>{{$capitulo->orden}}</td>
                            <td>{{$capitulo->estadoname}}</td>
                            <td width="10px">
                                <a class="btn btn-secondary" href="{{route('admin.capitulos.edit',$capitulo)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.capitulos.destroy',$capitulo)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay nigún capítulo registrado</td>
                        </tr>
                    @endforelse

            </tbody>

        </table>
    </div>
   </div>
@stop

@section('css')

@stop

@section('js')

@stop
