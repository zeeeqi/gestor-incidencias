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

Route::get('/', [IncidenciaController::class, 'index'])->middleware(['auth'])->name('incidencia.index');
Route::get('/delete/{incidencia}', [IncidenciaController::class, 'delete'])->middleware(['auth'])->name('incidencia.delete');
Route::get('/reparar/{incidencia}', [IncidenciaController::class, 'reparar'])->middleware(['auth'])->name('incidencia.reparar');
Route::get('/modificar/{incidencia}', [IncidenciaController::class, 'modificar'])->middleware(['auth'])->name('incidencia.modificar');
Route::post('/store', [IncidenciaController::class, 'store'])->middleware(['auth'])->name('incidencia.store');
Route::put('/update/{incidencia}', [IncidenciaController::class, 'update'])->middleware(['auth'])->name('incidencia.update');

Route::get('/addform', [FormsController::class, 'add'])->middleware(['auth'])->name('form.add');
Route::get('/updateForm/{incidencia}', [FormsController::class, 'update'])->middleware(['auth'])->name('form.update');



require __DIR__ . '/auth.php';
