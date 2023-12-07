<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\Inscripciones;
use App\Models\Materias;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{
    
    public function index()
    {
        
        $inscripciones = Inscripciones::all();
        return view('admin.inscripciones.inscripciones')->with('inscripciones', $inscripciones);
    }

    
    public function create()
    {
        $materias = Materias::all();
        $estudiantes = Estudiantes::all();
        return view('admin.inscripciones.create')->with('materias', $materias)->with('estudiantes', $estudiantes);
    }

    
    public function store(Request $request)
    {
        $campos = [
            'estado' => 'required',
            'año_academico' => 'required',
            'estudiante_id' => 'required',
            'materia_id' => 'required',
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];
        

        $this->validate($request, $campos, $error);

        $inscripcion = new Inscripciones();
        $inscripcion->estado = $request->estado;
        $inscripcion->año_academico = $request->año_academico; 
        $inscripcion->estudiante_id = $request->estudiante_id; 
        $inscripcion->materia_id = $request->materia_id; 

        try {
            $inscripcion->save();
            return redirect()->route('inscripciones')->with('mensaje', 'Inscripcion creada');
        } catch (\Exception $e) {
            // Manejar la excepción, por ejemplo, registrándola o mostrando un mensaje de error
            return redirect()->back()->with('error', 'Error al crear la inscripción: ' . $e->getMessage());
        }
        
    }

    
    public function show(Inscripciones $inscripciones)
    {
        //
    }

    
    public function edit(Inscripciones $inscripciones,$id)
    {
        $inscripcion = Inscripciones::findOrFail($id);
        $materias = Materias::all();
        $estudiantes = Estudiantes::all();

        return view('admin.inscripciones.edit')->with('inscripcion', $inscripcion)->with('materias', $materias)->with('estudiantes', $estudiantes);
        
    }

    
    public function update(Request $request, Inscripciones $inscripciones, $id)
    {
        

        $campos = [
            'estado' => 'required',
            'año_academico' => 'required',
            'estudiante_id' => 'required',
            'materia_id' => 'required',
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];
        

        $this->validate($request, $campos, $error);

        $data = $request->except('_token', '_method');
        try {
            Inscripciones::where('id', '=', $id)->update($data);
            return redirect()->route('inscripciones')->with('mensaje', 'Inscripcion actualizada');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al editar la inscripción: ' . $e->getMessage());
        }

    }

    
    public function destroy(Inscripciones $inscripciones,$id)
    {
        try {
            Inscripciones::deleted($id);
            return redirect()->route('inscripciones')->with('mensaje', 'Inscripcion eliminada');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar la inscripción: ' . $e->getMessage());
        }
    }
}
