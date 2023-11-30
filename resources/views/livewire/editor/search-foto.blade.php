<div>
    <div class="container">
        <div class="flex mt-4">
            <div class="flex-1">
                <x-input wire:keydown='limpiar_page'  wire:model.live="search" class="form-control w-full" placeholder="¿qué buscas?"/>
            </div>


            {{-- <x-select class="ml-2" wire:model.live="categoriaSelected">
                <option value="" >
                    Seleccione una Categoría
                </option>
                @foreach ($categorias as $item )
                    <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </x-select> --}}
        </div>

        <div class=" mx-auto">
            <div class="py-8">
              <div>
                <h2 class="text-2xl font-semibold leading-tight">Fotografías</h2>
              </div>
              <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                  <table class="min-w-full leading-normal">

                    <tbody>
                        @foreach ($fotos as $item )
                            <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                              <div class="flex">
                                <div class="flex-shrink-0 " >
                                    <img
                                        class="w-full h-full cursor-pointer" wire:click="clickImage('{{$item->url}}')"
                                        src="{{asset('storage/miniaturas/'.$item->url)}}"
                                        alt=""
                                    />
                                    {{$item->url}}
                                </div>
                                <div class="ml-3">
                                  <p class="text-gray-900 whitespace-no-wrap font-semibold">
                                    {{$item->piedefoto}}
                                  </p>

                                </div>
                              </div>
                            </td>

                            {{-- <td width="10px" class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <button class="btn btn-blue" onclick="myFunction()">Codigo inserción</button>

                            </td> --}}


                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                {{$fotos->links()}}
              </div>
            </div>
        </div>
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nueva fotografía
            </x-slot>
            <x-slot name="content">
                @if($url)
                    <input type="text"  class="w-full" readonly value="<IMAGE[{{$url}}]>" id="input">
                    <img class="w-full h-full cursor-pointer" src="{{asset('storage/originales/'.$url)}}"alt=""/>
                    {{$url}}
                @endif
            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click='clickCloseModal' class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="button" id="copy">
                    Copiar código de inserción al portapapeles
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>

    @slot('js')
        <script>
            function copy() {
                let copyText = document.querySelector("#input");
                copyText.select();
                document.execCommand("copy");
            }

            document.querySelector("#copy").addEventListener("click", copy);
        </script>

    @endslot


    </div>


</div>
