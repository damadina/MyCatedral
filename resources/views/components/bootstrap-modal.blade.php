  @props(['modalTitle','eventName'])
  <div wire:ignore.self class="modal fade bd-example-modal-lg" id="{{$eventName}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{$modalTitle}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{$slot}}
        </div>
        <div class="modal-footer">
          <button @click="$dispatch('{{$eventName}}-close')" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button @click="$dispatch('{{$eventName}}')" type="button" class="btn btn-primary">Crear</button>
        </div>
      </div>
    </div>
  </div>
