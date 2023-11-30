<?php
namespace App\Traits;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Salmanbe\Deepl\Deepl;
use Illuminate\Support\Str;
use App\Models\translation;
use App\Models\foto;
use App\Traits\TrataTexto;

trait Traslations {
    use TrataTexto;
    public function translation($column, $default = '') {

        $locale = App::getLocale();

        if($locale == "es") {
            return $default;
        }

        $translation = DB::table('translations')
            ->where('table',$this->table)
            ->where('column',$column)
            ->where('row_id',$this->id)
            ->where('locale',$locale)->first();

        if($translation) {
            return $translation->translation;
        }

        $traduccion = $default;
        switch ($this->table) {
            case'elements':
                switch ($column) {
                    case 'title':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'resumen':
                        /* $a = $this->text2paragraph($default); */
                        $a = $this->convierte($default);
                        $traduccion = $this->translate($a,$locale);
                        $traduccion= str_ireplace( $this->title, '<strong>'.$this->title.'</strong>', $traduccion);
                        break;
                    case 'slug':
                        break;
                    case 'seoTitle':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'seoMeta':
                        $traduccion = $this->translate($default,$locale);
                        break;
                }
            break;
            case 'textos':
                switch ($column) {
                    case 'titulo':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'html':
                        /* $a = $this->text2paragraph($default); */
                        $a = $this->convierte($default);
                        $traduccion = $this->translate($a,$locale);
                        $traduccion= str_ireplace( $this->title, '<strong>'.$this->title.'</strong>', $traduccion);
                        break;
                }
            break;
            case 'fotos':
                switch ($column) {
                    case 'piedefoto':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'title':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'alt':
                        $traduccion = $this->translate($default,$locale);
                        break;
                }
            break;
            case 'idiomas':
                switch ($column) {
                    case 'title':
                        $traduccion = $this->translate($default,$locale);
                        break;
                }
            break;
            case 'documents':
                switch ($column) {
                    case 'titulo':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'html':
                        $traduccion = $this->translate($default,$locale);
                        break;
                }
            break;
            case 'autors':
                switch ($column) {
                    case 'departamento':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'bio':
                        $traduccion = $this->translate($default,$locale);
                        break;
                }
            break;

            case 'informacions':
                switch ($column) {
                    case 'titulo':
                        $traduccion = $this->translate($default,$locale);
                        break;
                    case 'informacion':
                        $traduccion = $this->translate($default,$locale);
                        break;
                }
            break;
        }



        translation::create([
            'table' => $this->table,
            'column' => $column,
            'row_id' => $this->id,
            'locale' => $locale,
            'translation' => $traduccion,
            'traductor' => 'API',
        ]);

        return $traduccion;

    }

    function translate($texto, $locale) {
        $deepl = new Deepl();
        $traduccion = $deepl->get($texto, $locale, 'es');
        return $traduccion;
    }


    /* function text2paragraph( $text ){
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
 */
}


