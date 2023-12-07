<?php

namespace App\Http\Controllers;

use App\Models\Docentes;
use App\Models\Materias;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docentes::all();
        // $data = $docentes->materias->nombre;
        
        return view('admin.docentes.docentes')->with('docentes', $docentes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materias::all();

        return view('admin.docentes.create')->with('materias', $materias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required| string',
            'apellido' => 'required| string',
            'numero_telefono' => 'required',
            'correo' => 'required| email',
            'materia_id' => 'required',
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];
        

        $this->validate($request, $campos, $error);

        $docente = new Docentes();
        $docente->nombre = $request->nombre;
        $docente->apellido = $request->apellido;
        $docente->numero_telefono = $request->numero_telefono;
        $docente->correo = $request->correo;
        $docente->materia_id = $request->materia_id;
        
        try {
            $docente->save();
            return redirect()
                ->route('docentes')
                ->with('mensaje', 'docente creado!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('mensaje', 'No se ha podido crear el docente' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Docentes $docentes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docentes $docentes, $id)
    {
      
        $docente = Docentes::findOrFail($id);
        $materias = Materias::all();

        

        return view('admin.docentes.edit')->with('docente', $docente)->with('materias', $materias);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docentes $docentes, $id)
    {
        $campos = [
            'nombre' => 'required| string',
            'apellido' => 'required| string',
            'numero_telefono' => 'required',
            'correo' => 'required| email',
            'materia_id' => 'required',
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];
        

        $this->validate($request, $campos, $error);

        $data = $request->except('_token', '_method');

        try {
            Docentes::where('id', '=', $id)->update($data);
            return redirect()->route('docentes')->with('mensaje', 'docente actualizado');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('mensaje', 'No se ha podido editar el docente' . $e->getMessage());
            
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docentes $docentes, $id)
    {

        try {
            Docentes::deleted($id);
            return redirect()->route('docentes')->with('mensaje', 'Docente eliminado');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('mensaje', 'No se ha podido eliminar el docente' . $e->getMessage());
            
        }

    }
}
