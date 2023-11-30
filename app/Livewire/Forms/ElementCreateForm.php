<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\element;
use Illuminate\Support\Str;

class ElementCreateForm extends Form
{
    public $orden;
    public $title;
    public $slug;
    public $resumen;
    public $seoTitle;
    public $seoMeta;
    public $isPublic;
    public $categoria_id;

    public function rules()
    {
        return [
            'orden' =>'required',
            'title' => 'required|unique:elements,title',
            'seoTitle' => 'required|min:8',
            'seoMeta' => 'required|min:8|max:160',
            'isPublic' => 'required',
            'categoria_id' => 'required'
        ];
    }
    public function save() {

        $this->validate();
        $this->slug = Str::slug($this->title);
        element::create(
            $this->only('orden','title','slug','seoTitle','seoMeta','isPublic','categoria_id')
        );

        $this->reset();
    }

}

