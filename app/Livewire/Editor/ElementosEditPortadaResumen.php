<?php

namespace App\Livewire\Editor;

use App\Models\element;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Layout;
use App\Models\foto;
use App\Livewire\Forms\ElementoPotadaResumenForm;

class ElementosEditPortadaResumen extends Component
{

    public $portadaUrl;
    public $elemento;


    public ElementoPotadaResumenForm $portadaResumen;


    public function mount($elementoId) {

        $elemento = element::find($elementoId);
        $this->elemento = $elemento;

        $this->portadaResumen->elemento = $elemento;
        $this->portadaResumen->resumen = $elemento->resumen;
        if($elemento->urlPortada) {
            $this->portadaUrl = asset('storage/originales/'.$elemento->urlPortada);
            $foto = foto::where('url',$elemento->urlPortada)->first();
            $this->portadaResumen->piedefoto = $foto->piedefoto;
        } else {
            $this->portadaUrl = asset('storage/miniaturas/No_image_available.png');
        }

    }
    #[Layout('layouts.editor2')]
    public function render()
    {
        $elemento = $this->elemento;
        return view('livewire.editor.elementos-edit-portada-resumen',compact('elemento'));

    }
    #[On('portada-cambiada')]
    public function cambio($fotoId)
    {
        $foto = foto::find($fotoId);
        $this->portadaUrl = asset('storage/originales/'.$foto->url);
        $this->portadaResumen->piedefoto = $foto->piedefoto;
        $this->portadaResumen->urlPortada = $foto->url;

    }



    public function update() {
        $this->portadaResumen->update();
        redirect()->to(route('editor.home'));
    }

    public function cancelar() {
        redirect()->to(route('editor.home'));
    }

}



