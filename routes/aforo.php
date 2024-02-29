<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Aforo\ActividadeController;
use App\Http\Controllers\Aforo\AforoController;
use App\Http\Controllers\Aforo\CategoryController;
use App\Http\Controllers\Aforo\ClienteController;
use App\Http\Controllers\Aforo\RecipienteController;
use App\Http\Controllers\Aforo\RutaController;
use Illuminate\Support\Facades\Route;

//rutas de aforo
Route::get('/aforo/firma', [AforoController::class,'firma'])->name('aforo.firma');
Route::get('/aforo/firmados', [AforoController::class,'firmados'])->name('aforo.firmados');

//rutas de recipiente
Route::get('/aforo/recipiente/index', [RecipienteController::class,'index'])->name('aforo.recipiente.index');
Route::get('/aforo/recipiente/create', [RecipienteController::class,'create'])->name('aforo.recipiente.create');
Route::get('/aforo/recipiente/edit/{recipiente}', [RecipienteController::class,'edit'])->name('aforo.recipiente.edit');
Route::post('/aforo/recipiente/store', [RecipienteController::class,'store'])->name('aforo.recipiente.store');
Route::put('/aforo/recipiente/update/{recipiente}', [RecipienteController::class,'update'])->name('aforo.recipiente.update');

//Detalle recipiente
Route::get('/aforo/recipiente/guardardetalleseguimiento', [RecipienteController::class,'guardardetalleseguimiento'])->name('aforo.recipiente.guardardetalleseguimiento');
Route::get('/aforo/recipiente/mostrardetallerecipiente', [RecipienteController::class,'mostrardetallerecipiente'])->name('aforo.recipiente.mostrardetallerecipiente');

//rutas de ruta
Route::get('/aforo/ruta/index', [RutaController::class,'index'])->name('aforo.ruta.index');
Route::get('/aforo/ruta/create', [RutaController::class,'create'])->name('aforo.ruta.create');
Route::get('/aforo/ruta/edit/{ruta}', [RutaController::class,'edit'])->name('aforo.ruta.edit');
Route::post('/aforo/ruta/store', [RutaController::class,'store'])->name('aforo.ruta.store');
Route::put('/aforo/ruta/update/{ruta}', [RutaController::class,'update'])->name('aforo.ruta.update');

//rutas de la categoria
Route::get('/aforo/category/index', [CategoryController::class,'index'])->name('aforo.category.index');
Route::get('/aforo/category/create', [CategoryController::class,'create'])->name('aforo.category.create');
Route::get('/aforo/category/edit/{category}', [CategoryController::class,'edit'])->name('aforo.category.edit');
Route::post('/aforo/category/store', [CategoryController::class,'store'])->name('aforo.category.store');
Route::put('/aforo/category/update/{category}', [CategoryController::class,'update'])->name('aforo.category.update');

//rutas de la actividad economica
Route::get('/aforo/actividade/index', [ActividadeController::class,'index'])->name('aforo.actividade.index');
Route::get('/aforo/actividade/create', [ActividadeController::class,'create'])->name('aforo.actividade.create');
Route::get('/aforo/actividade/edit/{actividade}', [ActividadeController::class,'edit'])->name('aforo.actividade.edit');
Route::post('/aforo/actividade/store', [ActividadeController::class,'store'])->name('aforo.actividade.store');
Route::put('/aforo/actividade/update/{actividade}', [ActividadeController::class,'update'])->name('aforo.actividade.update');


//rutas de los clientes
Route::get('/aforo/cliente/create', [ClienteController::class,'create'])->name('aforo.cliente.create');
Route::post('/aforo/cliente/store', [ClienteController::class,'store'])->name('aforo.cliente.store');
