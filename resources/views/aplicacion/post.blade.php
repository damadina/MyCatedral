<x-app-layout>
    @slot('analitycs')
        @include('aplicacion.partials.analitycs')
    @endslot

    @slot('seo')
        @include('aplicacion.partials.seo')
    @endslot

    @slot('social')
    @include('aplicacion.partials.social')
    @endslot


    @slot('header')
        @include('aplicacion.partials.navigate')
    @endslot



    <div>
        <div class="relative">
            <figure>
                <img  alt="{{$fotoPortada->alt}}" title="{{$fotoPortada->title}}" class="h-60 md:h-128 w-full object-cover object-center"
                src="{{asset('storage/originales/'.$elemento->urlPortada)}}">
                <figcaption class="bg-gray-200 text-center pb-2 italic text-gray-600 text-xs md:text-xl">
                <span class="font-semibold">{{$fotoPortada->piedefoto}}</span>
                </figcaption>
            </figure>
            <h1 class="absolute text-base md:text-4xl tracking-wide text-white text1 top-4 right-0 -translate-x-1/2">{{$elemento->title}}</h1>
        </div>
    </div>
    <div class="container">
        <div class="border-l-4 pl-4 border-catedral text-justify indent-8 text-gray-600 italic text-base mt-6 sm:text-xl tracking-wide">
            {!! $elemento->resumen !!}
        </div>
    </div>
    <hr class="h-2 my-4 bg-gray-200">
    <div class="container">
        @foreach ($textos as $each )
            <h2 class="mt-4 underline text-base md:text-2xl font-semibold text-catedral">{{$each->titulo}}</h2>
            <div class=" text-justify indent-8 text-gray-600  text-base mt-2 sm:text-xl tracking-wide">
                {!! $each->html !!}
            </div>
        @endforeach
    </div>
</x-app-layout>
