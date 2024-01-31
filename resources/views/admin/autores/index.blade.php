@extends('adminlte::page')
@section('title', 'Panel Administración')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Autores de contenidos</h1>
@stop


@section('content')
@if( session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK. </strong> {{session('info')}}
    </div>
@endif
<div class="card">
    <div class="card-header">
        <a href="{{route('admin.autores.create')}}">Nuevo autor</a>
    </div>
    <div class="card-body">

        <table class="table table-striped">
            <thead>
                <td>ID</td>
                <td>Foto</td>
                <td>Autor</td>
                <td>Departamento</td>
                <td></td>
            </thead>
            <tbody>
                @forelse ($autores as $autor )
                    <tr>
                        <td>{{$autor->id}}</td>
                        <td>
                            <img class="rounded-circle" width="60px" src="
                            @if($autor->fotoUrl)
                            {{asset('storage/autores/'.$autor->fotoUrl)}}
                            @else
                            {{asset('storage/images/noUser.jpg')}}
                            @endif
                            " alt="">
                        </td>

                        <td>{{$autor->name}}</td>
                        <td>{{$autor->departamento}}</td>


                        <td width="10px">
                            <a class="btn btn-secondary" href="{{route('admin.autores.edit',$autor)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.autores.destroy',$autor)}}" method="POST" class="formulario-eliminar">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>

                            </form>
                        </td>
                    </tr>
                @empty
                    <strong>No hay ningún autor ...</strong>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



@stop

@section('css')

@stop

@section('js')

@if(session('eliminar') == 'ok')
    <script>
        Swal.fire(
        'Eliminado!',
        'El autor ha sido eliminado',
        'success'
        )
    </script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Estás suguro?',
        text: "No podrás revertir esto.!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminalo!',
        cancelButtonText: 'Cancelar!'
        }).then((result) => {
        if (result.isConfirmed) {

            $(this).unbind('submit').submit()
        }
})

    });
</script>
@stop


