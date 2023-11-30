
<x-documento-layout>
    <section class="container">
        <h1 class="text-4xl font-semibold my-6 text-catedral text-center">AUTORES</h1>
        @foreach ($autores as $autor)
            <div class="my-10  flex justify-center items-center">
                <!-- Start of component -->
                <div class="w-full md:w-2/3 bg-white border-2 border-gray-300 p-6 rounded-md tracking-wide shadow-lg">
                    <div id="header" class="flex items-center mb-4">
                        <img alt="avatar" class="w-20 rounded-full border-2 border-gray-300"
                            src="{{ asset('storage/autores/' . $autor->fotoUrl) }}" />
                        <div id="header-text" class="leading-5 ml-6 sm">
                            <h4 id="name" class="text-xl font-semibold">{{ $autor->name }}</h4>
                            <h5 id="job" class="font-semibold text-blue-600">{{ $autor->departamento }}</h5>
                        </div>
                    </div>
                    <div>
                        <span class="italic text-gray-600">{!! $autor->bio !!}</span>
                    </div>
                </div>
                <!-- End of component -->
            </div>
        @endforeach

        @slot('footer')
            @include('aplicacion.partials.footerPost')
        @endslot


    </section>
</x-documento-layout>
