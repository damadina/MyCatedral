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


Route::get('/', function () {
    return redirect('/historia');
});

Route::group([
    'middleware' => 'localization'
], function() {
    $user = auth::user();
    if($user && $user->isAdmin) {
        $idiomas = idioma::pluck('locale')->toArray();;
    } else {
        $idiomas = idioma::where('isPublic','1')->pluck('locale')->toArray();;
    };
    /* Route::get("/",[IsHomeController::class,'index'])->name("HomePost.es"); */
    foreach ($idiomas as $locale) {
        /* Route::get("/$locale",[IsHomeController::class,'index'])->name("HomePost.{$locale}"); */
        if ($locale == "es") {
            Route::get('/{slug}', [newPostController::class,'index'])->name("about.es");
        } else {

            Route::get("{$locale}/".'{slug}', [newPostController::class,'index'])->name("about.{$locale}");
        }
    }


});







Route::get('/localization/{slug?}', localizationController::class)->name('localization');
Route::get('/{locale?}/{slug?}',[postController::class,'isXX'])->name('elementoXX')->middleware('localization');
/* Route::get('/{locale}/{slug}',[postController::class,'show'])->name('elementoTrans'); */
Route::get('/oioio/test/deepl',[pruebaController::class,'index'])->name('prueba');


Route::get('/uso/legal/{documento}',[documentController::class,'index'])->name('documento');
Route::get('/contenidos/autores/{contenido}',[autorController::class,'index'])->name('autores');
Route::get('/comercial/mail/contactanos',Contactanos::class)->name('contactanos.index')->middleware('auth','verified');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);





/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
