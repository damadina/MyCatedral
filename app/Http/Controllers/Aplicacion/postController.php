<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\element;
use App\Models\categoria;
use App\Models\foto;

class postController extends Controller
{
    public function index($slug = null) {
        $exte = categoria::where('title',"exterior")->first();
        $exterior = $exte->elementos()->orderBy('orden')->get();

        $inter = categoria::where('title',"interior")->first();
        $interior = $inter->elementos()->orderBy('orden')->get();

        $capi = categoria::where('title',"capillas")->first();
        $capillas = $capi->elementos()->orderBy('orden')->get();

        $muse = categoria::where('title',"capillas")->first();
        $museo = $muse->elementos()->orderBy('orden')->get();
        if ($slug) {
            $elemento = element::where('slug',$slug)->first();
        }
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





        $a = $this->text2paragraph($elemento->resumen);
        $a= str_replace( $elemento->title, '<strong>'.$elemento->title.'</strong>', $a);
        $elemento->resumen = $a;

        $textos = $elemento->textos;
        foreach($textos as $each) {

            $each->html = $this->text2paragraph($each->html);

        }

        return view('aplicacion.post',compact('exterior','interior','capillas','museo','elemento','fotoPortada','textos'));
    }

    function text2paragraph( $text ){
        $array =  explode("\n", $text);
        $tagged = "";
        foreach($array as $element){
            if( strlen($element) > 1){
                if (str_contains($element, '<IMAGE[')) {
                    $element = str_replace("<IMAGE", "", $element);
                    $element = str_replace(">", "", $element);
                    $element = trim(preg_replace('/\s\s+/', ' ', $element));
                    $regExpr = "/\[(.*?)\]/";
                    $result = preg_replace(
                        $regExpr,"$1",$element
                    );

                    $foto = foto::where('url',$result)->first();
                    $element = $this->tagFigure($foto->url,$foto->piedefoto);
                }
                $tagged .= '<p class="p-2">'.$element.'</p>';
            }
        }
        return $tagged;
    }

    public function tagFigure($result,$piedeFoto) {
        list($width, $height) = getimagesize('storage/originales/'.$result);

        if ($width > $height) {
            $tagW = 'w-full';
        } else {
            // Portrait or Square
            $tagW = 'w-1/2';
        }


        $tag = '<figure class="mx-auto '.$tagW.'">
        <img class="mx-auto pb-2 " src="storage/originales/'.$result.'"'. 'loading="lazy"  >
        <figcaption class="text-center pb-2 italic text-gray-600 bg-gray-200">
        <span>'.$piedeFoto.'</span>
        </figcaption>
        </figure>';
        return $tag;
    }


}
