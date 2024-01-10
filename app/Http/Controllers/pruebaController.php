<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Google\Cloud\Translate\V2\TranslateClient;
use Google\Cloud\Translate\V3\TranslationServiceClient;

class pruebaController extends Controller
{
    public function index() {

        $authKey = env('DEEPL_KEY');
        $options = ['timeout' => 20.0 ];
        /* dd($authKey); */
        /* $authKey = "89786711-b707-a136-0673-8cc3b8839123"; */
        $translator = new \DeepL\Translator($authKey);

        $traduccion = $translator->translateText('Adios Mundo', 'es', 'it' , ['tag_handling' => 'html'], );
        dd($traduccion);


        return view('aplicacion.prueba');
    }


}




