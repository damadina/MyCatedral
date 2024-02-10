<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class pruebaController extends Controller
{
    public function index() {
        dd("hola");
        /* $authKey = env('DEEPL_KEY');
        $options = ['timeout' => 20.0 ];

        $translator = new \DeepL\Translator($authKey);

        $traduccion = $translator->translateText('Adios Mundo', 'es', 'it' , ['tag_handling' => 'html'], ); */
        $user = Auth::user();
        $this->actingAs($user)
        ->get(route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->email)]));

        /* return view('aplicacion.prueba'); */
    }


}




