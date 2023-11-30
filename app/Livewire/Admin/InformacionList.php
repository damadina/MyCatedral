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
    }
    public function update() {
        $this->informacionEdit->update();
    }
    public function openEyeModal($informacionId) {
        $informacion = informacion::find($informacionId);
        $this->info = $informacion->informacion;
        $this->eyeModal = true;
    }
}
