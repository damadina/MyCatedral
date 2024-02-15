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
        dd("este midleware");

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
        return $next($request);
    }

}

