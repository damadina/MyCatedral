<div>
    <x-slot name="elemento">
        {{$elemento->id}}
    </x-slot>




        <div class="card-header">
            <livewire:editor.elementos-texto-crea :elemento="$elemento" />
            {{-- @livewire("editor.elementos-texto-crea") --}}
        </div>


       <div class="py-4 px-4">
            <div>

                {{$elemento->title}}
            </div>
            <div class="mt-2">
                <hr class="h-1 bg-gray-500">
            </div>


            @if($textos->count())


            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                  <table class="min-w-full leading-normal">
                    <thead>
                      <tr>
                        <th
                          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                        >
                          Titulo
                        </th>
                        <th
                          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                        >
                          Orden
                        </th>
                        <th
                          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"
                        ></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($textos as $item )
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap font-semibold">
                                        {{$item->titulo}}
                                    </p>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{$item->orden}}</p>

                                </td>


                                <td  class=" px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                    {{-- <a href="#" class=" inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Eliminar
                                    </a> --}}

                                    <div>

                                        <livewire:editor.elementos-texto-edit :texto="$item" :key="$item->id" />

                                    </div>

                                </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>

              {{-- <a href="{{route('editor.edit.portadaResumen',$item)}}" --}}






                @else
            <div class="mt-4 flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>No hay ningún texto para este elemento</p>
              </div>
            @endif
       </div>



</div>
