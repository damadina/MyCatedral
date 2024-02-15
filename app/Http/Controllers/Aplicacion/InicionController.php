<?php

namespace App\Http\Controllers\Aplicacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicionController extends Controller
{
    public function index (){
        $l = __("Catedral de Santiago de Compostela");
        return $l." en inicio controller";
       /*  return redirect()->route('showPost',['locale'=> 'es', 'slug' => 'historia']); */
    }
    public function index2 (){
        /* $l = __("My post");
        return $l." en inicio controller"; */
       /*  return redirect()->route('showPost',['locale'=> 'es', 'slug' => 'historia']); */
       return redirect(route("showPost",["slug" => 'historia']));
    }

}
