<?php

namespace App\Livewire\Editor;
use Livewire\Component;
use App\Models\element;
use App\Models\categoria;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;


class ElementosHome extends Component
{
    use WithPagination;
    public $search, $categoriaSelected ="";


    #[Layout('layouts.app')]
    public function render()
    {
        if($this->categoriaSelected > 0) {
            $elementos = element::where('title','LIKE','%'.$this->search.'%')
            ->where('categoria_id',$this->categoriaSelected)
            ->latest()
            ->paginate(8);
        } else {
            $elementos = element::where('title','LIKE','%'.$this->search.'%')
            ->latest()
            ->paginate(8);
        }

        $categorias = categoria::all();


        return view('livewire.editor.elementos-home',compact('elementos','categorias'));
    }
    public function updated($property)
    {
        if ($property === 'categoriaSelected') {
            $this->resetPage();
        }
    }
    public function limpiar_page() {
        $this->resetPage();
    }

}
