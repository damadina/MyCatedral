<?php

namespace App\Livewire\Editor;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\categoria;
use App\Models\foto;
use Livewire\WithPagination;

class SearchFoto extends Component
{
    use WithPagination;
    public $search, $categoriaSelected ="", $categorias,$url;
    public $openModal = false;

    public function mount() {
        $this->categorias = categoria::all();
    }


    #[Layout('layouts.editorHome')]
    public function render()
    {
        $fotos = foto::where('piedefoto','LIKE','%'.$this->search.'%')
        ->orWhere('url','LIKE','%'.$this->search.'%')
        ->orWhere('keywords','LIKE','%'.$this->search.'%')
        ->latest()
        ->paginate(8);
        return view('livewire.editor.search-foto',compact('fotos'));
    }
    public function limpiar_page() {
        $this->resetPage();
    }
    public function clickImage($url) {
        $this->url = $url;
        $this->openModal = true;
    }
    public function clickCloseModal() {
        $this->openModal = false;
    }
}
