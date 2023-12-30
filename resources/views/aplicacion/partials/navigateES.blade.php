<div>

    <div class="py-4 bg-white flex justify-center items-center space-x-4 flex-wrap shadow">

        <div class="flex">

            <x-dropdown  align="left" >

                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                          {{__('Exterior')}}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto " >
                        <meta itemprop="description" content={{__('Exterior de la Catedral de Santiago de Compostela')}}>
                        @foreach ($exterior as $each )
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                        @endforeach

                    </ol>
                </x-slot>
            </x-dropdown>



        </div>
        <div class="flex">
            <x-dropdown  align="left" >



                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            {{__('Interior')}}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto " >
                        <meta itemprop="description" content="Interior de la Catedral de Santiago de Compostela">

                        @foreach ($interior as $each )
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                        @endforeach

                    </ol>

                </x-slot>
            </x-dropdown>
        </div>
        <div class="flex">
            <x-dropdown  align="left" >

                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            {{__('Capillas')}}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList"class="overflow-auto " >
                        <meta itemprop="description" content="Capillas de la Catedral de Santiago de Compostela">

                        @foreach ($capillas as $each )
                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            </li>
                        @endforeach

                    </ol>

                </x-slot>
            </x-dropdown>
        </div>
        <div class="flex">
            <x-dropdown  align="left" >

                <x-slot name="trigger">
                    <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                            {{__('Museo')}}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </span>
                </x-slot>

                <x-slot name="content">
                    <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="overflow-auto" >
                        <meta itemprop="description" content="Museo de la Catedral de Santiago de Compostela">

                        @foreach ($museo as $each )

                            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>

                                <meta itemprop="position" content="1" />
                            </li>




                        @endforeach

                    </ol>

                </x-slot>
            </x-dropdown>
        </div>

    </div>

    {{-- <div class="justify-center items-center w-full px-auto  mt-4 text-center text-white tracking-widest  font-semibold text-base sm:text-xl pb-4">
        @livewire('search')
    </div> --}}



</div>

