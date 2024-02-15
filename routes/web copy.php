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

/* Route::get('/',[InicionController::class,'index'])->name('limpioSinSlug')->middleware(LocaleMiddleware::class);
Route::get('/{slug}',[newPostController::class,'index'])->name('limpioConSlug')->middleware(LocaleMiddleware::class); */
Route::middleware(LocaleCookieMiddleware::class)->group(function() {
    Route::get('/locale/{locale}', function( $locale) {
        return redirect()->back()->withCookie('locale', $locale);
    });
});


Route::prefix('{locale}')->middleware(LocaleMiddleware::class)->group(function() {
    Route::get('/',[InicionController::class,'index'])->name('ll');
    Route::get('/{slug}', [newPostController::class,'index']);

});






Route::get('/', function () {

if(!session()->exists('lang')) {
    $lang = substr(request()->server('HTTP_ACCEPT_LANGUAGE'),0,2);
    session()->put('lang',$lang);
} else {
    $lang = session()->get('lang');
}

if($lang=="es") {
    return redirect('/historia');
} else {

    $translation = DB::table('translations')
    ->where('table','elements')
    ->where('column','slug')
    ->where('row_id',45)
    ->where('locale',$lang)->first();


    $newSlug = $translation->translation;


    return redirect("/{$newSlug}");
}


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

foreach ($idiomas as $locale) {

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
