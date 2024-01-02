<div>
    <button wire:click="clickShow">
        <i class="fas fa-info text-xs text-white"></i>
    </button>

    <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">
            <p class="text-center flex-1">
                <x-select class="w-100 text-xs" wire:model.live="informacionSelected">
                    @foreach ($informaciones as $item )
                        <option class="text-xs" value="{{$item->id}}">{{$item->titulo}}</option>
                    @endforeach
                </x-select>
            </p>
        </x-slot>
        <x-slot name="content">
            {!!$informacion!!}
        </x-slot>
        <x-slot name="footer">


            <x-button type="button" wire:click="$set('openModal',false)" class="mr-4">
                {{__('Cerrar')}}
            </x-button>

        </x-slot>
    </x-dialog-modal>

</div>
