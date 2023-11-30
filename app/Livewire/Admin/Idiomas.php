<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\idioma;
use App\Livewire\Forms\IdiomaEditForm;
use Livewire\Attributes\On;

class Idiomas extends Component
{
    public IdiomaEditForm $idiomaEdit;


    #[On('idioma-creado')]
    public function render()
    {
        $idiomas = idioma::orderBy('orden')->get();
        return view('livewire.admin.idiomas',compact('idiomas'));
    }

    public function edit($idiomaId) {
        $this->resetValidation();
        $this->idiomaEdit->edit($idiomaId);
    }
    public function update() {
        $this->idiomaEdit->update();
    }
}
