<?php

namespace App\Livewire\Admin;
use App\Livewire\Forms\ElementCreateForm;
use App\Models\categoria;
use App\Models\capitulo;
use Livewire\Component;

class ElementosCrea extends Component
{

    public $categorias;
    public $capitulos;
    public $selectCapitulo;
    public ElementCreateForm $elementoCreate;


    public function mount() {
        $this->capitulos = capitulo::all();
        /* $this->selectCapitulo = 1;
        $this->categorias = categoria::all(); */
        $capitulo = capitulo::findOrFail(1);
        $this->categorias = $capitulo->categorias;
        $this->elementoCreate->categoria_id = "";
        $this->elementoCreate->isPublic = "";
    }

    public function render()
    {
        return view('livewire.admin.elementos-crea');
    }
    public function updated($property)
    {
        if ($property === 'selectCapitulo') {

            $capitulo = capitulo::findOrFail($this->selectCapitulo);
            $this->categorias = $capitulo->categorias;
        }
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
