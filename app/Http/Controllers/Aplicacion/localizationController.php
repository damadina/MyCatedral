<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use App\Models\element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\translation;

class localizationController extends Controller
{
    public function __invoke(?string $slug = null) {


        $antLoc = session()->get('lang');

        $lang = request()->lang;
        session()->put('lang',$lang);
        App::setlocale(session('lang'));

        if(strlen($slug)>4) {
            $newSlug = $this->newSlug($slug,$antLoc);
        }

        $isHome = session()->get('isHome');

        if($isHome) {
            switch($lang) {
                case "es":
                    return redirect()->route('elementoXX');
                    break;
                default:
                    return redirect()->route('elementoXX',['locale' => $lang]);
                    break;
            }
        } else {
            switch($lang) {
                case "es":
                    return redirect()->route('elementoXX',['locale' => null, 'slug' => $newSlug]);
                    break;
                default:
                    return redirect()->route('elementoXX',['locale' => $lang,'slug' => $newSlug]);
                    break;

            }

        }

    }

    public function newSlug($slug, $antLoc) {
        $locale = session()->get('lang');

        if($locale == "es") {
            // extranjero a español
            $translation = translation::where('table','elements')
            ->where('column','slug')
            ->where('locale',$antLoc)
            ->where('translation',$slug)
            ->first();


            $elemento = element::find($translation->row_id);

            return $elemento;
        } else {
            switch ($antLoc) {
                case 'es': // español a extranjero
                    $elemento = element::where('slug',$slug)->first();
                    $translation = translation::where('table','elements')
                    ->where('column','slug')
                    ->where('row_id',$elemento->id)
                    ->where('locale',$locale)
                    ->first();
                    return $translation->translation;
                    break;
                default: // estranjero a extrantranjero
                    $translation = translation::where('table','elements')
                    ->where('column','slug')
                    ->where('locale',$antLoc)
                    ->where('translation',$slug)
                    ->first();
                    $newTranslation = translation::where('table','elements')
                    ->where('column','slug')
                    ->where('row_id',$translation->row_id)
                    ->where('locale',$locale)
                    ->first();
                    return $newTranslation->translation;
                    break;
            }


        }




    }
}
