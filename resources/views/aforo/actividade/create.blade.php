@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear actividad económica</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'aforo.actividade.store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la actividad económica',
                    'required',
                ]) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {!! Form::submit('Crear actividad económica', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>



@stop

@section('css')

@stop

@section('js')

@stop
