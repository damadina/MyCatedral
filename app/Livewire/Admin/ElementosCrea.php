<?php

namespace App\Livewire\Admin;
use App\Livewire\Forms\ElementCreateForm;
use App\Models\categoria;
use Livewire\Component;

class ElementosCrea extends Component
{
    public $openModal = false;
    public $categorias;
    public ElementCreateForm $elementoCreate;


    public function mount() {
        $this->categorias = categoria::all();
        $this->elementoCreate->categoria_id = "";
        $this->elementoCreate->isPublic = "";
    }

    public function render()
    {
        return view('livewire.admin.elementos-crea');
    }
    public function clickOpenModal() {
        $this->openModal = true;
    }
    public function clickCloseModal() {
        $this->openModal = false;
    }
    public function save() {
        $this->resetValidation();
        $this->elementoCreate->save();
        $this->openModal = false;
        $this->dispatch('elemento-creado');
    }

}
