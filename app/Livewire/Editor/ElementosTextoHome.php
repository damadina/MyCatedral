<?php

namespace App\Livewire\Editor;

use App\Models\element;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

class ElementosTextoHome extends Component
{
    public $elemento;
    public $openModal = true;
    public function mount($elementoId) {
        $elemento = element::find($elementoId);
        $this->elemento = $elemento;
    }

    #[On('texto-creado')]
    #[Layout('layouts.editor2')]
    public function render()
    {
        $elemento = $this->elemento;
        $textos = $elemento->textos->sortBy('orden');
        return view('livewire.editor.elementos-texto-home',compact('elemento','textos'));
    }
}
