<div>
    <div>
        <div class="card">
            <div class="card-header">
                @livewire("admin.idiomas-crea")
            </div>

            @if($idiomas->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <td>ID</td>
                            <td>idioma</td>
                            <td>Orden</td>
                            <td>Estado</td>
                            <td>Locale</td>
                            <td></td>
                            <td></td>
                        </thead>
                        <tbody>
                            @foreach ($idiomas as $idioma )
                                <tr>
                                    <td>{{$idioma->id}}</td>
                                    <td>{{$idioma->title}}</td>
                                    <td>{{$idioma->orden}}</td>
                                    <td>{{$idioma->estadoname}}</td>
                                    <td>{{$idioma->locale}}</td>
                                    <td>
                                        <button class="btn btn-danger mb-4" wire:click="">Borrar traducción</button>
                                    </td>
                                    <td width="10px">
                                        <button class="btn btn-primary mb-4" wire:click="edit({{$idioma->id}})">Editar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-footer">
                    {{$idiomas->links()}}
                </div> --}}
            @else
                <div class="card-body">
                    <strong>No hay idiomas ...</strong>
                </div>
            @endif
        </div>

        <form wire:submit='update'>
            <x-dialog-modal wire:model='idiomaEdit.openModal'>
                <x-slot name="title">
                    Acualizar datos idioma  {{$idiomaEdit->title}}
                </x-slot>
                <x-slot name="content">

                    <div class="d-flex">
                        <div class="mt-2 col-sm-3">
                            <x-label value="Nombre del idioma" class="text-primary"></x-label>
                            <x-input id="title" type="text" class="w-100 form-control" wire:model='idiomaEdit.title'></x-input>
                            <x-input-error for="idiomaEdit.title" class="text-danger"></x-input-error>
                        </div>
                        <div class="mt-2 col-sm-3">
                            <x-label value="Orden" class="text-primary"></x-label>
                            <x-input  type="text" class="w-100 form-control" wire:model='idiomaEdit.orden'></x-input>
                            <x-input-error for="idiomaEdit.orden" class="text-danger"></x-input-error>
                        </div>
                        <div class="mt-2 col-sm-3">
                            <x-label value="Locale" class="text-primary"></x-label>
                            <x-input  type="text" class="w-100 form-control" wire:model='idiomaEdit.locale'></x-input>
                            <x-input-error for="idiomaEdit.locale" class="text-danger"></x-input-error>
                        </div>


                        <div class="mt-2 col-sm-3">
                            <x-label value="Estado" class="text-primary"></x-label>
                            <x-select class="w-100" wire:model="idiomaEdit.isPublic">
                                <option value="" disabled>Seleccione un estado</option>
                                <option value="0">Borrador</option>
                                <option value="1">Publicado</option>
                            </x-select>

                            <x-input-error for="idiomaEdit.isPublic" class="text-danger"></x-input-error>
                        </div>


                    </div>




                    {{-- <div class="d-flex">
                        <div class="mt-2 col-sm-5">
                            <x-label value="Categoría" class="text-primary"></x-label>
                            <x-select class="w-100" wire:model="idiomaEdit.categoria_id">
                                <option value="" disabled>
                                    Seleccione una Categoría
                                </option>
                                @foreach ($categorias as $item )
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="idiomaEdit.categoria_id" class="text-danger"></x-input-error>
                        </div>
                        <div class="mt-2 col-sm-3">
                            <x-label value="Orden" class="text-primary"></x-label>
                            <x-input  type="text" class="w-100 form-control" wire:model='idiomaEdit.orden'></x-input>
                            <x-input-error for="idiomaEdit.orden" class="text-danger"></x-input-error>
                        </div>
                        <div class="mt-2 col-sm-4">
                            <x-label value="Estado" class="text-primary"></x-label>
                            <x-select class="w-100" wire:model="idiomaEdit.isPublic">
                                <option value="" disabled>Seleccione un estado</option>
                                <option value="0">Borrador</option>
                                <option value="1">Publicado</option>
                            </x-select>
                            <x-input-error for="idiomaEdit.isPublic" class="text-danger"></x-input-error>
                        </div>

                    </div>
                    <div class="mt-2 ml-2">
                        <x-label value="Seo Titulo" class="text-primary"></x-label>
                        <x-input type="text" class="w-100 form-control" wire:model='idiomaEdit.seoTitle'></x-input>
                        <x-input-error for="idiomaEdit.seoTitle" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 ml-2">
                        <x-label value="Seo Meta" class="text-primary"></x-label>
                        <x-input type="text" class="w-100 form-control" wire:model='idiomaEdit.seoMeta'></x-input>
                        <x-input-error for="idiomaEdit.seoMeta" class="text-danger"></x-input-error>
                    </div> --}}




                </x-slot>
                <x-slot name="footer">


                    <x-button type="button" wire:click="$set('idiomaEdit.openModal',false)" class="mr-4">
                        Cancelar
                    </x-button>

                    <x-danger-button type="submit">
                        Actualizar idioma
                    </x-danger-button>


                </x-slot>
            </x-dialog-modal>
        </form>



    </div>

</div>
