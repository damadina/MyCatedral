<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Models\translation;
use App\Models\element;
use App\Models\idioma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


class localization
{


    public function handle(Request $request, Closure $next): Response
    {


        session()->put('currentSlug',request()->segment(1));

        if(session()->exists('authOn')) {
            session()->forget('authOn');
            $url = session()->get('urlCurrent');
            return redirect($url);
        }

        if(!session()->exists('lang')) {
            $lang = substr(request()->server('HTTP_ACCEPT_LANGUAGE'),0,2);
            session()->put('lang',$lang);
        } else {
            $lang = request()->get('lang');
        }
        if(session()->has('lang')) {
            app()->setLocale(session('lang'));
        } else {
            app()->setLocale(config('app.locale'));
        }
        /* App::setlocale(session('lang')); */


        $idiomasValidos= $this->getLocales();
        $segmentosUrl = count(request()->segments());

        switch($segmentosUrl) {
            case 0:
                session()->put('lang',"es");
                break;
            case 1:

                $valor = request()->segment(1);

                if(strlen($valor)>5) {
                    break;
                }
                if($valor == "es") {
                    session()->put('lang',$valor);
                    if(session()->has('lang')) {
                        app()->setLocale(session('lang'));
                    } else {
                        app()->setLocale(config('app.locale'));
                    }

                    /* App::setlocale(session('lang')); */
                    return redirect()->route('elementoXX');
                    break;
                }
                if (in_array($valor, $idiomasValidos)) {
                    session()->put('lang',$valor);
                    if(session()->has('lang')) {
                        app()->setLocale(session('lang'));
                    } else {
                        app()->setLocale(config('app.locale'));
                    }
                    /* App::setlocale($valor); */
                } else {
                    return abort(404);
                    return $next($request);
                }
                break;
            case 2:
                $valor = request()->segment(1);
                if($valor =="es") {
                    return redirect()->route('elementoXX',['slug' => request()->segment(2)]);
                    break;
                }
                if (in_array($valor, $idiomasValidos)) {
                    session()->put('lang',$valor);
                    if(session()->has('lang')) {
                        app()->setLocale(session('lang'));
                    } else {
                        app()->setLocale(config('app.locale'));
                    }
                    /* App::setlocale($valor); */
                } else {
                    return abort(404);
                }
                break;
            default:
                dd("default");
        }

        if(session()->has('lang')) {
            app()->setLocale(session('lang'));
        } else {
            app()->setLocale(config('app.locale'));
        }
        /* App::setlocale(session('lang')); */

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

