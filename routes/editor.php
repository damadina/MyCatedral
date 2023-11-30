<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Editor\ElementosHome;

use App\Livewire\Editor\ElementosEditPortadaResumen;
use App\Livewire\Editor\ElementosTextoHome;
use App\Livewire\Editor\SearchFoto;

Route::get('editor/elementos',ElementosHome::class)->name('editor.home');
Route::get('editor/elementos/editPortadaResumen/{elementoId}',ElementosEditPortadaResumen::class)->name('editor.edit.portadaResumen');
Route::get('editor/elementos/creaTexto/{elementoId}',ElementosTextoHome::class)->name('editor.edit.texto');
Route::get('editor/searchFoto',SearchFoto::class)->name('editor.searchFoto');
