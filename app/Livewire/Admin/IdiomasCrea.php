<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Livewire\Forms\IdiomaCreateForm;

class IdiomasCrea extends Component
{
    public $openModal = false;

    public IdiomaCreateForm $idiomaCreate;

    public function mount() {
        $this->idiomaCreate->isPublic = "0";
    }

    public function render()
    {
        return view('livewire.admin.idiomas-crea');
    }
    public function clickOpenModal() {
        $this->openModal = true;
    }
    public function clickCloseModal() {
        $this->openModal = false;
    }
    public function save() {
        $this->resetValidation();
        $this->idiomaCreate->save();
        $this->openModal = false;
        $this->dispatch('idioma-creado');
    }
}
