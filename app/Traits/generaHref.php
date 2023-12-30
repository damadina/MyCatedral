<?php
namespace App\Traits;
use App\Models\foto;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Models\element;
use App\Models\idioma;
use Illuminate\Support\Facades\DB;
use App\Models\hfrlang;

trait generaHref {
    public function generaHrefLang() {
        $elementos = element::pluck('slug','id')->toArray();
        $idiomas= idioma::where('isPublic','1')->pluck('locale')->toArray();
        hfrlang::truncate();


        foreach($elementos as $key => $elemento) {
            $lineas = [];
            foreach($idiomas as $idioma) {
                $url = $this->generateURL($key,$idioma,$elemento);
                array_push($lineas,'<link rel="alternate" hreflang="'.$idioma.'" href="'.$url.'" />');
                if($idioma=="es") {
                    array_push($lineas,'<link rel="alternate" hreflang="x-default" href="'.$url.'" />');
                }
            }

            foreach($lineas as $linea) {
                hfrlang::create([
                    'keyId' => $key,
                    'meta' => $linea
                ]);
            }
        }

       /*  <link rel="alternate" href="https://www.pilgrim.es/planificar/la-catedral-de-santiago/" hreflang="x-default" />
 */

        /* $isHome = Session::get('isHome');

        $metas = <<<HEREA
        <link rel="alternate" hreflang="$es" href="$urlCurrent" />
        Linea 2
        Linea 3
        HEREA;
        dd($metas); */
    }

    public function generateURL($id,$locale,$elemento) {
       if($locale == "es") {
            $url = asset($elemento);
            return $url;
       } else {
            $newSlug = $this->getTranslation($id,$locale);
            $url = (asset($locale)).'/'.$newSlug;
            return $url;
       }

    }

    public function getTranslation($id,$locale) {
        $translation = DB::table('translations')
        ->where('table','elements')
        ->where('column','slug')
        ->where('row_id',$id)
        ->where('locale',$locale)->first();


        return $translation->translation;
    }

}
