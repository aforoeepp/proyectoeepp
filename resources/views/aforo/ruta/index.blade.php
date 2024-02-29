@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('aforo.ruta.create') }}">Agregar ruta</a>
    <h1>Ruta</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rutas as $ruta)
                    <tr>
                        <td>{{ $ruta->id }}</td>
                        <td>{{ $ruta->name }}</td>
                        <td>{{ $ruta->descripcion }}</td>
                        <td width="40px">
                             <a class="btn btn-success" href="{{route('aforo.ruta.edit', $ruta)}}">Editar</a> 
                          </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@stop

@section('css')

@stop

@section('js')

@stop
