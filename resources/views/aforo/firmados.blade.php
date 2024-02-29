@extends('adminlte::page')

@section('title', 'Importar excel')

@section('content_header')
   <h1>Firma dos</h1>
@stop

@section('content')

<div class="contenedor">

<div class="row">
    <div class="col-md-12">
         <canvas id="draw-canvas" width="620" height="360">
             No tienes un buen navegador.
         </canvas>
     </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input type="button" class="button" id="draw-submitBtn" value="Crear Imagen"></input>
        <input type="button" class="button" id="draw-clearBtn" value="Borrar Canvas"></input>

                <label>Color</label>
                <input type="color" id="color">
                <label>Tamaño Puntero</label>
                <input type="range" id="puntero" min="1" default="1" max="5" width="10%">


    </div>

</div>

<br/>
<div class="row">
    <div class="col-md-12">
        <textarea id="draw-dataUrl" class="form-control" rows="5">Codigo:</textarea>
    </div>
</div>
<br/>
<div class="contenedor">
    <div class="col-md-12">
        <img id="draw-image" src="" alt="Tu Imagen aparecera Aqui!"/>
    </div>
</div>
</div>

@stop

@section('css')
   <link rel="stylesheet" href="{{ asset('firmados/estilo.css') }}">
@stop

@section('js')
<script src="{{ asset('firmados/script.js') }}"></script>
@stop