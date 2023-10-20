<div>
    <div class="card">



        <div class="card-header">
            <input wire:keydown='limpiar_page'   wire:model="search" class="form-control w-100" placeholder="Nombre de usuario">
        </div>
        @if($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Email</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.users.edit',$user)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$users->links()}}
            </div>
        @else
            <div class="card-body">
                <strong>No hay coincidencias ...</strong>
            </div>
        @endif
    </div>
</div>
