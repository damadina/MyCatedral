<div>
    @if(count($planos))
        <button wire:click="clickShow">
            @if($isPlano)
                <i class="mx-auto fas fa-map-marker-alt text-white" ></i>
            @else
                    <i class="mx-auto far fa-images text-white"></i>
            @endif
        </button>

        <x-dialog-modal wire:model='openModal' maxWidth="{{$maxWidth}}">
            <x-slot name="title">

                <div class="flex">
                    @if($isHome)
                    <p class="text-center flex-1">
                        <x-select class="w-100" wire:model.live="elementoSelected">
                            <option value="" >{{__('Todas las fotos')}}</option>
                            @foreach ($elementos as $item )
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </x-select>
                    </p>
                    @else
                    <p class="text-center flex-1">{{$elemento->title}}</p>
                    @endif
                    <button wire:click='clickHide' class="mr-4">
                        <i class="fas fa-times-circle text-2xl text-red-600"></i>
                    </button>
                </div>

            </x-slot>
            <x-slot name="content">

                <figure wire:model.live="image">
                    <img  alt="{{$image->alt}}" title="{{$image->title}}" class="w-full  object-cover object-center"
                    src="{{asset('storage/originales/'.$image->url)}}" loading="lazy">
                    <figcaption class="bg-gray-200 text-center pb-2 italic text-gray-600 text-xs md:text-xl">
                    <span class="px-2 text-sm">{{$image->piedefoto}}</span>
                    </figcaption>
                </figure>

            </x-slot>
            <x-slot name="footer" class="justify-start">
                @if(count($planos)>1)
                    <div class="flex">
                        <button wire:click="restImagenActual
                        @if($imagenActual===0)
                        disabled
                        @endif

                        ">
                            <i class="fas fa-chevron-circle-left text-catedral text-2xl
                            @if($imagenActual===0)
                            invisible
                            @endif
                            "></i>
                        </button>
                        <span class="ml-4">{{$imagenActual +1}}</span><span class="ml-4">de {{count($planos)}}</span>
                        <button class="ml-4" wire:click="addImagenActual"
                        @if($imagenActual+1===count($planos))
                        disabled
                        @endif
                        >
                            <i class="fas fa-chevron-circle-right text-catedral text-2xl
                            @if($imagenActual+1===count($planos))
                            invisible
                            @endif



                            "></i>
                        </button>
                    </div>
                @endif

            </x-slot>
        </x-dialog-modal>
    @endif
</div>
