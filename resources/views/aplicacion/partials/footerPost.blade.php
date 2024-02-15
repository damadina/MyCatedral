<div class="bg-white shadow-md">
    <div class="container">
        <div class="py-2 flex justify-center items-center space-x-4 space-y-4 flex-wrap">
            <div>
                @php
                    $locale = Session::get('lang');
                    if($locale=="es") {
                        $locale = "";
                    }
                @endphp
{{--
                <a href="{{ route('elementoXX',$locale) }}"> --}}
                    <img class="mx-auto" src="{{ asset('storage/images/logo.png') }}"  loading="lazy"  alt="catedraldesantiago.online home" width="15" height="21">
                    <span class="text-catedral">&copy;</span> <span class="text-catedral font-semibold text-xs">CatedraldeSanatiago.online</span>
               {{--  </a> --}}
            </div>
        </div>

        <div class="flex justify-around items-center flex-wrap pb-12">
            <div class="flex space-x-4">
                @foreach ($legal as $each )
                   <a class="text-base text-catedral hover:underline hover:font-bold hover:cursor-pointer" href="{{route('documento',$each)}}">{{$each->titulo}}</a>
                @endforeach
                    <a class="text-base text-catedral hover:underline hover:font-bold hover:cursor-pointer" href="{{route('autores','catedral')}}">{{__('Autores')}}</a>
                    @if (env('SWOW_CONTACTANOS') == true)
                        @php
                            Session::put('urlCallContactanos',url()->current())
                        @endphp
                        <a class="text-base text-catedral hover:underline hover:font-bold hover:cursor-pointer" href="{{route('contactanos.index')}}">{{__('Contactanos')}}</a>
                    @endif

            </div>


        </div>

    </div>

</div>
