<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [TareasController::class, 'index'])->name('home');

Route::post('/home-p', [TareasController::class, 'store'])->name('home-p');

Route::get('/home-show/{id}', [TareasController::class, 'show'])->name('home-show');

Route::patch('/home-update', [TareasController::class, 'store'])->name('home-update');

Route::delete('/home-destroy', [TareasController::class, 'store'])->name('home-destroy');
