@extends('adminlte::page')

@section('title', 'Editar inscripcion')

@section('content_header')
    <h1>Editar inscripcion</h1>
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
    <form action="{{ route('inscripcion.actualizar', $inscripcion->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="mb-3">
            <select class="custom-select" name="materia_id">
                <option value="{{$inscripcion->materia_id}}" selected>{{$inscripcion->materia->nombre}}</option>
                @foreach ($materias as $materia)
                <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select class="custom-select" name="estudiante_id">
                <option value="{{$inscripcion->estudiante_id}}" selected>{{$inscripcion->estudiante->nombre}}</option>
                @foreach ($estudiantes as $estudiante)
                <option value="{{$estudiante->id}}">{{$estudiante->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select class="custom-select" id="año_academico" name="año academico">
                <option value="{{$inscripcion->año_academico}}" selected>{{$inscripcion->año_academico}} - Año academico</option>
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
                @if ($inscripcion->estado == "1")
                <option value="{{$inscripcion->estado}}" selected>Estado = Activo</option>
                @else
                <option value="{{$inscripcion->estado}}" selected>Estado = Inactivo</option>
                @endif
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script> --}}

    <script>
        console.log('Hi!');
    </script>
@stop
