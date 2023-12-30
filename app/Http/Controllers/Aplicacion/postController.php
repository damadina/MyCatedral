<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\element;
use App\Models\categoria;
use App\Models\foto;
use App\Models\document;
use App\Models\idioma;
use App\Models\translation;
use App\Traits\TrataTexto;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
use App\Traits\generaHref;
use App\Models\hfrlang;


class postController extends Controller
{
    use TrataTexto;
    use HasRoles;
    use generaHref;

    /* public function isES(?element $elemento = null) {

        //Si elemento == null es Home
        session()->put('isHome',false);
        if(!$elemento) {
            $elemento = element::where('categoria_id',1)->first();
            session()->put('isHome',true);
        }
        return $this->showElemento($elemento);
    }
 */

    public function isXX(?string $locale = null, ?string $slug = null) {



        // cuando el primer parametro de la url es null intercambia
        if(strlen($locale)>5) {
            $slug = $locale;
            $locale = "es";

        }
        session()->put('idiomas',true);
        session()->put('isHome',false);
        if(!$slug) {
            $elemento = element::where('categoria_id',1)->first();
            session()->put('isHome',true);
        } else {
            switch($locale) {
                case "es":
                    $elemento = element::where('slug',$slug)->first();
                    break;
                default:
                    $translation = translation::where('table','elements')
                    ->where('column','slug')
                    ->where('locale',$locale)
                    ->where('translation',$slug)
                    ->first();
                    $elemento = element::find($translation->row_id);
            }
        }

        return $this->showElemento($elemento);
    }



    public function showElemento(element $elemento) {


        $isHome = Session::get('isHome');
        $locale = Session::get('lang');
        $exte = categoria::where('title',"exterior")->first();
        $exterior = $exte->elementos()->orderBy('orden')->get();

        $inter = categoria::where('title',"interior")->first();
        $interior = $inter->elementos()->orderBy('orden')->get();

        $capi = categoria::where('title',"capillas")->first();
        $capillas = $capi->elementos()->orderBy('orden')->get();

        $muse = categoria::where('title',"museo")->first();
        $museo = $muse->elementos()->orderBy('orden')->get();

        if($elemento->urlPortada) {
            $fotoPortada = foto::where('url',$elemento->urlPortada)->first();
        } else {
            $fotoPortada =  new foto (
                [
                'url' => 'noPhoto.png',
                'piedefoto' => 'Sin pie de foto',
                'alt' => 'Sin Alt'
                ]
                );
            $elemento->urlPortada = 'noPhoto.png';
        }

        $a = $this->convierte($elemento->resumen);



       /*  $a = $this->text2paragraph($elemento->resumen); */
        $a= str_replace( $elemento->title, '<strong>'.$elemento->title.'</strong>', $a);
        $elemento->resumen = $a;


        $textos = $elemento->textos;
        foreach($textos as $each) {
            $each->html = $this->convierte($each->html);

        }


        /* $textos = $elemento->textos; */
        $legal = document::all();

        $user = auth::user();

        if($user && $user->isAdmin) {
            $idiomas = idioma::orderBy('orden')->get();
        } else {
            $idiomas = idioma::where('isPublic','1')->orderBy('orden')->get();
        };

        $locale = session()->get('lang');
        if(!$locale) {$locale="es";}

        $aa =DB::table('elements')->where('id', $elemento->id)->first();
        $slugES = $aa->slug;


        $metas = hfrlang::where('keyID',$elemento->id)->get();



        return view('aplicacion.post',compact('metas','slugES','locale','isHome','exterior','interior','capillas','museo','elemento','fotoPortada','textos','legal','idiomas'));

    }




    public function show(?string $slug = null) {
        $locale = session::get('lang');

        session()->put('isHome',false);

        $isHome = false;
        if($slug == null) {
            $elemento = element::where('categoria_id',1)->first();
            $isHome = true;
            session()->put('isHome',true);

        } else {
            if($locale == "es") {
                $elemento = element::where('slug',$slug)->first();
            } else {
                $translation = translation::where('table','elements')
                        ->where('column','slug')
                        ->where('locale',$locale)
                        ->where('translation',$slug)
                        ->first();

                $elemento = element::find($translation->row_id);
            }

        }
        /* session()->put('ultimoElemento',$elemento->id); */
        $exte = categoria::where('title',"exterior")->first();
        $exterior = $exte->elementos()->orderBy('orden')->get();

        $inter = categoria::where('title',"interior")->first();
        $interior = $inter->elementos()->orderBy('orden')->get();

        $capi = categoria::where('title',"capillas")->first();
        $capillas = $capi->elementos()->orderBy('orden')->get();

        $muse = categoria::where('title',"museo")->first();
        $museo = $muse->elementos()->orderBy('orden')->get();

        /* $slug = "fachada-del-obradoiro";
        if ($slug) {
            $elemento = element::where('slug',$slug)->first();
        } */


        if($elemento->urlPortada) {
            $fotoPortada = foto::where('url',$elemento->urlPortada)->first();
        } else {
            $fotoPortada =  new foto (
                [
                'url' => 'noPhoto.png',
                'piedefoto' => 'Sin pie de foto',
                'alt' => 'Sin Alt'
                ]
                );
            $elemento->urlPortada = 'noPhoto.png';
        }

        $a = $this->convierte($elemento->resumen);



       /*  $a = $this->text2paragraph($elemento->resumen); */
        $a= str_replace( $elemento->title, '<strong>'.$elemento->title.'</strong>', $a);
        $elemento->resumen = $a;


        $textos = $elemento->textos;
        foreach($textos as $each) {
            $each->html = $this->convierte($each->html);

        }


        /* $textos = $elemento->textos; */
        $legal = document::all();
        $idiomas = idioma::where('isPublic','1')->orderBy('orden')->get();


        return view('aplicacion.post',compact('locale','isHome','exterior','interior','capillas','museo','elemento','fotoPortada','textos','legal','idiomas'));
    }

    public function showEs(?string $locale = null, ?string $slug = null) {
        if(!$locale) {$locale = "es";}

        session()->put('isHome',false);
        $isHome = false;

        if($slug == null) {
            $elemento = element::where('categoria_id',1)->first();
            $isHome = true;
            session()->put('isHome',true);

        } else {
            if($locale == "es") {
                $elemento = element::where('slug',$slug)->first();
            } else {
                $translation = translation::where('table','elements')
                        ->where('column','slug')
                        ->where('locale',$locale)
                        ->where('translation',$slug)
                        ->first();

                $elemento = element::find($translation->row_id);
            }

        }


        /* session()->put('ultimoElemento',$elemento->id); */

        $exte = categoria::where('title',"exterior")->first();
        $exterior = $exte->elementos()->orderBy('orden')->get();

        $inter = categoria::where('title',"interior")->first();
        $interior = $inter->elementos()->orderBy('orden')->get();

        $capi = categoria::where('title',"capillas")->first();
        $capillas = $capi->elementos()->orderBy('orden')->get();

        $muse = categoria::where('title',"museo")->first();
        $museo = $muse->elementos()->orderBy('orden')->get();

        /* $slug = "fachada-del-obradoiro";
        if ($slug) {
            $elemento = element::where('slug',$slug)->first();
        } */


        if($elemento->urlPortada) {
            $fotoPortada = foto::where('url',$elemento->urlPortada)->first();
        } else {
            $fotoPortada =  new foto (
                [
                'url' => 'noPhoto.png',
                'piedefoto' => 'Sin pie de foto',
                'alt' => 'Sin Alt'
                ]
                );
            $elemento->urlPortada = 'noPhoto.png';
        }

        $a = $this->convierte($elemento->resumen);



       /*  $a = $this->text2paragraph($elemento->resumen); */
        $a= str_replace( $elemento->title, '<strong>'.$elemento->title.'</strong>', $a);
        $elemento->resumen = $a;


        $textos = $elemento->textos;
        foreach($textos as $each) {
            $each->html = $this->convierte($each->html);

        }


        /* $textos = $elemento->textos; */
        $legal = document::all();
        $idiomas = idioma::where('isPublic','1')->orderBy('orden')->get();

        if($locale=="es") {$locale="";}
        return view('aplicacion.post',compact('locale','isHome','exterior','interior','capillas','museo','elemento','fotoPortada','textos','legal','idiomas'));
    }

}
