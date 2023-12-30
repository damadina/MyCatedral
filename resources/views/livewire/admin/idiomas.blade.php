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

            <div class="pt-4 px-4 flex justify-between">
                <div>
                @livewire("admin.idiomas-crea")
                </div>
                <x-danger-button wire:click="GeneraHrflangs">
                    Generar Hrflangs
                </x-danger-button>
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
                                            <p @if($isRed) class="text-green-500" @endIf>elements</p>
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
                                            <p @if($isRed) class="text-green-500" @endIf>textos</p>
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
                                            <p @if($isRed) class="text-green-500" @endIf>fotos</p>
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
                                            <p @if($isRed) class="text-green-500" @endIf>idiomas</p>
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
                                            <p @if($isRed) class="text-green-500" @endIf>documents</p>
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
                                            <p @if($isRed) class="text-green-500" @endIf>autors</p>
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
                                            <p @if($isRed) class="text-green-500" @endIf>informacions</p>
                                            <p>{{$idioma->informacionsTraduccion}}</p>
                                        </div>



                                    </td>
                                    @endIf


                                    <td  class="d-flex flex-row-reverse">
                                        @if($idioma->locale != "es")
                                            <button   class="btn btn-danger " wire:click="traducir('{{$idioma->id}}')">Traducir</button>
                                            <button   class="btn btn-danger mr-2" wire:click="limpiar('{{$idioma->id}}')"><i class="fas fa-eraser"></i></button>
                                            @endif
                                        <button class="btn btn-primary mr-2" wire:click="edit({{$idioma->id}})">Editar</button>
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

                    </div>



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
