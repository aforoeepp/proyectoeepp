@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear cliente</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
          
            {!! Form::open(['route' => 'aforo.cliente.store']) !!}
            <div class="form-row">


            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('tipoaforo', 'Tipo de aforo') !!}
              {!! Form::select('tipoaforo', ['1' => 'Gran generador' ], null, ['class' => 'form-control']) !!} 
                @error('tipoaforo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('tiporesiduos', 'Tipo de residuos') !!}
              {!! Form::select('tiporesiduos', ['1' => 'Ordinario', '2' => 'Organico' ], null, ['class' => 'form-control']) !!} 
                @error('tiporesiduos')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-lg-4 col-md-12 col-sm-12 mb-12">
                {!! Form::label('name', 'Nombre del usuario') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario',
                    'required',
                ]) !!}

                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-4 col-md-12 col-sm-12 mb-12">
                {!! Form::label('name', 'codigo usuario') !!}
                {!! Form::text('codigousuario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el codigo de la instalación',
                    'required',
                ]) !!}

                @error('codigousuario')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('name', 'Dirección') !!}
                {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección',
                    'required',
                ]) !!}

                @error('direccion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('name', 'Telefono') !!}
                {!! Form::number('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el telefono',
                    'required',
                ]) !!}

                @error('telefono')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('name', 'Correo') !!}
                {!! Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo',
                    'required',
                ]) !!}

                @error('correo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-lg-4 col-md-12 col-sm-12 mb-12">
                {!! Form::label('name', 'Nombre del usuario o representante') !!}
                {!! Form::text('nombrerl', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario o representante',
                    'required',
                ]) !!}

                @error('nombrerl')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('actividade_id', 'Actividad económica') !!}
                {!! Form::select('actividade_id', $actividades, null, ['class' => 'form-control']) !!}
                @error('actividade_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-12">
                {!! Form::label('ruta_id', 'Ruta') !!}
                {!! Form::select('ruta_id', $rutas, null, ['class' => 'form-control']) !!}
                @error('ruta_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        </div>
            

            {!! Form::submit('Crear cliente', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        
        </div>
    </div>



@stop

@section('css')

@stop

@section('js')

@stop
