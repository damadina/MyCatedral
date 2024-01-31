<div>
    <button type="button" class="btn btn-primary mb-4" wire:click='clickOpenModal'>Crear nuevo Elemento</button>

    <form wire:submit='save'>
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nuevo elemento
            </x-slot>
            <x-slot name="content">
                <div class="d-flex">
                    <div class="mt-2 col-sm-7">
                        <x-input id="title" type="text" class="w-100 form-control" wire:model='elementoCreate.title'></x-input>
                        <x-input-error for="elementoCreate.title" class="text-danger"></x-input-error>

                    </div>
                </div>


                <div class="d-flex">

                    <div class="mt-2 col-sm-5">
                        <select class="form-control-lg" aria-label=".form-select-lg example">
                            <option selected disabled>Seleccione una Categoría</option>
                            @foreach ($categorias as $item )
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>


                        {{-- <x-select class="w-100 form-select form-select-lg" wire:model="elementoCreate.categoria_id">
                            <option value="" disabled>
                                Seleccione una Categoría
                            </option>
                            @foreach ($categorias as $item )
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </x-select> --}}
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
                <a class="btn btn-secondary" href="{{route('admin.elementos.index')}}">Cancelar</a>
                <button type="submit" class="btn btn-danger ml-2">Guardar elemento</button>
            </x-slot>
        </x-dialog-modal>
    </form>



</div>
