<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow">
    {{-- @php
        use Illuminate\Support\Facades\Auth;
        use App\Models\idioma;
        $user = auth::user();

        if($user && $user->isAdmin) {
            $idiomas = idioma::orderBy('orden')->get();
        } else {
            $idiomas = idioma::where('isPublic','1')->orderBy('orden')->get();
        };

    @endphp --}}
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- @php
                    $locale = Session::get('lang');
                    if($locale=="es") {
                        $locale = "";
                    }
                @endphp --}}

                <div class="shrink-0 flex items-center">


                    <a href="{{ route('elementoXX',['locale' => $locale]) }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>


                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}
            </div>










            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                {{-- @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif --}}

                @if (env('SWOW_IDIOMAS') == true)

                    {{-- @php
                    $slug = request()->segment(count(request()->segments()));
                    @endphp --}}
                    <div class=" px-3 py-2 ">
                        <form action="{{route('localization',['slug' => $slug])}}" id="formlocalization">
                            <select  class="text-xs text-black/70 bg-white px-3 transition-all cursor-pointer hover:border-blue-600/30 border border-gray-200 rounded-lg outline-blue-600/50 appearance-none invalid:text-black/30 w-32"
                            name="lang" onchange="
                                document.getElementById('formlocalization').submit();
                                ">
                                @foreach ($idiomas as $idioma )
                                    <option  value="{{$idioma->locale}}" @selected(session('lang') == $idioma->locale)>{{$idioma->title}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>

                @endif







                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if(Auth::user()->hasRole('Admin'))
                                    <x-dropdown-link href="{{ route('admin.home') }}">
                                        Administrador
                                    </x-dropdown-link>
                                @endif
                                @if(Auth::user()->hasRole('Editor'))
                                    <x-dropdown-link href="{{ route('editor.home') }}">
                                        Editor
                                    </x-dropdown-link>
                                @endif
                                @if(Auth::user()->hasRole('Editor'))
                                    <x-dropdown-link href="{{ route('editor.searchFoto') }}">
                                        Fotografías
                                    </x-dropdown-link>
                                @endif





                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif



                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>

                    @endauth
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex flex-1 items-center justify-center">
            <p class="text-center text-catedral tracking-wide text-xs md:text-2xl font font-semibold">{{__('Catedral de Santiago de Compostela')}}</p>
        </div>


        <div class=" hidden py-4 bg-white sm:flex justify-center items-center space-x-4 flex-wrap shadow">

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
                                    @if($locale=="es")
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                    @else
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                    @endif
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
                                    @if($locale=="es")
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                    @else
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                        <meta itemprop="position" content="1" />
                                    @endif
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
                                    @if($locale=="es")
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                    @else
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                    @endif
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
                                    @if($locale=="es")
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                    @else
                                        <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                            <span itemprop="name" >{{$each->title}}</span>
                                        </x-dropdown-link>
                                    @endif

                                    <meta itemprop="position" content="1" />
                                </li>




                            @endforeach

                        </ol>

                    </x-slot>
                </x-dropdown>
            </div>

        </div>

    </div>







    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">


        <div class=" px-3 py-2 ">
            <form action="{{route('localization',['slug' => $slug])}}" id="formlocalizationMovile">
                <select  class="text-xs text-black/70 bg-white px-3 transition-all cursor-pointer  outline-blue-600/50 appearance-none invalid:text-black/30 w-32"
                name="lang" onchange="
                    document.getElementById('formlocalizationMovile').submit();
                    ">
                    @foreach ($idiomas as $idioma )
                        <option  value="{{$idioma->locale}}" @selected(session('lang') == $idioma->locale)>{{$idioma->title}}</option>
                    @endforeach
                </select>
            </form>
        </div>

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
                            @if($locale=="es")
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                            @endif
                            <meta itemprop="position" content="1" />
                        </li>
                    @endforeach

                </ol>
            </x-slot>
        </x-dropdown>
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
                            @if($locale=="es")
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                                <meta itemprop="position" content="1" />
                            @endif
                        </li>
                    @endforeach

                </ol>

            </x-slot>
        </x-dropdown>
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
                            @if($locale=="es")
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                            @endif
                            <meta itemprop="position" content="1" />
                        </li>
                    @endforeach

                </ol>

            </x-slot>
        </x-dropdown>

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
                            @if($locale=="es")
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                            @else
                                <x-dropdown-link  itemprop="item" href="{{route('elementoXX',['locale' => $locale,'slug' => $each->slug])}}"   class="hover:font-semibold hover:text-catedral">
                                    <span itemprop="name" >{{$each->title}}</span>
                                </x-dropdown-link>
                            @endif

                            <meta itemprop="position" content="1" />
                        </li>




                    @endforeach

                </ol>

            </x-slot>
        </x-dropdown>















        {{-- <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('elementoXX',['locale' => $locale]) }}" :active="request()->routeIs('dashboard')">
                {{__('Catedral de Santiago de Compostela')}}
            </x-responsive-nav-link>
        </div> --}}

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if(Auth::user()->hasRole('Admin'))
                        <x-dropdown-link href="{{ route('admin.home') }}">
                            Administrador
                        </x-dropdown-link>
                    @endif
                    @if(Auth::user()->hasRole('Editor'))
                        <x-dropdown-link href="{{ route('editor.home') }}">
                            Editor
                        </x-dropdown-link>
                    @endif

                    @if(Auth::user()->hasRole('Editor'))
                        <x-dropdown-link href="{{ route('editor.searchFoto') }}">
                            Fotografías
                        </x-dropdown-link>
                    @endif


                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-responsive-nav-link href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-responsive-nav-link>
                        @endcan

                        <!-- Team Switcher -->
                        @if (Auth::user()->allTeams()->count() > 1)
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" component="responsive-nav-link" />
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        @else
            <div class="py-1 border-t border-gray-300">
                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    {{ __('login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    {{ __('register') }}
                </x-responsive-nav-link>
            </div>

        @endauth
    </div>
</nav>
