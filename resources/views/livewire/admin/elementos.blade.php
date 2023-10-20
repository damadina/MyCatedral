<div>
    <div class="card">
        <div class="card-header">
            @livewire("admin.elementos-crea")
        </div>


        <div class="card-header d-flex align-items-end">
            <div class="col-sm-9">
                <input wire:keydown='limpiar_page'   wire:model.live="search" class="form-control w-100" placeholder="Elemento">
            </div>


            <x-select class="w-100" wire:model.live="categoriaSelected">
                <option value="">
                    Seleccione una Categoría
                </option>
                @foreach ($categorias as $item )
                    <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </x-select>
            {{-- <div class="col-sm-3">
                {!! Form::select('categoriaSelected', $categorias, null, ['wire:model.live' => 'categoriaSelected'  ,  'class' =>'form-control' , 'placeholder' => 'Seleccione una categoria...','wire:model' => 'Idcategoria']) !!}
            </div> --}}

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

    <form wire:submit='update'>
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
    </form>



</div>
