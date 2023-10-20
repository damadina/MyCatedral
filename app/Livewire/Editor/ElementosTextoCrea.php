<?php

namespace App\Livewire\Editor;

use Livewire\Component;
use App\Livewire\Forms\ElementoTextoCreateForm;
use App\Models\element;

class ElementosTextoCrea extends Component
{
    public $openModal;
    public ElementoTextoCreateForm $elementoTextoForm;

    public function mount(element $elemento) {
        $this->elementoTextoForm->element_id = $elemento->id;
    }

    public function render()
    {
        return view('livewire.editor.elementos-texto-crea');
    }
    public function clickOpenModal() {
        $this->openModal = true;

    }
    public function clickCloseModal() {
        $this->openModal = false;
    }
    public function save() {
        $this->elementoTextoForm->save();
        $this->openModal = false;
        $this->dispatch('texto-creado');
    }
}
