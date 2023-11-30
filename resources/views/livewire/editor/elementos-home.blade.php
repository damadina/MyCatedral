<div>

    <div class="container">
        <div class="flex mt-4">
            <div class="flex-1">
                <x-input wire:keydown='limpiar_page'   wire:model.live="search" class="form-control w-full" placeholder="Elemento"/>
            </div>


            <x-select class="ml-2" wire:model.live="categoriaSelected">
                <option value="" >
                    Seleccione una Categoría
                </option>
                @foreach ($categorias as $item )
                    <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </x-select>
        </div>


        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
              <div>
                <h2 class="text-2xl font-semibold leading-tight">Elementos de la Catedral</h2>
              </div>
              <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                  <table class="min-w-full leading-normal">
                    <thead>
                      <tr>
                        <th
                          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                        >
                          Elemento
                        </th>
                        <th
                          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                        >
                          Categoría
                        </th>

                        <th
                          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider"
                        >
                          Estado
                        </th>
                        <th
                          class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"
                        ></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($elementos as $item )
                            <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                              <div class="flex">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <img
                                        class="w-full h-full rounded-full"
                                        src="{{asset('storage/miniaturas/No_image_available.png')}}"
                                        alt=""
                                    />
                                </div>
                                <div class="ml-3">
                                  <p class="text-gray-900 whitespace-no-wrap font-semibold">
                                    {{$item->title}}
                                  </p>

                                </div>
                              </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                              <p class="text-gray-900 whitespace-no-wrap">{{$item->categoriaName}}</p>

                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                              <span
                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight"
                              >
                                <span
                                  aria-hidden
                                  class="absolute inset-0 bg-green-200 opacity-50 rounded-full"
                                ></span>
                                <span class="relative">{{$item->estadoName}}</span>
                              </span>
                            </td>
                            <td
                              class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right"
                            >

                              <a href="{{route('editor.edit.portadaResumen',$item->id)}}"
                                class="inline-block text-gray-500 hover:text-gray-700"
                              >
                                <svg
                                  class="inline-block h-6 w-6 fill-current"
                                  viewBox="0 0 24 24"
                                >
                                  <path
                                    d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z"
                                  />
                                </svg>
                            </a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                {{$elementos->links()}}
              </div>
            </div>
        </div>




    </div>
</div>

