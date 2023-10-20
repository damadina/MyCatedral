<div>
    <x-danger-button class="my-3 mx-3" wire:click="clickOpenModal()">
        Crear nuevo texto
    </x-danger-button>
    <form wire:submit='save'>
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nuevo elemento
            </x-slot>
            <x-slot name="content">
                <div class="flex gap-2">
                    <div class="flex-1">
                        <x-label value="Título" class="text-blue-600 font-semibold" ></x-label>
                        <x-input id="title" type="text" class="form-control" wire:model="elementoTextoForm.titulo" ></x-input>
                        <x-input-error for="elementoTextoForm.titulo" class="text-danger"></x-input-error>
                    </div>
                    <div class="w-10">
                        <x-label value="Orden" class="text-blue-600 font-semibold" ></x-label>
                        <x-input id="title" type="text" class="form-control" wire:model="elementoTextoForm.orden" ></x-input>
                        <x-input-error for="elementoTextoForm.orden" class="text-danger"></x-input-error>
                    </div>

                </div>
                <div class="mt-2">
                    <x-label value="Texto" class="text-blue-600 font-semibold" ></x-label>
                    <textarea type="text" class="form-control" rows="50" wire:model="elementoTextoForm.html"8 ></textarea>
                    <x-input-error for="elementoTextoForm.html" class="text-danger"></x-input-error>
                </div>
            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click='clickCloseModal' class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit">
                    Guardar elemento
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form>




</div>
