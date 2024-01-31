<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\InformacionCreateForm;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\InformationCreateForm;

class InformacionCrea extends Component
{
    public $openModal;
    public InformacionCreateForm $informacionCreate;

    #[On('informacion-creada')]
    public function render()
    {
        return view('livewire.admin.informacion-crea');
    }


    public function save() {
        $this->informacionCreate->save();
        session()->flash('status','La información se ha creado');
        $this->dispatch('hide-infoCreate');
        $this->dispatch('informacion-creada');
    }
    public function newInfo() {
        $this->resetValidation();
        $this->dispatch('show-infoCreate');
    }
    public function close() {
        $this->resetValidation();
        $this->informacionCreate->reset();
    }

}
