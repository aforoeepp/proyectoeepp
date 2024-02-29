@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('aforo.actividade.create') }}">Agregar actividad económica</a>
    <h1>Actividad económica</h1>
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
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($actividades as $actividade)
                    <tr>
                        <td>{{ $actividade->id }}</td>
                        <td>{{ $actividade->name }}</td>
                        <td width="40px">
                             <a class="btn btn-success" href="{{route('aforo.actividade.edit', $actividade)}}">Editar</a> 
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
