<div>
    <div class="mb-6">
        @livewire("admin.informacion-crea")
    </div>

    <div class="card">


        @if($informaciones->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <td>Titulo</td>
                        <td>Orden</td>
                        <td>Estado</td>
                        <td></td>
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
                                <td>{{$item->isPublic}}</td>
                                <td width="10px">
                                    <button class="btn btn-primary" wire:click="edit({{$item->id}})">Editar</button>
                                </td>
                                <td width="10px">
                                    <button class="btn btn-primary" wire:click="openEyeModal({{$item->id}})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="card-body">
                <strong>No hay Fotos ...</strong>
            </div>
        @endif
    </div>

    <form wire:submit='update'>
        <x-dialog-modal wire:model='informacionEdit.openModal'>
            <x-slot name="title">
                Acualizar información
            </x-slot>
            <x-slot name="content">

                <div class="d-flex">
                    <div class="mt-2 col-sm-8">
                        <x-label value="Titulo" class="text-primary"></x-label>
                        <x-input id="title" type="text" class="w-100 form-control" wire:model='informacionEdit.titulo'></x-input>
                        <x-input-error for="informacionEdit.titulo" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-1">
                        <x-label value="Orden" class="text-primary"></x-label>
                        <x-input  type="text" class="w-100 form-control" wire:model='informacionEdit.order'></x-input>
                        <x-input-error for="informacionEdit.order" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-3">
                        <x-label value="Estado" class="text-primary"></x-label>
                        <x-select class="w-100" wire:model="informacionEdit.isPublic">
                            <option value="" disabled>Seleccione un estado</option>
                            <option value="0">Borrador</option>
                            <option value="1">Publicado</option>
                        </x-select>

                        <x-input-error for="informacionEdit.isPublic" class="text-danger"></x-input-error>
                    </div>
                </div>

                <div class="mt-2">
                    <x-label value="Informacion" class="text-primary"></x-label>
                    <textarea class="w-100 form-control" wire:model='informacionEdit.informacion'  rows="20"></textarea>
                    <x-input-error for="informacionEdit.informacion" class="text-danger"></x-input-error>
                </div>




            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click="$set('informacionEdit.openModal',false)" class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit">
                    Guardar Información
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form>

    <x-dialog-modal wire:model='eyeModal'>
        <x-slot name="title">
            XXXXXx
        </x-slot>
        <x-slot name="content">
            {!!$info!!}

        </x-slot>
        <x-slot name="footer">


            <x-button type="button" wire:click="$set('eyeModal',false)" class="mr-4">
                Cancelar
            </x-button>
        </x-slot>
    </x-dialog-modal>




</div>
