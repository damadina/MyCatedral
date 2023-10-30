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
            <div class="flex">
                <div class="flex-1">
                    <x-label value="Título" class="text-blue-600 font-semibold text-left"></x-label>
                    <x-input type="text" name="titulo" class="form-control"></x-input>
                    <x-input-error for="titulo" class="text-danger"></x-input-error>
                </div>
                <div class="ml-2">
                    <x-label value="Orden" class="text-blue-600 font-semibold text-left"></x-label>
                    <x-input type="text" name="orden" class="form-control"></x-input>
                    <x-input-error for="orden" class="text-danger"></x-input-error>
                </div>


            </div>
            <x-label value="texto" class="text-blue-600 font-semibold text-left pt-4"></x-label>
            <textarea type="text" name="texto" id="editor" class="form-control" rows="50" ></textarea>
            <x-input-error for="texto" class="text-danger"></x-input-error>
            <div class="mt-4 flex">
                <x-button type="button"  class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit">
                    Crear documento
                </x-danger-button>
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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

