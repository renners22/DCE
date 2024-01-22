<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\Inscripciones;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calificaciones = Calificaciones::all();
        return view('admin.calificaciones.calificaciones')->with('calificaciones', $calificaciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inscripciones = Inscripciones::all();
        return view('admin.calificaciones.create')->with('inscripciones', $inscripciones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'calificacion' => 'required',
            'inscripcion_id' => 'required',
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];
        

        $this->validate($request, $campos, $error);

        $calificacion = new Calificaciones();
        $calificacion->calificacion = $request->calificacion;
        $calificacion->inscripcion_id = $request->inscripcion_id;

        try {
            $calificacion->save();
            return redirect()->route('calificaciones')->with('mensaje', 'Calificacion creada');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al crear la calificacion' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calificaciones $calificaciones, $id)
    {
        $inscripciones = Inscripciones::all();
        $calificacion = Calificaciones::findOrFail($id);
        return view('admin.calificaciones.edit')->with('calificacion', $calificacion)->with('inscripciones', $inscripciones);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calificaciones $calificaciones,$id)
    {
        $campos = [
            'calificacion' => 'required',
            'inscripcion_id' => 'required',
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];

        $this->validate($request, $campos, $error);
        
        $data = $request->except('_token', '_method');
        
        try {
            Calificaciones::where('id', '=', $id)->update($data);
            return redirect()->route('calificaciones')->with('mensaje', 'Calificacion actualizada');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al editar la calificacion' . $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calificaciones $calificaciones,$id)
    {
        try {
            Calificaciones::deleted($id);
            return redirect()->route('calificaciones')->with('mensaje', 'Calificacion eliminada');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar la calificacion' . $e->getMessage());
        }
    }
}
