<div>
    <div class="mb-6">
        @livewire("admin.informacion-crea")
    </div>

    <div class="card">


        @if($informaciones->count())
            <div class="card-body">
                @if (session()->has('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>enhorabuena!</strong> {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif



                <table class="table table-striped">
                    <thead>
                        <td>Titulo</td>
                        <td>Orden</td>
                        <td>Estado</td>
                        <td><td>
                        <td></td>

                    </thead>
                    <tbody>
                        @foreach ($informaciones as $item )
                            <tr>
                                <td>
                                    {{$item->titulo}}
                                </td>
                                <td>
                                    {{$item->order}}
                                </td>
                                <td>{{$item->estadoname}}</td>

                                <td width="10px">
                                    <button wire:click.prevent="edit({{$item->id}})"
                                        type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                                       Editar
                                   </button>

                                    {{-- <button class="btn btn-primary" wire:click="edit({{$item->id}})">Editar</button> --}}
                                </td>
                                <td width="10px">
                                    <button   class="btn btn-danger mr-2" wire:click="delete('{{$item->id}}')"><i class="fas fa-eraser"></i></button>

                                    {{-- <button class="btn btn-primary" wire:click="openEyeModal({{$item->id}})">
                                        <i class="fas fa-eye"></i>
                                    </button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="card-body">
                <strong>No hay Informaciones ...</strong>
            </div>
        @endif
    </div>


    <div  class="modal fade" id="infoEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="update">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Idioma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex">

                            <div class="w-50">
                                <label class="text-primary">Título</label>
                                <input  type="text" name="name" wire:model='informacionEdit.titulo'  class="form-control @error('informacionEdit.titulo') is-invalid @enderror">
                                @error("informacionEdit.titulo")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                            <div class="ml-2">
                                <label class="text-primary">Estado</label>
                                <select wire:model="informacionEdit.isPublic" class="form-control form-control" aria-label=".form-select-lg example">
                                    <option value="" disabled>Seleccione un estado</option>
                                    <option value="0">Borrador</option>
                                    <option value="1">Publicado</option>
                                </select>
                            </div>
                            <div class="ml-2">
                                <label class="text-primary">Orden</label>
                                <input  type="text" name="name" wire:model='informacionEdit.order'  class="form-control @error('informacionEdit.order') is-invalid @enderror">
                                @error("informacionEdit.order")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="text-primary">Información</label>
                            <textarea class="w-100 form-control" wire:model='informacionEdit.informacion'  rows="20"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" wire:click="close" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            <form>

        </div>
    </div>
</div>
