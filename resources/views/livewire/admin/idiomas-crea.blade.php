<div>
    <x-danger-button wire:click='clickOpenModal'>
        Crear nuevo Idioma
    </x-danger-button>


    <form wire:submit='save'>
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nuevo idioma
            </x-slot>
            <x-slot name="content">



                <div class="d-flex">
                    <div class="mt-2 col-sm-3">
                        <x-label value="Idioma" class="text-primary"></x-label>
                        <x-input id="title" type="text" class="w-100 form-control" wire:model='idiomaCreate.title'></x-input>
                        <x-input-error for="idiomaCreate.title" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-3">
                        <x-label value="Orden" class="text-primary"></x-label>
                        <x-input  type="text" class="w-100 form-control" wire:model='idiomaCreate.orden'></x-input>
                        <x-input-error for="idiomaCreate.orden" class="text-danger"></x-input-error>
                    </div>
                    <div class="mt-2 col-sm-3">
                        <x-label value="Locale" class="text-primary"></x-label>
                        <x-input  type="text" class="w-100 form-control" wire:model='idiomaCreate.locale'></x-input>
                        <x-input-error for="idiomaCreate.locale" class="text-danger"></x-input-error>
                    </div>

                    <div class="mt-2 col-sm-3">
                        <x-label value="Estado" class="text-primary"></x-label>
                        <x-select class="w-100" wire:model="idiomaCreate.isPublic">
                            <option value="" disabled>Seleccione un estado</option>
                            <option value="0">Borrador</option>
                            <option value="1">Publicado</option>
                        </x-select>

                        <x-input-error for="idiomaCreate.isPublic" class="text-danger"></x-input-error>
                    </div>

                </div>

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


            </x-slot>
            <x-slot name="footer">


                <x-button type="button" wire:click='clickCloseModal' class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit" wire:click='clickOpenModal'>
                    Guardar idioma
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form>
</div>
