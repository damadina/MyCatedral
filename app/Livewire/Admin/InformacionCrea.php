<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\InformacionCreateForm;
use Livewire\Component;
use App\Livewire\Forms\InformationCreateForm;

class InformacionCrea extends Component
{
    public $openModal;
    public InformacionCreateForm $informacionCreate;

    public function render()
    {
        return view('livewire.admin.informacion-crea');
    }

    public function clickOpenModal() {
        $this->openModal = true;
    }
    public function clickCloseModal() {
        $this->openModal = false;
    }
    public function save() {
        $this->informacionCreate->save();
        $this->openModal = false;
        $this->dispatch('informacion-creada');
    }


}
