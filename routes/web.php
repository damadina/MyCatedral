<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aplicacion\postController;
use App\Http\Controllers\Aplicacion\homeController;
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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/{locale?}',[postController::class,'index'])->name('home'); */

Route::get('/localization/{slug?}', localizationController::class)->name('localization');

/* Route::get('/{elemento?}',[postController::class,'isES'])->name('elementoES'); */
Route::get('/{locale?}/{slug?}',[postController::class,'isXX'])->name('elementoXX');



Route::get('/{locale}/{slug}',[postController::class,'show'])->name('elementoTrans');


Route::get('/oioio/test/deepl',[pruebaController::class,'index'])->name('prueba');





Route::get('/uso/legal/{documento}',[documentController::class,'index'])->name('documento');
Route::get('/contenidos/autores/{contenido}',[autorController::class,'index'])->name('autores');

/* Route::get('/comercial/mail/contactanos', function() {
    Mail::to('carlos.marti@me.com')->send(new ContactanosMailable);
    return "mensaje enviado";
})->name('contactanos'); */

/* Route::get('/comercial/mail/contactanos',[contactanosController::class,'index'])->name('contactanos.index')->middleware('auth','verified');
Route::post('/comercial/mail/contactanos/{user}',[contactanosController::class,'store'])->name('contactanos.store'); */
Route::get('/comercial/mail/contactanos',Contactanos::class)->name('contactanos.index')->middleware('auth','verified');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/* Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
 */
