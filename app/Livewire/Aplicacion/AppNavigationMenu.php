<?php

namespace App\Livewire\Aplicacion;

use App\Models\capitulo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\idioma;
use App\Models\categoria;

class AppNavigationMenu extends \Laravel\Jetstream\Http\Livewire\NavigationMenu
{
    public $idiomas;
    public $capitulos;
    public $showIdiomas;
    public $locale;
    public $slug;
    public $exterior;
    public $interior;
    public $capillas;
    public $museo;
    public $isHome;
    public $capituloSelected;
    public $capituloSelectedLiteral;



    public function mount() {




        $this->isHome = session()->get('isHome');

        $this->getData();
        /* $user = auth::user();


        if($user && $user->isAdmin) {
            $this->idiomas = idioma::orderBy('orden')->get();
            $this->capitulos = capitulo::orderBy('orden')->get();
            $this->capituloSelected = capitulo::findOrFail(1);
        } else {
            $this->idiomas = idioma::where('isPublic','1')->orderBy('orden')->get();
        }; */
        $this->locale = config('app')['locale'];

        /* if($this->locale=="es") {
            $this->locale = "";
        } */
        $this->slug = request()->segment(count(request()->segments()));


        /* $exte = categoria::where('title',"exterior")->first();
        $this->exterior = $exte->elementos()->orderBy('orden')->get();

        $inter = categoria::where('title',"interior")->first();
        $this->interior = $inter->elementos()->orderBy('orden')->get();

        $capi = categoria::where('title',"capillas")->first();
        $this->capillas = $capi->elementos()->orderBy('orden')->get();

        $muse = categoria::where('title',"museo")->first();
        $this->museo = $muse->elementos()->orderBy('orden')->get(); */
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
        /* $this->capitulos = capitulo::orderBy('orden')->get(); */
        /* $this->getData(); */
        /* if (session()->has('capitulo')) {
            $this->clickMenu(session()->get('capitulo'));
        } else {
            $this->clickMenu(1);
        } */
        if(!session()->exists('capituloActive')) {
            session()->put('capituloActive',1);
            $capituloActive = 1;
        } else {
            $capituloActive = session()->get('capituloActive');
        }
        $this->clickMenu($capituloActive);

        return view('navigation-menu');
    }

    public function clickMenu( $capituloID) {
        $this->capituloSelected = capitulo::findOrFail($capituloID);
        $this->capituloSelectedLiteral = $this->capituloSelected->literal;
        session()->put('capituloActive',$capituloID);
    }
    public function getData() {
        if (!capitulo::where('id', 1)->exists()) {
            $this->makeCapitulosCategorias();
        }
        $user = auth::user();
        if($user && $user->isAdmin) {
                $this->idiomas = idioma::orderBy('orden')->get();
                $this->capitulos = capitulo::orderBy('orden')->get();
                $this->capituloSelected = capitulo::findOrFail(1);
                $this->capituloSelectedLiteral = $this->capituloSelected->literal;

        } else {
                $this->idiomas = idioma::where('isPublic','1')->orderBy('orden')->get();
                $this->capitulos = capitulo::where('ispublic','1')->orderBy('orden')->get();
                $this->capituloSelected = capitulo::findOrFail(1);
                $this->capituloSelectedLiteral = $this->capituloSelected->literal;
        };


    }

    public function makeCapitulosCategorias() {
        $capitulo = capitulo::create([
            'titulo' => 'Catedral',
            'literal' => 'Catedral de Santiago de Compostela',
            'orden' => '1',
            'ispublic' => true
        ]);
        categoria::where('capitulo_id', '=', null)
        ->update(['capitulo_id' => $capitulo->id]);

    }
}
