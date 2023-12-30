<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\idioma;

class IdiomaEditForm extends Form
{
    public $idiomaId;
    public $openModal;
    public $orden;
    public $title;
    public $locale;
    public $isPublic;

    public $elementsTraduccion;
    public $textosTraduccion;
    public $fotosTraduccion;
    public $idiomasTraduccion;
    public $documentsTraduccion;
    public $autorsTraduccion;
    public $informacionsTraduccion;
    public $traducciones_Start =[];

    public function rules()
    {
        return [
            'orden' =>'integer|required',
            'title' => 'required|unique:idiomas,title,'.$this->idiomaId,
            'isPublic' => 'required',
            'locale' => 'required'
        ];
    }

    public function edit($idiomaId) {
        $this->openModal = true;
        $this->idiomaId = $idiomaId;
        $idioma = idioma::find($idiomaId);
        $this->orden = $idioma->orden;
        $this->title = $idioma->title;
        $this->isPublic = $idioma->isPublic;
        $this->locale = $idioma->locale;
        $this->elementsTraduccion = $idioma->elementsTraduccion;
        $this->textosTraduccion = $idioma->textosTraduccion;
        $this->fotosTraduccion = $idioma->fotosTraduccion;
        $this->idiomasTraduccion = $idioma->idiomasTraduccion;
        $this->documentsTraduccion = $idioma->documentsTraduccion;
        $this->autorsTraduccion = $idioma->autorsTraduccion;
        $this->informacionsTraduccion = $idioma->informacionsTraduccion;
        $this->traducciones_Start = $idioma->traducciones_Start;
    }

    public function update() {
        $this->validate();
        $idioma = idioma::find($this->idiomaId);
        $idioma->update(
            $this->only('orden','title','isPublic','locale','traducciones_Start')
        );
        $this->reset();
    }


}
