<div>

    HOLAAAA
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center mx-auto">
                <div class="col-sm-8 image-section">
                    @if($url)

                        SI
                    @else
                        NO
                    @endif


                    {{-- @if($urlNew)
                        <img src="{{$urlNew->temporaryUrl()}}" height="450">
                    @else
                    <img src="{{asset('storage/originales').'/'.$url}}" height="450">
                    @endif --}}
                </div>

                {{-- <div class="col-sm-8 image-section">
                    <img src="{{asset('storage/originales').'/'.$url}}" height="450">
                </div> --}}
                {{-- <div class="col-sm-4">

                    <input type="file" wire:model='urlNew'>
                    <x-input-error for="urlNew" class="text-danger" ></x-input-error>
                    <br>
                    <div class="text-primary font-bold mt-1" wire:loading wire:target="url">
                        Cargando ...
                    </div>
                    {{$foto->url}}
                    <span wire:model.lazy="messageExist" class="h6 text-danger">{{$messageExist}}</span>
                </div> --}}
            </div>

            <div >

                <div class="mt-2">
                    <x-label value="Descripción de la foto (piedefoto)" class="text-primary"></x-label>
                    <x-input wire:model="piedefoto" class="w-100 form-control" />
                    <x-input-error for="piedefoto" class="text-danger"></x-input-error>
                </div>


                <div class="mt-2">
                    <x-label value="Palabras de búsqueda" class="text-primary"></x-label>
                    <textarea wire:model="keywords" class="w-100 form-control" rows="2"></textarea>
                    <x-input-error for="keywords" class="text-danger"></x-input-error>
                </div>

                <div class="mt-2">
                    <x-label value="SEO: Alt" class="text-primary"></x-label>
                    <x-input type="text" class="w-100 form-control" wire:model='alt'></x-input>
                    <x-input-error for="alt" class="text-danger"></x-input-error>
                </div>

                <div class="mt-2">
                    <x-label value="SEO: Title" class="text-primary"></x-label>
                    <x-input type="text" class="w-100 form-control" wire:model='title'></x-input>
                    <x-input-error for="title" class="text-danger"></x-input-error>
                </div>

                <button type="button" wire:click="update" class="btn btn-primary mt-4">Actualizar foto</button>
                <button type="button" wire:click="cancelar" class="btn btn-secondary mt-4 ml-2">Cancelar</button>
            </div>
        </div>
    </div>
</div>
