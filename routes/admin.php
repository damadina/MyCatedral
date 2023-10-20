<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\categoriaController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\fotoController;


Route::get('admin', [HomeController::class,'index'])->name('admin.home');
Route::resource('admin/roles',RoleController::class)->names('admin.roles');
Route::resource('admin/users',userController::class)->only(['index','edit','update'])->names('admin.users');
Route::resource('admin/categorias',categoriaController::class)->names('admin.categorias');
/* Route::resource('admin/elementos',ElementController::class)->names('admin.elementos'); */
Route::get('admin/elementos',[ElementController::class,'index'])->name('admin.elementos.index');
Route::get('admin/fotos',[fotoController::class,'index'])->name('admin.fotos.index');
/* Route::resource('admin/fotos',fotoController::class)->names('admin.fotos');
 */
