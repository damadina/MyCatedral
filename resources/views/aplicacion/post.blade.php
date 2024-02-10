<x-app-layout>
    @slot('analitycs')
        @include('aplicacion.partials.analitycs')
    @endslot

    @slot('seo')
        @include('aplicacion.partials.seoHrflang')
        @include('aplicacion.partials.seo')

    @endslot

    @slot('social')
        @include('aplicacion.partials.social')
    @endslot




    <article itemscope itemtype="https://schema.org/Article" >
        <meta itemprop="abstract" content="{{$elemento->title}}" />
        <meta itemprop="image" content="{{asset('/storage/originales/'. $elemento->urlPortada)}}" />
        <meta itemprop="thumbnailUrl" content="{{asset('/storage/miniaturas/' . $elemento->urlPortada)}}" />

        <header>

            <meta itemprop="name" content="{{$elemento->title}}" />
            <meta itemprop="abstract" content="{{$elemento->title}}" />
            <div>

                <div class="relative">
                    <figure>
                        <img  alt="{{$fotoPortada->alt}}" title="{{$fotoPortada->title}}" class="h-3/4 w-full object-cover object-center"
                        src="{{asset('storage/originales/'.$elemento->urlPortada)}}">
                        <figcaption class="bg-gray-200 text-center pb-2 italic text-gray-600 text-xs md:text-xl">
                        <span class="px-2">{{$fotoPortada->piedefoto}}</span>
                        </figcaption>
                    </figure>
                    {{-- @if(!$isHome)
                        <h1 class="[text-shadow:_0_1px_0_var(--tw-shadow-color)] absolute text-base md:text-6xl tracking-wide text-white  top-6 right-10">{{$elemento->title}}</h1>
                    @endif --}}
                </div>
            </div>

            <div class="container">

                <div class="border-l-2 border-b-2 pl-1 md:pl-2  border-catedral text-justify indent-8 text-gray-600 italic text-xs mt-6 md:text-xl tracking-wide">
                    <p class="italic text-catedral text-semibold">Resumen:</p>
                    {!! $elemento->resumen !!}
                    <br>
                </div>


            </div>
        </header>
        {{-- <hr class="h-2 my-4 bg-gray-200"> --}}
        <div class="container mb-7">
            @foreach ($textos as $each )
                <meta itemprop="headline" content="{{$each->titulo}}" />
                <h2 class="mt-8 text-base md:text-2xl font-semibold text-catedral">{{$each->titulo}}</h2>
                <div class=" mt-3 indent-8 text-xs md:text-xl text-black" itemprop="articleBody">
                    {!! $each->html !!}
                </div>
            @endforeach
        </div>
    </article>
    @slot('footer')
        @include('aplicacion.partials.footerPost')
    @endslot



    <button id="to-top-button" onclick="goToTop()" title="Ir al inicio"
        class="opacity-60 hover:opacity-100 hidden fixed z-50 bottom-10 right-4  border-0 w-7 h-7 rounded-full shadow-md bg-catedral  text-white text-lg font-semibold transition-colors duration-300">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
        </svg> --}}
        <i class="fas fa-arrow-up"></i>
        <span class="sr-only">Ir al inicio</span>
    </button>
    <div class="mx-auto w-7 h-20 fixed inset-y-1/2  right-4 text-center opacity-70 hover:opacity-100" >
        <div class="bg-catedral py-4 my-4 rounded-md text-lg items-center w-full">
            {{-- <i class="mx-auto fas fa-map-marker-alt text-white"></i> --}}
            {{-- @if($isHome)
                <div class="mx-auto">
                    @livewire('Aplicacion.show-info')
                </div>
            @endif --}}

            <div class="mt-4 mx-auto">
                @livewire('Aplicacion.show-situacion',['elemento' => $elemento,'isPlano' => true])
            </div>
            <div class="mt-4 mx-auto">
                @livewire('Aplicacion.show-situacion',['elemento' => $elemento,'isPlano' => false])
            </div>
        </div>
    </div>

</x-app-layout>
