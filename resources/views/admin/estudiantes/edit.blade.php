@extends('adminlte::page')

@section('title', 'Editar Estudiantes')

@section('content_header')
    <h1>Estudiantes</h1>
@stop

@section('content')
<form action="{{route('estudiante.actualizar', $data->id)}}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="mb-3">
      <label for="name" class="form-label">Nombre</label>
      <input type="text" name="nombre" id="name" class="form-control" value="{{$data->nombre}}">
    </div>
    <div class="mb-3">
      <label for="apellido" class="form-label">Apellido</label>
      <input type="text" name="apellido" id="apellido" class="form-control" value="{{$data->apellido}}">
    </div>
    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{$data->fecha_nacimiento}}">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label">Numero de telefono</label>
        <input type="number" name="numero_telefono" id="telefono" class="form-control" value="{{$data->numero_telefono}}">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="email" name="correo" class="form-control" id="email" aria-describedby="emailHelp" value="{{$data->correo}}">
    </div>

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop