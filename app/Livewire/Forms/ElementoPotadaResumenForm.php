<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ElementoPotadaResumenForm extends Form
{
    public $elemento;
    public $urlPortada;
    public $resumen;
    public $piedefoto;

    public function rules()
    {
        return [
            'urlPortada' =>'required',
            'resumen' => 'required',
        ];
    }
    public function update() {

        $this->validate();

        $this->elemento->urlPortada = $this->urlPortada;
        $this->elemento->resumen = $this->resumen;

        $this->elemento->update(
            $this->only('urlPortada','resumen')
        );

        $this->reset();
    }

}
