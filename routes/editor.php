<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Editor\ElementosHome;

use App\Livewire\Editor\ElementosEditPortadaResumen;
use App\Livewire\Editor\ElementosTextoHome;
use App\Livewire\Editor\SearchFoto;

Route::get('editor/xxxx/elementos',ElementosHome::class)->name('editor.home');
Route::get('editor/xxxx/elementos/editPortadaResumen/{elementoId}',ElementosEditPortadaResumen::class)->name('editor.edit.portadaResumen');
Route::get('editor/xxxx/elementos/creaTexto/{elementoId}',ElementosTextoHome::class)->name('editor.edit.texto');
Route::get('editor/xxxx/searchFoto',SearchFoto::class)->name('editor.searchFoto');
