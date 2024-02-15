<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use App\Models\idioma;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Aplicacion\InicionController;

class LocaleMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $segments = $request->segments();
        $totalSegments = count($segments);
        $idiomasValidos = $this->getLocales();
        App::setLocale($request->locale);
        $request->route()->forgetParameter('locale');
        switch($totalSegments) {
            case 0:
                return $next($request);
                break;
            case 1:
                $first = array_shift($segments);

                switch(strlen($first)) {
                    case 2:
                        if(in_array($first, $idiomasValidos))
                        {
                            if($first=="es") {
                                return redirect()->to(implode('/', $segments));
                            } else {
                                return $next($request);
                            }

                        } else {
                            abort(404);
                        }
                    default:

                        return redirect()->route('oo',['slug' => 'iiiiii']);

                }

                /* if(strlen($first)==2 AND in_array($first, $idiomasValidos)) {
                    switch($first) {
                        case "es":
                            return redirect()->to(implode('/', $segments));
                            break;
                        default:
                            return redirect()->route('inicio');
                            return $next($request);
                    }
                } else {
                    return redirect('/historia');
                }
                break; */
        }




        /* $first = array_shift($segments);





        if(strlen($first)==2 AND !in_array($first, $idiomasValidos)) {
            abort(404);
        }




        if($first=="es") {
             return redirect()->to(implode('/', $segments));
        } */
        /* return redirect()->to(implode('/', $segments)); */



        return $next($request);
    }
    function getLocales() {
        $user = auth::user();
        if($user && $user->isAdmin) {
            $idiomas = idioma::pluck('locale')->toArray();;
        } else {
            $idiomas = idioma::where('isPublic','1')->pluck('locale')->toArray();;
        };
        return $idiomas;
    }
}
