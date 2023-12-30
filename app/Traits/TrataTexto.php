<?php
namespace App\Traits;
use App\Models\foto;
trait TrataTexto {

    function convierte( $text ){

        $order   = array("<p>",);
        $replace = '<p class="p-2">';
        $text = str_replace($order, $replace, $text);

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


                /* $str = str_replace("<p>", "", "", $element);
                $str = str_replace("</p>", "", "", $str);

                $tagged .= '<p class="p-2">'.$str.'</p>'; */

                $tagged .= $element;
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

        $urlImage=asset('storage/originales/'.$result);


        $tag = '<figure class="mx-auto '.$tagW.'">
        <img class="mx-auto pb-2 " src="'.$urlImage.'"'. ' loading="lazy"  >
        <figcaption class="text-center pb-2 italic text-gray-600 bg-gray-200">
        <span>'.$piedeFoto.'</span>
        </figcaption>
        </figure>';



        return $tag;
    }

}
/* $tag = '<figure class="mx-auto '.$tagW.'">
        <img class="mx-auto pb-2 " src="storage/originales/'.$result.'"'. ' loading="lazy"  >
        <figcaption class="text-center pb-2 italic text-gray-600 bg-gray-200">
        <span>'.$piedeFoto.'</span>
        </figcaption>
        </figure>'; */
