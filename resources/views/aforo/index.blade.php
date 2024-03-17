@extends('adminlte::page')

@section('title', 'Importar excel')

@section('content_header')
    <h1>Aforar</h1>
@stop

@section('content')
    <div class=" form-inline">
        <div class="form-group mb-2 mr-2  ">
            <label class="px-2">Ruta</label>
            <select class="form-control select2" id="lrutas" name="lrutas" onchange="mostrartablas()">
                <option value=''>Seleccione una ruta</option>
                @foreach ($rutas as $ruta)
                    <option value='{{ $ruta->id }}'>{{ $ruta->name  }}</option>
                @endforeach
            </select>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
