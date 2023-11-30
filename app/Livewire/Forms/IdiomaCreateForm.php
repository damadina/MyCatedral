<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\idioma;

class IdiomaCreateForm extends Form
{
    public $orden;
    public $title;
    public $locale;
    public $isPublic;
    public function rules()
    {
        return [
            'orden' =>'integer|required',
            'title' => 'required|unique:idiomas,title',
            'isPublic' => 'required',
            'locale' => 'required',
        ];
    }
    public function save() {
        $this->validate();

        idioma::create(
            $this->only('orden','title','isPublic','locale')
        );

        $this->reset();
    }
}
