@extends('adminlte::page')

@section('title', 'Calificaciones')

@section('content_header')
    <h1>Calificaciones</h1>
    {{-- message success --}}
    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('mensaje')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    {{-- errors any...  --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

@stop

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('calificacion.crear') }}" class="btn btn-info">Crear</a>
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">

        <table class="table table-bordered table-striped mb-0">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">calificacion</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Materia</th>
                <th scope="col">Año academico</th>
                <th scope="col">Credito</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calificaciones as $calificacion)
            <tr>
                <td>{{$calificacion->id}}</td>
                <td>{{$calificacion->calificacion}}</td>
                <td>{{$calificacion->inscripcion->estudiante->nombre}}</td>
                <td>{{$calificacion->inscripcion->materia->nombre}}</td>
                <td>{{$calificacion->inscripcion->año_academico}}</td>
                {{-- usamos una formula matematica para sacar el credito de la calificacion --}}
                <td>{{$calificacion->calificacion * $calificacion->inscripcion->materia->credito / 20}}</td>
                
                <td><a href="{{route('calificacion.editar', $calificacion->id)}}" class="btn btn-info">editar</a>
                    <form action="{{route('calificacion.eliminar', $calificacion->id)}}" class="d-inline" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <input type="submit" class="btn btn-danger" value="eliminar" onclick="return confirm('¿Desea eliminar este dato?')">
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .my-custom-scrollbar {
            position: relative;
            height: 80vh;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
