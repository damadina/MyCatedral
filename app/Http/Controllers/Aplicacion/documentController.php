<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\document;
use App\Models\idioma;

class documentController extends Controller
{
    public function index(document $documento = null) {
        $idiomas = idioma::orderBy('orden')->get();
        $legal = document::all();

        return view('aplicacion.document',compact('documento','legal','idiomas'));
    }
}
