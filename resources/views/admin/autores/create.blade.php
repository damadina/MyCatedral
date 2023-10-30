@extends('adminlte::page')
@section('title', 'Panel Administración')

@section('content_header')
    <h1>Nuevo Autor</h1>
@stop

@section('content')
@if( session('info'))
    <div class="alert alert-primary" role="alert">
        <strong>OK. </strong> {{session('info')}}
    </div>
@endif
<div class="card">
    <div class="card-body">
        <form action="{{route('admin.autores.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="flex items-center">

                <div class="">
                    <x-label value="Foto" class="text-blue-600 font-semibold text-left"></x-label>
                    <img id="picture" src="{{asset('storage/images/noUser.jpg')}}" width="100"   alt="">
                </div>
                <div class="ml-6">
                    <x-input id="file" type="file" name="fotoUrl" class="form-control"></x-input>
                </div>
            </div>




            <div class="flex">
                <div class="flex-1">
                    <x-label value="Nombre" class="text-blue-600 font-semibold text-left"></x-label>
                    <x-input type="text" name="name" class="form-control"></x-input>
                    <x-input-error for="name" class="text-danger"></x-input-error>
                </div>


                <div class="ml-2">
                    <x-label value="Departamento" class="text-blue-600 font-semibold text-left"></x-label>
                    <x-input type="text" name="departamento" class="form-control"></x-input>
                    <x-input-error for="departamento" class="text-danger"></x-input-error>
                </div>
                <div class="ml-2">
                    <x-label value="Web" class="text-blue-600 font-semibold text-left"></x-label>
                    <x-input type="text" name="web" class="form-control"></x-input>
                    <x-input-error for="web" class="text-danger"></x-input-error>
                </div>

            </div>
            <x-label value="Curriculum" class="text-blue-600 font-semibold text-left pt-4"></x-label>
            <textarea type="text" name="bio" id="editor" class="form-control" rows="50" ></textarea>
            <x-input-error for="bio" class="text-danger"></x-input-error>
            <div class="mt-4 flex">
                <x-button type="button"  class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit">
                    Crear autor
                </x-danger-button>
            </div>

        </form>

    </div>


</div>



@stop

@section('css')
<style>
    .ck-editor__editable {
        min-height: 200px;
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
    <script>
        document.getElementById("file").addEventListener('change',cambiarImagen);
        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById('picture').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>

@stop

