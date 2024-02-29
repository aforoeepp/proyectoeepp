@extends('adminlte::page')

@section('title', 'Importar excel')

@section('content_header')
   <h1>Importar excel</h1>
@stop

@section('content')

@if (session('info'))
        <div class="alert alert-success">
          <strong>{{session('info')}}</strong>
        </div>
@endif

    <div class="card">
        <div class="card-body">
            <form action="{{route('revisionca.createimportarexcel')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="import_file">
                <button class="btn btn-primary" type="submit">Importar</button>
                
                </form>
            
        </div>
    </div>
   
@stop

@section('css')
   
@stop

@section('js')
   
@stop