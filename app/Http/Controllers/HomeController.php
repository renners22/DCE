<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\Inscripciones;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $calificaciones = Calificaciones::all();

        // Transformar los datos para usarlos en el gráfico de C3.js
        $dataParaGrafico = [];

        foreach ($calificaciones as $calificacion) {
            // Suponiendo que tienes un campo "fecha" en tus modelos de calificaciones e inscripciones
            $fecha = $calificacion->created_at->format('Y-m-d'); // Ajusta el formato de acuerdo a tu necesidad
            $dataParaGrafico['Fechas'][] = $fecha;
            $dataParaGrafico['Calificaciones'][] = $calificacion->calificacion;
        }

        // dd($dataParaGrafico);

        return view('admin.home')->with('dataParaGrafico', $dataParaGrafico);

        // $calificaciones = Calificaciones::all();
        // $inscripciones = Inscripciones::where('materia_id', '=', '1')->get();

        // return view('admin.home')->with('calificaciones', $calificaciones)->with('inscripciones', $inscripciones);
    }
}

// $calificaciones = Calificaciones::all();

// $labels = $calificaciones->pluck('id')->toArray(); // Obtener los IDs como etiquetas
// $valores = $calificaciones->pluck('calificacion')->toArray(); // Obtener las calificaciones como valores

// $datosGrafica = [
//     'labels' => $labels,
//     'valores' => $valores,
// ];

// return view('admin.home', compact('datosGrafica'));
