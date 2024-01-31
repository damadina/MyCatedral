@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Nuevo Documento Legal</h1>
@stop

@section('content')
@if( session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK. </strong> {{session('info')}}
    </div>
@endif
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.documentos.store')}}" method="POST">
            @csrf
            <div class="d-flex">
                <div class="flex-grow-1">
                    <label for="" class="text-primary">Título</label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control" placeholder="Nombre del documento">
                    @error("titulo")
                        <small class="text-danger">
                            <strong>{{$message}}</strong>
                        </small>
                    @enderror
                </div>
                <div class="ml-2">
                    <label for="" class="text-primary">Orden</label>
                    <input type="text" name="orden" value="{{ old('orden') }}" class="form-control">
                    @error("orden")
                        <small class="text-danger">
                            <strong>{{$message}}</strong>
                        </small>
                    @enderror

                </div>
            </div>
            <x-label value="texto" class="text-blue-600 font-semibold text-left pt-4"></x-label>
            <textarea type="text" name="texto" id="editor" class="form-control" rows="50" >{{ old('texto') }}</textarea>
            @error("texto")
                <small class="text-danger">
                    <strong>{{$message}}</strong>
                </small>
            @enderror

            <div class="mt-4 d-flex">
                <a class="btn btn btn-primary" href="{{route('admin.documentos.index')}}">Cancelar</a>

                <button type="submit" class="btn btn-danger ml-2">Crear Documento</button>
            </div>

        </form>

    </div>


</div>



@stop

@section('css')
<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>
@stop

@section('js')

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

    </script>
@stop

