<div>
    <div class="mb-6">
        @livewire("admin.informacion-crea")
    </div>

    <div class="card">


        @if($fotos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <td>Foto</td>
                        <td>Piedefoto, keywords y title</td>
                        <td>Orden</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach ($fotos as $item )
                            <tr>
                                <td class="w-10">
                                    <img class="img-fluid img-thumbnail" src="{{asset('storage/miniaturas/'. $item->url)}}" alt="">
                                    {{$item->url}}
                                </td>
                                <td>
                                    {{$item->piedefoto}}<br>
                                    {{$item->keywords}}<br>
                                    {{$item->title}}
                                </td>
                                <td>{{$item->order}}</td>
                                <td width="10px">

                                    <button class="btn btn-primary mb-4" wire:click="edit({{$item->id}})">Editar</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$fotos->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay Fotos ...</strong>
            </div>
        @endif
    </div>



</div>
