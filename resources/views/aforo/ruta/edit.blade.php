@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar ruta</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($ruta, ['route' => ['aforo.ruta.update', $ruta], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del recipiente',
                    'required',
                ]) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Descripción') !!}
                {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una descripción de la ruta',
                    'required',
                ]) !!}

                @error('descripcion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {!! Form::submit('Actualizar ruta', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>



@stop

@section('css')

@stop

@section('js')

@stop