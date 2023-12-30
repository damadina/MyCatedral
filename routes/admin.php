<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AutorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\categoriaController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\fotoController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\Idiomas;
use App\Http\Controllers\Admin\InformacionController;



Route::get('admin/xxxxx/dashboard', [HomeController::class,'index'])->name('admin.home');
Route::resource('admin/xxxxx/roles',RoleController::class)->names('admin.roles');
Route::resource('admin/xxxxx/users',userController::class)->only(['index','edit','update'])->names('admin.users');

Route::resource('admin/xxxxx/categorias',categoriaController::class)->names('admin.categorias');
Route::resource('admin/xxxxx/documentos',DocumentController::class)->names('admin.documentos');
Route::resource('admin/xxxxx/autors',AutorController::class)->names('admin.autores');

Route::get('admin/xxxxx/elementos',[ElementController::class,'index'])->name('admin.elementos.index');
Route::get('admin/xxxxx/fotos',[fotoController::class,'index'])->name('admin.fotos.index');

Route::get('admin/xxxxx/idiomas',[Idiomas::class,'index'])->name('admin.idiomas');
Route::get('admin/xxxxx/informaciones',[InformacionController::class,'index'])->name('admin.informacion');

