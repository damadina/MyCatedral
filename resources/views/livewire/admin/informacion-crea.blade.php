<div>
    <button type="button" wire:click.prevent="newInfo" class="btn btn-primary my-2"><i class="fa fa-plus-circle mr-2"></i>Crear nueva informacion</button>

    <div wire:ignore.self class="modal fade" id="infoCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="save">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex">

                            <div class="w-50">
                                <label class="text-primary">Título</label>
                                <input  type="text" name="name" wire:model='informacionCreate.titulo'  class="form-control @error('informacionCreate.titulo') is-invalid @enderror">
                                @error("informacionCreate.titulo")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                            <div class="ml-2">
                                <label class="text-primary">Estado</label>
                                <select wire:model="informacionCreate.isPublic" class="form-control form-control" aria-label=".form-select-lg example">
                                    <option value="" disabled>Seleccione un estado</option>
                                    <option value="0">Borrador</option>
                                    <option value="1">Publicado</option>
                                </select>
                            </div>
                            <div class="ml-2">
                                <label class="text-primary">Orden</label>
                                <input  type="text" name="name" wire:model='informacionCreate.order'  class="form-control @error('informacionCreate.order') is-invalid @enderror">
                                @error("informacionCreate.order")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="text-primary">Información</label>
                            <textarea class="w-100 form-control" wire:model='informacionCreate.informacion'  rows="20"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" wire:click="close" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            <form>

        </div>
    </div>

    {{-- <form wire:submit='save'>
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nueva Información
            </x-slot>
            <x-slot name="content">
                <div class="d-flex">
                    <div class="mt-2 col-sm-8">
                        <x-label value="Titulo" class="text-primary"></x-label>
                        <x-input id="title" type="text" class="w-100 form-control" wire:model='informacionCreate.titulo'></x-input>
                        <x-input-error for="informacionCreate.titulo" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-1">
                        <x-label value="Orden" class="text-primary"></x-label>
                        <x-input  type="text" class="w-100 form-control" wire:model='informacionCreate.order'></x-input>
                        <x-input-error for="informacionCreate.order" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-3">
                        <x-label value="Estado" class="text-primary"></x-label>
                        <x-select class="w-100" wire:model="informacionCreate.isPublic">
                            <option value="" disabled>Seleccione un estado</option>
                            <option value="0">Borrador</option>
                            <option value="1">Publicado</option>
                        </x-select>

                        <x-input-error for="informacionCreate.isPublic" class="text-danger"></x-input-error>
                    </div>
                </div>

                <div class="mt-2">
                    <x-label value="Informacion" class="text-primary"></x-label>
                    <textarea class="w-100 form-control" wire:model='informacionCreate.informacion'  rows="20"></textarea>
                    <x-input-error for="informacionCreate.informacion" class="text-danger"></x-input-error>
                </div>







            </x-slot>
            <x-slot name="footer">
                <x-button type="button" wire:click='clickCloseModal' class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit" wire:click='clickOpenModal'>
                    Guardar informacion
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form> --}}





</div>
