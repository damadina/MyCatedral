<div>
    <x-slot name="elemento">
        {{$elemento->id}}
    </x-slot>


        <div class="my-4 mx-4">
            <div>

                {{$elemento->title}}
            </div>
            <div class="mt-2">
                <hr class="h-1 bg-gray-500">
            </div>

            <div>
                <livewire:editor.foto-portada-select :elemento="$elemento" />
            </div>
            <div>
                <img class="px-auto" src="{{$portadaUrl}}"/>
            </div>
            <div class="text-gray-400 italic">
                {{$portadaResumen->piedefoto}}
            </div>
            <form wire:submit='update'>
                <div class="mt-2">

                    <x-label value="Resumen del artículo" class="text-gray-900 font-semibold"></x-label>
                    <textarea type="text" class="form-control" rows="10" wire:model='portadaResumen.resumen'></textarea>
                    <x-input-error for="portadaResumen.resumen" class="text-danger"></x-input-error>
                </div>
                <div class="my-4 mx-4 flex gap-4">
                    <x-button type="button" wire:click="cancelar">
                        Cancelar
                    </x-button>

                    <x-danger-button type="submit">
                        Guardar Cambios
                    </x-danger-button>
                </div>
            </form>
        </div>



</div>
