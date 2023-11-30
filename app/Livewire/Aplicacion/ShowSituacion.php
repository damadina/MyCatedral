<?php

namespace App\Livewire\Aplicacion;

use Livewire\Component;
use App\Models\foto;
use App\Models\element;

class ShowSituacion extends Component
{
    public $openModal = false;
    public $elemento;
    public $image;
    public $planos;
    public $totalImagenes;
    public $imagenActual = 0;
    public $isPlano;
    public $maxWidth;
    public $isHome = false;
    public $elementos;
    public $elementoSelected ="";

    public function mount() {
        if($this->isPlano) {
            $this->planos = foto::where('element_id',$this->elemento->id)
            ->where('order','>',999)
            ->orderBy('order')
            ->get();
            $this->maxWidth = "sm";
        } else {
            if($this->elemento->categoria_id == '1') {
                $this->planos = foto::where('order','<',999)
                ->orderBy('element_id')
                ->orderBy('order')
                ->get();
                $this->elementos = element::all();
                $this->maxWidth = "2xl";

                $this->isHome = true;

            } else {
                $this->isHome = false;
                $this->maxWidth = "2xl";
                $this->planos = foto::where('element_id',$this->elemento->id)
                ->orderBy('order')
                ->get();
            }




            /* $this->planos = foto::where('element_id',$this->elemento->id) */



        }

        if(count($this->planos)) {
            $this->totalImagenes = count($this->planos);
            $this->image = $this->planos[$this->imagenActual];
        }
    }
    public function updated($property)
    {

        if ($property === 'elementoSelected') {

            if($this->elementoSelected) {
                $this->planos = foto::where('order','<',999)
                ->where('element_id',$this->elementoSelected)
                ->orderBy('element_id')
                ->orderBy('order')
                ->get();
                if(count($this->planos)) {
                    $this->imagenActual =0;
                    $this->totalImagenes = count($this->planos);
                    $this->image = $this->planos[$this->imagenActual];
                }
            } else {
                $this->planos = foto::where('order','<',999)
                ->orderBy('element_id')
                ->orderBy('order')
                ->get();
                if(count($this->planos)) {
                    $this->imagenActual =0;
                    $this->totalImagenes = count($this->planos);
                    $this->image = $this->planos[$this->imagenActual];
                }
            }
        }
    }



    public function render()
    {


        return view('livewire.aplicacion.show-situacion');
    }
    public function clickShow()
    {
        $this->openModal = true;
    }
    public function clickHide() {
        $this->openModal = false;
    }
    public function addImagenActual() {
        $this->imagenActual++;
        $this->image = $this->planos[$this->imagenActual];
    }
    public function restImagenActual() {
        $this->imagenActual--;
        $this->image = $this->planos[$this->imagenActual];
    }
}
