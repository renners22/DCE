@extends('adminlte::page')

@section('title', 'Estudiantes')

@section('content_header')
    <h1>Estudiantes</h1>

@stop

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('estudiante.crear') }}" class="btn btn-info">Crear</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->apellido}}</td>
                <td>{{$item->correo}}</td>
                <td><a href="{{route('estudiante.editar', $item->id)}}" class="btn btn-info">editar</a>
                    <form action="{{route('estudiante.eliminar', $item->id)}}" class="d-inline" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <input type="submit" class="btn btn-danger" value="eliminar" onclick="return confirm('¿Desea eliminar este dato?')">
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
