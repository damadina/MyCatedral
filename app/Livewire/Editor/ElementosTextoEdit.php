<?php

namespace App\Livewire\Editor;

use Livewire\Component;
use App\Livewire\Forms\ElementoTextoEditForm;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;

class ElementosTextoEdit extends Component
{
    public $modalOpen;
    public ElementoTextoEditForm $elementoTextEditForm;


    public function mount($texto) {
        $this->elementoTextEditForm->texto = $texto;
        $this->elementoTextEditForm->titulo = $texto->titulo;
        $this->elementoTextEditForm->orden = $texto->orden;
        $this->elementoTextEditForm->html = $texto->html;
    }


    public function render()
    {
        return view('livewire.editor.elementos-edit-texto');
    }
    public function clickModalOpen() {
        $this->modalOpen = true;
    }
    public function clickCloseModal() {
        $this->modalOpen = false;
    }
    public function update() {
        $this->elementoTextEditForm->update();
        $this->modalOpen = false;
        $this->dispatch('texto-updated');
    }
}
