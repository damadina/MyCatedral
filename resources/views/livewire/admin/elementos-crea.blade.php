<div>
    <x-danger-button wire:click='clickOpenModal'>
        Crear nuevo Elemento
    </x-danger-button>

    <form wire:submit='save'>
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nuevo elemento
            </x-slot>
            <x-slot name="content">
                <div class="d-flex">
                    <div class="mt-2 col-sm-7">
                        <x-label value="Nombre del elemento" class="text-primary"></x-label>
                        <x-input id="title" type="text" class="w-100 form-control" wire:model='elementoCreate.title'></x-input>
                        <x-input-error for="elementoCreate.title" class="text-danger"></x-input-error>

                    </div>
                    {{-- <div class="mt-2 col-sm-5">
                        <x-label value="Slug" class="text-secondary"></x-label>
                        <x-input id="slug" readonly class="w-100 form-control" wire:model.live='elementoCreate.slug'></x-input>
                    --> {{$elementoCreate->slug}}
                    </div> --}}

                </div>


                <div class="d-flex">
                    <div class="mt-2 col-sm-5">
                        <x-label value="Categoría" class="text-primary"></x-label>
                        <x-select class="w-100" wire:model="elementoCreate.categoria_id">
                            <option value="" disabled>
                                Seleccione una Categoría
                            </option>
                            @foreach ($categorias as $item )
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="elementoCreate.categoria_id" class="text-danger"></x-input-error>
                    </div>

                    <div class="mt-2 col-sm-3">
                        <x-label value="Orden" class="text-primary"></x-label>
                        <x-input  type="text" class="w-100 form-control" wire:model='elementoCreate.orden'></x-input>
                        <x-input-error for="elementoCreate.orden" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-4">
                        <x-label value="Estado" class="text-primary"></x-label>
                        <x-select class="w-100" wire:model="elementoCreate.isPublic">
                            <option value="" disabled>Seleccione un estado</option>
                            <option value="0">Borrador</option>
                            <option value="1">Publicado</option>
                        </x-select>
                        <x-input-error for="elementoCreate.isPublic" class="text-danger"></x-input-error>
                    </div>



                    {{-- <div class="mt-2 col-sm-4">
                        <x-label value="Publicar" class="text-primary"></x-label>
                        <div class="d-flex align-items-end gap-4">

                            <label>
                                <input  value="Si" type="radio" class="form-control" wire:model='elementoCreate.isPublic'/>
                                Si
                            </label>
                            <label>
                                <input  value="No"  type="radio" class="form-control" wire:model='elementoCreate.isPublic'/>
                                No
                            </label>
                        </div>

                    </div> --}}

                </div>
                <div class="mt-2 ml-2">
                    <x-label value="Seo Titulo" class="text-primary"></x-label>
                    <x-input type="text" class="w-100 form-control" wire:model='elementoCreate.seoTitle'></x-input>
                    <x-input-error for="elementoCreate.seoTitle" class="text-danger"></x-input-error>
                </div>
                <div class="mt-2 ml-2">
                    <x-label value="Seo Meta" class="text-primary"></x-label>
                    <x-input type="text" class="w-100 form-control" wire:model='elementoCreate.seoMeta'></x-input>
                    <x-input-error for="elementoCreate.seoMeta" class="text-danger"></x-input-error>
                </div>


            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click='clickCloseModal' class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit" wire:click='clickOpenModal'>
                    Guardar elemento
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form>



</div>
