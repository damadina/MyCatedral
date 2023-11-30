<div class="bg-white shadow-md">
    <div class="container">
        <div class="py-2 flex justify-center items-center space-x-4 flex-wrap">
            <div>
                <a href="{{ route('home') }}">
                    <img class="mx-auto" src="{{ asset('storage/images/logo.png') }}"  loading="lazy"  alt="catedraldesantiago.online home" width="15" height="21">
                    <span class="text-catedral">&copy;</span> <span class="text-catedral font-semibold text-xs">CatedraldeSanatiago.online</span>
                </a>
            </div>

        </div>
        <div class="pb-6  flex justify-between items-center space-x-4 flex-wrap">
            <div class="flex space-x-4">
                @foreach ($legal as $each )
                   <a class="text-base text-catedral" href="{{route('documento',$each)}}">{{$each->titulo}}</a>
                @endforeach
                    <a class="text-base text-catedral" href="{{route('autores','catedral')}}">Autores</a>

            </div>
            <div>
                <form action="{{route('localization')}}" id="formlocalization">
                    <select name="lang" onchange="
                        document.getElementById('formlocalization').submit();
                        ">
                        @foreach ($idiomas as $idioma )
                            <option  value="{{$idioma->locale}}" @selected(session('lang') == $idioma->locale)>{{$idioma->title}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>

</div>
