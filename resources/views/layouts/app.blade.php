<!DOCTYPE html>
<html lang="{{session('lang')}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset("storage/images/logo.png")}}">
        <title>{{ config('app.name', 'catedraldeSantiago.online') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @isset($analitycs)
            {{$analitycs}}
        @endisset
        @isset($seo)
            {{$seo}}
        @endisset
        @isset($social)
            {{$social}}
        @endisset


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/aplicacion.css','resources/js/app.js'])



        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div itemscope itemtype="https://schema.org/WebSite">
            <meta itemprop="name" content="{{__('Catedral de Santiago de Compostela')}}">
            <meta itemprop="url" content="{{ URL::to('/') }}">
        </div>
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                {{ $header }}
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @isset($footer)
                {{$footer}}
            @endisset

        </div>

        @stack('modals')

        @livewireScripts

        <script src="https://kit.fontawesome.com/839c82ee0b.js" crossorigin="anonymous"></script>
        <script>
            // Get the 'to top' button element by ID
            var toTopButton = document.getElementById("to-top-button");

            // Check if the button exists
            if (toTopButton) {

                // On scroll event, toggle button visibility based on scroll position
                window.onscroll = function() {
                    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                        toTopButton.classList.remove("hidden");
                    } else {
                        toTopButton.classList.add("hidden");
                    }
                };

                // Function to scroll to the top of the page smoothly
                window.goToTop = function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                };
            }
        </script>
    </body>
</html>
