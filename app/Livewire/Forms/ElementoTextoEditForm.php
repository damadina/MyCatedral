<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class ElementoTextoEditForm extends Form
{
    public $texto;
    public $titulo;
    public $orden;
    public $html;

    public function rules()
    {
        return [
            'titulo' =>'required',
            'orden' => 'integer',
            'html' => 'required',
        ];
    }



    public function update() {
        $this->validate();

        $this->texto->update(
            $this->only('orden','titulo','orden','html')
        );

    }
}
