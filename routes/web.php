<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\UsuariosController;
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

Route::get('/', [IncidenciaController::class, 'index'])->middleware(['auth'])->name('incidencia.index');
Route::get('/delete/{incidencia}', [IncidenciaController::class, 'delete'])->middleware(['auth'])->name('incidencia.delete');
Route::get('/reparar/{incidencia}', [IncidenciaController::class, 'reparar'])->middleware(['auth','admin'])->name('incidencia.reparar');
Route::get('/modificar/{incidencia}', [IncidenciaController::class, 'modificar'])->middleware(['auth'])->name('incidencia.modificar');
Route::post('/store', [IncidenciaController::class, 'store'])->middleware(['auth'])->name('incidencia.store');
Route::put('/update/{incidencia}', [IncidenciaController::class, 'update'])->middleware(['auth'])->name('incidencia.update');

Route::get('/addform', [FormsController::class, 'add'])->middleware(['auth'])->name('form.add');
Route::get('/updateForm/{incidencia}', [FormsController::class, 'update'])->middleware(['auth'])->name('form.update');

// Administración de usuarios solo para admin
Route::get('/paneluser', [UsuariosController::class,'panel' ] )->middleware(['auth','admin'])->name('panel.panel');
Route::get('/paneluser/create', [UsuariosController::class,'create' ] )->middleware(['auth','admin'])->name('panel.create');
Route::post('/paneluser/store', [UsuariosController::class, 'store'])->middleware(['auth','admin'])->name('panel.store');
Route::get('/paneluser/edit/{user}',[UsuariosController::class, 'edit'])->middleware(['auth','admin'])->name('panel.edit');
Route::put('/paneluser/update/{user}',[UsuariosController::class, 'update'])->middleware(['auth','admin'])->name('panel.update');
Route::get('/paneluser/delete/{user}',[UsuariosController::class, 'delete'])->middleware(['auth','admin'])->name('panel.delete');

require __DIR__ . '/auth.php';
