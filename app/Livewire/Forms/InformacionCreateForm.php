<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\informacion;

class InformacionCreateForm extends Form
{
    public $titulo;
    public $order;
    public $informacion;
    public $isPublic ="";

    public function rules()
    {
        return [
            'titulo' =>'required',
            'order' => 'integer|required',
            'informacion' => 'required',
            'isPublic' => 'required'
        ];
    }
    public function save() {

        $this->validate();
        informacion::create(
            $this->only('titulo','order','informacion','isPublic')
        );
        $this->reset();
    }

}
