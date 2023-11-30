<?php

namespace App\Livewire\Forms;

use App\Models\foto;
use Livewire\Attributes\Rule;
use Livewire\Form;

class FotoEditForm extends Form
{
    public $fotoId ="";
    public $openModal;

    public $image;
    public $order;
    public $url;
    public $piedefoto;
    public $keywords;
    public $alt;
    public $title;
    public $element_id;

    public function rules()
    {
        return [
            'piedefoto' => 'required|min:10',
            'keywords' => 'required|min:5',
            'alt' => 'required|min:20|max:125',
            'title' => 'required|min:6',
            'element_id' => 'required',
            'order' => 'required'
        ];
    }

    public function edit($fotoId) {
        $this->openModal = true;
        $this->fotoId = $fotoId;
        $foto = foto::find($fotoId);
        $this->url = $foto->url;
        $this->piedefoto = $foto->piedefoto;
        $this->keywords = $foto->keywords;
        $this->alt = $foto->alt;
        $this->title = $foto->title;
        $this->element_id = $foto->element_id;
        $this->order = $foto->order;

    }

    public function update() {
        $this->validate();

        $foto = foto::find($this->fotoId);
        $foto->update(
            $this->only('piedefoto','keywords','alt','title','element_id','order')
        );
        $this->reset();
    }

}
