<div>

    <div wire:loading>
        <div style="display: flex; justify-content:center; align-items: center; background-color:black;
        position:fixed; top: 0px; left:0px; z-index:9999; width:100%; height:100%; opacity:.75;">
            <div class="la-ball-spin la-2x">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div>
        <div class="card">

            {{-- <div class="pt-4 px-4 flex justify-between"> --}}
            <div class="pt-4 px-4 d-flex d-flex justify-content-between">
                <div>
                    @livewire("admin.idiomas-crea")
                </div>

                <button type="button" class="btn btn-danger" wire:click="GeneraHrflangs">Generar Hrflangs</button>

            </div>


            @if($idiomas->count())
                <div class="card-body">
                    @if (session()->has('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>enhorabuena!</strong> {{session('status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    @endif
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
                                    <td width="10px">{{$idioma->id}}</td>
                                    <td width="10px">{{$idioma->title}}</td>
                                    <td width="10px">{{$idioma->orden}}</td>
                                    <td width="10px">{{$idioma->estadoname}}</td>
                                    <td width="10px">{{$idioma->locale}}</td>
                                    @if($idioma->locale !="es")
                                        <td class="d-flex justify-content-between">
                                            @php
                                                if (in_array("elements", $idioma->traducciones_Start)) {
                                                    $isRed = true;
                                                } else {
                                                    $isRed = false;
                                                }
                                            @endphp
                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>elements</p>
                                                <p>{{$idioma->elementsTraduccion}}</p>
                                            </div>
                                            @php
                                                if (in_array("textos", $idioma->traducciones_Start)) {
                                                    $isRed = true;
                                                } else {
                                                    $isRed = false;
                                                }
                                            @endphp
                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>textos</p>
                                                <p>{{$idioma->textosTraduccion}}</p>
                                            </div>
                                            @php
                                                if (in_array("fotos", $idioma->traducciones_Start)) {
                                                    $isRed = true;
                                                } else {
                                                    $isRed = false;
                                                }
                                            @endphp
                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>fotos</p>
                                                <p>{{$idioma->fotosTraduccion}}</p>
                                            </div>
                                            @php
                                                if (in_array("idiomas", $idioma->traducciones_Start)) {
                                                    $isRed = true;
                                                } else {
                                                    $isRed = false;
                                                }
                                            @endphp

                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>idiomas</p>
                                                <p>{{$idioma->idiomasTraduccion}}</p>
                                            </div>

                                            @php
                                                if (in_array("documents", $idioma->traducciones_Start)) {
                                                    $isRed = true;
                                                } else {
                                                    $isRed = false;
                                                }
                                            @endphp
                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>documents</p>
                                                <p>{{$idioma->documentsTraduccion}}</p>
                                            </div>

                                            @php
                                                if (in_array("autors", $idioma->traducciones_Start)) {
                                                    $isRed = true;
                                                } else {
                                                    $isRed = false;
                                                }
                                            @endphp

                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>autors</p>
                                                <p>{{$idioma->autorsTraduccion}}</p>
                                            </div>

                                            @php
                                            if (in_array("informacions", $idioma->traducciones_Start)) {
                                                $isRed = true;
                                            } else {
                                                $isRed = false;
                                            }
                                            @endphp
                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>informacions</p>
                                                <p>{{$idioma->informacionsTraduccion}}</p>
                                            </div>
                                            @php
                                            if (in_array("capitulos", $idioma->traducciones_Start)) {
                                                $isRed = true;
                                            } else {
                                                $isRed = false;
                                            }
                                            @endphp
                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>capitulos</p>
                                                <p>{{$idioma->capitulosTraduccion}}</p>
                                            </div>
                                            @php
                                            if (in_array("categorias", $idioma->traducciones_Start)) {
                                                $isRed = true;
                                            } else {
                                                $isRed = false;
                                            }
                                            @endphp
                                            <div>
                                                <p @if($isRed) class="text-success" @endIf>categorias</p>
                                                <p>{{$idioma->categoriasTraduccion}}</p>
                                            </div>

                                        </td>
                                    @endIf


                                    <td  class="d-flex flex-row-reverse">
                                        @if($idioma->locale != "es")
                                            <button type="button" class="ml-2 btn btn-danger" wire:click="checkTraducciones({{$idioma->id}})">Check traducciones</button>
                                            <button   class="btn btn-danger " wire:click="traducir('{{$idioma->id}}')">Traducir</button>
                                            <button   class="btn btn-danger mr-2" wire:click="limpiar('{{$idioma->id}}')"><i class="fas fa-eraser"></i></button>
                                        @endif

                                        <button wire:click.prevent="edit({{$idioma->id}})"
                                            type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                                           Editar
                                       </button>

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
    </div>
    <div  class="modal fade" id="formEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form autocomplete="off" wire:submit.prevent="update">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Idioma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <div class="d-flex">

                            <div class="flex-grow-1">

                                <label class="text-primary">Idioma</label>
                                <input type="text" wire:model='idiomaEdit.title'  class="form-control @error('idiomaCreate.title') is-invalid @enderror">
                                @error("idiomaCreate.title")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                            <div class="ml-2">
                                <label class="text-primary">Locale</label>
                                <input type="text" name="name" wire:model='idiomaEdit.locale'  class="form-control @error('idiomaCreate.locale') is-invalid @enderror">
                                @error("idiomaCreate.locale")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                            <div class="ml-2 col-xs-2">
                                <label class="text-primary">Orden</label>
                                <input  type="text" name="name" wire:model='idiomaEdit.orden'  class="form-control @error('idiomaCreate.orden') is-invalid @enderror">
                                @error("idiomaCreate.orden")
                                    <small class="text-danger">
                                        <small>{{$message}}</small>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <label class="text-primary">Estado</label>
                            <select  wire:model='idiomaEdit.isPublic' class="form-control form-control" aria-label=".form-select-lg example">
                                <option value="" disabled>Seleccione un estado</option>
                                <option value="0">Borrador</option>
                                <option value="1">Publicado</option>
                            </select>
                        </div>
                        <hr class="mt-2 mb-3"/>
                        <div>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="elements" type="checkbox"/>
                                elements
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="textos" type="checkbox"/>
                                textos
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="fotos" type="checkbox"/>
                                fotos
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="idiomas" type="checkbox"/>
                                idiomas
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="documents" type="checkbox"/>
                                documents
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="autors" type="checkbox"/>
                                autors
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="informacions" type="checkbox"/>
                                informacions
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="capitulos" type="checkbox"/>
                                capitulos
                            </label>
                            <br>
                            <label>
                                <input wire:model="idiomaEdit.traducciones_Start" value="categorias" type="checkbox"/>
                                categorias
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" wire:click="close" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            <form>

        </div>
    </div>

</div>
