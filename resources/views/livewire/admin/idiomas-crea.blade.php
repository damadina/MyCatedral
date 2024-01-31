<div>
    <button type="button" wire:click.prevent="newIdioma" class="btn btn-primary"><i class="fa fa-plus-circle mr-2"></i>Nuevo idioma</button>
    {{-- <button type="button" wire:click.prevent="newIdioma" class="btn btn-danger">Nuevo idioma</button> --}}
    <div wire:ignore.self class="modal fade" id="formCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="save">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Idioma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <div class="d-flex">

                            <div class="flex-grow-1">
                                <label class="text-primary">Idioma</label>
                                <input type="text" wire:model.change='idiomaCreate.title'  class="form-control @error('idiomaCreate.title') is-invalid @enderror">
                                @error("idiomaCreate.title")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                            <div class="ml-2">
                                <label class="text-primary">Locale</label>
                                <input type="text" name="name" wire:model='idiomaCreate.locale'  class="form-control @error('idiomaCreate.locale') is-invalid @enderror">
                                @error("idiomaCreate.locale")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                            <div class="ml-2 col-xs-2">
                                <label class="text-primary">Orden</label>
                                <input  type="text" name="name" wire:model='idiomaCreate.orden'  class="form-control @error('idiomaCreate.orden') is-invalid @enderror">
                                @error("idiomaCreate.orden")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="text-primary">Estado</label>
                            <select wire:model="idiomaCreate.isPublic" class="form-control form-control" aria-label=".form-select-lg example">
                                <option value="" disabled>Seleccione un estado</option>
                                <option value="0">Borrador</option>
                                <option value="1">Publicado</option>
                            </select>
                        </div>
                        <hr class="mt-2 mb-3"/>
                        <div>
                            <label>
                                <input wire:model="idiomaCreate.traducciones_Start" value="elements" type="checkbox"/>
                                elements
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaCreate.traducciones_Start" value="textos" type="checkbox"/>
                                textos
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaCreate.traducciones_Start" value="fotos" type="checkbox"/>
                                fotos
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaCreate.traducciones_Start" value="idiomas" type="checkbox"/>
                                idiomas
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaCreate.traducciones_Start" value="documents" type="checkbox"/>
                                documents
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaCreate.traducciones_Start" value="autors" type="checkbox"/>
                                autors
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaCreate.traducciones_Start" value="informacions" type="checkbox"/>
                                informacions
                            </label>

                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" wire:click="close" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            <form>

        </div>
    </div>
</div>



{{-- <div>
    <div wire:ignore.self class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$formTitle}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif

                    <div class="d-flex">

                        <div class="flex-grow-1">
                            <label class="text-primary">Idioma</label>
                            <input type="text" wire:model.change='idiomaCreate.title'  class="form-control @error('idiomaCreate.title') is-invalid @enderror">
                            @error("idiomaCreate.title")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>
                        <div class="ml-2">
                            <label class="text-primary">Locale</label>
                            <input type="text" name="name" wire:model='idiomaCreate.locale'  class="form-control @error('idiomaCreate.locale') is-invalid @enderror">
                            @error("idiomaCreate.locale")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>
                        <div class="ml-2 col-xs-2">
                            <label class="text-primary">Orden</label>
                            <input  type="text" name="name" wire:model='idiomaCreate.orden'  class="form-control @error('idiomaCreate.orden') is-invalid @enderror">
                            @error("idiomaCreate.orden")
                                <small class="text-danger">
                                    <small>{{$message}}</small>
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="text-primary">Estado</label>
                        <select class="form-control form-control" aria-label=".form-select-lg example">
                            <option value="" disabled>Seleccione un estado</option>
                            <option value="0">Borrador</option>
                            <option value="1">Publicado</option>
                        </select>
                    </div>
                    <hr class="mt-2 mb-3"/>
                    <div>
                        <label>
                            <input wire:model="idiomaCreate.traducciones_Start" value="elements" type="checkbox"/>
                            elements
                        </label>
                        <br>
                        <label>
                            <input wire:model="idiomaCreate.traducciones_Start" value="textos" type="checkbox"/>
                            textos
                        </label>
                        <br>
                        <label>
                            <input wire:model="idiomaCreate.traducciones_Start" value="fotos" type="checkbox"/>
                            fotos
                        </label>
                        <br>
                        <label>
                            <input wire:model="idiomaCreate.traducciones_Start" value="idiomas" type="checkbox"/>
                            idiomas
                        </label>
                        <br>
                        <label>
                            <input wire:model="idiomaCreate.traducciones_Start" value="documents" type="checkbox"/>
                            documents
                        </label>
                        <br>
                        <label>
                            <input wire:model="idiomaCreate.traducciones_Start" value="autors" type="checkbox"/>
                            autors
                        </label>
                        <br>
                        <label>
                            <input wire:model="idiomaCreate.traducciones_Start" value="informacions" type="checkbox"/>
                            informacions
                        </label>

                    </div>
                </div>
                <div class="modal-footer">
                    @if($editForm)
                        <button   wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button  wire:click="update" type="button" class="btn btn-primary">Actualizar</button>
                    @else
                        <button   wire:click="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button  wire:click="save" type="button" class="btn btn-primary">Crear</button>
                    @endif
                  </div>
            </div>
        </div>
    </div>





</div>
 --}}
