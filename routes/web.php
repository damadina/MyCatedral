<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aplicacion\postController;
/* use App\Http\Controllers\Aplicacion\homeController; */
use App\Http\Controllers\Aplicacion\documentController;
use App\Http\Controllers\Aplicacion\autorController;
use App\Http\Controllers\pruebaController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Aplicacion\localizationController;
use App\Mail\ContactanosMailable;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Aplicacion\contactanosController;
use App\Livewire\Aplicacion\Contactanos;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\idioma;
use App\Http\Controllers\Aplicacion\newPostController;
use App\Http\Controllers\Aplicacion\IsHomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\LocaleCookieMiddleware;
use App\Http\Controllers\Aplicacion\InicionController;


function getSlug() {

    if(!session()->exists('lang')) {
        $lang = substr(request()->server('HTTP_ACCEPT_LANGUAGE'),0,2);
        session()->put('lang',$lang);

    } else {
        $lang = session()->get('lang');
    }
    App::setLocale($lang);

    switch ($lang) {
        case "es":
            return 'historia';
            break;
        default:
            $translation = DB::table('translations')
            ->where('table','elements')
            ->where('column','slug')
            ->where('row_id',45)
            ->where('locale',$lang)->first();
            if($translation) {
                return $translation->translation;
            } else {
                abort(404);
            }
            break;

    }
}





Route::get('/', function () {
    return redirect()->route('swhoPost',['slug' => getSlug()]);
});

Route::get('/{slug}', [newPostController::class,'index'])->name('swhoPost');
Route::get('/localization/{slug?}', localizationController::class)->name('localization');
Route::get('/uso/legal/{documento}',[documentController::class,'index'])->name('documento');
Route::get('/contenidos/autores/{contenido}',[autorController::class,'index'])->name('autores');
Route::get('/comercial/mail/contactanos',Contactanos::class)->name('contactanos.index')->middleware('auth','verified');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);






