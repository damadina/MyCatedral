<div>


   {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}
   <button type="button" wire:click.prevent="newElemento" class="btn btn-primary"><i class="fa fa-plus-circle mr-2"></i>Nuevo elemento</button>

    <div wire:ignore.self  class="modal fade" id="formElementoCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form autocomplete="off" wire:submit.prevent="save">
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
                                <input type="text" wire:model.change='elementoCreate.title'  class="form-control @error('elementoCreate.title') is-invalid @enderror">
                                @error("elementoCreate.title")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex mt-2">
                            <div class="w-50">
                                <label class="text-primary">Capitulo</label>
                                <select wire:model.live="selectCapitulo" class="form-control " aria-label=".form-select-lg example">
                                    @foreach ($capitulos as $item )
                                        <option value="{{$item->id}}">{{$item->titulo}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="w-50 ml-2">
                                <label class="text-primary">Categoria</label>
                                <select wire:model="elementoCreate.categoria_id" class="form-control " aria-label="">
                                    <option value="" disabled>Seleccione una categoría</option>
                                    @foreach ($categorias as $item )
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ml-2 w-25">
                                <label class="text-primary">Orden</label>
                                <input  type="text" name="name" wire:model='elementoCreate.orden'  class="form-control @error('elementoCreate.orden') is-invalid @enderror">
                                @error("elementoCreate.orden")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>


                            <div class="ml-2 w-50">
                                <label class="text-primary">Estado</label>
                                <select wire:model="elementoCreate.isPublic" class="form-control form-control" aria-label=".form-select-lg example">
                                    <option value="" disabled>Seleccione un estado</option>
                                    <option value="0">Borrador</option>
                                    <option value="1">Publicado</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-100">
                            <label class="text-primary">Seo title</label>
                            <input  type="text" name="name" wire:model='elementoCreate.seoTitle'  class="form-control @error('elementoCreate.seoTitle') is-invalid @enderror">
                            @error("elementoCreate.seoTitle")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>

                        <div class="w-100">
                            <label class="text-primary">Seo title</label>
                            <input  type="text" name="name" wire:model='elementoCreate.seoMeta'  class="form-control @error('elementoCreate.seoMeta') is-invalid @enderror">
                            @error("elementoCreate.seoMeta")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>








                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="close" class="btn btn-secondary" >Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            <form>

        </div>
    </div>

</div>
