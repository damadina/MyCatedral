<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\InformacionEditForm;
use App\Models\informacion;
use Livewire\Attributes\On;

use Livewire\Component;

class InformacionList extends Component
{
    public InformacionEditForm $informacionEdit;
    public $eyeModal = false;
    public $info;

    #[On('informacion-creada')]
    public function render()
    {
        $informaciones = informacion::all();
        return view('livewire.admin.informacion-list',compact('informaciones'));
    }

    public function edit($informacionId) {
        $this->resetValidation();
        $this->informacionEdit->edit($informacionId);
        $this->dispatch('show-infoEdit');
    }
    public function update() {
        $this->informacionEdit->update();
    }
    public function openEyeModal($informacionId) {
        $informacion = informacion::find($informacionId);
        $this->info = $informacion->informacion;
        $this->eyeModal = true;
    }
    public function close() {
        $this->resetValidation();
        $this->informacionEdit->reset();
    }

    public function delete($informacionId) {
        $this->dispatch('borrarInfo',$informacionId);
    }
    #[On('start-delete')]
    public function startDelete($informacionId) {
        $informacion = informacion::findOrFail($informacionId);
        $informacion->delete();
        session()->flash('status','La información se eliminó');


    }
}
