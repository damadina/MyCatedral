<div>
    <button wire:click="clickModalOpen"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</button>
    <form wire:submit='update'>
        <x-dialog-modal wire:model='modalOpen'>
            <x-slot name="title">
                Nuevo texto
            </x-slot>
            <x-slot name="content">
                <div class="flex gap-2">
                    <div class="flex-1">
                        <x-label value="Título" class="text-blue-600 font-semibold text-left"></x-label>
                        <x-input id="title" type="text" class="form-control" wire:model="elementoTextEditForm.titulo" ></x-input>
                        <x-input-error for="elementoTextEditForm.titulo" class="text-danger"></x-input-error>
                    </div>
                    <div class="w-10">
                        <x-label value="Orden" class="text-blue-600 font-semibold text-left" ></x-label>
                        <x-input id="title" type="text" class="form-control" wire:model="elementoTextEditForm.orden" ></x-input>
                        <x-input-error for="elementoTextEditForm.orden" class="text-danger"></x-input-error>
                    </div>

                </div>
                <div class="mt-2">
                    <x-label value="Texto" class="text-blue-600 font-semibold text-left" ></x-label>
                    <textarea type="text" class="form-control" rows="50" wire:model="elementoTextEditForm.html"8 ></textarea>
                    <x-input-error for="elementoTextEditForm.html" class="text-danger"></x-input-error>
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
