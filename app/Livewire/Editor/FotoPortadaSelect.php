<?php

namespace App\Livewire\Editor;

use App\Models\element;
use Livewire\Component;
use App\Models\foto;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
class FotoPortadaSelect extends Component
{
    public $openModal;
    public $elemento;
    public $portadaUrl;
    public $fotos;
    public function mount(element $elemento)
    {
        $this->elemento = $elemento;
        $this->fotos = $elemento->fotos;

    }
    /* #[Layout('layouts.editor')] */
    public function render()
    {
        return view('livewire.editor.foto-portada-select');
    }
    public function clickOpenModal(){
        $this->openModal = true;
    }
    public function clickCloseModal() {
        $this->openModal = false;
    }
    public function clickFoto($fotoId) {
        $this->openModal = false;
        $this->dispatch('portada-cambiada',fotoId: $fotoId);

    }

}
