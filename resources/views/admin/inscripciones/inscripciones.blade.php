@extends('adminlte::page')

@section('title', 'Inscripciones')

@section('content_header')
    <h1>Inscripciones</h1>
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
        <a href="{{ route('inscripcion.crear') }}" class="btn btn-info">Crear</a>
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">

        <table class="table table-bordered table-striped mb-0">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Estado</th>
                <th scope="col">Año academico</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Materia</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscripciones as $inscripcion)
            <tr>
                <td>{{$inscripcion->id}}</td>
                
                @if ($inscripcion->estado == "1")
                    <td>Activo</td>
                @else
                    <td>Inactivo</td>
                @endif
                <td>{{$inscripcion->año_academico}}</td>
                <td>{{$inscripcion->estudiante->nombre}}</td>
                <td>{{$inscripcion->materia->nombre}}</td>
                <td>{{$inscripcion->created_at->format('d-m-y')}}</td>
                <td><a href="{{route('inscripcion.editar', $inscripcion->id)}}" class="btn btn-info">editar</a>
                    <form action="{{route('inscripcion.eliminar', $inscripcion->id)}}" class="d-inline" method="post">
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
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script> --}}
    <script>
        console.log('Hi!');
    </script>
@stop
