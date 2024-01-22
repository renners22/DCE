<?php

use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\MateriasController;
use App\Models\Estudiantes;
use App\Models\Inscripciones;
use Illuminate\Support\Facades\Auth;
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

// estudiantes
Route::controller(EstudiantesController::class)->middleware('auth')->prefix('admin/')->group(function(){
    Route::get('estudiantes', 'index')->name('estudiantes');
    Route::get('crear-estudiante', 'create')->name('estudiante.crear');
    Route::post('guardar-estudiante', 'store')->name('estudiante.guardar');
    Route::get('editar-estudiante/{id}', 'edit')->name('estudiante.editar');
    Route::put('actualizar-estudiante/{id}', 'update')->name('estudiante.actualizar');
    Route::delete('eliminar-estudiante/{id}', 'destroy')->name('estudiante.eliminar');
});

// materias
Route::controller(MateriasController::class)->middleware('auth')->prefix('admin/')->group(function(){
    Route::get('materias', 'index')->name('materias');
    Route::get('crear-materias', 'create')->name('materia.crear');
    Route::post('guardar-materias', 'store')->name('materia.guardar');
    Route::get('editar-materias/{id}', 'edit')->name('materia.editar');
    Route::put('actualizar-materias/{id}', 'update')->name('materia.actualizar');
    Route::delete('eliminar-materias/{id}', 'destroy')->name('materia.eliminar');
});

// docentes
Route::controller(DocentesController::class)->middleware('auth')->prefix('admin/')->group(function(){
    Route::get('docentes', 'index')->name('docentes');
    Route::get('crear-docentes', 'create')->name('docente.crear');
    Route::post('guardar-docentes', 'store')->name('docente.guardar');
    Route::get('editar-docentes/{id}', 'edit')->name('docente.editar');
    Route::put('actualizar-docentes/{id}', 'update')->name('docente.actualizar');
    Route::delete('eliminar-docentes/{id}', 'destroy')->name('docente.eliminar');
});

// inscripciones
Route::controller(InscripcionesController::class)->middleware('auth')->prefix('admin/')->group(function(){
    Route::get('inscripciones', 'index')->name('inscripciones');
    Route::get('crear-inscripcion', 'create')->name('inscripcion.crear');
    Route::post('guardar-inscripcion', 'store')->name('inscripcion.guardar');
    Route::get('editar-inscripcion/{id}', 'edit')->name('inscripcion.editar');
    Route::put('actualizar-inscripcion/{id}', 'update')->name('inscripcion.actualizar');
    Route::delete('eliminar-inscripcion/{id}', 'destroy')->name('inscripcion.eliminar');
});

// calificaciones
Route::controller(CalificacionesController::class)->middleware('auth')->prefix('admin/')->group(function(){
    Route::get('calificaciones', 'index')->name('calificaciones');
    Route::get('crear-calificacion', 'create')->name('calificacion.crear');
    Route::post('guardar-calificacion', 'store')->name('calificacion.guardar');
    Route::get('editar-calificacion/{id}', 'edit')->name('calificacion.editar');
    Route::put('actualizar-calificacion/{id}', 'update')->name('calificacion.actualizar');
    Route::delete('eliminar-calificacion/{id}', 'destroy')->name('calificacion.eliminar');
});
