<x-app-layout>
    @slot('head')
    <meta name="robots" content="noindex">
    @endslot
<div class="container">
    <p class="text-2xl text-center font-semibold mt-4">{{$documento->titulo}}</p>
    <div class="container mt-4">
        {!!$documento->html!!}
    </div>
    @slot('footer')
        @include('aplicacion.partials.footerPost')
    @endslot
</div>
</x-app-layout>
