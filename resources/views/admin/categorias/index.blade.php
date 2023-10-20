@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')
   <div class="card">
    <div class="card-header">
        <a href="{{route('admin.categorias.create')}}">Crear Categoria</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de categoría</th>
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
                            <td>{{$categoria->orden}}</td>
                            <td>{{$categoria->isPublic}}</td>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
