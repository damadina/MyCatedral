<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aplicacion\postController;
use App\Http\Controllers\Aplicacion\homeController;
use App\Http\Controllers\Aplicacion\documentController;
use App\Http\Controllers\Aplicacion\autorController;
use App\Http\Controllers\pruebaController;
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
Route::get('/',[postController::class,'index'])->name('home');
Route::get('/localization', function() {
    $lang = request()->lang;
    session()->put('lang',$lang);
    return back();
})->name('localization');

/* Route::get('/', function () {
    session()->flash('flash.banner', 'Yay for free components!');
    session()->flash('flash.bannerStyle', 'success');
    return view('welcome');
})->name('home'); */
Route::get('/{elemento}',[postController::class,'index'])->name('elemento');
Route::get('/legal/{documento}',[documentController::class,'index'])->name('documento');
Route::get('/autores/{contenido}',[autorController::class,'index'])->name('autores');




Route::get('/test/deepl',[pruebaController::class,'index'])->name('prueba');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
