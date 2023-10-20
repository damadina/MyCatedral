<div>
    <x-button class="my-4" wire:click='clickOpenModal'>
        Seleccionar foto de portada
    </x-button>


    <form >
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nueva fotografía
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($fotos as $item )
                        <div>

                            <img wire:click="clickFoto('{{$item->id}}' )"  class="px-auto cursor-pointer" src="{{asset('storage/miniaturas/'.$item->url)}}"/>
                        </div>
                    @endforeach
                </div>


            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click='clickCloseModal' class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit">
                    Guardar fotografía
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form>
</div>
