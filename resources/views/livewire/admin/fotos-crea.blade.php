<div>
    <x-danger-button wire:click='clickOpenModal'>
        Subir nueva fotografía
    </x-danger-button>

    <form wire:submit='save'>
        <x-dialog-modal wire:model='openModal'>
            <x-slot name="title">
                Nueva fotografía
            </x-slot>
            <x-slot name="content">



                    <div class="image-section">
                        <div wire:loading wire:target='url' class="alert alert-danger w-100" role="alert">
                            Subiendo fotografía
                        </div>

                        @if($fotoCreate->image)

                            <img src="{{$fotoCreate->image->temporaryUrl()}}" class="w-100">
                        @else

                            <img src="{{asset('storage/images/noPhoto.png')}}" class="w-100">
                        @endif
                    </div>
                    <div class="mt-4"  x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <x-input type="file" wire:model='fotoCreate.image' id="{{$identificador}}"></x-input>
                        <x-input-error for="fotoCreate.image" class="text-danger" ></x-input-error>
                        <x-input-error for="fotoCreate.url" class="text-danger" ></x-input-error>
                        <!-- Progress Bar -->
                        <div  class="mt-2" x-show="uploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>

                    </div>


                    <hr class="mt-4">
                    <div>
                        <div>
                            <div class="mt-2 flex">
                                <div class="flex-1">
                                    <x-label value="Pertenece a:" class="text-primary"></x-label>

                                    <x-select class="w-100" wire:model="fotoCreate.element_id">
                                        <option value="" disabled>Selecciona un elemento</option>
                                        @foreach ($elementos as $item )
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </x-select>

                                    <x-input-error for="fotoCreate.element_id" class="text-danger"></x-input-error>
                                </div>
                                <div class="w-20 ml-4">
                                    <x-label value="Orden" class="text-primary"></x-label>
                                    <x-input type="text" class="form-control" wire:model='fotoCreate.order'></x-input>
                                    <x-input-error for="fotoCreate.order" class="text-danger"></x-input-error>
                                </div>
                            </div>

                            <div class="mt-2">
                                <x-label value="Descripción de la foto (piedefoto)" class="text-primary"></x-label>
                                <x-input type="text" class="w-100 form-control" wire:model='fotoCreate.piedefoto'></x-input>
                                <x-input-error for="fotoCreate.piedefoto" class="text-danger"></x-input-error>
                            </div>
                            <div class="mt-2">
                                <x-label value="Palabras de búsqueda" class="text-primary"></x-label>
                                <textarea wire:model="fotoCreate.keywords" class="w-100 form-control" rows="2"></textarea>
                                <x-input-error for="fotoCreate.keywords" class="text-danger"></x-input-error>
                            </div>

                            <div class="mt-2">
                                <x-label value="SEO: Alt" class="text-primary"></x-label>
                                <x-input type="text" class="w-100 form-control" wire:model='fotoCreate.alt'></x-input>
                                <x-input-error for="fotoCreate.alt" class="text-danger"></x-input-error>
                            </div>

                            <div class="mt-2">
                                <x-label value="SEO: Title" class="text-primary"></x-label>
                                <x-input type="text" class="w-100 form-control" wire:model='fotoCreate.title'></x-input>
                                <x-input-error for="fotoCreate.title" class="text-danger"></x-input-error>
                            </div>




                        </div>
                    </div>


            </x-slot>
            <x-slot name="footer">


                <x-button wire:click='clickCloseModal' class="mr-4">
                    Cancelar
                </x-button>

                <x-danger-button type="submit" wire:click='clickOpenModal'>
                    Guardar fotografía
                </x-danger-button>


            </x-slot>
        </x-dialog-modal>
    </form>

</div>

