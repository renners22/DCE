@extends('adminlte::page')

@section('title', 'Editar Docentes')

@section('content_header')
    <h1>Editar </h1>
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
    <form action="{{ route('docente.actualizar', $docente->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="mb-3">
            <label for="name_docente" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="name_docente" value="{{$docente->nombre}}">
        </div>
        <div class="mb-3">
            <label for="apellido_docente" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido_docente" value="{{$docente->apellido}}">
        </div>
        <div class="mb-3">
            <label for="numero_telefono" class="form-label">Numero de telefono</label>
            <input type="number" name="numero_telefono" class="form-control" id="numero_telefono" value="{{$docente->numero_telefono}}">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo" value="{{$docente->correo}}">
        </div>
        <div class="mb-3">
            <label for="materias">Recuerda seleccionar las materias</label>
            <select class="custom-select" id="materias" name="materia_id">
                <option value="{{$docente->materia_id}}" selected>{{$docente->materias->nombre}}</option>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
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
