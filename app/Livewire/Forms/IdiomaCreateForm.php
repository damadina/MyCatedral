<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\idioma;

class IdiomaCreateForm extends Form
{
    public $idiomaId;
    public $orden ="";
    public $title ="";
    public $locale ="";
    public $isPublic="";

    public $elementsTraduccion;

    public $textosTraduccion;

    public $fotosTraduccion;

    public $idiomasTraduccion;

    public $documentsTraduccion;

    public $autorsTraduccion;

    public $informacionsTraduccion;
    public $traducciones_Start=[];


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
            $this->only('orden','title','isPublic','locale','traducciones_Start')
        );
        $this->reset();
    }

    public function edit($idiomaId) {
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
    public function close() {
        $this->reset();
    }


}
