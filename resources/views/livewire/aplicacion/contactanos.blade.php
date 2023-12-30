<div>
    @slot('css')
        @include('livewire.aplicacion.cssContactanos')

    @endslot

    <div wire:loading>
        <div style="display: flex; justify-content:center; align-items: center; background-color:black;
            position:fixed; top: 0px; left:0px; z-index:9999; width:100%; height:100%; opacity:.75;">
            <div class="la-ball-spin la-2x">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <p class="text-2xl text-center mt-10 text-catedral">{{__('Mensaje a').' Catedraldesantiago.online'}}</p>

    @if (session('success'))
        <div class="container flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p class="text-white">{{ __(session('success')) }}</p>
        </div>
    @endif

    <div class="container mt-10">

        <div class=" relative">
            <input type="text"
                class="pl-10 pr-4 py-2 border rounded-lg w-full"
                placeholder="{{$user->name}}"
                name="nombre"
                readonly />
            <div class="absolute inset-y-0 left-0 pl-3
                        flex items-center
                        pointer-events-none">
                        <i class="far fa-user text-gray-400"></i>
                {{-- <svg class="h-5 w-5 text-gray-400"
                    fill="none"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
                    </path>
                </svg> --}}
            </div>
        </div>

        <div class=" relative mt-6">
            <input type="text"
                class="pl-10 pr-4 py-2 border rounded-lg w-full"
                placeholder="{{$user->email}}"
                name="mail"
                readonly />
            <div class="absolute inset-y-0 left-0 pl-3
                        flex items-center
                        pointer-events-none">
                        <i class="far fa-envelope text-gray-400"></i>
            </div>

        </div>

        <div class=" relative mt-6">
            <textarea type="text" name="mensaje" wire:model="mensaje"
                class="pl-10 pr-4 py-2 border rounded-lg w-full" rows="10">
            </textarea>

            <div class="absolute inset-y-0 left-0 pl-3
                        flex items-center
                        pointer-events-none">
                        <i class="far fa-sticky-note text-gray-400"></i>
            </div>
            <x-input-error for="mensaje" class="text-danger"></x-input-error>

        </div>

        <div class="mt-4">
            <x-button type="button" wire:click='enviar' wire:confirm="{{__('Vas a enviar un mail. ¿estás seguro?')}}">
                {{__('Enviar')}}
            </x-button>
            {{-- <x-danger-button type="button" wire:click='cancelar'>
                {{__('Cancelar')}}
            </x-button> --}}


            <a href={{$url}} class="btn btn-default">{{__('Cancelar')}}</a>

        </div>



</div>
