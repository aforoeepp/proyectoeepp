<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


//rutas de usuarios
Route::get('/admin/user/index', [UserController::class,'index'])->name('admin.user.index');
Route::get('/admin/user/edit/{user}', [UserController::class,'edit'])->name('admin.user.edit');
Route::get('/admin/user/create', [UserController::class,'create'])->name('admin.user.create');
Route::post('/admin/user/store', [UserController::class,'store'])->name('admin.user.store');
Route::put('/admin/user/update/{user}', [UserController::class,'update'])->name('admin.user.update');