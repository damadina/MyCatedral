<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\IdiomaCreateForm;
use App\Livewire\Forms\IdiomaEditForm;

class IdiomasCrea extends Component
{


    public IdiomaCreateForm $idiomaCreate;


    public function mount() {
        $this->idiomaCreate->isPublic = "0";
    }

    public function render()
    {
        return view('livewire.admin.idiomas-crea');
    }

   /*  #[On('crea-idioma')] */
    public function save() {
        $this->resetValidation();
        $this->idiomaCreate->save();

        session()->flash('status','El idioma se ha creado');
        $this->dispatch('hide-formCreate');
        /* $this->dispatch('idioma-creado'); */
        $this->redirect(route('admin.idiomas'));
    }
   /*  #[On('crea-idioma-close')] */
    public function close() {
        $this->idiomaCreate->close();
    }

    /*  #[On('idiomas-edit-mode')]
    public function edit($id) {
        dd($this->idiomaCreate);
        $this->editForm = true;
        $this->formTitle = "Editar idioma";
        $this->idiomaCreate->edit($id);
    } */
    public function newIdioma() {
        $this->dispatch('show-formCreate');
    }
}
