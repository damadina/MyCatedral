<div>
    <button type="button" class="btn btn-primary mb-4" wire:click='clickOpenModal'>Crear nueva informacion</button>
    {{-- <x-danger-button wire:click='clickOpenModal'>
       Crear nueva informacion
    </x-danger-button>
 --}}

    <form wire:submit='save'>
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
    </form>





</div>
