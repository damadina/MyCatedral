<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\translation;
use App\Models\element;
use App\Models\foto;
use App\Models\document;
use App\Models\idioma;

use App\Traits\TrataTexto;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
use App\Traits\generaHref;
use App\Models\hfrlang;

use Illuminate\Support\Facades\Route;
class newPostController extends Controller
{
    use TrataTexto;
    use HasRoles;
    use generaHref;

    public function index($slug) {



        $locale = config('app')['locale'];

        if($locale!="es") {
            $elemento = $this->getIdiomaElemento($slug,$locale);

        } else {
            $elemento = $this->getEsElemento($slug);
        }
        if(!$elemento) {
            abort(404);
        }
        return $this->showElemento($elemento);

    }

    public function showElemento(element $elemento) {

        session()->put('lastId',$elemento->id);
        /*  $isHome = Session::get('isHome'); */
         $locale = session()->get('lang');

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


         if(!$locale) {$locale="es";}

         $aa =DB::table('elements')->where('id', $elemento->id)->first();
         $slugES = $aa->slug;


         $metas = hfrlang::where('keyID',$elemento->id)->get();



         return view('aplicacion.post',compact('metas','slugES','locale','elemento','fotoPortada','textos','legal','idiomas'));

     }








    public function getEsElemento($slug) {
        $elemento = element::where('slug',$slug)->first();
        return $elemento;
    }


    public function getIdiomaElemento($slug,$locale) {
        $translation = translation::where('table','elements')
                        ->where('column','slug')
                        ->where('locale',$locale)
                        ->where('translation',$slug)
                        ->first();


        if($translation) {
            $elemento = element::find($translation->row_id);
            return $elemento;
        } else {
            return null;
        }



    }
}
