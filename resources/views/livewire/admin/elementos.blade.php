<div>
    <div class="card">
        <div class="card-header">
            @livewire("admin.elementos-crea")
        </div>


        <div class="card-header d-flex align-items-end">
            <div class="col-sm-9">
                <input wire:keydown='limpiar_page'   wire:model.live="search" class="form-control w-100" placeholder="Elemento">
            </div>

            <select  wire:model.live="categoriaSelected" class="form-control form-control" aria-label=".form-select-lg example">
                <option value="">
                   Todas las categorías
                </option>
                @foreach ($categorias as $item )
                    <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>

        </div>


        @if($elementos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <td>ID</td>
                        <td>Elemento</td>
                        <td>Categoría</td>
                        <td>Orden</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach ($elementos as $elemento )
                            <tr>
                                <td>{{$elemento->id}}</td>
                                <td>{{$elemento->title}}</td>
                                <td>{{$elemento->categorianame}}</td>
                                <td>{{$elemento->orden}}</td>
                                <td width="10px">

                                    <button class="btn btn-primary mb-4" wire:click="edit({{$elemento->id}})">Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$elementos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay Elementos ...</strong>
            </div>
        @endif
    </div>

    <div wire:ignore.self class="modal fade" id="formElementoEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="update">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Idioma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="w-100">
                                <label class="text-primary">Nombre del Elemento</label>
                                <input type="text" wire:model.change='elementoEdit.title'  class="form-control @error('elementoEdit.title') is-invalid @enderror">
                                @error("elementoEdit.title")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex mt-2">
                            <div class="w-50">
                                <label class="text-primary">Categoria</label>
                                <select wire:model="elementoEdit.categoria_id" class="form-control form-control" aria-label=".form-select-lg example">
                                    @foreach ($categorias as $item )
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-2 w-25">
                                <label class="text-primary">Orden</label>
                                <input  type="text" name="name" wire:model='elementoEdit.orden'  class="form-control @error('elementoEdit.orden') is-invalid @enderror">
                                @error("elementoEdit.orden")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>


                            <div class="ml-2 w-50">
                                <label class="text-primary">Estado</label>
                                <select wire:model="elementoEdit.isPublic" class="form-control form-control" aria-label=".form-select-lg example">
                                    <option value="" disabled>Seleccione un estado</option>
                                    <option value="0">Borrador</option>
                                    <option value="1">Publicado</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-100">
                            <label class="text-primary">Seo title</label>
                            <input  type="text" name="name" wire:model='elementoEdit.seoTitle'  class="form-control @error('elementoEdit.seoTitle') is-invalid @enderror">
                            @error("elementoEdit.seoTitle")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>

                        <div class="w-100">
                            <label class="text-primary">Seo title</label>
                            <textarea  type="text" name="name" wire:model='elementoEdit.seoMeta'  rows="2" class="form-control @error('elementoEdit.seoMeta') is-invalid @enderror"></textarea>
                            @error("elementoEdit.seoMeta")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>








                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="close" class="btn btn-secondary" >Cancelar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            <form>

        </div>
    </div>



    {{-- <form wire:submit='update'>
        <x-dialog-modal wire:model='elementoEdit.openModal'>
            <x-slot name="title">
                Acualizar datos Elemento  {{$elementoEdit->title}}
            </x-slot>
            <x-slot name="content">

                <div class="mt-2">
                    <x-label value="Nombre del elemento" class="text-primary"></x-label>
                    <x-input id="title" type="text" class="w-100 form-control" wire:model='elementoEdit.title'></x-input>
                    <x-input-error for="elementoEdit.title" class="text-danger"></x-input-error>

                </div>




                <div class="d-flex">
                    <div class="mt-2 col-sm-5">
                        <x-label value="Categoría" class="text-primary"></x-label>
                        <x-select class="w-100" wire:model="elementoEdit.categoria_id">
                            <option value="" disabled>
                                Seleccione una Categoría
                            </option>
                            @foreach ($categorias as $item )
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </x-select>

                        <x-input-error for="elementoEdit.categoria_id" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-3">
                        <x-label value="Orden" class="text-primary"></x-label>
                        <x-input  type="text" class="w-100 form-control" wire:model='elementoEdit.orden'></x-input>
                        <x-input-error for="elementoEdit.orden" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-4">
                        <x-label value="Estado" class="text-primary"></x-label>
                        <x-select class="w-100" wire:model="elementoEdit.isPublic">
                            <option value="" disabled>Seleccione un estado</option>
                            <option value="0">Borrador</option>
                            <option value="1">Publicado</option>
                        </x-select>
                        <x-input-error for="elementoEdit.isPublic" class="text-danger"></x-input-error>
                    </div>

                </div>
                <div class="mt-2 ml-2">
                    <x-label value="Seo Titulo" class="text-primary"></x-label>
                    <x-input type="text" class="w-100 form-control" wire:model='elementoEdit.seoTitle'></x-input>
                    <x-input-error for="elementoEdit.seoTitle" class="text-danger"></x-input-error>
                </div>
                <div class="mt-2 ml-2">
                    <x-label value="Seo Meta" class="text-primary"></x-label>
                    <x-input type="text" class="w-100 form-control" wire:model='elementoEdit.seoMeta'></x-input>
                    <x-input-error for="elementoEdit.seoMeta" class="text-danger"></x-input-error>
                </div>




            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click="$set('elementoEdit.openModal',false)" class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit">
                    Guardar elemento
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form> --}}



</div>
