@extends('adminlte::page')

@section('title', 'Crear docente')

@section('content_header')
    <h1>Crear Docente</h1>
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
    <form action="{{ route('docente.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name_docente" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="name_docente">
        </div>
        <div class="mb-3">
            <label for="apellido_docente" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido_docente">
        </div>
        <div class="mb-3">
            <label for="numero_telefono" class="form-label">Numero de telefono</label>
            <input type="number" name="numero_telefono" class="form-control" id="numero_telefono">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" id="correo">
        </div>
        <div class="mb-3">
            <select class="custom-select" name="materia_id">
                <option selected>Materias</option>
                @foreach ($materias as $materia)
                <option value="{{$materia->id}}">{{$materia->nombre}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@stop

@section('css')
    
@stop

@section('js')
    

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $.ajax({
        url: 'https://randomuser.me/api/',
        dataType: 'json',
        success: function(data) {
            console.log(data);
        }
    });
</script> --}}
@stop
