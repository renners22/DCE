<?php

use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\MateriasController;
use App\Models\Estudiantes;
use App\Models\Inscripciones;
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
    Route::delete('eliminar-estudiante/{id}', 'destroy')->name('estudiante.eliminar');
});

Route::controller(MateriasController::class)->prefix('admin/')->group(function(){
    route::get('materias', 'index')->name('materias');
    route::get('crear-materias', 'create')->name('materia.crear');
    route::post('guardar-materias', 'store')->name('materia.guardar');
    route::get('editar-materias/{id}', 'edit')->name('materia.editar');
    route::put('actualizar-materias/{id}', 'update')->name('materia.actualizar');
    route::delete('eliminar-materias/{id}', 'destroy')->name('materia.eliminar');
});

Route::controller(DocentesController::class)->prefix('admin/')->group(function(){
    route::get('docentes', 'index')->name('docentes');
    route::get('crear-docentes', 'create')->name('docente.crear');
    route::post('guardar-docentes', 'store')->name('docente.guardar');
    route::get('editar-docentes/{id}', 'edit')->name('docente.editar');
    route::put('actualizar-docentes/{id}', 'update')->name('docente.actualizar');
    route::delete('eliminar-docentes/{id}', 'destroy')->name('docente.eliminar');
});

Route::controller(InscripcionesController::class)->prefix('admin/')->group(function(){
    route::get('inscripciones', 'index')->name('inscripciones');
    route::get('crear-inscripcion', 'create')->name('inscripcion.crear');
    route::post('guardar-inscripcion', 'store')->name('inscripcion.guardar');
    route::get('editar-inscripcion/{id}', 'edit')->name('inscripcion.editar');
    route::put('actualizar-inscripcion/{id}', 'update')->name('inscripcion.actualizar');
    route::delete('eliminar-inscripcion/{id}', 'destroy')->name('inscripcion.eliminar');
});

Route::controller(CalificacionesController::class)->prefix('admin/')->group(function(){
    route::get('calificaciones', 'index')->name('calificaciones');
    route::get('crear-calificacion', 'create')->name('calificacion.crear');
    route::post('guardar-calificacion', 'store')->name('calificacion.guardar');
    route::get('editar-calificacion/{id}', 'edit')->name('calificacion.editar');
    route::put('actualizar-calificacion/{id}', 'update')->name('calificacion.actualizar');
    route::delete('eliminar-calificacion/{id}', 'destroy')->name('calificacion.eliminar');
});
