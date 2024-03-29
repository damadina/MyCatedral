@extends('adminlte::page')
@section('title', 'Panel Administración')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-header">
        <a href="{{route('admin.categorias.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle mr-2"></i>Crear Categoria</a>

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
                    <th>Nombre de categoría</th>
                    <th>Capítulo</th>
                    <th>Orden</th>
                    <th>Visible</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria )
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->title}}</td>
                            <td>{{$categoria->NameCapitulo}}</td>
                            <td>{{$categoria->orden}}</td>
                            <td>{{$categoria->estadoname}}</td>
                            <td width="10px">
                                <a class="btn btn-secondary" href="{{route('admin.categorias.edit',$categoria)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.categorias.destroy',$categoria)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Eliminar</button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay nigúna categoría registrado</td>
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
