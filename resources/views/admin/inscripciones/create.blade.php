@extends('adminlte::page')

@section('title', 'Crear inscripcion')

@section('content_header')
    <h1>Crear inscripcion</h1>
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
    <form action="{{ route('inscripcion.guardar') }}" method="POST">
        @csrf

        <div class="mb-3">
            <select class="custom-select" name="materia_id">
                <option selected>Materias</option>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select class="custom-select" name="estudiante_id">
                <option selected>Estudiante</option>
                @foreach ($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select class="custom-select" name="año_academico">
                <option selected>Año academico</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>

            </select>
        </div>
        <div class="mb-3">
            <select class="custom-select" name="estado">
                <option selected>Estado</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
