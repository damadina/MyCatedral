<?php

namespace App\Livewire\Aplicacion;

use Livewire\Component;
use App\Models\informacion;

class ShowInfo extends Component
{
    public $openModal = false;
    public $informaciones;
    public $informacionSelected = 1;
    public $informacion;
    public function mount() {
        $this->informaciones = informacion::where('isPublic',true)->get();
        $this->informacion = $this->informaciones[$this->informacionSelected-1]->informacion;

    }

    public function render()
    {
        return view('livewire.aplicacion.show-info');
    }
    public function clickShow() {
        $this->openModal = true;
    }

    public function updated($property)
    {

        if ($property === 'informacionSelected') {
            $this->informacion = $this->informaciones[$this->informacionSelected-1]->informacion;
        }
    }

}
