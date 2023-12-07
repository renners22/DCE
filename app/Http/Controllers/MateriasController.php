<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Materias::all();

        return view('admin.materias.materias')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string',
            'descripcion' => '',
            'credito' => 'required' 
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];
        

        $this->validate($request, $campos, $error);

        $materia = new Materias();
        $materia->nombre = $request->nombre;
        $materia->descripcion = $request->descripcion;
        $materia->credito = $request->credito;

        try {
            $materia->save();
            return redirect()->route('materias')->with('mensaje', "Materia creada");
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al guardar la materia: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Materias $materias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materias $materias, $id)
    {
        $materia = Materias::findOrFail($id);
        return view('admin.materias.edit')->with('materia', $materia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materias $materias, $id)
    {
        $campos = [
            'nombre' => 'required|string',
            'descripcion' => '',
            'credito' => 'required' 
        ];

        $error = [
            'required'=>'el :attribute es requerido',
        ];
        
        $this->validate($request, $campos, $error);
        
        $data = $request->except('_token', '_method');
        
        try {
            Materias::where('id', '=', $id)->update($data);
            
            return redirect()->route('materias')->with('mensaje', "Materia actualizada");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar la materia: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materias $materias, $id)
    {
        try {
            Materias::destroy($id);
            return redirect()->route('materias')->with('mensaje', "Materia eliminada");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar la materia: ' . $e->getMessage());
        }
    }
}
