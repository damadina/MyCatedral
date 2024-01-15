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
use Illuminate\Support\Facades\Auth;


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
