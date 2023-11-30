<div>
    <div class="mb-6">
        Total fotos= {{$fotos->total()}}
        @livewire("admin.fotos-crea")
    </div>
    <div class="card">
        <div class="card-header flex align-items-end">
            {{-- <div class="flex-1 mr-2">
                <input wire:keydown='limpiar_page'   wire:model="search" class="form-control" placeholder="¿que buscas?">
            </div> --}}
            <div>
                <x-label value="Categoría" class="text-primary"></x-label>
                <x-select class="w-100" wire:model.live="elementoSelected">
                    <option value="">
                        Seleccione un elemento
                    </option>
                    @foreach ($elementos as $item )
                        <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                </x-select>

            </div>



        </div>

        @if($fotos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <td>Foto</td>
                        <td>Piedefoto, keywords y title</td>
                        <td>Orden</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach ($fotos as $item )
                            <tr>
                                <td class="w-10">
                                    <img class="img-fluid img-thumbnail" src="{{asset('storage/miniaturas/'. $item->url)}}" alt="">
                                    {{$item->url}}
                                </td>
                                <td>
                                    {{$item->piedefoto}}<br>
                                    {{$item->keywords}}<br>
                                    {{$item->title}}
                                </td>
                                <td>{{$item->order}}</td>
                                <td width="10px">

                                    <button class="btn btn-primary mb-4" wire:click="edit({{$item->id}})">Editar</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$fotos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay Fotos ...</strong>
            </div>
        @endif
    </div>


    <form wire:submit='update'>
        <x-dialog-modal wire:model='fotoEdit.openModal'>
            <x-slot name="title">
                Acualizar datos fotografía {{$fotoEdit->url}}
            </x-slot>
            <x-slot name="content">



                    <div class="image-section">

                        <img class="img-fluid img-thumbnail" src="{{asset('storage/originales/'. $fotoEdit->url)}}" alt="">

                    </div>



                    <hr class="mt-4">
                    <div>
                        <div>
                            <div class="mt-2 flex">
                                <div class="flex-1">
                                    <x-label value="Pertenece a:" class="text-primary"></x-label>

                                    <x-select class="w-100" wire:model="fotoEdit.element_id">
                                        @foreach ($elementos as $item )
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </x-select>

                                    <x-input-error for="fotoEdit.element_id" class="text-danger"></x-input-error>
                                </div>
                                <div class="w-20 ml-4">
                                    <x-label value="Orden" class="text-primary"></x-label>
                                    <x-input type="text" class="form-control" wire:model='fotoEdit.order'></x-input>
                                    <x-input-error for="fotoEdit.order" class="text-danger"></x-input-error>
                                </div>
                            </div>





                            <div class="mt-2">
                                <x-label value="Descripción de la foto (piedefoto)" class="text-primary"></x-label>
                                <x-input type="text" class="w-100 form-control" wire:model='fotoEdit.piedefoto'></x-input>
                                <x-input-error for="fotoEdit.piedefoto" class="text-danger"></x-input-error>
                            </div>
                            <div class="mt-2">
                                <x-label value="Palabras de búsqueda" class="text-primary"></x-label>
                                <textarea wire:model="fotoEdit.keywords" class="w-100 form-control" rows="2"></textarea>
                                <x-input-error for="fotoEdit.keywords" class="text-danger"></x-input-error>
                            </div>

                            <div class="mt-2">
                                <x-label value="SEO: Alt" class="text-primary"></x-label>
                                <x-input type="text" class="w-100 form-control" wire:model='fotoEdit.alt'></x-input>
                                <x-input-error for="fotoEdit.alt" class="text-danger"></x-input-error>
                            </div>

                            <div class="mt-2">
                                <x-label value="SEO: Title" class="text-primary"></x-label>
                                <x-input type="text" class="w-100 form-control" wire:model='fotoEdit.title'></x-input>
                                <x-input-error for="fotoEdit.title" class="text-danger"></x-input-error>
                            </div>




                        </div>
                    </div>


            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click="$set('fotoEdit.openModal',false)" class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit">
                    Guardar fotografía
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form>


   {{--  <x-dialog-modal wire:model='openModal'>
        <x-slot name="title">
            Nueva fotografía xxx
        </x-slot>
        <x-slot name="content">




            <div class="image-section">
                <div wire:loading wire:target='url' class="alert alert-danger w-100" role="alert">
                    Subiendo fotografía
                </div>
                @if($url)
                    <img src="{{$url->temporaryUrl()}}" class="w-100">
                @else
                    <img src="{{asset('storage/images/noPhoto.png')}}" class="w-100">
                @endif
            </div>
            <div class="mt-4">
                <x-input type="file" wire:model='url'  id="{{$identificador}}"></x-input>
                <x-input-error for="url" class="text-danger" ></x-input-error>
                <br>
                <div class="text-primary font-bold mt-1" wire:loading wire:target="url">
                    Cargando ...
                </div>
                <span wire:model.lazy="messageExist" class="h6 text-danger">{{$messageExist}}</span>
            </div>


            <hr class="mt-4">
            <div>
                <div>
                    <div class="mt-2">
                        <x-label value="Descripción de la foto (piedefoto)" class="text-primary"></x-label>
                        <x-input type="text" class="w-100 form-control" wire:model='piedefoto'></x-input>
                        <x-input-error for="piedefoto" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2">
                        <x-label value="Palabras de búsqueda" class="text-primary"></x-label>
                        <textarea wire:model.defer="keywords" class="w-100 form-control" rows="2"></textarea>
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




                </div>
            </div>




        </x-slot>
        <x-slot name="footer">
            <button class="btn btn-danger " wire:click='closeOpenModal'>Cancelar</button>
            <button class="btn btn-primary ml-2" wire:click='save'>Guardar Fotografía</button>
        </x-slot>
    </x-dialog-modal> --}}


</div>
