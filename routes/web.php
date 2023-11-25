<?php

use App\Http\Controllers\EstudiantesController;
use App\Models\Estudiantes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(EstudiantesController::class)->prefix('admin/')->group(function(){
    route::get('estudiantes', 'index')->name('estudiantes');
    route::get('crear-estudiante', 'create')->name('estudiante.crear');
    Route::post('guardar-estudiante', 'store')->name('estudiante.guardar');
    Route::get('editar-estudiante/{id}', 'edit')->name('estudiante.editar');
    Route::put('actualizar-estudiante/{id}', 'update')->name('estudiante.actualizar');
    Route::delete('eliminar-estudiante{id}', 'destroy')->name('estudiante.eliminar');
});
