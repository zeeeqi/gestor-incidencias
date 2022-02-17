<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\IncidenciaController;
use Illuminate\Support\Facades\Route;
use App\Models\Incidencia;
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

Route::get('/', [IncidenciaController::class,'index'])->middleware(['auth'])->name('incidencia.index');
Route::get('/delete/{id}',[IncidenciaController::class,'delete'])->name('incidencia.delete');
Route::get('/reparar/{id}',[IncidenciaController::class,'reparar'])->name('incidencia.reparar');
Route::post('/store',[IncidenciaController::class,'store'])->name('incidencia.store');

Route::get('/addform',[FormsController::class,'add'])->name('form.add');



require __DIR__ . '/auth.php';
