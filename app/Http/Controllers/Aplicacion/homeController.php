<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;

class homeController extends Controller
{
    public function index() {
        $exte = categoria::where('title',"exterior")->first();
        $exterior = $exte->elementos()->orderBy('orden')->get();

        $inter = categoria::where('title',"interior")->first();
        $interior = $inter->elementos()->orderBy('orden')->get();

        $capi = categoria::where('title',"capillas")->first();
        $capillas = $capi->elementos()->orderBy('orden')->get();

        $muse = categoria::where('title',"capillas")->first();
        $museo = $muse->elementos()->orderBy('orden')->get();


        return view('aplicacion.home',compact('exterior','interior','capillas','museo'));
    }
}
