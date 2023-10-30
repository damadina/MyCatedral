<x-app-layout>
    @slot('header')

    <div class="justify-center flex-1 items-start flex-wrap">



        <div class="flex justify-center items-center space-x-4 space-y-4 flex-wrap">
            <div>

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
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{URL('fachada-del-obradoiro') }}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >Fachada del Obradoiro</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{ URL('fachada-de-azabacheria') }}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Fachada de Azabachería</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="2" />
                            </li>

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('fachada-de-la-quintana') }}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >Fachada de la Quintana</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="3" />
                            </li>

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('fachada-de-platerias') }}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >Fachada de Platerías</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="4" />
                            </li>

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('torre-del-reloj') }}"   class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >Torre del Reloj</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="5" />
                            </li>
                            <div class="border-t border-gray-200"></div>
                                <li class="mt-2 text-center">
                                    <a href="#" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                        <i class="fas fa-list mr-2"></i> Exterior de la Catedral
                                    </a>
                                </li>
                        </ol>

                    </x-slot>
                </x-dropdown>
            </div>

            {{-- <div class="flex" >

                <x-dropdown  align="left"   width="36">

                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            <button type="button"   class="inline-flex items-center pl-2 py-1 border border-transparent text-xs leading-4 font-medium rounded-l-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                Interior
                            </button>
                            <button type="button" class="   items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium  text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <svg class=" -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <a href="{{route('interior')}}" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <i class="fas fa-list"></i>
                            </a>
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="overflow-auto h-72 w-80">
                            <meta itemprop="description" content="Interior de la Catedral de Santiago de Compostela">

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{URL('portico-de-la-gloria') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">El Pórtico de la Gloria</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{URL('las-naves-y-el-crucero') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Las naves y el crucero</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{ URL('la-sacristia') }}"  class="hover:bg-catedral hover:text-white">
                                <span itemprop="name">La Sacristía</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="3" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('biblioteca-y-la-sala-capitular') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Biblioteca y Sala Capitular</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="4" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('el-palacio-de-gelmirez') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Palacio de Gelmírez</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="5" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('la-puerta-santa') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">La Puerta Santa</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="6" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('el-claustro') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">El Claustro</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="7" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('el-trasaltar') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">El Trasaltar</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="8" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('tribuna-y-las-cubiertas') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">La Tribuna y las Cubiertas</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="9" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('el-organo-de-la-catedral') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">El Órgano</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="10" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('el-botafumeiro') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">El Botafumeiro</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="11" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('el-baptisterio') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">El Baptisterio</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="12" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('cripta-apostolica') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">La Cripta Apostólica</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="13" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('excavaciones-arqueologicas') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Las Excavaciones Arqueológicas</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="14" />
                            </li>
                        </ol>


                    </x-slot>
                </x-dropdown>
            </div> --}}

            {{-- <div class="flex" >

                <x-dropdown  align="left"   width="36">

                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            <button type="button"   class="inline-flex items-center pl-2 py-1 border border-transparent text-xs leading-4 font-medium rounded-l-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                Capillas
                            </button>
                            <button type="button" class="   items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium  text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <svg class=" -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <a href="{{route('capillas')}}" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <i class="fas fa-list"></i>
                            </a>
                        </span>
                    </x-slot>

                    <x-slot name="content">

                        <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="overflow-auto h-72 w-80">
                            <meta itemprop="description" content="Capillas de la Catedral de Santiago de Compostela">
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{URL('iglesia-de-la-corticela') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Iglesia de la Corticela</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{ URL('capilla-mayor') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla Mayor</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-san-fernando') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de San Fernando</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="3" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-las-reliquias') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de las Reliquias</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="4" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-del-pilar') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla del Pilar</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="5" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-del-cristo-de-burgos') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla del Cristp de Burgos</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="6" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-del-espiritu-santo') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de Espíritu Santo</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="7" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-del-salvador') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla del Salvador</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="8" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-santa-catalina') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de Santa Catalina</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="9" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-san-juan') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de San Juan</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="10" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-san-antonio') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de San Antonio</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="11" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-san-bartolome-o-santa-fe') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de San Bartolomé</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="12" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-nuestra-senora-la-blanca') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de Nuestra Señora la Blanca</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="13" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-san-andres') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de San Andrés</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="14" />
                            </li>

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-mondragon') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de Mondragón</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="15" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-la-concepcion-o-de-prima') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de la Concepción o de Prima</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="16" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-la-comunion') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de la Comunión</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="17" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-la-azucena-o-san-pedro') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de la Azucena</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="18" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('capilla-de-alba') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Capilla de Alba</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="19" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('camarin-de-santiago-caballero') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name">Camarín de Santiago Caballero</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="20" />
                            </li>
                        </ol>
                    </x-slot>
                </x-dropdown>
            </div> --}}

            {{-- <div class="flex" >

                <x-dropdown  align="left"   width="36">

                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            <button type="button"   class="inline-flex items-center pl-2 py-1 border border-transparent text-xs leading-4 font-medium rounded-l-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                Museo
                            </button>
                            <button type="button" class="   items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium  text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <svg class=" -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <a href="{{route('museo')}}" class="  inline-flex items-center px-1 py-1 border border-l-1 border-gray-300 text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <i class="fas fa-list"></i>
                            </a>
                        </span>
                    </x-slot>

                    <x-slot name="content">

                        <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="overflow-auto h-72 w-80">
                            <meta itemprop="description" content="Museo de la Catedral de Santiago de Compostela">
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{URL('tapices') }}"  class="hover:bg-catedral hover:text-white">
                                <span itemprop="name" >Colecciones de Tapices</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{ URL('pintura') }}"  class="hover:bg-catedral hover:text-white">
                                <span itemprop="name" >Pintura</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('orfebreria') }}"  class="hover:bg-catedral hover:text-white">
                                <span itemprop="name" >Orfebrería</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="3" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('elementos-arquitectonicos-y-escultura') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >Elementos arquitectónicos</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="4" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('artes-textiles') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name" >Artes Textiles</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="5" />
                            </li>
                        </ol>

                    </x-slot>
                </x-dropdown>
            </div> --}}

            {{-- <div class="" >
                <x-dropdown  align="left"   width="36">

                    <x-slot name="trigger">
                        <span class="flex rounded-md">
                            <button type="button"   class=" w-24 inline-flex items-center px-3 py-1 border border-transparent text-xs leading-4 font-medium rounded-l-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                Visitas
                            </button>
                            <button type="button" class="   items-center px-3 py-2 border border-transparent text-xs leading-4 font-medium rounded-r-md text-gray-500 bg-white hover:text-catedral focus:outline-none transition">
                                <svg class=" -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </x-slot>
                    <x-slot name="content">

                        <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="overflow-auto h-72 w-80 ">
                            <meta itemprop="description" content="Horarios de aperura, misas,entradas ....">
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{URL('horarios') }}"  class="hover:bg-catedral hover:text-white">
                                <span itemprop="name"  >Horarios y acceso</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{ URL('misasCatedral') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name"  >Misas en la Catedral</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="2" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('misasSantiago') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name"  >Misas en Santiago</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="3" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('calendarioLiturgico') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name"  >Calendario Litúrgico</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="4" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('entradasVisitas') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name"  >Visitas con entrada</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="5" />
                            </li>
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link itemprop="item" href="{{  URL('funcionamientoBotafumeiro') }}"  class="hover:bg-catedral hover:text-white">
                                    <span itemprop="name"  >Funcionamiento del Botafumeiro</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="6" />
                            </li>
                        </ol>



                    </x-slot>
                </x-dropdown>
            </div> --}}
        </div>

        {{-- <div class="justify-center items-center w-full px-auto  mt-4 text-center text-white tracking-widest  font-semibold text-base sm:text-xl pb-4">
            @livewire('search')
        </div> --}}



    </div>







    @endslot
</x-app-layout>
