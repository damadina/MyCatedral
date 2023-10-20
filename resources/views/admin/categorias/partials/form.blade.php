<div class="form-group">
    {!! Form::label('title', 'Nombre: ',['class' =>'text-primary']) !!}
    {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la categoría']) !!}
    @error("title")
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror

    <div class="col-sm-2">
        {!! Form::label('orden', 'Orden: ',['class' =>'text-primary']) !!}
        {!! Form::number('orden', null, ['class' => 'form-control mt-2' . ($errors->has('orden') ? ' is-invalid' : '')]) !!}
    </div>
    @error("orden")
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
    @enderror
    <div>
        {!! Form::label('isPublic', 'Publico: ',['class' =>'text-primary mt-2']) !!}
        {!! Form::checkbox('isPublic', null, true, ['class' => 'mt-2 ml-2']) !!}
    </div>
</div>

