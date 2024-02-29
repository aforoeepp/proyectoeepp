<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Revisionca\HomeController;

/*
|--------------------------------------------------------------------------
| Rutas para revision de consumos altos
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::get('/', [HomeController::class,'index']);
Route::get('/', [HomeController::class,'index'])->name('revisionca.home');

Route::get('importarexcel', [HomeController::class,'importarexcel'])->name('revisionca.importarexcel');  //createimportarexcel
Route::post('createimportarexcel', [HomeController::class,'createimportarexcel'])->name('revisionca.createimportarexcel');  //importar archivo
Route::get('/exportar', [HomeController::class,'exportar'])->name('revisionca.exportar');
Route::get('/exportarexcel', [HomeController::class,'exportarexcel'])->name('revisionca.exportarexcel');
Route::get('/invoices', [HomeController::class,'exportarexcel'])->name('exports.invoices');

//routas ajax  
Route::get('/revisionca/mostrarlistaderutas', [HomeController::class,'mostrarlistaderutas'])->name('revisionca.mostrarlistaderutas');
Route::get('/revisionca/updateseguimiento', [HomeController::class,'updateseguimiento'])->name('revisionca.updateseguimiento');

