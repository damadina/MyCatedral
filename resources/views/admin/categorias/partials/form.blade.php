<div class="form-group">
    <div class="d-flex">
        <div class="flex-grow-1">
            <label class="text-primary">Nombre</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            @error("title")
                <small class="text-danger">
                    <small>{{$message}}</small>
                </small>
            @enderror
        </div>
        <div class="ml-2">
            <label class="text-primary">Orden</label>
            <input type="text" name="orden" class="form-control @error('orden') is-invalid @enderror">
            @error("orden")
                <small class="text-danger">
                    <small>{{$message}}</small>
                </small>
            @enderror
        </div>
        <div class="ml-2">
            <label class="text-primary">Estado</label>
            <select name="isPublic" class="form-control form-control" aria-label=".form-select-lg example">
                <option value="" disabled>Seleccione un estado</option>
                <option value="0">Borrador</option>
                <option value="1">Publicado</option>
            </select>
        </div>


    </div>


</div>

