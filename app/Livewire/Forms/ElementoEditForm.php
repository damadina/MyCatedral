<?php

namespace App\Livewire\Forms;

use App\Models\element;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Illuminate\Support\Str;

class ElementoEditForm extends Form
{
    public $elementoId ="";
    public $openModal;

    public $orden;
    public $title;
    public $slug;
    public $seoTitle;
    public $seoMeta;
    public $isPublic;
    public $categoria_id;

    public function rules()
    {
        return [
            'orden' =>'required',
            'title' => 'required|unique:elements,title,'.$this->elementoId,
            'seoTitle' => 'required|min:8',
            'seoMeta' => 'required|min:8',
            'isPublic' => 'required',
            'categoria_id' => 'required'
        ];
    }
    public function edit($elementoId) {
        $this->openModal = true;
        $this->elementoId = $elementoId;
        $elemento = element::find($elementoId);
        $this->orden = $elemento->orden;
        $this->title = $elemento->title;
        $this->seoTitle = $elemento->seoTitle;
        $this->seoMeta = $elemento->seoMeta;
        $this->isPublic = $elemento->isPublic;
        $this->categoria_id = $elemento->categoria_id;

    }

    public function update() {
        $this->slug = Str::slug($this->title);
        $this->validate();
        $foto = element::find($this->elementoId);
        $foto->update(
            $this->only('orden','title','slug','seoTitle','seoMeta','isPublic','categoria_id')
        );
        $this->reset();
    }
}
