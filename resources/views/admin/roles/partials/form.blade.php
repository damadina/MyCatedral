<div class="form-group">
    {!! Form::label('name', 'Nombre: ',['class' =>'text-primary']) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del rol']) !!}
    @error("name")
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>
<strong class="text-primary">Permisos</strong>
@error("permissions")
    <div>
        <small class="text-danger">
            <strong>{{$message}}</strong>
        </small>
    </div>
@enderror

@foreach ($permissions as $permission )
<div>
    <label>
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' =>'mr-1']) !!}
        {{$permission->name}}
    </label>
</div>
@endforeach
