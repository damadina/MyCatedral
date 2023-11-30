<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\informacion;

class InformacionEditForm extends Form
{
    public $titulo;
    public $order;
    public $informacion;
    public $isPublic ="";

    public $informacion_id;
    public $openModal;


    public function rules()
    {
        return [
            'titulo' =>'required',
            'order' => 'required',
            'informacion' => 'required',
            'isPublic' => 'required'
        ];
    }
    public function edit($informacion_id) {
        $this->openModal = true;
        $this->informacion_id = $informacion_id;
        $informacion = informacion::find($informacion_id);
        $this->titulo = $informacion->titulo;
        $this->order = $informacion->order;
        $this->informacion = $informacion->informacion;
        $this->isPublic = $informacion->isPublic;
    }

    public function update() {
        $this->validate();

        $informacion = informacion::find($this->informacion_id);
        $informacion->update(
            $this->only('titulo','order','informacion','isPublic')
        );
        $this->reset();
    }
}
