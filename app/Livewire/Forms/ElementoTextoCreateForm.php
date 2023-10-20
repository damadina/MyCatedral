<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\element;
use App\Models\texto;

class ElementoTextoCreateForm extends Form
{
    public $element_id;
    public $titulo;
    public $html;
    public $orden;

    public function rules()
    {
        return [
            'titulo' =>'required',
            'html' => 'required',
            'orden' => 'integer',
        ];
    }
    public function save() {
        $this->validate();

        texto::create(
            $this->only('orden','titulo','html','element_id')
        );




        $this->reset();
    }
}
