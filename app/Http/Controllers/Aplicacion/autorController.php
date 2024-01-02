<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\autor;
use App\Models\document;
use App\Models\idioma;
class autorController extends Controller
{
    public function index($contenido) {
        $legal = document::all();
        $autores = autor::where('contenido',$contenido)->get();
        $idiomas = idioma::orderBy('orden')->get();
        session()->put('noIdiomas','true');
        return view('aplicacion.autor',compact('autores','legal','idiomas'));
    }
}
