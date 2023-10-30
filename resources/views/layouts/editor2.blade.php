<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="robots" content="noindex">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')


                <!-- Page Content -->
                <div class="container py-8 grid grid-cols-5">
                    <aside>

                        <a href="{{ route('editor.home') }}" class="btn btn-blue">Volver</a>
                        <h1 class="mt-4 font-bold text-xl mb-4">Edicción Elemento</h1>
                        <ul>
                            <li class="leading-7 mb-1 border-l-4 @routeIs('editor.edit.portadaResumen',$elemento)) border-indigo-400 @else border-transparent @endif  pl-2">
                                <a href="{{route('editor.edit.portadaResumen',$elemento)}}">Foto portada y resumen</a>
                            </li>
                            <li class="leading-7 mb-1 border-l-4 @routeIs('editor.edit.texto',$elemento)) border-indigo-400 @else border-transparent @endif  pl-2">
                                <a href="{{route('editor.edit.texto',$elemento)}}">Texto</a>
                            </li>
                        </ul>

                    </aside>
                    <div class="col-span-4 card">
                        <main class="card-body text-gray-600">
                            {{$slot}}
                        </main>
                    </div>


                </div>
            </div>




        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
