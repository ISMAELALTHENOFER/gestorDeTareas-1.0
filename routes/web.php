<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\CategoriesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

//crud de tareas

Route::get('/home', [TareasController::class, 'index'])->name('home'); //muestra todas las tareas

Route::post('/home-p', [TareasController::class, 'store'])->name('home-p'); // guarda una nueva tarea

Route::delete('/home-destroy/{id}', [TareasController::class, 'destroy'])->name('home-destroy'); //elimina una tarea

Route::get('/home-show/{id}', [TareasController::class, 'show'])->name('home-show'); //muestra la tarea seleccionada

Route::patch('/home-update/{id}', [TareasController::class, 'update'])->name('home-update'); //edita la tarea seleccionada

Route::resource('categoria', CategoriesController::class);
