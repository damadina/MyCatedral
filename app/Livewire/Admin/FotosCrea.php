<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\FotoCreateForm;
use App\Models\element;
use Livewire\WithFileUploads;
use App\Models\foto;

use Livewire\Component;
use Livewire\Attributes\Rule;

class FotosCrea extends Component
{
    use WithFileUploads;
    public $openModal;
    public $open = false;
    public $messageExist = "";
    public $elementos;


    public $identificador;

    public FotoCreateForm $fotoCreate;


    public function mount() {
        $this->identificador = rand();
        $this->elementos = element::all();
    }

    public function render()
    {
        return view('livewire.admin.fotos-crea');
    }

    public function clickOpenModal() {
        $this->openModal = true;
    }
    public function clickCloseModal () {
        $this->openModal = false;
        $this->resetValidation();
    }

    public function save() {
        $this->fotoCreate->save();
        $this->fotoCreate->reset();
        $this->dispatch('foto-creada');
        $this->dispatch('hide-formCreateFoto');
    }

    public function updated($property)
    {
        if ($property === 'fotoCreate.image') {
            $this->fotoCreate->url =  $this->fotoCreate->image->getClientOriginalName();
        }
    }
    public function newFoto() {
        $this->dispatch('show-formCreateFoto');
    }
    public function close() {
        $this->resetValidation();
    }
}
