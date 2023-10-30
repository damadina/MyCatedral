<div>



    <div class="py-4 bg-white flex justify-center items-center space-x-4 flex-wrap shadow">


        <div class="flex">
            <x-dropdown  align="left" >

                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            Exterior
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto " >
                        <meta itemprop="description" content="Exterior de la Catedral de Santiago de Compostela">

                        @foreach ($exterior as $each )
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{URL($each->slug)}}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                        @endforeach

                        <div class="border-t border-gray-200"></div>
                        <li class="mt-2 text-center">
                            <a href="#" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <i class="fas fa-list mr-2"></i>{{ __('Exterior de la Catedral') }}
                            </a>
                        </li>

                    </ol>
                </x-slot>
            </x-dropdown>
        </div>
        <div class="flex">
            <x-dropdown  align="left" >

                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            Interior
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto " >
                        <meta itemprop="description" content="Exterior de la Catedral de Santiago de Compostela">

                        @foreach ($interior as $each )
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{URL($each->slug)}}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                        @endforeach

                        <div class="border-t border-gray-200"></div>
                        <li class="mt-2 text-center">
                            <a href="#" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <i class="fas fa-list mr-2"></i> {{ __('Interior de la Catedral') }}
                            </a>
                        </li>

                    </ol>

                </x-slot>
            </x-dropdown>
        </div>
        <div class="flex">
            <x-dropdown  align="left" >

                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            Capillas
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto " >
                        <meta itemprop="description" content="Exterior de la Catedral de Santiago de Compostela">

                        @foreach ($capillas as $each )
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{URL($each->slug)}}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                        @endforeach

                        <div class="border-t border-gray-200"></div>
                        <li class="mt-2 text-center">
                            <a href="#" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <i class="fas fa-list mr-2"></i> {{ __('Capillas de la Catedral') }}
                            </a>
                        </li>

                    </ol>

                </x-slot>
            </x-dropdown>
        </div>
        <div class="flex">
            <x-dropdown  align="left" >

                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            Museo
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto " >
                        <meta itemprop="description" content="Exterior de la Catedral de Santiago de Compostela">

                        @foreach ($museo as $each )
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{URL($each->slug)}}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                        @endforeach

                        <div class="border-t border-gray-200"></div>
                        <li class="mt-2 text-center">
                            <a href="#" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <i class="fas fa-list mr-2"></i> {{ __('Museo de la Catedral') }}
                            </a>
                        </li>

                    </ol>

                </x-slot>
            </x-dropdown>
        </div>

    </div>

    {{-- <div class="justify-center items-center w-full px-auto  mt-4 text-center text-white tracking-widest  font-semibold text-base sm:text-xl pb-4">
        @livewire('search')
    </div> --}}



</div>
{{-- <div class="flex">
            <x-dropdown  align="left"   width="36">

                <x-slot name="trigger">
                    <span class="flex rounded-md">
                        <button type="button"   class=" w-24  inline-flex items-center px-3 py-1 border border-transparent text-xs leading-4 font-medium rounded-l-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                            Historia
                        </button>
                        <button type="button" class="   items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                            <svg class=" -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">

                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto h-72 w-80" >
                        <meta itemprop="description" content="Historia de la Catedral de Santiago de Compostela">
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#El_Apostol_Santiago_y_la_Catedral_de_Santiago'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">El Apóstol Santiago y la Catedral de Santiago</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Construccion_de_las_primeras_iglesias'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Construcción de las primeras iglesias</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="2" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Construccion_de_la_Catedral'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Construcción de la Catedral</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="3" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Transformaciones_en_el_exterior_de_la_Catedral'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Transformaciones en el exterior de la Catedral</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="4" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Transformaciones_en_el_interior_de_la_Catedral'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Transformaciones en el interior de la Catedral</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="5" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Museo_de_la_Catedral_'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Museo de la Catedral</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="6" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Origenes_del_camino_a_Santiago'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Orígenes del camino a Santiago</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="7" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Las_peregrinaciones_a_la_Catedral_de_Santiago'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Las peregrinaciones a la Catedral de Santiago</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="8" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#El_Codice_Calixtino'}}" class="hover:bg-catedral hover:text-white -scroll-mt-6 snap-start ">
                                <span itemprop="name">El Códice Calixtino</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="9" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#El_Tumbo_A'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">El Tumbo A</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="10" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#El_Tumbo_B'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">El Tumbo B</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="11" />
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <x-dropdown-link itemprop="item" href="{{URL::to('/').'/#Breviario_de_Miranda'}}" class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">Breviario de Miranda</span>
                            </x-dropdown-link>
                            <meta itemprop="position" content="12" />
                        </li>

                    </ol>

                </x-slot>

            </x-dropdown>
        </div> --}}
