<div>
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button> --}}


    <form wire:submit='save'>
        <x-bootstrap-modal :modalTitle="$title" :eventName="$event">
        </x-bootstrap-modal>

    </form>
</div>
