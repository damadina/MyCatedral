<div class="card">
    <div class="card-header">
        @livewire("admin.documentos-crea")

    </div>

    @if($documents->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <td>ID</td>
                        <td>Titulo</td>
                        <td>Orden</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach ($documents as $each )
                            <tr>
                                <td>{{$each->id}}</td>
                                <td>{{$each->titulo}}</td>
                                <td>{{$elemento->orden}}</td>
                                <td width="10px">

                                    <button class="btn btn-primary mb-4" wire:click="edit({{$elemento->id}})">Editar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <div class="card-body">
                <strong>No hay ningún documento ...</strong>
            </div>
        @endif
</div>
