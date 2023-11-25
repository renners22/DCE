<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Estudiantes::all();
        return view('admin.estudiantes.estudiantes')->with('data', $data);
        // return view('admin.estudiantes.estudiantes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->except('_token'));
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'numero_telefono' => 'required',
            'correo' => 'required|email',
        ];
        

        $this->validate($request, $campos);
        // $data = $request->except('_token');
        // Estudiantes::insert($data);
        // dd("validate true");
        $estudiante = new Estudiantes();
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->numero_telefono = $request->numero_telefono;
        $estudiante->correo = $request->correo;

        $estudiante->save();

        return redirect()->route('estudiantes')->with('mensaje', "estudiante agregado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiantes $estudiantes, $id)
    {
        $data = Estudiantes::findOrFail($id);
        return view('admin.estudiantes.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id, Estudiantes $estudiantes)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'numero_telefono' => 'required|string',
            'correo' => 'required|email',
        ];
        $msj = [
            'required' => 'el :attribute es requerido',

        ];

        $this->validate($request, $campos, $msj);

        $data = $request->except('_token', '_method');

        Estudiantes::where('id', '=', $id)->update($data);

        return redirect()->route('estudiantes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Estudiantes::destroy($id);

        return redirect()->route('estudiantes');
    }
}
