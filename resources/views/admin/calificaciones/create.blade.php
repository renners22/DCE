@extends('adminlte::page')

@section('title', 'Crear Calificacion')

@section('content_header')
    <h1>Calificacion</h1>
    
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
    <form action="{{ route('calificacion.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="calificacion" class="form-label">Calificacion</label>
            <input type="text" name="calificacion" id="calificacion" class="form-control">
        </div>
        <div class="mb-3">
            <select class="custom-select" name="inscripcion_id">
                <option selected>Inscripcion</option>
                @foreach ($inscripciones as $inscripcion)
                    <option value="{{ $inscripcion->id }}">{{ $inscripcion->estudiante->nombre }} - {{$inscripcion->materia->nombre}}</option>
                @endforeach
            </select>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
