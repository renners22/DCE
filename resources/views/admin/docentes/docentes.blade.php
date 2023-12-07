@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Docentes</h1>
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
        <a href="{{ route('docente.crear') }}" class="btn btn-info">Crear</a>
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Numero de telefono</th>
                <th scope="col">Correo</th>
                <th scope="col">Materia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($docentes as $docente)
            <tr>
                <th scope="raw">{{$docente->id}}</th>
                <td>{{$docente->nombre}}</td>
                <td>{{$docente->apellido}}</td>
                <td>{{$docente->numero_telefono}}</td>
                <td>{{$docente->correo}}</td>
                <td>{{$docente->materias->nombre}}</td>
                <td><a href="{{route('docente.editar', $docente->id)}}" class="btn btn-info">editar</a>
                    <form action="{{route('docente.eliminar', $docente->id)}}" class="d-inline" method="post">
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
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

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
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> --}}
       
    <script>
        console.log('Hi!');
    </script>
@stop
