<?php

namespace App\Livewire\Aplicacion;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\idioma;
use App\Models\categoria;

class AppNavigationMenu extends \Laravel\Jetstream\Http\Livewire\NavigationMenu
{
    public $idiomas;
    public $showIdiomas;
    public $locale;
    public $slug;
    public $exterior;
    public $interior;
    public $capillas;
    public $museo;


    public function mount() {
        $user = auth::user();
        if($user && $user->isAdmin) {
            $this->idiomas = idioma::orderBy('orden')->get();
        } else {
            $this->idiomas = idioma::where('isPublic','1')->orderBy('orden')->get();
        };
        $this->locale = session()->get('lang');

        if($this->locale=="es") {
            $this->locale = "";
        }
        $this->slug = request()->segment(count(request()->segments()));


        $exte = categoria::where('title',"exterior")->first();
        $this->exterior = $exte->elementos()->orderBy('orden')->get();

        $inter = categoria::where('title',"interior")->first();
        $this->interior = $inter->elementos()->orderBy('orden')->get();

        $capi = categoria::where('title',"capillas")->first();
        $this->capillas = $capi->elementos()->orderBy('orden')->get();

        $muse = categoria::where('title',"museo")->first();
        $this->museo = $muse->elementos()->orderBy('orden')->get();
        if (env('SWOW_IDIOMAS') == true) {
            $this->showIdiomas = true;
        } else {
            $this->showIdiomas = false;
        }
        $temp = session()->get('noIdiomas');
        if($temp) {
            $this->showIdiomas = false;
        }

        if(session()->has('noIdiomas')){
            session()->forget('noIdiomas');
        }


    }

    public function render()
    {
        /* return view('livewire.aplicacion.app-navigation-menu'); */
        return view('navigation-menu');
    }
}
