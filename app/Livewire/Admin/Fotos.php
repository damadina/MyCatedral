<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\FotoEditForm;
use App\Models\element;
use App\Models\foto;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class Fotos extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;
    public $elementoSelected ="";
    public $open = false;
    public $openModal = false;
    protected $paginationTheme = "bootstrap";
    public $messageExist = "";
    public $identificador;
    public $elementos;


    public FotoEditForm $fotoEdit;


    public function mount() {
        $this->identificador = rand();
        $this->elementos = element::all();

    }
    public function updated($property)
    {
        if ($property === 'elementoSelected') {
            $this->resetPage();
        }
    }


    public function clickOpenModal() {
        $this->openModal = true;
    }
    public function closeOpenModal() {
        $this->openModal = false;
        $this->resetValidation();
    }


    #[On('foto-creada')]
    public function render()
    {
        if($this->elementoSelected>0) {

            $fotos = foto::where('element_id',$this->elementoSelected)->orderBy('order')->paginate(8);
        } else {

            $fotos = foto::orderBy('order')->paginate(8);

        }
        /* if($this->elementoSelected>0) {

            $fotos = foto::where('title','LIKE','%'.$this->search.'%')
            ->where('element_id',$this->elementoSelected)
            ->orWhere('piedefoto','LIKE','%'.$this->search.'%')
            ->orWhere('keywords','LIKE','%'.$this->search.'%')
            ->orWhere('url','LIKE','%'.$this->search.'%')
            ->latest()->paginate(8);

        } else {
            $fotos = foto::where('title','LIKE','%'.$this->search.'%')
            ->orWhere('piedefoto','LIKE','%'.$this->search.'%')
            ->orWhere('keywords','LIKE','%'.$this->search.'%')
            ->orWhere('url','LIKE','%'.$this->search.'%')
            ->latest()->paginate(8);
        } */
        return view('livewire.admin.fotos', compact('fotos'));
    }

    public function edit($fotoId) {
        $this->resetValidation();
        $this->fotoEdit->edit($fotoId);
    }
    public function update() {
        $this->fotoEdit->update();
    }




    public function limpiar_page() {
        $this->resetPage();
    }

}
