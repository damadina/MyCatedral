<?php

namespace App\Livewire\Admin;

use App\Models\categoria;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\element;
use App\Models\capitulo;
use Livewire\Attributes\On;
use App\Livewire\Forms\ElementoEditForm;


class Elementos extends Component
{
    use WithPagination;
    public $capitulos;
    public $selectCapitulo;
    public $search, $categorias, $categoriaSelected ="";
    protected $paginationTheme = "bootstrap";
    public ElementoEditForm $elementoEdit;

    public function mount() {
        $this->capitulos = capitulo::all();
        $this->categorias = categoria::distinct()->get();
    }



    #[On('elemento-creado')]
    public function render()
    {

        if($this->categoriaSelected > 0) {
            $elementos = element::where('title','LIKE','%'.$this->search.'%')
            ->where('categoria_id',$this->categoriaSelected)
            ->orderBy('orden')
            ->paginate(8);
        } else {
            $elementos = element::where('title','LIKE','%'.$this->search.'%')
            ->orderBy('categoria_id')
            ->paginate(8);
        }


        /* $categorias = categoria::pluck('title','id')->unique(); */
        $categorias = $this->categorias;

        return view('livewire.admin.elementos', compact('elementos','categorias'));
    }


    public function updated($property)
    {
        if ($property === 'categoriaSelected') {
            $this->resetPage();
        }
        if ($property === 'selectCapitulo') {
            $capitulo = capitulo::findOrFail($this->selectCapitulo);
           $this->categorias = $capitulo->categorias;
        }
    }



    public function edit($elementoId) {
        $this->resetValidation();
        $this->elementoEdit->edit($elementoId);
        $this->dispatch('show-formElementoEdit');
    }

    public function close() {
        $this->resetValidation();
        $this->elementoEdit->reset();
        $this->dispatch('hide-formElementoEdit');
    }

    public function update() {
        $this->elementoEdit->update();
        $this->dispatch('hide-formElementoEdit');
        $this->render();
    }
    public function limpiar_page() {
        $this->resetPage();
    }
}
