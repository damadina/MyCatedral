@extends('adminlte::page')
@section('title', 'Panel Administración')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Documentos Legales</h1>
@stop

@section('content')
    @if( session('info'))
        <div class="alert alert-primary" role="alert">
            <strong>OK. </strong> {{session('info')}}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.documentos.create')}}">Nuevo documento</a>
        </div>

        @if($documents->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <td>ID</td>
                        <td>Titulo</td>
                        <td>Orden</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach ($documents as $each )
                            <tr>
                                <td>{{$each->id}}</td>
                                <td>{{$each->titulo}}</td>
                                <td>{{$each->orden}}</td>
                                <td width="10px">
                                    <a class="btn btn-secondary" href="{{route('admin.documentos.edit',$each)}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('admin.documentos.destroy',$each)}}" method="POST" class="formulario-eliminar">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Eliminar</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="card-body">
                <strong>No hay ningún documento ...</strong>
            </div>
        @endif
    </div>

@stop

@section('css')

@stop

@section('js')
@if(session('eliminar') == 'ok')
    <script>
        Swal.fire(
        'Eliminado!',
        'El documento ha sido eliminado',
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
{{-- @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector('#editor'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );

    </script> --}}
