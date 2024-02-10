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
        $currentLocale = config('app')['locale'];
        $newLocale = request()->lang;







        $antLoc = session()->get('lang');

        $lang = request()->lang;
        dd($lang);
        session()->put('lang',$lang);
        App::setlocale(session('lang'));
        $newSlug = $this->newSlug($slug,$antLoc);



        /* if(strlen($slug)>4) {
            $newSlug = $this->newSlug($slug,$antLoc);
        } */


        $isHome = session()->get('isHome');
        $isHome = false;


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
            if(!$translation) {
               return $slug;
            }
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
                    if(!$translation) {
                        return $slug;
                    }
                    return $translation->translation;
                    break;
                default: // estranjero a extrantranjero
                    $translation = translation::where('table','elements')
                    ->where('column','slug')
                    ->where('locale',$antLoc)
                    ->where('translation',$slug)
                    ->first();
                    if(!$translation) {
                        return $slug;
                    }
                    $newTranslation = translation::where('table','elements')
                    ->where('column','slug')
                    ->where('row_id',$translation->row_id)
                    ->where('locale',$locale)
                    ->first();
                    if(!$newTranslation) {
                        return $slug;
                    }
                    return $newTranslation->translation;
                    break;
            }


        }




    }
}
