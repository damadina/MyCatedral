@extends('adminlte::page')
@section('title', 'Panel Administración')
@section('plugins.Sweetalert2',true)
@section('content_header')
    <h1>Información Visitas</h1>
@stop

@section('content')
    @livewire('Admin.Informacion-List')
@stop

@section('css')

@stop

@section('js')
   <script>
        window.addEventListener('show-infoCreate', event =>{
            $('#infoCreate').modal('show');
        })
        window.addEventListener('hide-infoCreate', event =>{
            $('#infoCreate').modal('hide');
        })
        window.addEventListener('show-infoEdit', event =>{
            $('#infoEdit').modal('show');
        })
        window.addEventListener('hide-infoEdit', event =>{
            $('#infoEdit').modal('hide');
        })
   </script>
   <script>
        Livewire.on('borrarInfo', function(informacionId) {
                    Swal.fire({
                        title: "Esta información se eliminará para siempre. Estás seguro?",
                        text: "este proceso lleva algun tiempo!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Si, hacerlo!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('start-delete',informacionId);
                        }
                        });
                });

   </script>
@stop
