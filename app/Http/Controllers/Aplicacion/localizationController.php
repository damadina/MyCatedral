<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use App\Models\element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\translation;
use PhpParser\Node\Stmt\Switch_;
use Termwind\Components\Element as ComponentsElement;

class localizationController extends Controller
{

    public function __invoke(?string $slug = null) {

        $currentLocale = session()->get('lang');
        session()->put('lang',request()->lang);
        $newLocale = request()->lang;
        app()->setLocale($newLocale);


        if($currentLocale == "es" and $newLocale != "es") {
            // De español a extranjero
            $newSlug = $this->getNewSlugEN($newLocale);
            return redirect()->route("about.$newLocale",["slug" => $newSlug]);
        }
        if($currentLocale !="es" and $newLocale == "es") {
            // De extranjero a español
            $newSlug = $this->getNewSlugES();
            return redirect()->route("about.$newLocale",["slug" => $newSlug]);
        }
        if($currentLocale != "es" and $newLocale != "es") {
            // De extranjero a extranjero
            $newSlug = $this->getNewSlugEN($newLocale);
            return redirect()->route("about.$newLocale",["slug" => $newSlug]);
        }
        dd("error");



    }



    public function getNewSlugEN($newLocale) {
        $translation = translation::where('table','elements')
        ->where('column','slug')
        ->where('row_id',session()->get('lastId'))
        ->where('locale',$newLocale)
        ->first();

        return $translation->translation;
    }
    public function getNewSlugES() {
        $elemento = element::find(session()->get('lastId'));
        return $elemento->slug;
    }
}
