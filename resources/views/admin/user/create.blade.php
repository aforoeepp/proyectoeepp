@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear usuario</h1>
@stop

@section('content')
      @if (session('info'))
            <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                 {!! Form::open(['route' => 'admin.user.store']) !!}
    
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario','required']) !!}
                
                   @error('name')
                       <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>
    
                <div class="form-group">
                    {!! Form::label('name', 'Correo') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo','required']) !!}
                
                   @error('email')
                       <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Contraseña') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                
                   @error('password')
                       <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Confirmar contraseña') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirme la contraseña', 'required']) !!}
                
                   @error('password_confirmation')
                       <span class="text-danger">{{$message}}</span>
                   @enderror
                </div>
    
                {!! Form::submit('Crear usuario', ['class' => 'btn btn-primary']) !!} 
    
                {!! Form::close() !!}
            </div>
        </div>

@stop

@section('css')
   
@stop

@section('js')
   
@stop