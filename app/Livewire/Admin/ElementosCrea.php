<?php

namespace App\Livewire\Admin;
use App\Livewire\Forms\ElementCreateForm;
use App\Models\categoria;
use Livewire\Component;

class ElementosCrea extends Component
{

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

    public function save() {
        $this->resetValidation();
        $this->elementoCreate->save();
        session()->flash('status','El elemento se ha creado');
        $this->dispatch('hide-formElementoCreate');
        $this->dispatch('elemento-creado');
    }
    public function close() {
        $this->elementoCreate->close();
        $this->dispatch('hide-formElementoCreate');
    }

    public function newElemento() {

        $this->dispatch('show-formElementoCreate');
    }

}
