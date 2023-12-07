@extends('adminlte::page')

@section('title', 'Editar Materias')

@section('content_header')
    <h1>Editar - {{$materia->nombre}}</h1>
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
<form action="{{route('materia.actualizar', $materia->id)}}" method="POST">
    @csrf
    {{ method_field('PUT') }}
    <div class="mb-3">
      <label for="name_materia" class="form-label">Nombre materia</label>
      <input type="text" name="nombre" class="form-control" id="name_materia"  value="{{$materia->nombre}}">
    </div>
    <div class="mb-3"> 
      <label for="descripcion" class="form-label">Descripcion</label>
      <input type="text" name="descripcion" class="form-control" id="descripcion" value="{{$materia->descripcion}}">
    </div>
    <div class="mb-3">
      <label for="credito_materia" class="form-label">Credito</label>
      <input type="number" name="credito" class="form-control" id="credito_materia" value="{{$materia->credito}}">
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
