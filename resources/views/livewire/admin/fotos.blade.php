<div>
    <div class="">

        @livewire("admin.fotos-crea")
    </div>
    <div class="card">
        <div class="card-header flex align-items-end">
            <div class="mt-2">
                <label class="text-primary">Categoría</label>
                <select wire:model.live="elementoSelected" class="form-control form-control" aria-label=".form-select-lg example">
                    <option value="">Todo</option>
                    @foreach ($elementos as $item )
                        <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
                </select>
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

    <div wire:ignore.self class="modal fade" id="formEditFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="update">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Fotografía</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="image-section">
                            <img class="img-fluid img-thumbnail" src="{{asset('storage/originales/'. $fotoEdit->url)}}" alt="">
                        </div>
                        <hr class="mt-4">
                        <div>
                            <div>
                                <div class="mt-2 d-flex">
                                    <div class="flex-grow-1">

                                        <label class="text-primary">Pertenece a:</label>
                                        <select wire:model="fotoEdit.element_id" class="w-100 form-control form-control" aria-label=".form-select-lg example">
                                            <option value="" disabled>Selecciona un elemento</option>
                                            @foreach ($elementos as $item )
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                        @error("fotoEdit.element_id")
                                        <small class="text-danger">
                                            <small>{{$message}}</small>
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="ml-2">
                                        <label class="text-primary">Orden</label>
                                        <input type="text"  wire:model='fotoEdit.order'  class="form-control @error('fotoEdit.order') is-invalid @enderror">
                                        @error("fotoEdit.order")
                                            <small class="text-danger">
                                                <small>{{$message}}</small>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label class="text-primary">Descripción de la foto (piedefoto)</label>
                                    <input type="text"  wire:model='fotoEdit.piedefoto'  class="w-100 form-control @error('fotoEdit.piedefoto') is-invalid @enderror">
                                    @error("fotoEdit.piedefoto")
                                        <small class="text-danger">
                                            <small>{{$message}}</small>
                                        </small>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="text-primary">Palabras de búsqueda</label>
                                    <textarea   wire:model='fotoEdit.keywords'  rows="2" class="w-100 form-control @error('fotoEdit.keywords') is-invalid @enderror"></textarea>
                                    @error("fotoEdit.keywords")
                                        <small class="text-danger">
                                            <small>{{$message}}</small>
                                        </small>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <label class="text-primary">SEO: Alt</label>
                                    <input type="text"  wire:model='fotoEdit.alt'  class="w-100 form-control @error('fotoEdit.alt') is-invalid @enderror">
                                    @error("fotoEdit.alt")
                                        <small class="text-danger">
                                            <small>{{$message}}</small>
                                        </small>
                                    @enderror
                                </div>
                                <div class="mt-2">
                                    <label class="text-primary">SEO: Title</label>
                                    <input type="text"  wire:model='fotoEdit.title'  class="w-100 form-control @error('fotoEdit.title') is-invalid @enderror">
                                    @error("fotoEdit.title")
                                        <small class="text-danger">
                                            <small>{{$message}}</small>
                                        </small>
                                    @enderror
                                </div>

                            </div>
                        </div>





                    </div>
                    <div class="modal-footer">
                    <button type="button" wire:click="close" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar fotografía</button>
                    </div>
                </div>
            <form>

        </div>
    </div>


    {{-- <form wire:submit='update'>
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
    </form> --}}





</div>
