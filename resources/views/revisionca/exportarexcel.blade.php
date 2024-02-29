@extends('adminlte::page')

@section('title', 'Importar excel')

@section('content_header')
   <h1>Importar excel</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary float-left" href="{{route('revisionca.exportarexcel')}}">Exportar excel</a>
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
   
@stop