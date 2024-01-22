@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div id="chart"></div>
    </div>
@stop

@section('css')
    <link href="https://unpkg.com/c3@0.4.21/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        /* #graficoArea { */
        /* width: 700px !important;
                    height: 500px !important; */
        /* } */
    </style>
@stop

@section('js')
    <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/c3@0.4.21/c3.min.js"></script>

    <script>
        
        var chart = c3.generate({
            bindto: '#chart',
            data: {
                x: 'Fechas', // Suponemos que 'Fechas' es el campo de fecha que usamos en el controlador
                columns: [
                    {!! json_encode($dataParaGrafico['Fechas']) !!}, // Fechas
                    {!! json_encode($dataParaGrafico['Calificaciones']) !!} // Calificaciones
                ],
                type: 'area'
            },
            axis: {
                x: {
                    type: 'timeseries', // Si estamos mostrando fechas
                    tick: {
                        format: '%Y-%m-%d' // Formato de fecha
                    }
                }
            }
        });
    </script>




    {{-- <script>
        var ctx = document.getElementById('graficoArea').getContext('2d');
        var calificaciones = @json($calificaciones); // Convertir los datos PHP a un objeto JavaScript
        var inscripciones = @json($inscripciones); // Convertir los datos PHP a un objeto JavaScript

        var labels = inscripciones.map(function(inscripcion, index) {
            return (index + 1); // Enumerar los IDs de inscripciones
        });

        var valores = calificaciones.map(function(calificacion) {
            return calificacion.calificacion;
        });

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Calificaciones en matematicas',
                    data: valores,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        animation: false
                    }
                }
            }

        });
    </script> --}}
@stop
