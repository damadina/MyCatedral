<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\categoria;
class Users extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $categoriaSelect;
    public $search;
    public function render()
    {
        $categorias = categoria::all();
        $users = User::where('name','LIKE','%'.$this->search.'%')
            ->orWhere('email','LIKE','%'.$this->search.'%')
            ->paginate(8);
        return view('livewire.admin.users',compact('users','categorias'));
    }
    public function limpiar_page() {
        $this->resetPage();
    }
}
