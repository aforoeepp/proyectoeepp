@extends('adminlte::page')

@section('title', 'Importar excel')

@section('content_header')
   <h1>Firma</h1>
@stop

@section('content')
   <p>Firmar a continuación:</p>
   <canvas id="canvas"></canvas>
   <br>
   <button id="btnLimpiar">Limpiar</button>
   <button id="btnDescargar">Descargar</button>
   <button id="btnGenerarDocumento">Pasar a documento</button> 
@stop

@section('css')
   <link rel="stylesheet" href="{{ asset('firma/estilo.css') }}">
@stop

@section('js')
<script src="{{ asset('firma/script.js') }}"></script>
@stop